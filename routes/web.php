<?php

use App\Livewire\Candidate\ChangePassword;
use App\Livewire\Candidate\CvGo;
use App\Livewire\Candidate\Dashboard;
use App\Livewire\Candidate\EmployersViewed;
use App\Livewire\Candidate\ImportCvData;
use App\Livewire\Candidate\JobsApplied;
use App\Livewire\Candidate\ManageResume;
use App\Livewire\Candidate\Review;
use App\Livewire\CongTy;
use App\Livewire\Index;
use App\Livewire\Site\Login;
use App\Livewire\Site\Register;
use App\Livewire\Site\RequestPasswordReset;
use App\Livewire\TuyenDung;
use App\Livewire\ViecLam;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('/viec-lam/{slug}', ViecLam::class);
Route::get('/tuyen-dung/{slug}', TuyenDung::class);
Route::get('/cong-ty', CongTy::class);


Route::get('/candidate/dashboard', Dashboard::class);
Route::get('/candidate/manage-resume', ManageResume::class);
Route::get('/candidate/import-cv-data', ImportCvData::class);
Route::get('/candidate/review', Review::class);
Route::get('/candidate/cv-go', CvGo::class);
Route::get('/candidate/change-password', ChangePassword::class);
Route::get('/candidate/jobs-applied', JobsApplied::class);
Route::get('/candidate/employers-viewed', EmployersViewed::class);

Route::get('/site/register', Register::class);
Route::get('/site/login', Login::class);


Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/auth/google', [Login::class, 'redirectToProvider'])->name('google.login');
    Route::get('/auth/google/callback', [Login::class, 'handleGoogleCallback']);
});
