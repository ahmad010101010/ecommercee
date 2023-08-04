<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Mail\InvoiceMailable;
use App\Events\InvoiceEmailSent;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
       $orders = Order::paginate(10);
       return view('admin.order.index',compact('orders'));
    }

    public function show(int $id){
        $orderItem = OrderItem::where('order_id',$id)->get();
        return view('admin.order.show',compact('orderItem'));

    }

    public function destroy(int $id){
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function srdersship(int $id){

        DB::table('orders')
        ->where('id', $id)
        ->update(['delivery_status' => 'On the road']);
            return redirect()->back();


    }
    public function invoice(int $id){
        $order = Order::findOrFail($id);
        $orderItem = OrderItem::where('order_id',$id)->get();
        return view('admin.order.invoice',compact('order','orderItem'));
    }

    public function invoice_mail(int $orderId){

        $order = Order::findOrFail($orderId);
        $orderItem = OrderItem::where('order_id',$orderId)->get();

        try{
            Mail::to("$order->email")->send(new InvoiceMailable($order , $orderItem));
            event(new InvoiceEmailSent($orderId));
            return redirect()->back()->with('message','Invoice mail has been send to '.$order->email);
        }catch(\Exception $e){
            return redirect()->back()->with('message','something went wrong !!'.$e);
        }
    }
}

