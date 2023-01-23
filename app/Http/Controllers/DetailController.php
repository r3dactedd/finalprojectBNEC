<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function returnDetails($id)
    {
        $movie = DB::table(table:'movies')
        ->select()
        ->join('movie_cinemas','movie_cinemas.movie_id','=','movies.id')
        ->join('cinemas','cinemas.id','=','movie_cinemas.cinema_id')
        ->where('movies.id','=', $id)
        ->get();

        $category = DB::table(table:'movies')
        ->select()
        ->join('movie_categories', 'movie_categories.movie_id', '=', 'movies.id')
        ->join('categories', 'categories.id', '=', 'movie_categories.category_id')
        ->where('movies.id','=', $id)
        ->get();

        return view('Movies.detail',['movie'=>$movie, 'category'=>$category]);
    }
}
