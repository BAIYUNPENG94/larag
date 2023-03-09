<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show create form (before the next one will make this effect)
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing
Route::post('/listings', [ListingController::class, 'store']);

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);


// About expense calculator

// Comomon name:
// index:   show all
// show:    show single
// create:  show form to create new listing
// store:   store new listing
// edit:    show form to edit listing
// update:  update listing
// destroy: delete listing

Route::get('/hello', function() {
    return response("<h1> hello world !!</h1>", 200)
        -> header('Content-Type', 'text/plain')
        -> header('foo', 'bar');
});

Route::get('/posts/{id}', function($id) {
    //ddd($id);
    return response('hello ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    //dd($request);
    return $request->name . ' ' . $request->city;
})

?>