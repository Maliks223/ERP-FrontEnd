<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\TeamController;

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
Route::prefix('users')->middleware(['auth','SuperAdmin'])->group(function(){

});
Route::post('/register', [AuthController::class, 'register']);


//user routes
Route::get('/users', [AuthController::class, 'get']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::resource('/users', AuthController::class);

//teams routes
Route::resource('/teams', TeamController::class);

//employees routes
Route::resource('/employees', EmployeeController::class);

//middleware authentication
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::resource('/kpi', KPIController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
