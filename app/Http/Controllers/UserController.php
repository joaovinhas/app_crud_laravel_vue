<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function my_dashboard(){

        return Inertia::render('Users/MyDashboard', ['user' => Auth::user() ]);

    }
}
