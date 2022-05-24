<?php

use App\Http\Controllers\Api\Auth\JwtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SmsController;

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


Route::post('login', [JwtController::class,'login']);
Route::post('register', [JwtController::class,'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('logout', [JwtController::class,'logout']);

});
Route::group(['middleware' => 'auth:api'], function () {
    Route::post("/send", [SmsController::class, "send"]);
    Route::post("/report", [SmsController::class, "report"]);
});



