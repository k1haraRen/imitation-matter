<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function firstLoginForm()
    {
        $user = Auth::user();

        if (!$user->is_first_login) {
            return redirect()->route('home');
        }

        return view('first_login');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'icon_url' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('icon_url')) {
            $path = $request->file('icon_url')->store('public/user_icon');
            $user->icon_url = basename($path);
        }

        $user->name = $request->name;
        $user->postcode = $request->postcode;
        $user->address = $request->address;
        $user->building = $request->building;
        $user->is_first_login = false;
        $user->save();

        return redirect('/');
    }

    public function first()
    {
        return view('first_login');
    }

    public function mail()
    {
        return view('mail_check');
    }
}
