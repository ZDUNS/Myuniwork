<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Places;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    // Middleware
    public function __construct() {
        // Tikai adminam ir piekluve
        $this->middleware('admin');
    }

    public function __invoke() {
        //saskaitam katras kategorijas atributus un liekam masīvā data
        $data = [];
        $data ['usersCount'] = User::all()->count();
        $data ['postsCount'] = Post::all()->count();
        $data ['vehicleCount'] = Vehicle::all()->count();
        $data ['placesCount'] = Places::all()->count();
        return view('welcome', compact('data'));
    }
}
