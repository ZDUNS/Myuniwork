<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Places;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false; //lai tabula mainit

    public function place()
    {
        return $this->belongsTo(Places::class, 'place_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
