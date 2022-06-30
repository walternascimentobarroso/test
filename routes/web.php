<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RuleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/blacklist', BlacklistController::class);
Route::resource('/type', TypeController::class);
Route::resource('/rule', RuleController::class);