<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCinemas extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    protected $with = ['movieCinemas', 'movie'];

    public function movieCinemas()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}

