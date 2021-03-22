<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('login');
        } 
        $wishlists = Wishlist::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate(10);
        return view('customer.wishlist', compact('wishlists'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(Request $request){
        
        $wishlist = Wishlist::where('customer_id',Auth::user()->id)->where('product_id',$request->id)->first();
        if($wishlist){
            return redirect()->back()->with('message','Item is already in the wishlist');
        }
        else{
            Wishlist::create([
                'customer_id' => Auth::user()->id,
                'product_id'  => $request->id,
            ]);
            return redirect()->route('wishlist');
        }

    }
    public function destroy(Request $request){

        $id = Wishlist::where('id',$request->id);
        $id->delete();
        return redirect()->route('items.index');

    }
}
