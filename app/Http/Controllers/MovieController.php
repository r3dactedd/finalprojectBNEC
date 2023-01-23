<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieCinemas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function returnData(){
        $data = Movie::all();
        return view('index',['data'=>$data]);
    }

    public function createMovie(){

    return view('Movies.create',[
        'movies' => Movie::all(),
        'cinemas' => Cinema::all(),
        'category' => Category::all(),
        'title' => 'Create Movie',
        'active' => ''
    ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|max:255',
            'released_date' => 'required',
            'desc' => 'required|min:10',
            'category' => 'required',
            'cinemas' => 'required',
            'image' => 'required|image|file|max:5120'
        ]);


        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }

        // insert data movie
        Movie::create($validatedData);

        // insert data category
        $idMov = Movie::where('title',$request->title)->value('id');
        $thisTime = Carbon::now();

        foreach($request->category as $category){
            DB::insert('insert into movie_categories (movie_id, category_id,created_at,updated_at) values (?, ?, ?, ?)', [$idMov, $category,$thisTime,$thisTime]);
        }

        //insert data cinema
        $i = 0;

        while($i < sizeof($request->cinemas)){
            DB::insert('insert into movie_cinemas (movie_id, cinema_id,created_at,updated_at) values (?,?, ?, ?, ?)', [$idMov, $request->cinemas[$i],$thisTime,$thisTime]);
            $i++;
        }

        // dd($request->all());

        return redirect('/')->with('success', 'New Movie has been added!');
    }

    public function editMovie(Movie $movie)
    {
        $dataCinema= DB::table('movies')
        ->select()
        ->join('cinemas','cinemas.id','=','movies.cinema_id')
        ->where('movies.id','=', $movie->id)
        ->get(['cinemas.id','cinemas.name']);

        $dataCategory = DB::table(table:'movies')
        ->select()
        ->join('movie_categories', 'movie_categories.movie_id', '=', 'movies.id')
        ->join('categories', 'categories.id', '=', 'movie_categories.category_id')
        ->where('movies.id','=', $movie->id)
        ->get(['categories.id','categories.category_name']);


        return view('movies.edit',[
            'movie' => $movie,
            "cinemas_data" => $dataCinema,
            "category_data" => $dataCategory,
            "category" => Category::all(),
            "cinemas" => Cinema::all(),
            'title' => 'Edit Movie',
            'active' => '',
            'idx' => 0
        ]);

    }

    public function update(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'director' => 'required|max:255',
            'released_date' => 'required',
            'desc' => 'required|min:10',
            'cinema' => 'required',
            'category' => 'required',
            'image' => 'image|file|max:5120'
        ]);


        if($request->file('image')){
            if($movie->image){
                Storage::delete($movie->image);
            }
            $validatedData['image'] = $request->file('image')->store('storage/images');
        }

        // insert data movie
        Movie::where('id',$movie->id)
             ->update($validatedData);


             $request->validate([
                'cinema' => 'required',
                'category' => 'required'
            ]);

        // insert data genre
        $thisTime = Carbon::now();
        $thatTime = MovieCategory::where('movie_id',$movie->id)->value('created_at');

        MovieCategory::where('movie_id',$movie->id)->delete();

        foreach($request->category as $category){
            DB::insert('insert into movie_categories (movie_id, category_id,created_at,updated_at) values (?, ?, ?, ?)', [$movie->id, $category,$thatTime,$thisTime]);
        }

        $thatTime2 = MovieCinemas::where('movie_id',$movie->id)->value('created_at');
        MovieCinemas::where('movie_id',$movie->id)->delete();

        //insert data actor
        $i = 0;

        while($i < sizeof($request->cinema)){
            DB::insert('insert into movie_cinemas (movie_id, cinema_id,created_at,updated_at) values (?,?, ?, ?, ?)', [$movie->id, $request->cinema[$i],$thatTime2,$thisTime]);
            $i++;
        }


        return redirect('/')->with('success', 'Movie has been updated!');

    }


}

