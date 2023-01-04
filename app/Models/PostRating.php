<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRating extends Model
{
    use HasFactory;
    protected $table = 'post_rating';
    protected $guarded = false;
}
