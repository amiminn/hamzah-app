<?php

namespace App\Models;

use App\Services\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaModel extends Model
{
    use HasFactory;
    protected $table = "villa";
    protected $guarded = [];

    protected $casts = [
        // 'fasilitas' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Response::epoch();
        });
    }
}
