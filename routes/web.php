<?php

use App\Http\Controllers\todoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('/todo', todoListController::class)->only('index', 'store', 'destroy', 'update');
});