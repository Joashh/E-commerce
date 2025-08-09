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
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'desc' => 'required|string',
        'avail' => 'required|string',
        'category' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'quant' => 'nullable|integer', // Add validation if you're using quant
    ]);

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $validated['img_path'] = $imagePath;
    }

    // Rename fields to match DB column names
    $productlist = ProductList::create([
        'name' => $validated['title'],
        'description' => $validated['desc'],
        'availability' => $validated['avail'],
        'category' => $validated['category'],
        'price' => $validated['price'],
        'img_path' => $validated['img_path'] ?? null,
        'posted_id' => $validated['quant'] ?? null,
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

    public function productOrder()
    {
        $topitems = ProductList::where('availability', 'available')
        ->orderBy('posted_id', 'desc')
        ->take(5)
        ->get();

         return response()->json($topitems);
    }
}
