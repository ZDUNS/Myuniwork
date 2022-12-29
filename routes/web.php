<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CreateVehicleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\PlacesController;

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
Route::get('/logout', [AuthController::class, 'logout'])->middleware('isloggedin');
Route::get('/Vehicle' , [VehicleController::class, 'index'])->name('Vehicle.Vehicle')->middleware('isloggedin'); //Lai pieklutu transportu skatam
Route::get('/Create' , [CreateVehicleController::class, 'index'])->name('Vehicle.create')->middleware('isloggedin'); //Lai pieklutu transportu izveidosanas skatam
Route::post('/',[StoreController::class, 'store'])->name('Vehicle.store')->middleware('isloggedin');
Route::get('/{vehicles}', [ShowController::class, 'show'])->name('Vehicle.show')->middleware('isloggedin');
Route::get('/{vehicles}/edit', [EditController::class, 'edit'])->name('Vehicle.edit')->middleware('isloggedin');
Route::delete('/{vehicles}', [DeleteController::class, 'destroy'])->name('Vehicle.delete')->middleware('isloggedin');
Route::patch('/{vehicles}', [UpdateController::class, 'update'])->name('Vehicle.update')->middleware('isloggedin');



Route::get('/Places' , [PlacesController::class, 'index'])->name('Places.index'); //Lai pieklutu valstu skatam
Route::get('/AddNewPlace' , [PlacesController::class, 'index'])->name('Places.create'); //Lai pieklutu valstu izveidosanas skatam
//Route::post('/',[PlacesController::class, 'store'])->name('Places.store');
Route::get('/{places}', [PlacesController::class, 'show'])->name('Places.show');
Route::get('/{places}/edit', [PlacesController::class, 'edit'])->name('Places.edit');
Route::delete('/{places}', [PlacesController::class, 'destroy'])->name('Places.delete');
Route::patch('/{places}', [PlacesController::class, 'update'])->name('Places.update');