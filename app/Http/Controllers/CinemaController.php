<?php

namespace App\Http\Controllers;


use App\Models\Cinema;
use App\Models\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CinemaController extends Controller
{
    public function returnData(){
        $cinema = Cinema::all();
        $mov = Movie::all();
        return view('Cinemas.index',compact('cinema','mov'));
    }
}
