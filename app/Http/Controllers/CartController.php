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
        
        $amount = Cart::where('customer_id',Auth::user()->id)->sum('amount');
        $carts = Cart::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate(10);
        return view('customer.cart', compact('carts'))->with('amount',$amount)
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(Request $request){
        
        $cart = Cart::where('customer_id',Auth::user()->id)->where('product_id',$request->id)->first();
        $product = Product::where('id',$request->id)->first();
        $pricePerPiece = $product->mrp - $product->discount / 100 * $product->mrp;
        if($cart){
            $cart->update([
                'quantity' => $cart->quantity+1,
                'amount' => $cart->pricePerPiece*($cart->quantity+1),  
            ]);
            return redirect()->route('cart');
        }
        else{
            Cart::create([
                'customer_id' => Auth::user()->id,
                'product_id'  => $request->id,
                'pricePerPiece' => $pricePerPiece,
                'quantity'  => 1,
                'amount'   => $pricePerPiece,
            ]);
            return redirect()->route('cart');
        }

    }
    
}
