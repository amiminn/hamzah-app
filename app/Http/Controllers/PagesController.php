<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\VillaModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
        $data = [
            "total_transaksi" => TransaksiModel::count(),
            "total_pendapatan" => 0,
            "pendapatan_bulan_ini" => 0,
            "jumlah_kamar" => VillaModel::count(),
        ];
        return Inertia::render("dashboard/index", compact("data"));
    }

    public function login()
    {
        return Inertia::render("auth/login");
    }

    public function pengaturan()
    {
        return Inertia::render("pengaturan/index");
    }

    public function profile()
    {
        return Inertia::render("profile/index");
    }

    public function users()
    {
        return Inertia::render("users/index");
    }
    public function usersid()
    {
        return Inertia::render("users/show");
    }
    public function villa()
    {
        return Inertia::render("villa/index");
    }
    public function transaksi()
    {
        return Inertia::render("transaksi/index");
    }
    public function transaksidetail($id)
    {
        $res = TransaksiModel::find($id);
        $data = collect($res)->put("datavilla", $res->villa()->first());
        return Inertia::render("transaksi/detail", compact("data"));
    }
    public function transaksibaru($fullDate)
    {
        return Inertia::render("villa/formTransaksi", compact("fullDate"));
    }

    public function tambahusers()
    {
        return Inertia::render("users/adduser");
    }

    public function tailwindcss()
    {
        return Inertia::render("tailwindcss/index");
    }
}
