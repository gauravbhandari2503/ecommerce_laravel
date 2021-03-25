<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductSearchController extends Controller
{
    public function index(Request $request){
        $title = $request['title'];
        $items = Product::where('title', 'LIKE', '%'.$title.'%')->simplePaginate(8);
        return view('customer.search',compact('items'));
    }
}


