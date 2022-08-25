<?php

use App\Models\Listing;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
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

//Single Listing -> SHOW
 Route::get('listings/{listing}', [ListingController::class,'show']);

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