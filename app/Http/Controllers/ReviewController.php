<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index($productId){

        $reviews = Review::where([
            ['product_id', '=', $productId ],
            ['customer_id', '=', Auth::user()->id],
        ])->first();
        if($reviews === NULL){
            $reviews = Review::where('product_id',$productId)->get();
            $product = Product::where('id',$productId)->first();
            return view('customer.review-order',compact('product'));
        }
        else{
            return redirect()->route('user.orders')->with('error',"You feedback has already been recorded .");
        }
        
    }

    public function reviewStore(Request $request, $productId){

        $request->validate([
            'comment' => 'required',
        ]);

        Review::create([
            'customer_id' => Auth::user()->id,
            'product_id'  => $productId,
            'comment'   => $request['comment'],
            'rating'    => $request['rating'],
       ]);

       return redirect()->route('user.orders')->with('success',"Thanks for the feedback ".Auth::user()->name.". Thanks and regards RubiCart.");

    }
}
