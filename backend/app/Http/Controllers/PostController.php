<?php

namespace App\Http\Controllers;
use App\Models\ProductList;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function create(Request $request)
    {


    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'avail' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $productlist = ProductList::create([
            'name' => $request->title,
            'description' => $request->desc,
            'availability' => $request->avail,
            'category' => $request->category,
            'price' => $request->price,
            'posted_id' => $request->quant,
        ]);

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $productlist
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function index()
    {
        $productTopost = ProductList::all();
        return response() -> json($productTopost);
    }
}
