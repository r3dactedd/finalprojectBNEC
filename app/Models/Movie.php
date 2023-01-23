<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded =['id'];

    public function MovieCinemas()
    {
        return $this->hasOne(MovieCinemas::class);
    }

    public function MovieCategory()
    {
        return $this->hasMany(MovieCategory::class);
    }
}
