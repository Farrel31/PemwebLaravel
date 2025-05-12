<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Read
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create'); // Form tambah
    }

    public function store(Request $request)
    {
        Product::create($request->all()); // Create
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); // Form edit
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all()); // Update
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // Delete
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
