<?php

use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\PengaturanController;
use App\Http\Controllers\api\TransaksiController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\VillaController;
use App\Models\TransaksiModel;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Route;

// auth
Route::controller(AuthService::class)->group(function () {
    Route::post("login", "login");
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("dashboard", [DashboardController::class, "index"]);
    Route::get("data-chart", [DashboardController::class, "chart"]);
    Route::apiResource("users", UserController::class);
    Route::apiResource("transaksi", TransaksiController::class)->only(["index", "store", "update", "destroy", "show"]);
    Route::post("cari-transaksi", [TransaksiController::class, "cari"]);
    Route::post("filter-transaksi", [TransaksiController::class, "filter"]);
    Route::get("transaksi-date", [TransaksiController::class, "dateTransaksi"]);
    Route::get("transaksi-lunas={id}", [TransaksiController::class, "transaksiLunas"]);
    Route::get("listvilla", [VillaController::class, "listvilla"]);
    Route::post("export-excel", [TransaksiController::class, "exportexcel"]);
    Route::apiResource("villa", VillaController::class);
    Route::controller(UserController::class)->prefix("auth/user")->group(function () {
        Route::post("/", "userAuth");
        Route::get("update", "updateAuth");
    });
});

Route::resource('pengaturan', PengaturanController::class)->only(["index", "store"]);
