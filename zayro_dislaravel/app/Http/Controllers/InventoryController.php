<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('inventory.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|in:ninos,hombre,mujer,eventos',
            'image_url' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->category = $validatedData['category'];
        $product->image_url = $validatedData['image_url'];

        $product->save();

        return redirect('/inventory');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('inventory.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|in:ninos,hombre,mujer,eventos',
            'image_url' => 'nullable|string',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->category = $validatedData['category'];
        $product->image_url = $validatedData['image_url'];

        $product->save();

        return redirect('/inventory');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/inventory');
    }
}