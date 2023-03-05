<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index() {
        $transaction = DB::table('transactions')
            ->join('products', 'products.id', '=', 'transactions.product_id')
            ->orderBy('transactions.created_at', 'DESC')
            ->take(10)
            ->get();

        return view("admin.transaction.list-transaction", compact("transaction"));
    }

    public function store(){
        $query = Product::query();

        $products = $query->get();

        return view("admin.transaction.transaction", compact('products'));
    }

    public function buy(Product $product, Request $request)
    {
        $quantity = $request->input('quantity');
        $product_id = $request->input('product_id');
        $total = $request->input('total');

        foreach ($product_id as $key => $value) {
            $product = Product::where("id", $value)->first();

            if($product->stock < $quantity[$key]) {
                return back()->with('error','Stock not available for this transaction');
            }

            Product::where("id",$value)->update([
                "stock" => $product->stock - $quantity[$key]
            ]);

            $transaction = new Transaction();
            $transaction->product_id = $value;
            $transaction->quantity = $quantity[$key];
            $transaction->total_amount = $total[$key];
            $transaction->save();
        }

        Cart::truncate();

        return redirect()->route('products')->with('success', 'Transaction successful!');
    }

}
