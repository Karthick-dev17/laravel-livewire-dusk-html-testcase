<?php

use App\Livewire\Dusk;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('dusk', Dusk::class)->name('dusk');
