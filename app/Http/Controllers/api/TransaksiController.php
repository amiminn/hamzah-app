<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Services\Response;
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
            TransaksiModel::create($request->all());
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
}
