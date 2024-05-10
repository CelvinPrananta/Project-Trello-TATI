<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NotificationController;

// ----------------------------- Menu Sidebar Aktif ----------------------------- //
function set_active($route) {
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

// ----------------------------- Autentikfikasi Login ----------------------------- //
Route::get('/', function () {
    return view('auth.login');
});

// ----------------------------- Autentikfikasi MultiLevel ----------------------------- //
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
    Route::get('home',function() {
        return view('home');
    });
});
Auth::routes();

// ----------------------------- Halaman Utama ----------------------------- //
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::patch('/update-tema/{id}', 'updateTemaAplikasi')->name('updateTemaAplikasi');
    Route::get('/notifikasi/dibaca/{id}', 'bacaNotifikasi')->name('notifikasi.dibaca');
    Route::post('/notifikasi/dibaca/semua', 'bacasemuaNotifikasi')->name('notifikasi.dibaca-semua');
    Route::get('/ulangtahun', 'ulangtahun')->name('ulangtahun');
});

// ----------------------------- Pengaturan Perusahaan ----------------------------- //
Route::controller(SettingController::class)->group(function () {
    Route::get('pengaturan/perusahaan', 'pengaturanPerusahaan')->middleware('auth')->name('pengaturan-perusahaan');
    Route::post('pengaturan/perusahaan/save', 'tambahPengaturan')->middleware('auth')->name('pengaturan-perusahaan-save');
});

// ----------------------------- Masuk Aplikasi ----------------------------- //
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ----------------------------- Kunci Layar ----------------------------- //
Route::controller(LockScreen::class)->group(function () {
    Route::get('lock_screen', 'lockScreen')->middleware('auth')->name('lock_screen');
    Route::post('unlock', 'unlock')->name('unlock');
});

// ----------------------------- Daftar Akun ----------------------------- //
Route::controller(RegisterController::class)->group(function () {
    Route::get('/daftar', 'tampilanDaftar')->name('daftar');
    Route::post('/daftar', 'daftarAplikasi')->name('daftar');
});

// ----------------------------- Lupa Kata Sandi ----------------------------- //
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('lupa-kata-sandi', 'getEmail')->name('lupa-kata-sandi');
    Route::post('lupa-kata-sandi', 'postEmail')->name('lupa-kata-sandi');    
});

// ----------------------------- Atur Ulang Kata Sandi ----------------------------- //
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('ubah-kata-sandi/{token}', 'getPassword')->name('ubah-kata-sandi');
    Route::post('ubah-kata-sandi', 'updatePassword')->name('ubah-kata-sandi');
});

// ----------------------------- Pengelola Pengguna ----------------------------- //
Route::controller(UserManagementController::class)->group(function () {
    Route::get('manajemen/pengguna', 'index')->middleware('auth')->name('manajemen-pengguna');
    Route::get('get-users-data', 'getPenggunaData')->name('get-users-data');
    Route::get('riwayat/aktivitas', 'tampilanUserLogAktivitas')->middleware('auth')->name('riwayat-aktivitas');
    Route::get('riwayat/aktivitas/otentikasi', 'tampilanLogAktivitas')->middleware('auth')->name('riwayat-aktivitas-otentikasi');
    Route::get('admin/profile', 'profileAdmin')->middleware('auth')->name('admin-profile');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user-profile');
    Route::post('profile/perbaharui/data-pengguna', 'perbaharuiDataPengguna')->name('profile/perbaharui/data-pengguna');
    Route::post('profile/perbaharui/data-pengguna2', 'perbaharuiDataPengguna2')->name('profile/perbaharui/data-pengguna2');
    Route::post('profile/perbaharui/foto', 'perbaharuiFotoProfile')->name('profile/perbaharui/foto');
    Route::post('data/pengguna/tambah-data', 'tambahAkunPengguna')->name('data/pengguna/tambah-data');
    Route::post('data/pengguna/perbaharui', 'perbaharuiAkunPengguna')->name('data/pengguna/perbaharui');
    Route::post('data/pengguna/hapus', 'hapusAkunPengguna')->name('data/pengguna/hapus');
    Route::get('admin/kata-sandi', 'tampilanPerbaharuiKataSandi')->middleware('auth')->name('admin-kata-sandi');
    Route::get('user/kata-sandi', 'tampilanPerbaharuiKataSandi')->middleware('auth')->name('user-kata-sandi');
    Route::post('change/password/db', 'perbaharuiKataSandi')->name('change/password/db');
    Route::get('get-riwayat-aktivitas', 'getRiwayatAktivitas')->name('get-riwayat-aktivitas');
    Route::get('get-aktivitas-pengguna', 'getAktivitasPengguna')->name('get-aktivitas-pengguna');
 
});

// ----------------------------- Profil Pengguna By ID Akun ----------------------------- //
Route::controller(EmployeeController::class)->group(function () {
    Route::get('user/profile/{user_id}', 'profileEmployee')->middleware('auth');
});

// ----------------------------- Notifikasi ----------------------------- //
Route::controller(NotificationController::class)->group(function () {
    Route::get('tampilan/semua/notifikasi', 'tampilanNotifikasi')->name('tampilan-semua-notifikasi');
    Route::get('/tampilan/semua/notifikasi/hapus/data/{id}', 'hapusNotifikasi')->name('tampilan-semua-notifikasi-hapus-data');
});