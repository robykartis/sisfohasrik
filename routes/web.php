<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperadminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*------------------------------------------
--------------------------------------------
Super Admin
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:superadmin'])->group(function () {

    Route::get('superadmin', [SuperadminController::class, 'index'])->name('superadmin.index');
    // Akun
    Route::resource('akun', AkunController::class);
    Route::get('akun/json', [AkunController::class, 'json'])->name('json.index');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {

    Route::get('/operator/home', [HomeController::class, 'operatorAdmin'])->name('operator.home');
});
Route::middleware(['auth', 'user-access:readonly'])->group(function () {

    Route::get('/read-only/home', [HomeController::class, 'readonlyAdmin'])->name('readonly.home');
});
