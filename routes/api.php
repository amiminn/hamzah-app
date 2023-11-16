<?php

use App\Http\Controllers\api\PengaturanController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware([])->group(function () {
    Route::apiResource("users", UserController::class);
    Route::controller(UserController::class)->prefix("auth/user")->group(function () {
        Route::get("/", "userAuth");
        Route::get("update", "updateAuth");
    });
});

Route::resource('pengaturan', PengaturanController::class)->only(["index", "store"]);
