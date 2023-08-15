<?php


use App\Http\Controllers\ApI\Auth\AuthController;
use App\Http\Controllers\API\Payment\PaddleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Auth
Route::group(['prefix' => "public"],function (){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
});

Route::group(['prefix' => "payment","middleware" => 'authApi'],function (){
    Route::get('pay',[PaddleController::class,"pay"]);
});
