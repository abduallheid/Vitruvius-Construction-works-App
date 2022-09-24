<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payments\FatoorahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('pay',[FatoorahController::class, 'payOrder'])->name('user.pay');
Route::get('success_call_back',[FatoorahController::class, 'successCallBack']);
Route::get('failed_call_back',[FatoorahController::class, 'failCallBack']);
