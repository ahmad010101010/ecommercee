<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe($total){

        return view('frontend.collections.stripe',compact('total'));
    }

    public function stripePost(Request $request,$total)
    {


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for."
        ]);


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
        $order->bay_status='payed py card';
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





        Session::flash('success', 'Payment successful!');

        return back();
    }

}
