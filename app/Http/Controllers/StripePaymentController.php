<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey("sk_test_51IbePbSIGJMbCciEUW9tSj4lek9vPlzaWNPzl2hvm0pW4oaRs8mxiS0NEwmj6LDohkPOdYZy8vKAqXETXQ5BG7DZ00NahKPTJg");
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "INR",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}