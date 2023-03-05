<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $start_date = null, $end_date = null)
    {
        $query = Product::query();

        // Filter by start date
        if ($start_date) {
            $query->where('created_at', '>=', $start_date);
        }

        // Filter by end date
        if ($end_date) {
            $query->where('created_at', '<=', $end_date);
        }

        $products = $query->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products')->with('success','Product created successfully!');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products')->with('success','Product updated successfully!');
    }

    public function destroy(Product $id)
    {
        $id->delete();
        return redirect()->route('products')->with('success','Product deleted successfully!');
    }
}
