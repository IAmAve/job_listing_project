<?php

use App\Models\Listing;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
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

// Common Resource Routes
// index - Show all listings
// show - Show single listing
// create - Show form to create new Listing
// store - Store new Listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

//All Listing -> INDEX
Route::get('/', [ListingController::class,'index']);

//Show create form -> CREATE
Route::get('listings/create', [ListingController::class,'create'])->middleware('auth');

//Store Listing Data -> STORE
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');

//show edit form -> EDIT
Route::get('/listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//Update listing ->UPDATE
Route::put('listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete Listing -> DELETE
Route::delete('listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

//Manage Listing Route
Route::get('/listings/manage', [ListingController::class,'manage'])->middleware('auth');

//Single Listing -> 
Route::get('listings/{listing}', [ListingController::class,'show']);

//Show Register/Create Form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class,'store']);

//logout Route
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form route
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login User route
Route::post('/users/authenticate',[UserController::class, 'authenticate']);



// Route::get('/hello', function(){
//     return response('<h1>HELLO GAGO!!</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function($id){
//     ddd($id);
//     return response('Post'. $id);
// })->where('id','[0-9]+');
 

// Route::get('/search', function(Request $request){
//     return $request->name . ''.$request->city;
// });
?>