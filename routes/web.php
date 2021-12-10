<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Scripts;

if (env('APP_ENV') === 'production') {
    URL::forceSchema('https');
}


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/scripts', Scripts::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
