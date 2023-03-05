<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data = DB::table('cart_products')
            // ->select('products.name', DB::raw('SUM(products_before_transaction.quantity) as total_quantity'))
            ->join('products', 'products.id', '=', 'cart_products.product_id')
            ->orderBy('quantity', 'DESC')
            ->get();

        return view('admin.cart.index', compact("data"));
    }

    public function add(Request $request) {
        $product = Product::where('id', $request->product_id)->first();

        $add = new Cart();
        $add->product_id = $request->product_id;
        $add->quantity = $request->quantity;
        $add->total = $request->quantity * $product->price;

        $getCart = Cart::where('product_id', $add->product_id)->first();
        if($getCart) {
            return back()->with('warning', "Product already in cart");
        }

        $add->save();


        return back()->with('success', "Add to cart successfulyy");
    }

    public function destroy(Cart $id)
    {
        $id->delete();
        return redirect()->route('cart')->with('success','Cart deleted successfully!');
    }
}
