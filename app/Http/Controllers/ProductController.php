<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('supplier_id',Auth::user()->id)->latest()->paginate(5);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'mrp' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $userData = Auth::user();
        $imageName = $userData->id.'_image'.time().'.'.request()->image->getClientOriginalExtension();

        $request->image->storeAs('products',$imageName,'public');

        Product::create([
            'title' =>  $request['title'],
            'mrp' =>  $request['mrp'],
            'discount' =>  $request['discount'],
            'description' =>  $request['description'],
            'stock' =>  $request['stock'],
            'supplier_id' => $userData->id,
            'image' => $imageName
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->authorize('view', $product);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product )
    {
        $this->authorize('update', $product);
        $request->validate([
            'title' => 'required',
            'mrp' => 'required',
            'discount' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);
        $userData = Auth::user();

        if($request->hasFile('image')){
            $imageName = $userData->id.'_image'.time().'.'.request()->image->getClientOriginalExtension();
            $request->image->storeAs('products',$imageName,'public');
        }
        else{
            $imageName = $product->image;
        }
        
        $product->update([
            'title' =>  $request['title'],
            'mrp' =>  $request['mrp'],
            'discount' =>  $request['discount'],
            'description' =>  $request['description'],
            'stock' =>  $request['stock'],
            'supplier_id' => $userData->id,
            'image' => $imageName
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('products.index')
            ->with('delete', 'Product Deleted Successfully');
    }
}
