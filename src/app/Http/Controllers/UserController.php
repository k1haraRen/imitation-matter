<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function first()
    {
        return view('first_login');
    }
    public function login()
    {
        return view('login');
    }

    public function mail()
    {
        return view('mail_check');
    }
}
