<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        
        $carts = Cart::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate();
        return view('customer.cart', compact('carts'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(Request $request){
        
        $cart = Cart::where('customer_id',Auth::user()->id)->where('product_id',$request->id)->first();
        $product = Product::where('id',$request->id)->first();

        if($product->stock == '0'){
            return redirect()->back()->with('message','Item is out of stock');
        }
        if($cart){
            if($product->stock-1 < $cart->quantity){
                return redirect()->back()->with('message','Limited quantity available ');
            }
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

    public function increaseQuantity($cartId){
        $cart = Cart::where('id',$cartId)->first();
        $product = Product::where('id',$cart->product_id)->first();
        if($product->stock === '0'){
            return redirect()->back()->with('message','Item is out of stock');
        }
        if($cart){
            if($product->stock-1 < $cart->quantity){
                return redirect()->back()->with('message','Limited quantity available ');
            }
            $cart->update([
                'quantity' => $cart->quantity+1,
            ]);
            return redirect()->route('cart');
        }
    }

    public function decreaseQuantity($cartId){
        $cart = Cart::where('id',$cartId)->first();
        $product = Product::where('id',$cart->product_id)->first();
        if($product->stock === '0'){
            return redirect()->back()->with('message','Item is out of stock');
        }
        if($cart){
            $cart->update([
                'quantity' => $cart->quantity-1,
            ]);
            if($cart->quantity === 0){
                $cart->delete();
                return redirect()->back()->with('message','Cart is now empty');
            }
            return redirect()->route('cart');
        }
    }
    
}
