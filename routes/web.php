<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\StatesController;
use Illuminate\Support\Facades\Route;

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






// page control routes 
Route::get('/', [HomeController::class, 'index']);
Route::get('/singup', [HomeController::class, 'signup']);
Route::get('/login', [HomeController::class, 'login']);
// customer routs 
Route::post('/customerCreate',[CustomerController::class,'customerCreate'])->name('customerCreate');
Route::post('/loginclient',[CustomerController::class,'login'])->name('loginclient');

// admin login routs
Route::get('/tm-admin',[HomeController::class,'logadmin']);
Route::post('/adminlogin',[AdminController::class,'adminlogin']);   
// Province Route 
Route::get('/provinceregister',[StatesController::class,'index']);
Route::post('/provincereg', [StatesController::class, 'regProvince']); 
Route::get('/getPrivinceDetails',[StatesController::class,'provinceDetails']);  
Route::get('/editprovince',[StatesController::class,'editprovince']);   
Route::get('/deleteProvince',[StatesController::class,'deleteProvince']); 

// hotels routs 

Route::get('/hotels',[HotelsController::class,'index']);  
Route::post('/registerhotel',[HotelsController::class,'registerHotel']);   
Route::get('/hethotelDetails',[HotelsController::class,'getHotelDetails']);    
Route::get('/edithotel',[HotelsController::class,'editHotel']);  
Route::get('/hotellist',[HotelsController::class,'index']);  
// get hotel list 
Route::get('/hotellistpr/{id}',[HotelsController::class,'provincehotel']);    
Route::get('/hotelview/{id}',[HotelsController::class,'viewHotel']);


//booking   bookinglist  order
 
Route::get('/bookinglist',[BookingsController::class,'index']);   
Route::POST('/addbooking',[BookingsController::class,'addbooking']);  
Route::GET('/getOrderDetails',[BookingsController::class,'viewOrderDetails']);  
Route::GET('/confirmorder',[BookingsController::class,'confirmorder']);

// customer confirmation   
Route::GET('/orderconfirmation',[BookingsController::class,'confirmationview']);

// separate pages 


Route::get('/about',[HomeController::class,'about']);  
Route::get('/contactus',[HomeController::class,'contact']);  

// contact record 
Route::POST('/contactrecord',[ContactController::class,'addcontactrecord']);  
Route::get('/contacts',[ContactController::class,'contactlist']);