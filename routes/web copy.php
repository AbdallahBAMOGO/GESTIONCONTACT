<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupeContactController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('groupes', GroupeContactController::class);
Route::resource('contacts', ContactController::class);