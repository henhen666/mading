<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardArticlesController;
use App\Http\Controllers\DashboardPengumumanController;
use App\Http\Controllers\DashboardAdvertisementController;
use App\Http\Controllers\DashboardDAAIController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\DashboardRekapAbsenController;
use App\Models\DaaiTV;

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

// Frontend
Route::get('/', [HomeController::class, 'index']);

// Backend

// Login. Register, Logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/articles', DashboardArticlesController::class)->middleware('auth');
Route::resource('/dashboard/pengumuman', DashboardPengumumanController::class)->middleware('auth');
Route::resource('/dashboard/advertisement', DashboardAdvertisementController::class)->middleware('auth');
Route::resource('/dashboard/daai_tv', DashboardDAAIController::class)->middleware('auth');
Route::resource('/dashboard/rekap_absen', DashboardRekapAbsenController::class)->middleware('auth');
Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('auth');

// truncate
Route::get('/article/truncate', [DashboardArticlesController::class, 'truncate'])->middleware('auth');
Route::get('/pengumuman/truncate', [DashboardPengumumanController::class, 'truncate'])->middleware('auth');
Route::get('/advertisement/truncate/', [DashboardAdvertisementController::class, 'truncate'])->middleware('auth');
Route::get('/daai_tv/truncate', [DashboardDAAIController::class, 'truncate'])->middleware('auth');
Route::get('/rekap_absen/truncate', [DashboardRekapAbsenController::class, 'truncate'])->middleware('auth');

// sdelete DAAI TV Link
Route::delete('/daai_tv/{daaitv:id}', function (DaaiTV $daaitv) {
    DaaiTV::destroy($daaitv->id);
    return back()->with('success', 'Link Berhasil Dihapus!');
})->middleware('auth');
