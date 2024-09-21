<?php

use App\Livewire\Home;
use App\Livewire\Jobs;
use Illuminate\Support\Facades\Route;

Route::get('/',  Home::class);
Route::get('/jobs',  Jobs::class);
