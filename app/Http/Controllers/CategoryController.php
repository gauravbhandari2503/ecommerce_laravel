<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;

class CategoryController extends Controller
{
    public function subCat(Request $request){
        $parent_id=$request->cat_id;
        $subcategories= Category::where('id',$parent_id)
                        ->with('child')
                        ->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function viewByCategory($name){
        $categories = Category::with('children')->where('name', $name)->get();
        if (!$categories->count()) {
            return abort(404);
        }
        return view('customer.category', compact('categories'));
    }
}
