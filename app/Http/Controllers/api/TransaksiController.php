<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Services\Response;
use DateTime;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return TransaksiModel::orderByDesc("id")->paginate(10);
    }

    public function store(Request $request)
    {
        try {
            $checkInDate = new DateTime($request->booking_date['startStr']);
            $checkOutDate = new DateTime($request->booking_date['endStr']);
            $interval = $checkInDate->diff($checkOutDate);
            $jumlahMalam = $interval->format('%a');
            $data = collect($request->all())->put("harga_asli",  $request->harga_asli * $jumlahMalam);
            TransaksiModel::create($data);
            return Response::success("Transaksi baru berhasil dibuat.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show($id)
    {
        $res = TransaksiModel::find($id);
        return collect($res)->put("datavilla", $res->villa()->first());
    }

    public function dateTransaksi(Request $request)
    {
        return collect(TransaksiModel::get())->map(function ($data) {
            return collect($data->only(["nama_customer", "booking_date"]))->put("datavilla", $data->villa()->first(["nama", "primary"]));
        });
    }

    public function update(Request $request, $id)
    {
        try {
            $data = TransaksiModel::find($id);
            if ($request->jumlah_pembayaran < $data->harga_asli) {
                $status = 0;
            } else {
                $status = 1;
            }

            $data->update([
                "nama_customer" => $request->nama_customer,
                "email" => $request->email,
                "no_hp" => $request->no_hp,
                "domisili" => $request->domisili,
                "provinsi" => $request->provinsi,
                "jumlah_pembayaran" => $request->jumlah_pembayaran,
                "status" => $status
            ]);
            return Response::success("Transaksi berhasil diupdate.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function transaksiLunas($id)
    {
        try {
            $data = TransaksiModel::find($id);
            $data->update([
                "jumlah_pembayaran" => $data->harga_asli,
                "status" => 1
            ]);
            return Response::success("Transaksi berhasil diupdate.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            TransaksiModel::find($id)->delete();
            return Response::success("data transaksi berhasil dihapus.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function cari(Request $request)
    {
        try {
            if ($request->name == "null" || $request->name == "") {
                return $this->index();
            }
            return TransaksiModel::where('nama_customer', 'like', $request->name . '%')->paginate(10);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function exportexcel(Request $request)
    {
        try {
            return collect(TransaksiModel::whereBetween('created_at', [$request->startStr, $request->endStr])->get())->map(function ($data) {
                if ($data->jumlah_pembayaran > $data->villa()->first()->harga || $data->jumlah_pembayaran == $data->villa()->first()->harga) {
                    $lunas = "lunas";
                } else {
                    $lunas = "belum lunas";
                }
                return [
                    "nama customer" => $data->nama_customer,
                    "email" => $data->email,
                    "no hp" => $data->no_hp,
                    "alamat" => $data->domisili,
                    "provinsi" => $data->provinsi,
                    "DP" => $data->jumlah_pembayaran,
                    "check in" => $data->booking_date["startStr"],
                    "check out" => $data->booking_date["endStr"],
                    "invoice" => $data->invoice,
                    "villa" => $data->villa()->first()->nama,
                    "harga villa permalam" => $data->villa()->first()->harga,
                    "status" => $lunas
                ];
            });
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
