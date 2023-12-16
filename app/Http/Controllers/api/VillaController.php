<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\VillaModel;
use App\Services\Response;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    public function index(Request $request)
    {
        return VillaModel::paginate(10);
    }

    public function store(Request $request)
    {
        try {
            VillaModel::create($request->all());
            return Response::success("Villa baru berhasil dibuat.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show($id)
    {
        return VillaModel::find($id);
    }

    public function listvilla(Request $request)
    {
        return VillaModel::get(["id", "nama", "harga", "primary"]);
    }

    public function update(Request $request, $id)
    {
        try {
            VillaModel::find($id)->update([
                "nama" => $request->nama,
                "harga" => $request->harga,
                "primary" => $request->primary,
            ]);
            return Response::success("data villa berhasil diupdate.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            VillaModel::find($id)->delete();
            return Response::success("data villa berhasil dihapus.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
