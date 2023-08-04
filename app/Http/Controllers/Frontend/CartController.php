<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){
            $prod_chek = product::where('id',$product_id)->first();
                if($prod_chek){
                    if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                        return response()->json(['status'=>$prod_chek->name.' already add to cart']);
                    }else{
                        $cartItme = new Cart();
                        $cartItme->product_id = $product_id;
                        $cartItme->user_id = Auth::id();
                        $cartItme->product_qty = $product_qty;
                        $cartItme->save();
                        return response()->json(['status'=>$prod_chek->name.' add to cart']);
                    }
                }
        }else{
            return response()->json(['status'=>'login to continue']);
        }

    }

    public function show_cart(){
        $carts = Cart::where('user_id',Auth::id())->get();

        return view('frontend.collections.cart',compact('carts'));
    }

    public function delete_cart(Cart $cart){

        $cart->where('product_id',$cart->product_id)->where('user_id',Auth::id());

$cart->delete();

return redirect()->back();

    }
    public function cashondelivary($total){
        $user = Auth::user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->name = $user->name;
        $order->address = $user->address;
        $order->phone = $user->phone;
        $order->pincode = $user->pincode;
        $order->email = $user->email;
        $order->total_price = $total;
        $order->delivery_status='prossing';
        $order->bay_status='Cash On Delivary';
        $order->save();


$cartItems = Cart::where('user_id', Auth::id())->get();
// Loop through each cart item and create a new order record
foreach ($cartItems as $cartItem) {
    OrderItem::create([
        'order_id'=>$order->id,
        'product_id'=>$cartItem->product_id,
        'quntity'=>$cartItem->product_qty,
    ]);
}

// Delete all cart items for the current user
Cart::where('user_id', Auth::id())->delete();
return redirect()->back();

    }

}
