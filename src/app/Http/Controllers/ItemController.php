<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\State;
use App\Models\Comment;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', '!=', Auth::id())->get();
        return view('admin', compact('items'));
    }

    public function suggest(Request $request)
    {
        $keyword = $request->input('keyword');
        $items = Item::where('user_id', '!=', auth()->id())
            ->when($keyword, function ($query, $keyword) {
                return $query->where('item_name', 'like', "%{$keyword}%");
            })
            ->get();

        return view('components.item_list', compact('items'));
    }

    public function mylist()
    {
        $user = Auth::user();
        $items = $user->favorites;
        return view('components.item_list', compact('items'));
    }

    public function detail($id)
    {
        $user = auth()->user();
        $item = Item::with(['category', 'state'])->findOrFail($id);

        return view('detail', compact('item'));
    }

    public function toggle(Item $item)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => '未認証'], 401);
        }

        if ($user->favorites()->where('item_id', $item->id)->exists()) {
            $user->favorites()->detach($item->id);
        } else {
            $user->favorites()->attach($item->id);
        }

        return response()->json(['count' => $item->favoritedBy()->count()]);
    }

    public function store(Request $request, Item $item)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->save();

        $comment->users()->attach(Auth::id(), ['item_id' => $item->id]);

        return redirect()->route('detail', ['id' => $item->id]);
    }

    public function mypage()
    {
        $user = Auth::user();
        return view('mypage', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postcode' => 'nullable|string|max:10',
            'address' => 'nullable|string|max:255',
            'building' => 'nullable|string|max:255',
            'icon_url' => 'nullable|image|max:2048',
        ]);

        $user->name = $validated['name'];
        $user->postcode = $validated['postcode'] ?? null;
        $user->address = $validated['address'] ?? null;
        $user->building = $validated['building'] ?? null;

        if ($request->hasFile('icon_url')) {
            $path = $request->file('icon_url')->store('public/user_icon');
            $filename = basename($path);
            $user->icon_url = $filename;
        }

        $user->save();

        return redirect()->route('mypage');
    }

    public function sell()
    {
        $categories = Category::all();
        $states = State::all();

        return view('sell', compact('categories', 'states'));
    }

    public function storeSell(Request $request)
    {
        $validated = $request->validate([
            'item_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'item_name' => 'required|string|max:255',
            'brand_name' => 'nullable|string|max:255',
            'text' => 'required|string',
            'state_id' => 'required|exists:states,id',
            'price' => 'required|integer|min:0',
            'category' => 'required|array',
            'category.*' => 'exists:categories,id',
        ]);

        $filename = null;

        if ($request->hasFile('item_image')) {
            $filename = $request->file('item_image')->hashName();
            $request->file('item_image')->storeAs('public/item_image', $filename);
        }

        $item = new Item();
        $item->user_id = Auth::id();
        $item->state_id = $request->input('state_id');
        $item->item_name = $request->input('item_name');
        $item->brand_name = $request->input('brand_name');
        $item->text = $request->input('text');
        $item->price = $request->input('price');
        $item->item_image = $filename;

        $item->save();

        $item->category()->attach($validated['category']);

        return redirect()->route('admin');
    }

    public function purchase()
    {
        return view('purchase');
    }
}
