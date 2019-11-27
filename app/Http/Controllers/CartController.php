<?php

namespace App\Http\Controllers;

use App\Cart;
use App\product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function cart()
    {
        $all_my_carts = Cart::where('customer_ip',$_SERVER['REMOTE_ADDR'])->get();
        return view('customer.cart',compact('all_my_carts'));
    }
    function addtocart($product_id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (product::findOrFail($product_id)->exists()) {
            if (Cart::where('customer_ip',$ip)->where('product_id',$product_id)->exists()) {
                $product = Cart::where('customer_ip',$ip)->where('product_id',$product_id)->increment('product_quantity');
                return back()->with('greenStatus','Product added to cart 👍');
                // $quantity = $product;
                // echo $quantity;
            } else {
                Cart::insert([
                    'product_id' => $product_id,
                    'customer_ip' => $ip,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                return back()->with('greenStatus','Product added to cart 👍');
            }

        } else {
            return view(abort(404));
        }
    }
}
