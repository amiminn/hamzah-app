<?php

use App\Http\Controllers\api\PengaturanController;
use App\Models\PengaturanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("user", function () {
    return PengaturanModel::get();
});

Route::resource('pengaturan', PengaturanController::class)->only(["index", "store"]);
