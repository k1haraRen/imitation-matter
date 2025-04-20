<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('admin', compact('items'));
    }

    public function detail($id)
    {
        $item = Item::with(['category', 'state'])->findOrFail($id);

        return view('detail', compact('item'));
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

    public function purchase()
    {
        return view('purchase');
    }
}
