<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PengaturanModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        PengaturanModel::create([
            "nama_app" => "@microservice",
            "email" => "@microservice",
            "ip" => "192.168.1.0",
        ]);

        User::create([
            "name" => "Tholabul Amin",
            "username" => "amiminn",
            "email" => "@amiminn",
            "password" => "admin1",
        ]);
        echo "seeding: success ..";
    }
}
