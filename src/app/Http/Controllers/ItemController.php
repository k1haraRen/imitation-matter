<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function mypage()
    {
        return view('mypage');
    }

    public function edit()
    {
        return view('edit');
    }

    public function sell()
    {
        return view('sell');
    }

    public function detail()
    {
        return view('detail');
    }

    public function purchase()
    {
        return view('purchase');
    }
}
