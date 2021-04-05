<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id',Auth::user()->id)->latest()->paginate(5);

        return view('address.index', compact('addresses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address.create');
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
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'pincode' => 'required',
        ]);

        $userData = Auth::user();

        Address::create([
            'state' =>  $request['state'],
            'city' =>  $request['city'],
            'address' =>  $request['address'],
            'landmark' =>  $request['landmark'],
            'pincode' =>  $request['pincode'],
            'user_id' => $userData->id,
        ]);

        return redirect()->route('address.index')
            ->with('success', 'Address Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'pincode' => 'required',
        ]);
        $userData = Auth::user();

        $address->update([
            'state' =>  $request['state'],
            'city' =>  $request['city'],
            'address' =>  $request['address'],
            'landmark' =>  $request['landmark'],
            'pincode' =>  $request['pincode'],
            'user_id' => $userData->id,
        ]);
        return redirect()->route('address.index')->with('success', 'Address Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('address.index')
            ->with('delete', 'Address Deleted Successfully');
    }
}
