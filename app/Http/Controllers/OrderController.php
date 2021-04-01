<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderInitialized;
use App\Notifications\OrderCreated;
use App\Notifications\OrderPlaced;
use App\Notifications\OrderShipped;
use App\Notifications\OrderCompleted;
use App\Notifications\OrderCancelled;

class OrderController extends Controller
{
    public function index(){
        
        $orders = Cart::where('customer_id',Auth::user()->id)->with(['product'])->latest()->paginate(10);
        return view('orders.index', compact('orders'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    public function store(Request $request){

        $carts = Cart::where('customer_id',Auth::user()->id)->with(['product'])->get();
        foreach($carts as $cart){
            $order = Order::create([
                'customer_id' => $cart->customer_id,
                'product_id'  => $cart->product_id,
                'payment_id'  => sha1(time()),
                'quantity'    => $cart->quantity,
                'price_per_piece' => $cart->product->mrp,
                'amount'    => $cart->quantity *  ( $cart->product->mrp - $cart->product->discount / 100 * $cart->product->mrp ),
                'address_id' => $request['address_id'],
            ]);
            $cart->delete();
            $order->statuses()->attach(1);
            $product = Product::where('id',$cart->product_id)->first();
            $product->update([
                'stock' => $product->stock - $cart->quantity,
            ]);
            $seller = User::where('id',$product->user_id)->first();
            $seller->notify(new OrderCreated());
        }
        $user = User::where('id',Auth::user()->id)->first();
        $user->notify(new OrderInitialized());
        return view('customer.orderplaced');
    }

    public function orders(){
        $orders = Order::whereHas('product',function($query){
            $query->where('user_id',Auth::user()->id);
        })->with(['customer'])->with(['statuses'])->get();
        return view('orders.manage', compact('orders'));
    }

    public function userOrder($orderId){
        $order = Order::where('id',$orderId)->with('product')->with('statuses')->first();
        return view('customer.view-order',compact('order'));
    }
    
    public function userOrders(){
        $orders = Order::where('customer_id',Auth::user()->id)->with('product')->with('statuses')->latest()->get();
        return view('customer.orders',compact('orders'));
    }

    public function orderStatus(Request $request , $orderId){

        $order = Order::where('id',$orderId)->first();
        $user = User::where('id',$order->customer_id)->first();
        switch ($request['status']) {
            case 2:
                $order->statuses()->update(['status_id' => 2]);
                $user->notify(new OrderPlaced());
                return redirect()->route('orders.manage')
                    ->with('success', 'Order Status changed to Placed.');
                break;
            case 3:
                $order->statuses()->update(['status_id' => 3]);
                $user->notify(new OrderShipped());
                $current_date_time = \Carbon\Carbon::now()->toDateTimeString();
                $order->update([
                    'shipped_date' => $current_date_time,
                ]);
                return redirect()->route('orders.manage')
                    ->with('success', 'Order Status changed to Shipped.');
                break;
            case 4:
                $order->statuses()->update(['status_id' => 4]);
                $user->notify(new OrderCompleted());
                return redirect()->route('orders.manage')
                    ->with('success', 'Order Status changed to Completed.');
                break;
            case 5:
                $order->statuses()->update(['status_id' => 5]);
                $user->notify(new OrderCancelled());
                return redirect()->route('orders.manage')
                    ->with('success', 'Order Status changed to Cancelled.');
                break;
            default:
                return redirect()->route('orders.manage')
                ->with('error', 'Order Status not selected');
        break;
        }
    }

    public function orderCancelRequest($orderId){
        $order = Order::where('id',$orderId)->with('product')->with('statuses')->first();
        foreach($order->statuses as $currentStatus){
            $currentStatus->status; 
        }

        if($currentStatus->id === 3){
            return redirect()->back()->with('error', 'An order cannot be cancelled once it has been Shipped.');
        }
        else{
            //mail to user
            Auth::user()->notify(new OrderCancelled);
            //mail to seller
            $product = Product::where('id',$order->product->id)->first();
            $product->update([
                'stock' => $product->stock + $order->quantity,
            ]);
            $seller = User::where('id',$product->user_id)->first();
            $seller->notify(new OrderCancelled());
            $order->statuses()->update(['status_id' => 5]);
            return redirect()->back()->with('success', 'Order Cancellation request has now generated. Further process will be notified via mail. Thanks & Regards : RubiCart ');
        }
    }
}
