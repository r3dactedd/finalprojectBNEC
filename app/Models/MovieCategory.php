<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCategory extends Model
{
    use HasFactory;

    use HasFactory;

    protected $guarded =['id'];

    protected $with = ['MovieCategory', 'movie'];

    public function MovieCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
