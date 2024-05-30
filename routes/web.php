<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\todoListController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('/todo', todoListController::class)->only('index', 'store', 'destroy', 'update');
});

Route::get('/artisan-call', function(){
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'success';
});