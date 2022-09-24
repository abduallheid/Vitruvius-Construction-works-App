<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Contractor\PagesController;
use App\Http\Controllers\Customer\CustomerPagesController;
use App\Http\Controllers\Customer\UploadController;
use App\Http\Controllers\Contractor\ContractorUploadController;
use App\Http\Controllers\Contractor\UploadContractorController;
use App\Http\Controllers\Payments\FatoorahController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'checkUserType']);

Route::post('/register_user', [HomeController::class, 'register_user'])->name('register_user');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/log_in', function () {
    return view('auth_user.login');
})->name('log_in');

Route::get('/register_', function () {
    return view('auth_user.register');
})->name('sign_up');

Route::get('/forget_password', function () {
    return view('auth.password.email');
})->name('forget_password');

Route::get('/Not-Fount', function () {
    return view('auth_user.notfound');
})->name('notfound');

Route::get('/Landing-Page', function () {
    return view('landing.landing-page');
})->name('landing-page');


// ============================ Contractor routes =======================
Route::namespace('Contractor')->prefix('contractor')->middleware('auth')->group(function(){

    Route::middleware('ContractorAuth')->group(function(){
        Route::get('/homepage', [PagesController::class, 'homepage'])->name('contractor.homepage');
        Route::get('/explor', [PagesController::class, 'explor'])->name('contractor.explor');
        Route::get('/your_project', [PagesController::class, 'your_project'])->name('contractor.your_project');
        Route::get('/interested', [PagesController::class, 'interested_projects'])->name('contractor.interested_projects');

        Route::get('/project/accept/{project_id}', [PagesController::class, 'accept'])->name('contractor.accept');
        Route::get('/project/unaccept/{project_id}', [PagesController::class, 'unaccept'])->name('contractor.unaccept');
        Route::get('/project/details/{id}', [PagesController::class, 'details'])->name('contractor.details');
        Route::post('/project/details/comment/{project_id}', [UploadContractorController::class, 'comment'])->name('contractor.comment');
        Route::post('/project/details/reply/{comment_id}', [UploadContractorController::class, 'reply'])->name('contractor.reply');


        Route::get('/profile', [PagesController::class, 'profile'])->name('contractor.profile');
        Route::get('/profile/edit', [PagesController::class, 'edit'])->name('contractor.edit');
        Route::post('/profile/update', [UploadContractorController::class, 'update'])->name('contractor.update');
        Route::post('/profile/update/profile_picture', [UploadContractorController::class, 'profile_picture'])->name('contractor.profile_picture');
        Route::post('/profile/update/password', [UploadContractorController::class, 'update_password'])->name('contractor.update_password');

        Route::post('/notification_read/{id}', [PagesController::class, 'mark_as_read'])->name('contractor.mark_as_read');
        Route::post('/notification_read_all', [PagesController::class, 'read_all'])->name('contractor.read_all');
        Route::get('/paymentDefault', [PagesController::class, 'paymentDefault'])->name('contractor.paymentDefault');

    });

    Route::get('/payment/{project_id}', [PagesController::class, 'payment'])->name('contractor.payment');

});

// ============================ Contractor routes =======================

//------------------------------------------------------------------------------

// ============================ Customer routes =======================

Route::namespace('Customer')->prefix('customer')->middleware('auth')->group(function(){

    Route::middleware('CustomerAuth')->group(function(){
        Route::get('/homepage', [CustomerPagesController::class, 'homepage'])->name('customer.homepage');
        Route::get('/construction_style', [CustomerPagesController::class, 'construction_style'])->name('customer.construction_style');
        Route::get('/your_project', [CustomerPagesController::class, 'your_project'])->name('customer.your_project');

        Route::get('/profile', [CustomerPagesController::class, 'profile'])->name('customer.profile');
        Route::get('/profile/edit', [CustomerPagesController::class, 'edit'])->name('customer.edit');
        Route::post('/profile/update', [UploadController::class, 'update'])->name('customer.update');
        Route::post('/profile/update/profile_picture', [UploadController::class, 'profile_picture'])->name('customer.profile_picture');
        Route::post('/profile/update/password', [UploadController::class, 'update_password'])->name('customer.update_password');
        Route::get('/your_project/delete/{id}', [UploadController::class, 'delete_project'])->name('customer.delete_project');



        Route::post('/upload', [UploadController::class, 'upload'])->name('customer.upload');
        Route::get('/project/details/{id}', [CustomerPagesController::class, 'details'])->name('customer.details');


        Route::get('/payment/{project_id}', [CustomerPagesController::class, 'payment'])->name('customer.payment');
        Route::get('/paymentDefault', [CustomerPagesController::class, 'paymentDefault'])->name('customer.paymentDefault');
    });


    Route::post('/project/details/comment/{project_id}', [UploadController::class, 'comment'])->name('customer.comment');
    Route::post('/project/details/reply/{comment_id}', [UploadController::class, 'reply'])->name('customer.reply');


});
// ============================ Customer routes =======================
