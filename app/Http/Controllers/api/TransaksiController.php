<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Services\Response;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        return TransaksiModel::paginate(10);
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
        return TransaksiModel::find($id);
    }

    public function dateTransaksi(Request $request)
    {
        return collect(TransaksiModel::get())->map(function ($data) {
            return collect($data->only(["nama_customer", "booking_date"]))->put("datavilla", $data->villa()->get(["nama", "primary"]));
        });
    }
}
