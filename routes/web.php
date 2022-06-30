<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlacklistController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/blacklist', BlacklistController::class);