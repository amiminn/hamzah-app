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
}
