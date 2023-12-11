<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use App\Models\VillaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return self::dashboard();
    }

    public function chart()
    {
        return self::value_bulan();
    }

    private static function dashboard()
    {
        return [
            "total_transaksi" => TransaksiModel::count(),
            "total_pendapatan" => collect(collect(DB::table('transaksi')->get(["created_at", "jumlah_pembayaran"]))->map(function ($data) {
                return $data->jumlah_pembayaran;
            }))->sum(),
            "pendapatan_bulan_ini" => collect(collect(DB::table('transaksi')
                ->whereYear("created_at", date('Y'))
                ->whereMonth('created_at', date('m'))
                ->get("jumlah_pembayaran"))->map(function ($data) {
                return $data->jumlah_pembayaran;
            }))->sum(),
            "jumlah_kamar" => VillaModel::count(),
        ];
    }

    private static function value_bulan()
    {
        return collect(self::bulan())->map(function ($data) {
            return ["x" => $data["bulan"], "y" => TransaksiModel::where('created_at', 'like', $data["format"] . '%')->sum('jumlah_pembayaran')];
        });
    }

    private static function bulan()
    {
        return collect(TransaksiModel::whereYear("created_at", date('Y'))->get("created_at"))->map(function ($data) {
            $myDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d');
            $date = Carbon::createFromFormat('Y-m-d', $myDate);
            return [
                "bulan" => $date->format('F'),
                "format" => $date->format('Y-m')
            ];
        })->unique()->values();
    }
}
