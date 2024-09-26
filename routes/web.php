<?php

use App\Livewire\Candidate\Dashboard;
use App\Livewire\CongTy;
use App\Livewire\Index;
use App\Livewire\TuyenDung;
use App\Livewire\ViecLam;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('/viec-lam/{slug}', ViecLam::class);
Route::get('/tuyen-dung/{slug}', TuyenDung::class);
Route::get('/cong-ty/{slug}', CongTy::class);


Route::get('/candidate/dashboard', Dashboard::class);
