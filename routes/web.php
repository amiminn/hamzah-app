<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->middleware([])->group(function () {
    Route::get("/", "index");
    Route::get("/login", "login");
    Route::get("/profile", "profile");
    Route::get("/users", "users");
    Route::get("/pengaturan", "pengaturan");
    Route::get("/tailwindcss", "tailwindcss");
});
