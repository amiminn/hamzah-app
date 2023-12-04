<?php

namespace App\Models;

use App\Services\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = "transaksi";
    protected $guarded = [];

    protected $casts = [
        'booking_date' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Response::epoch();
            $model->kode_booking = Response::random(60);
            $model->invoice = Response::random(60);
        });
    }

    public static function get_all_dates($start_date, $end_date)
    {
        $dates = array();
        $current_date = strtotime($start_date);
        $end_date = strtotime($end_date);
        while ($current_date <= $end_date) {
            $dates[] = date('Y-m-d', $current_date);
            $current_date = strtotime('+1 day', $current_date);
        }
        return $dates;
    }
}
