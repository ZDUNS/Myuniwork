<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    protected $guarded = false; //lai tabula mainit
    protected $primaryKey = 'id';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
