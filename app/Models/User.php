<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;


class User extends Model implements Authenticatable
{
    public function isAdmin()
    {
        return ($this->role == 2);
    }

    use \Illuminate\Auth\Authenticatable;
    protected $table = 'users';
    protected $guarded = false; //lai tabula mainit
    protected $primaryKey = 'id';
}
