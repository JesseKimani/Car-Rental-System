<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\VehiclesController;

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

Route::get('/clientlogin',[ClientsController::class,'login']);
Route::get('/registration',[ClientsController::class,'registration']);
Route::post('/register-client',[ClientsController::class,'registerClient'])->name('register-client');
Route::post('/login-client',[ClientsController::class,'loginClient'])->name('login-client');
Route::get('/clientsdashboard',[ClientsController::class,'clientsDashboard']);
Route::get('/logout',[ClientsController::class,'logout']);
Route::get('/book-car',[ClientsController::class,'bookCar'])->name('book-car');
Route::get('/feedback',[ClientsController::class,'feedback']);
Route::post('/store-feedback',[ClientsController::class,'storeFeedback'])->name('store-feedback');
Route::get('/receivedfeedback',[ClientsController::class,'showFeedback']);

Route::get('/adminlogin',[AdminsController::class,'adminLogin']);
Route::post('/login-admin',[AdminsController::class,'loginAdmin'])->name('login-admin');
Route::get('/adminsdashboard',[AdminsController::class,'adminsDashboard']);
Route::get('/logout',[AdminsController::class,'logout']);
Route::get('/clients',[AdminsController::class,'listClients']);
Route::get('/edit-client/{id}',[AdminsController::class,'editClient'])->name('edit-client');
Route::get('/delete-client/{id}',[AdminsController::class,'deleteClient'])->name('deleteclient');
Route::post('/update-client',[AdminsController::class,'updateClient'])->name('update-client');

Route::get('/receivedfeedback',[ClientsController::class,'showFeedback']);

Route::get('/homepage',[AdminsController::class,'homepage']);

Route::get('/imageupload', [ ImageUploadController::class, 'imageUpload' ])->name('image-upload');
Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image-upload-post');

Route::resource('vehicles', VehiclesController::class);
Route::get('/availablecars',[VehiclesController::class,'displayCars']);