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
use App\Http\Controllers\Places\PlacesController;
use App\Http\Controllers\Places\StorePlacesController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Users\IndexController;
use App\Http\Policies\UserPolicy;

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

Route::get('/Places' , [PlacesController::class, 'index'])->name('Places.Index')->middleware('isloggedin'); //Lai pieklutu valstu skatam
Route::get('/Posts' , [PostsController::class, 'index'])->name('Posts.Index')->middleware('isloggedin'); //Lai pieklutu valstu skatam
Route::get('/Vehicle' , [VehicleController::class, 'index'])->name('Vehicle.Vehicle')->middleware('isloggedin'); //Lai pieklutu transportu skatam

Route::get('/AddNewPlace' , [PlacesController::class, 'create'])->name('Places.create')->middleware('isloggedin'); //Lai pieklutu valstu izveidosanas skatam
Route::get('/Create' , [CreateVehicleController::class, 'index'])->name('Vehicle.create')->middleware('isloggedin'); //Lai pieklutu transportu izveidosanas skatam
Route::get('/AddNewPost' , [PostsController::class, 'create'])->name('Posts.create')->middleware('isloggedin');

Route::post('/storepost',[PostsController::class, 'store'])->name('Posts.store')->middleware('isloggedin');
Route::post('/',[StoreController::class, 'store'])->name('Vehicle.store')->middleware('isloggedin');
Route::get('/{posts}', [PostsController::class, 'show'])->name('Posts.show')->middleware('isloggedin');
Route::get('/{posts}/editing', [PostsController::class, 'edit'])->name('Posts.edit')->middleware('isloggedin');
Route::delete('/{posts}/delete', [PostsController::class, 'destroy'])->name('Posts.delete')->middleware('isloggedin');
Route::patch('/{posts}/update', [PostsController::class, 'update'])->name('Posts.update')->middleware('isloggedin');

Route::get('/{vehicles}/show', [ShowController::class, 'show'])->name('Vehicle.show')->middleware('isloggedin');
Route::get('/{vehicles}/edit', [EditController::class, 'edit'])->name('Vehicle.edit')->middleware('isloggedin');
Route::delete('/{vehicles}', [DeleteController::class, 'destroy'])->name('Vehicle.delete')->middleware('isloggedin');
Route::patch('/{vehicles}', [UpdateController::class, 'update'])->name('Vehicle.update')->middleware('isloggedin');

Route::post('/store',[StorePlacesController::class, 'store'])->name('Places.store')->middleware('isloggedin');
Route::get('/{places}/show/this', [PlacesController::class, 'show'])->name('Places.show')->middleware('isloggedin');
Route::get('/{places}/editing/this', [PlacesController::class, 'edit'])->name('Places.edit')->middleware('isloggedin');
Route::delete('/{places}/delete/this', [PlacesController::class, 'destroy'])->name('Places.delete')->middleware('isloggedin');
Route::patch('/{places}/update/this', [PlacesController::class, 'update'])->name('Places.update')->middleware('isloggedin');


Route::get('/user', [IndexController::class, 'index'])->name('User.Index')->middleware('isloggedin');
Route::get('/{users}/editing/my/profile', [IndexController::class, 'edit'])->name('User.edit')->middleware('isloggedin');//->middleware('can:update,user');
Route::patch('/{users}/update/my/profile', [IndexController::class, 'update'])->name('User.update')->middleware('isloggedin');
Route::get('/{users}/show', [IndexController::class, 'show'])->name('User.show')->middleware('isloggedin');