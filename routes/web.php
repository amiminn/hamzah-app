<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->middleware([])->group(function () {
    Route::get("/", "index");
});
