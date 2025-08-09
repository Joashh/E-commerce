<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
        'product_id' => 'required|exists:product_list,id',
        'quantity' => 'nullable|integer|min:1',
        'price' => 'integer',
    ]);

     Cart::create([
            'product_id' => (int) $request->product_id,
            'quantity' => $request->quantity ?? 1,
            'price' => $request->price,
        ]);

     return response()->json(['message' => 'Product added to cart.'], 200);
    }

     public function index()
    {
        $CartItems = Cart::with('product')->get();
        return response() -> json($CartItems);
    }

}
