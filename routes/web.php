<?php

use App\Http\Controllers\PagesController;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("login", [AuthService::class, "login"]);
Route::post("logout", [AuthService::class, "logout"])->middleware(['auth']);

Route::controller(PagesController::class)->group(function () {
    // auth
    Route::get("login", "login")->name("login")->middleware(["guest"]);

    // manage
    Route::middleware(['auth'])->group(function () {
        Route::get("/", "index");
        Route::get("profile", "profile");
        Route::get("users", "users");
        Route::get("villa", "villa");
        Route::get("transaksi", "transaksi");
        Route::get("tambah-users", "tambahusers");
        Route::get("pengaturan", "pengaturan");
        Route::get("tailwindcss", "tailwindcss");
    });
});

Route::get("logout", [AuthService::class, "logout"])->middleware(["auth"]);
