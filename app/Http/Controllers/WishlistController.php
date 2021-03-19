<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlists = Wishlist::latest()->paginate(10);

        return view('customer.wishlist', compact('wishlists'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function store(Request $request){
        Wishlist::create([
            'customer_id' => Auth::user()->id,
            'product_id'  => $request->id,
        ]);
        return redirect()->route('wishlist');
    }
}
