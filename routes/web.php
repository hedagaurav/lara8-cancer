<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CancerTypesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TreatmentController;
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

Route::view('/', 'treatment_enquiry');

Route::post('treatment_enquiry',[TreatmentController::class,'treatment_enquiry'])->name('treatment_enquiry');

/* Admin Routes */

Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::view('login','login');
Route::get('login',[DoctorController::class,'login'])->name('login');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('doctor', DoctorController::class);
    Route::resource('cancer-type', CancerTypesController::class);
});
