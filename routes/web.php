<?php

use App\Http\Middleware\CheckEmployer;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLoginCandidate;
use App\Http\Middleware\CheckLoginEmployer;
use App\Livewire\Candidate\ChangePassword;
use App\Livewire\Candidate\CvGo;
use App\Livewire\Candidate\Dashboard;
use App\Livewire\Candidate\EmployersViewed;
use App\Livewire\Candidate\ImportCvData;
use App\Livewire\Candidate\JobsApplied;
use App\Livewire\Candidate\JobsSaved;
use App\Livewire\Candidate\ManageResume;
use App\Livewire\Candidate\Review;
use App\Livewire\Candidate\ReviewUploadResume;
use App\Livewire\CongTy;
use App\Livewire\DanhSachViecLam;
use App\Livewire\DanhSachNganhNghe;
use App\Livewire\DocumentAttachment;
use App\Livewire\Employer\CandidateList;
use App\Livewire\Employer\Candidates;
use App\Livewire\Employer\Homepage;
use App\Livewire\Employer\Login as EmployerLogin;
use App\Livewire\Employer\Order;
use App\Livewire\EmployerHomePage;
use App\Livewire\HomeIndex;
use App\Livewire\Index;
use App\Livewire\Site\Login;
use App\Livewire\Site\Register;
use App\Livewire\Site\RequestPasswordReset;
use App\Livewire\TuyenDung;
use App\Livewire\ViecLam;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;



Route::middleware(CheckEmployer::class)->group(function () {
    Route::get('/', action: HomeIndex::class)->name('index');
    Route::get('/viec-lam/{slug}', ViecLam::class);
    Route::get('/tuyen-dung/{slug}', TuyenDung::class);
    Route::get('/cong-ty', CongTy::class);
    Route::get('/danh-sach-viec-lam', DanhSachViecLam::class)->name('danh-sach-viec-lam');
    Route::get('/danh-sach-nganh-nghe', DanhSachNganhNghe::class)->name('danh-sach-nganh-nghe');
});
// Route::middleware(CheckAuth::class)->group(function () {
//     Route::get('/cong-ty', CongTy::class);
// });
Route::middleware(CheckLoginCandidate::class)->group(function () {
    Route::get('/candidate/dashboard', Dashboard::class);
    Route::get('/candidate/manage-resume', ManageResume::class);
    Route::get('/candidate/import-cv-data', ImportCvData::class);
    Route::get('/candidate/review', Review::class);
    Route::get('/candidate/review{resume_id}', ReviewUploadResume::class)->name('candidate.review');

    Route::get('/candidate/cv-go', CvGo::class);
    Route::get('/candidate/change-password', ChangePassword::class);
    Route::get('/candidate/jobs-applied', JobsApplied::class);
    Route::get('/candidate/employers-viewed', EmployersViewed::class);
    Route::get('/candidate/document-attachment', DocumentAttachment::class);
});
Route::middleware(CheckLoginEmployer::class)->group(function () {
    Route::get('/employer', Homepage::class);
    Route::get('/employer/candidates', Candidates::class);
    Route::get('/employer/candidate/{id}', CandidateList::class)->name('employer.candidate');
    Route::get('/employer/order', Order::class);
});
Route::middleware(CheckLogin::class)->group(function () {
    Route::get('/employer/login', EmployerLogin::class);
    Route::get('/site/register', Register::class);
    Route::get('/site/login', Login::class);
});


Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/auth/google', [Login::class, 'redirectToProvider'])->name('google.login');
    Route::get('/auth/google/callback', [Login::class, 'handleGoogleCallback']);
});
