<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Auth;
use Notification;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Buyer;
use App\Models\BuyerPayment;
use App\Models\TicketPrice;

class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

       


    }

    public function payWithpaypal()
    {


        $cart_amount=Cart::carttotal_withtax();
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $id=Auth::guard('web')->user()->id;
        $item_1->setName('OceanStub'.$id) /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($cart_amount); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($cart_amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {



            $payment->create($this->_api_context);
            

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                Session::flash('error', 'Connection timeout');
                // return Redirect::to('/');
                $request->session()->flash('danger_message', 'Connection timeout');
                return redirect()->route('cart');

            } else {

                \Session::flash('error', 'Some error occur, sorry for inconvenient');
                $request->session()->flash('danger_message', 'Some error occur, sorry for inconvenient');
                return redirect()->route('cart');
                // return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Session::flash('error', 'Unknown error occurred');

        // return Redirect::to('/');
        $request->session()->flash('danger_message', 'Unknown error occurred');
        return redirect()->route('cart');

    }

    public function getPaymentStatus()
    {
        $order_id = Session::get('order_id');
        $request=request();//try get from method
        // dd($request->paymentId);
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        //if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
        if (empty($request->PayerID) || empty($request->token)) {

            Session::flash('danger_message', 'Payment failed');
            Order::order_delete($order_id);
            Session::forget('order_id');

            return Redirect::to('cart');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        //$execution->setPayerId(Input::get('PayerID'));
        $execution->setPayerId($request->PayerID);

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            Session::put('success', 'Payment success');
            //add update record for cart
	        // Notification

            // return redirect()->route('orders');

            //ticket update
            $cartitems=Cart::cartitems();
            foreach($cartitems as $ticket){
                //ticket avilability check
                $ticket_id=$ticket->ticket_id;
                $sold=$ticket['ticket_price']->sold;
                $quantity=$ticket->quatity;
                $sold=$sold+$quantity;

                $ticket=TicketPrice::findOrfail($ticket_id);
                $ticket->sold=$sold;
                $ticket->update();
            }
        $order=Order::findOrfail($order_id);
        $order->status=1;
        $order->payment_id=$payment_id;
        $order->PayerID=$request->PayerID;
        $order->token=$request->token;
        $order->update();

        $amount=$order->amount;

        //payment details
        $user_id=Auth::user()->id;
        $buyer=Buyer::select('id')->where('user_id',$user_id)->first();
        $buyer_id=$buyer->id;

        $payment=new BuyerPayment;
        $payment->order_id=$order_id;
        $payment->PayerID=$request->PayerID;
        $payment->payment_id=$request->payment_id;
        $payment->token=$request->token;
        $payment->purpose="Ticket Purchase";
        $payment->buyer_id=$buyer_id;
        $payment->user_id=$user_id;
        $payment->amount=$amount;
        $payment->status=1;
        $payment->payment_method="Paypal";
        $payment->save();

        Session::forget('cartitems');
        Session::forget('order_idd');

        return redirect()->route('payment-success');

        }

        Session::flash('danger_message', 'Payment failed');
        // return Redirect::to('/');
        Order::order_delete($order_id);
        Session::forget('order_id');

        $request->session()->flash('danger_message', ' Payment Failed');
        return redirect()->route('cart');

        // return Redirect::to('cart');


    }
    // public function payment_success(){
    //     $order_id = Session::get('order_id');
    //     Session::put('order_idd', $order_id);
    //     Session::forget('order_id');

    //     $cartitems['sc']=Cart::cartitems();

    //     Session::put('cartitems', $cartitems);
    //     Cart::clear_cart();
    //     $order_idd = Session::get('order_idd');
    //     $cartitem = Session::get('cartitems');
    //     dd($cartitem);

    //     $order=Order::findOrfail($order_idd);

    //     return view('home.payment_success')->with(compact('order','cartitem'));
    // }
}
