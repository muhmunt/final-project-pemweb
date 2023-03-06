<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartProducts;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data = DB::table('cart_products')
            ->select('cart_products.id','cart_products.product_id','cart_products.quantity','cart_products.total','products.name','products.price','products.stock', 'cart_products.quantity')
            ->join('products', 'products.id', '=', 'cart_products.product_id')
            ->orderBy('quantity', 'DESC')
            ->get();
        // dd($data);
        return view('admin.cart.index', compact("data"));
    }

    public function add(Request $request) {
        $product = Product::where('id', $request->product_id)->first();

        $add = new CartProducts();
        $add->product_id = $request->product_id;
        $add->quantity = $request->quantity;
        $add->total = $request->quantity * $product->price;

        $getCart = CartProducts::where('product_id', $add->product_id)->first();
        if($getCart) {
            return back()->with('warning', "Product already in cart");
        }

        $add->save();


        return back()->with('success', "Add to cart successfulyy");
    }


    public function delete($id)
    {
        CartProducts::where('id', $id)->delete();
        
        return redirect()->route('cart')->with('success','Cart deleted successfully!');
    }
}
