<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/user/home');
});

// HOME
Route::view('/petugas', 'petugas')->name('petugas')->middleware('auth', 'role:admin');

// LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('redirectIfAuthenticated');;
Route::post('login_check', [LoginController::class, 'login_check'])->name('login.check');

// REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('redirectIfAuthenticated');;
Route::post('/register', [LoginController::class, 'store'])->name('register.store');

// LOGOUT
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Middlewares



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
    Route::get('/user/create', [UserController::class, "create"])->name('user.create');
    Route::post('/user/post', [UserController::class, "store"])->name('user.post');
    Route::get('/user/{id}/edit', [UserController::class, "edit"])->name('user.edit');
    Route::put('user/{id}', [UserController::class, "update"])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, "destroy"])->name('user.destroy');

    // PROFILE
    Route::get('/profile', [ProfileController::class, "index"])->name('profile');
    Route::resource('pengiriman', PengirimanController::class);
    Route::put('pengiriman/{id}/update-foto-penyerahan', [PengirimanController::class, 'updateFotoPenyerahan'])->name('pengiriman.update-foto-penyerahan');

    Route::group(['middleware' => 'check.user.permission'], function () {
        Route::resource('petugas', PetugasController::class);
        Route::resource('kendaraan', KendaraanController::class);

    });
});