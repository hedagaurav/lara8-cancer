<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CancerTypesController;
use App\Http\Controllers\DoctorController;
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
    return view('dashboard');
});



/* Admin Routes */


Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('doctor', DoctorController::class);
    Route::resource('cancer-type', CancerTypesController::class);
});
