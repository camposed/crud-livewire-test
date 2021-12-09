<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Scripts;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/scripts', Scripts::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
