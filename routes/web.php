<?php

use App\Models\Movies;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShowsController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketsController;

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

Route::get('/', [Controller::class, 'index'] );
Route::get('/nowshowing', function () {
    return view('movies.nowshowing',[
        'nowshowing'=>Movies::where('status','Now Showing')->get(),
        'nowshowingc'=>Movies::where('status','Now Showing')->count(),

    ]);
});
Route::get('/comingsoon', function () {
    return view('movies.comingsoon',[
        'comingsoon'=>Movies::where('status','Coming Soon')->get(),
        'comingsoonc'=>Movies::where('status','Coming Soon')->count(),
    ]);
});


Route::get('/dashboard',[Controller::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/logout/user', [LoginController::class, 'logout']);
require __DIR__.'/auth.php';
Route::prefix('admin')->middleware(['auth','admin:admin'])->group(function(){
    //Dashboard 
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    
    //Movie
    // Create Movie 
    Route::get('/create_movie',[MoviesController::class,'show_create']);
     // Create Movie store 
     Route::post('/create',[MoviesController::class,'create']);
      // Edit Movie 
    Route::get('/edit_movie/{movie}',[MoviesController::class,'edit']);
    // Edit Movie store 
    Route::put('/edit/{movie}',[MoviesController::class,'update']);
    // Delete Movie 
    Route::delete('/delete/{movie}',[MoviesController::class,'delete']);
    // Manage Movie 
    Route::get('/manage_movie',[MoviesController::class,'manage_movie']);
    // Manage Movie 
    Route::get('/getmoviedetail',[MoviesController::class,'moviedetail'])->name('moviedetail');
    
    // Show
     // Create Show 
     Route::get('/create_show',[ShowsController::class,'show_create']);
     // Create Show store 
     Route::post('/createshow',[ShowsController::class,'create']);
      // Edit Show 
    Route::get('/edit_show/{show}',[ShowsController::class,'edit']);
    // Edit Show store 
    Route::put('/editshow/{show}',[ShowsController::class,'update']);
    // Delete Show 
    Route::delete('/deleteshow/{show}',[ShowsController::class,'delete']);
    // Manage Show 
    Route::get('/manage_show',[ShowsController::class,'manage_show']);
    
    //User
    //Manage User
    Route::get('/manage_user',[MoviesController::class,'manage_user']);
     //Block user
     Route::get('/block/{userId}/{status}',[MoviesController::class,'block_user']);
     // Delete User
    Route::delete('/delete/{user}',[MoviesController::class, 'destroy_user']);
    // Delete User
    Route::get('/ticket',[TicketsController::class, 'ticket_show']);
 
});
Route::prefix('user')->group(function(){
    // movie detail
    Route::get('/movie/{movie}',[MoviesController::class,'single']);
    //Show hall
    Route::get('/showhall/{shows}',[TicketsController::class,'show_hall']);
    Route::post('/bookticket/{shows}',[TicketsController::class,'book_ticket'])->middleware(['auth', 'verified']);
    Route::post('/buy_ticket/{shows}',[TicketsController::class,'sendmail'])->middleware(['auth', 'verified']);
    Route::get('/home',[Controller::class,'showTickets'])->middleware(['auth', 'verified']);
    Route::get('/cancleticket/{ticket_id}',[Controller::class,'cancleTickets'])->middleware(['auth', 'verified']);

});
