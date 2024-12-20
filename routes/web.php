<?php

use App\Http\Controllers\admin\CancerTypesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EnquiryController;
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

Route::view('guide','guide');

/* enquiry form */
Route::get('/', [EnquiryController::class, 'index'])->name('enquiry.form');
Route::post('/', [EnquiryController::class, 'save_enquiries'])->name('save.enquiry');

/* admin */
Route::group(['prefix' => 'admin'], function () {
    Route::view('login', 'login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    /* admin - cancer type CRUD */
    Route::resource('cancer_type', CancerTypesController::class);
    // Route::get('cancer_type/add', [AdminController::class, 'add_cancer_types'])->name('cancer_type.add');
    // Route::post('cancer_type/save', [AdminController::class, 'store_cancer_types'])->name('cancer_type.save');
    
    /* admin - doctor CRUD */
    Route::get('doctor', [AdminController::class, 'list_doctor'])->name('doctor.dashboard');
    Route::get('doctor/add', [AdminController::class, 'add_doctor'])->name('doctor.add');
    Route::post('doctor/save', [AdminController::class, 'store_doctor'])->name('doctor.save');
    Route::get('sendemail', [AdminController::class, 'sendEmail'])->name('admin.sendemail');    

    // Route::resource('doctor', DoctorController::class);
    // Route::resource('cancer-type', CancerTypesController::class);
});


/* doctor */

Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// require __DIR__.'/auth.php';
