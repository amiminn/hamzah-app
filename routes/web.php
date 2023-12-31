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
        Route::get("users={id}", "usersid");
        Route::get("villa", "villa");
        Route::get("pengaturan-villa", "pengaturanvilla");
        Route::get("transaksi", "transaksi");
        Route::get("transaksi={id}", "transaksidetail");
        Route::get("transaksi-baru={fullDate}", "transaksibaru");
        Route::get("tambah-users", "tambahusers");
        Route::get("pengaturan", "pengaturan");
        Route::get("tailwindcss", "tailwindcss");
    });
});

Route::get("logout", [AuthService::class, "logout"])->middleware(["auth"]);
