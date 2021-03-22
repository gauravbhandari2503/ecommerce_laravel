<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function paymentInfo(Request $request){
        if (!Auth::check()) {
            return view('login');
        } 
        $amount = $request->id;
        return view('customer.payment')->with('amount',$amount);
    }
}
