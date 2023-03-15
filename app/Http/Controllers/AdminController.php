<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Check if the user is an admin
        if (auth()->check() && auth()->user()->admin) {
            return view('/something');
        } else {
            return redirect('/');
        }
    }
}
