<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    // Middleware
    public function __construct()
    {
        // Tikai administratoram ir piekluve
        $this->middleware('admin');
    }

    public function __invoke()
    {
        //
    }
}
