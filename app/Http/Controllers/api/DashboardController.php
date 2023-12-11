<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return self::dashboard();
    }

    private static function dashboard()
    {
        return [
            'bulan' => self::bulan(),
            'value' => self::value_bulan()
        ];
    }

    private static function value_bulan()
    {
        $arrdate = collect(TransaksiModel::get())->map(function ($data) {
            $myDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d');
            $date = Carbon::createFromFormat('Y-m-d', $myDate);

            $monthName = $date->format('Y-m');

            return $monthName;
        })->unique();

        return collect($arrdate)->map(function ($data) {
            return TransaksiModel::where('created_at', 'like', $data . '%')->sum('jumlah_pembayaran');
        });
    }

    private static function bulan()
    {
        return collect(TransaksiModel::get("created_at"))->map(function ($data) {
            $myDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d');
            $date = Carbon::createFromFormat('Y-m-d', $myDate);

            $monthName = $date->format('F');

            return $monthName;
        })->unique();
    }
}
