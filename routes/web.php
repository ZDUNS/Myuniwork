<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CreateVehicleController;
use App\Http\Controllers\StoreController;

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
    return view('welcome');
});

Route::get('/login' , [AuthController::class, 'login']);
Route::get('/registration' , [AuthController::class, 'registration']);
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('login-user',[AuthController::class, 'loginUser'])->name('login-user');
Route::get('/welcome', [AuthController::class, 'welcome'])->middleware('isloggedin');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/Vehicle' , [VehicleController::class, 'index'])->name('Vehicle.Vehicle'); //Lai pieklutu transportu skatam
Route::get('/Create' , [CreateVehicleController::class, 'index'])->name('Vehicle.create'); //Lai pieklutu transportu skatam
Route::post('/',[StoreController::class, 'store'])->name('Vehicle.store');