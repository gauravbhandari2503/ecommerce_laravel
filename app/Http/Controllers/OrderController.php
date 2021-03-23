<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

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
        // $carts = Cart::where('customer_id',Auth::user()->id)->with(['product']);
        // dd($carts);
        // foreach($carts as $cart){
        //     Order::create();
        // }
        return view('customer.orderplaced');
    }

}
