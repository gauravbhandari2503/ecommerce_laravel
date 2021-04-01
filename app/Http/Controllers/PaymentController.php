<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaymentController extends Controller
{

    public function paymentInfo(Request $request){
       
        $amount = $request->id;
        $user = User::where('id',Auth::user()->id)->first();
        return view('customer.payment',compact('user'))->with('amount',$amount);
    }
}
