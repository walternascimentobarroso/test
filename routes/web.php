<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\ValidatorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/blacklist', BlacklistController::class);
Route::resource('/type', TypeController::class);
Route::resource('/rule', RuleController::class);

Route::get('/validator', [ValidatorController::class, 'index'])->name('validator.index');
Route::post('/validator/check', [ValidatorController::class, 'check']);