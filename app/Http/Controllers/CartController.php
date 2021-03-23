<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('login');
        } 
        $carts = Cart::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate(10);
        return view('customer.cart', compact('carts'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(Request $request){
        
        $cart = Cart::where('customer_id',Auth::user()->id)->where('product_id',$request->id)->first();
        if($cart){
            $cart->update([
                'quantity' => $cart->quantity+1,
            ]);
            return redirect()->route('cart');
        }
        else{
            Cart::create([
                'customer_id' => Auth::user()->id,
                'product_id'  => $request->id,
                'quantity'  => 1,
            ]);
            return redirect()->route('cart');
        }

    }
    
}
