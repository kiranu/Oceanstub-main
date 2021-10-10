<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_list;
use App\Models\Cart;
use App\Models\User;
use Auth;
use DateTime;
use Session;
class OrderController extends Controller
{
    public function create_order(Request $request){



       
        $id=Auth::guard('web')->user()->id;
        $user=User::with('buyer')->findOrfail($id);
        $buyer_id=$user['buyer']->id;

        $cart_amount=Cart::carttotal_withtax();
        $cartitems=Cart::cartitems();


        
        foreach($cartitems as $ticket){
            //ticket avilability check
            if(isset($ticket->sc_id)){
                $avilable_ticket=1000;
            }else{
                $avilable_ticket=$ticket['ticket_price']->capacity-$ticket['ticket_price']->sold+$ticket['ticket_price']->ticket_return;
            }
            $start_date = $ticket['ticket_price']->start_sale_date;
            $time1 = $ticket['ticket_price']->start_sale_time;
            $merge = new DateTime($start_date .' ' .$time1);
            $start= $merge->format('Y-m-d H:i:s');

            $end_date = $ticket['ticket_price']->end_sale_date;
            $time2 = $ticket['ticket_price']->end_sale_time;
            $merge = new DateTime($end_date .' ' .$time2);
            $end= $merge->format('Y-m-d H:i:s');
            $now=date('Y-m-d H:i:s');
                //return back with ticket not avilable
            if( ($now < $start) && ($now > $end) ){
                $request->session()->flash('danger_message', 'Ticket is Expired ');
             return redirect()->route('cart');

            }elseif($ticket->quatity > $avilable_ticket){
                $request->session()->flash('danger_message', 'Ticket is not Avilable');
                return redirect()->route('cart');
            }

        }
        $order = new Order;
        $order->buyer_id=$buyer_id;
        $order->user_id=$id;
        $order->amount=$cart_amount;
        $order->offer_amount=0;
        $order->promo_code=$request->promotion_code;
        $order->address_id=null;
        $order->payment_method=$request->payment_method;
        $order->delivery_method= $request->delivery_method;
        $order->first_name=$request->first_name;
        $order->last_name=$request->last_name;
        $order->billing_country=$request->billing_country;
        $order->billing_address=$request->billing_address;
        $order->address_2=$request->address2;
        $order->city= $request->city;
        $order->state= $request->state;
        $order->zip=$request->zip;
        $order->phone=$request->phone;
        $order->status=2;
        $order->notes=null;
        $order->save();
        $order_id=$order->id;

        Session::put('order_id', $order_id);

        foreach($cartitems as $ticket){
            $oderlists=new Order_list;
            $oderlists->session_id=$ticket->session_id;
            $oderlists->user_id=$id;
            $oderlists->buyer_id=$buyer_id;
            $oderlists->event_id=$ticket->event_id;
            $oderlists->order_id=$order_id;
            $oderlists->ticket_id=$ticket->ticket_id;
            $oderlists->sc_id=$ticket->sc_id;
            $oderlists->amount= $ticket['ticket_price']->face_price+$ticket['ticket_price']->service_charge;
            $oderlists->quatity=$ticket->quatity;
            $oderlists->ticket_nos=$ticket->ticket_nos;
            $oderlists->total=($ticket['ticket_price']->face_price+$ticket['ticket_price']->service_charge)*$ticket->quatity;
            $oderlists->save();
        }

            return redirect()->route('paypal');
            // return redirect()->route('payment-success');

    }
    public function order_details(Request $request){
        $order_id=$request->order_id;
        $order=Order::with('order_list','order_list.event','order_list.ticket')->findOrfail($order_id);
        return $order;
    }
    public function orders(){
        $orderitems=Order::where('user_id',Auth::user()->id)->get();
        return view('home.orders')->with(compact('orderitems'));

    }
    public function payment_success(){
        $order_id = Session::get('order_id');
        // Session::put('order_idd', $order_id);
        Session::forget('order_id');

        $cartitem=Cart::cartitems();

        // Session::put('cartitems', $cartitems);
        Cart::clear_cart();
        // $order_idd = Session::get('order_idd');
        // $cartitem = Session::get('cartitems');
        // dd($cartitem);

        $order=Order::findOrfail($order_id);

        return view('home.payment_success')->with(compact('order','cartitem'));
    }
}
