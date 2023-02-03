<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = ['content', 'user_id'];

    // notes belongto user

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
