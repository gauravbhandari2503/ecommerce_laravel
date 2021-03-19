<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
