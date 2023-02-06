<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Notes;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'access_taken','oauth_taken',
        'is_admin'
    ];

    protected $hidden = [
        'password',
    ];

    //user hasMany notes

    public function notes()
    {
        return $this->hasMany('App\MOdels\Notes');
    }

}
