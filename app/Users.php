<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // determine if User is admin by checking DB field role (2 is admin)
    public function isAdmin() {
        return ($this->role == 2);
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }

    public function discussions() {
        return $this->hasMany('App\Post');
    }

    public function discussionratings() {
        return $this->hasMany('App\PostRating');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];
}