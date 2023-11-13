<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PengaturanModel;
use App\Services\Response;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(Request $request)
    {
        return PengaturanModel::find(1);
    }

    public function store(Request $request)
    {
        try {
            PengaturanModel::whereId(1)->update([
                "nama_app" => $request->nama_app
            ]);
            return Response::success("pengaturan berhasil diupdate.");
        } catch (\Throwable $th) {
            return $th->getMessage();
            return Response::success("Oops ada kesalahan sistem.");
        }
    }
}
