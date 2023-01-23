<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryNavbarController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PublisherController;
use App\Models\book;
use App\Models\Movie;
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

Route::get('/', [MovieController::class,'returnData']);

// Route::get('/', [CategoryNavbarController::class,'returnCategoryId']);
Route::get('/contact', function () {
    return view('Contact.index');
});

// route ke navbar -> movie yang isinya list movie
Route::get('/movie',function(){
    return view('movie.index',[
        'title' => 'Books',
        'active' => 'books',
        'movie' => Movie::all()
    ]);
});

Route::get('/movie/{id}',[DetailController::class,'returnDetails']);

Route::get('/movie/{id}/edit',[MovieController::class,'editMovie']);
Route::patch('/movie/{id}',[MovieController::class,'update']);

Route::get('/movie/create',[MovieController::class,'createMovie']);
Route::patch('/',[MovieController::class,'store']);

Route::get('/cinemas',[CinemaController::class,'returnData']);
