<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrowseConferenceController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MyConferenceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ReportsMemberController;
use App\Http\Controllers\UpgradeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.login');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register/aksi', [RegisterController::class, 'create'])->name('create');
});

Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek'])->name('redirect');
    Route::post('/conference/buy/{id}', [OrderController::class, 'buyconference'])->name('conference.buy');



    Route::post('/upgrade/member', [UpgradeController::class, 'upgrade'])->name('upgrade.member');



    Route::get('/success', [OrderController::class, 'success'])->name('success');

    Route::get('/myconference', [MyConferenceController::class, 'myconferenceuser'])->name('my-conferenceuser');
    Route::get('/myconferences', [MyConferenceController::class, 'myconferencemember'])->name('my-conferencemember');

    Route::get('/certificate', [CertificateController::class, 'certificateuser'])->name('certificate-user');
    Route::get('/certificates', [CertificateController::class, 'certificatemember'])->name('certificate-member');

    Route::get('/certificate/download/{id}', [CertificateController::class, 'download'])->name('download.certificate');

});

Route::get('/home', [MasterController::class, 'index']);
Route::get('/home/journals', [MasterController::class, 'journals']);
Route::get('/home/conferences', [MasterController::class, 'conferences']);
Route::get('/home/news', [NewsController::class, 'newsone']);
Route::get('/home/news/{id}', [NewsController::class, 'newssingle']);
Route::get('/home/ourteam', [MasterController::class, 'ourteam']);
Route::get('/home/conferences/{id}', [DetailController::class, 'detail'])->name('conference.detail');

Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::put('/transactions/{id}/approve', [AdminController::class, 'approve'])->name('admin.approved');
    Route::put('/transactions/{id}/reject', [AdminController::class, 'reject'])->name('admin.rejected');

    Route::get('/payments', [AdminController::class, 'showPayments'])->name('payments.index');
    Route::put('/payments/{id}/approve', [AdminController::class, 'approvePayment'])->name('payments.approve');
    Route::put('/payments/{id}/reject', [AdminController::class, 'rejectPayment'])->name('payments.reject');


    Route::get('/reports/user', [ReportsController::class, 'index']);
    Route::get('/reports/member', [ReportsMemberController::class, 'member']);
    Route::get('/conferences', [ConferenceController::class, 'index'])->name('conferences.index');
    Route::get('/conferences/tambah', [ConferenceController::class, 'create'])->name('conferences.tambah');
    Route::post('/conferences', [ConferenceController::class, 'store'])->name('conferences.store');

    Route::get('/conferences/{conferences}/edit', [ConferenceController::class, 'edit'])->name('conferences.edit');

    Route::post('/conferences/{conferences}/update', [ConferenceController::class, 'update'])->name('conferences.update');
    Route::delete('/conferences/{conferences}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');

    Route::get('/admin/downloads', [AdminController::class, 'viewDownloads'])->name('admin.downloads');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('users.destroy');

});

Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/user/user', [BrowseConferenceController::class, 'index']);
    Route::get('/user', [UserController::class, 'home'])->name('user.home');

    Route::get('/user', [UserController::class, 'listconference'])->name('user.home');
    Route::get('/user/edit', [UserController::class, 'edit']);
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/profile', [UserController::class, 'profile']);

    Route::get('/conference/buyer', [ConferenceController::class, 'buyforuser'])->name('conference.buyer');

    Route::get('/upgrade/waiting', [UserController::class, 'waitingApproval'])->name('upgrade.waiting');


});

Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/member/member', [BrowseConferenceController::class, 'browse'])->name('member.member');
    Route::get('/member', [MemberController::class, 'home'])->name('member.home');

    Route::get('/member', [MemberController::class, 'listconference'])->name('member.home');
    Route::get('/member/edit', [MemberController::class, 'edit']);
    Route::post('/member/update', [MemberController::class, 'update'])->name('member.update');
    Route::get('/member/profile', [MemberController::class, 'profile']);

    Route::get('/member/Download/{id}', [MemberController::class, 'download'])->name('member.download');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/conference/{id}', [BrowseController::class, 'showForMember'])->name('conferences.showForMember');
    Route::get('/conferences/{id}', [BrowseConferenceController::class, 'showForUser'])->name('conferences.showForUser');
});
