<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class PurchaseController extends Controller
{
    public function purchaseCard(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $item = Item::findOrFail($request->item_id);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->item_name,
                        ],
                        'unit_amount' => $item->price,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['item_id' => $item->id]),
            'cancel_url' => route('admin'),
        ]);

        return redirect($session->url);
    }

    public function purchaseKonbini(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $item = Item::findOrFail($request->item_id);
        $user = auth()->user();

        $session = Session::create([
            'payment_method_types' => ['konbini'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->item_name,
                        ],
                        'unit_amount' => $item->price,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'customer_email' => $user->email,
            'success_url' => route('success', ['item_id' => $item->id]),
            'cancel_url' => route('admin'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $item = Item::findOrFail($request->item_id);

        if ($item->sold == false) {
            $item->sold = true;
            $item->save();
        }

        return view('success', ['item' => $item]);
    }
}

