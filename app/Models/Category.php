<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    //category belongsToMany books 
    public function books()
    {
        return $this->belongsToMany('App\Models\Book');
    }
}
