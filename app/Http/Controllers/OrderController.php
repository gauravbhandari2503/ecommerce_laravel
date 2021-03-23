<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderInitialized;

class OrderController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('login');
        } 
        $orders = Cart::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate(10);
        return view('orders.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(){

        $carts = Cart::where('customer_id',Auth::user()->id)->with(['product'])->get();
        foreach($carts as $cart){
            $order = Order::create([
                'customer_id' => $cart->customer_id,
                'product_id'  => $cart->product_id,
                'payment_id'  => sha1(time()),
                'quantity'    => $cart->quantity,
                'price_per_piece' => $cart->product->mrp,
                'amount'    => $cart->quantity *  ( $cart->product->mrp - $cart->product->discount / 100 * $cart->product->mrp ),
            ]);
            $cart->delete();
            $order->statuses()->attach(1);
            $product = Product::where('id',$cart->product_id)->first();
            $product->update([
                'stock' => $product->stock - $cart->quantity,
            ]);
        }
        $user = User::where('id',Auth::user()->id)->first();
        $user->notify(new OrderInitialized());
        return view('customer.orderplaced');
    }

}
