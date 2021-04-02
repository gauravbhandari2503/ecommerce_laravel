<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $amount = $request->amount;
        $user = User::where('id',Auth::user()->id)->first();
        return view('customer.stripe',compact('user'))->with('amount',$amount);
    }

}