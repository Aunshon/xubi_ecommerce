<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Country;
use App\product;
use App\State;
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
    public function updateCart(Request $request)
    {
        // print_r($request->cartQuantity);
        foreach ($request->cartQuantity as $key => $value) {
            // echo "P id:".$request->productId[$key]."  quan:".$value."<br>";
            if ($value>0) {
                if (product::find($request->productId[$key])->quantity < $value) {
                    return back()->with('redStatus', "We don't have this much stock of ".product::find($request->productId[$key])->product_name." ,Please reduse quantity");
                    // echo "We don't have enough stock";
                }
                else {
                    Cart::where('product_id', $request->productId[$key])->where('customer_ip',$_SERVER[ 'REMOTE_ADDR'])->update([
                        'product_quantity' => $value,
                    ]);
                }
            }
            else {
                return back()->with('yellowStatus','Quantity must be at list 1');
            }
        }
        // echo "Your Cart Updated";
        return back()->with('greenStatus','Your Cart Updated👍');
    }
    function clearCart()
    {
        // echo $_SERVER['REMOTE_ADDR'];
        $check = Cart::where('customer_ip',$_SERVER['REMOTE_ADDR'])->delete();
        if ($check) {
            return back()->with('greenStatus','Your Cart Cleared');
        }
        else {
            return back()->with('yellowStatus','Nothing To Clear');
        }
    }
    function deleteCart($cartId)
    {
        Cart::findOrFail($cartId)->delete();
        return back()->with('greenStatus','Cart Removed');
    }
    function checkOut(Request $request){

        if (isset($_POST['checkOutBtn'])) {
            $sub = $request->sub;
            $ship = $request->ship;
            $dis = $request->dis;
            $tot = $request->tot;
            $allCounry = Country::all();
            $allState = State::all();
            // print_r($allCounry->all());
            // echo $allState;
            return view('customer.checkOut',compact('allCounry','sub','ship','dis','tot'));
        }
        else {
            return back();
        }

    }
    function getCityName(Request $request){
        $allState = State::where('country_id',$request->country_id)->get();
        $dataToSend = null;
        foreach ($allState as $key => $value) {
            $dataToSend .= "<option value='".$value->id."'>".$value->name."</option>";
        }
        echo $dataToSend;
    }
    function placeOrder(Request $request)
    {
        print_r($request->all());
    }
    function getSubCategory()
    {
        $sub_category = App\sub_category::all();
        $data='m';
        foreach ($sub_category as $key => $value) {
            $data="gg";
        }
        echo $data;
    }
}
