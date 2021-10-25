<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/redirect',[HomeController::class,'redirect']); 

Route::get('/',[HomeController::class,'index']); 

Route::get('/product',[AdminController::class,'product']);

Route::get('/showproduct',[AdminController::class,'showproduct']);

Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);

Route::get('/updateproduct/{id}',[AdminController::class,'updateproduct']);

Route::post('/updateproductfor/{id}',[AdminController::class,'updateproductfor']);

Route::get('/search',[HomeController::class,'search']);

Route::post('/addToCart/{id}',[HomeController::class,'addTocart']);

Route::get('/showcart',[HomeController::class,'showcart']);

Route::get('/delete/{id}',[HomeController::class,'deletecart']);

Route::post('/order',[HomeController::class,'confirmorder']);

Route::get('/showorder',[AdminController::class,'showorder']);

Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);

Route::get('/ourproduct',[HomeController::class,'ourproduct']);

Route::get('/aboutus',[HomeController::class,'aboutus']);

Route::get('/contactus',[HomeController::class,'contactus']);

// Route::get('/home',[HomeController::class,'home']);