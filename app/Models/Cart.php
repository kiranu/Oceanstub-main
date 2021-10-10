<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;
use App\Models\TicketPrice;

class Cart extends Model
{
    use HasFactory;
    public static function carttotal_withtax()
    {
        $cartitems = Cart::cartitems();
        $total = 0.0;
        $tax = 0.0;
        $totaltax = 0.0;
        foreach ($cartitems as $ticket) {
            $taxdetails = EventTicket::select('tax')->where('event_id', $ticket->event_id)->first();
            $taxpercent = $taxdetails->tax;
            if (!empty($ticket->ticket_id)) {
                $price = $ticket['ticket_price']->face_price + $ticket['ticket_price']->service_charge;
                $amount = $price * $ticket->quatity;
            } else {
                $amount = $ticket->total;
            }
            $tax = (float)$amount * ($taxpercent / 100);

            $totaltax = $totaltax + $tax;

            $total = $total + (float)$amount;
        }
        return $total + $totaltax;
    }
    public static function carttotal()
    {
        $cartitems = Cart::cartitems();
        $total = 0.0;

        foreach ($cartitems as $ticket) {
            if (!empty($ticket->ticket_id)) {
                $price = $ticket['ticket_price']->face_price + $ticket['ticket_price']->service_charge;
                $amount = $price * $ticket->quatity;
            } else {
                $amount = $ticket->total;
            }
            $total = $total + (float)$amount;
        }
        return $total;
    }
    public static function face_price()
    {
        $cartitems = Cart::cartitems();
        $face_price = 0.0;
        foreach ($cartitems as $ticket) {
            $price = $ticket['ticket_price']->face_price;
            $amount = $price * $ticket->quatity;
            $face_price = $face_price + (float)$amount;
        }
        return $face_price;
    }

    public static function service_charge()
    {
        $cartitems = Cart::cartitems();
        $service_charge = 0.0;
        foreach ($cartitems as $ticket) {
            $price = $ticket['ticket_price']->service_charge;
            $amount = $price * $ticket->quatity;
            $service_charge = $service_charge + (float)$amount;
        }
        return $service_charge;
    }
    public static function tax()
    {
        $cartitems = Cart::cartitems();
        $tax = 0.0;
        $totaltax = 0.0;
        foreach ($cartitems as $ticket) {
            $taxdetails = EventTicket::select('tax')->where('event_id', $ticket->event_id)->first();
            $taxpercent = $taxdetails->tax;

            $price = $ticket['ticket_price']->face_price + $ticket['ticket_price']->service_charge;

            $amount = $price * $ticket->quatity;

            $tax = (float)$amount * ($taxpercent / 100);

            $totaltax = $totaltax + $tax;
        }
        return $totaltax;
    }
    public static function clear_cart()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();
        return true;
    }
    public static function cartcount()
    {
        $cartitems = Cart::cartitems();
        $count = 0;

        foreach ($cartitems as $ticket) {
            $quantity = $ticket->quatity;
            $count = $count + $quantity;
        }
        return $count;
    }
    public static function cartitems()
    {
        $session_id = Session::get('session_id');

        if (Auth::check()) {

            $getlocalcartitems = Cart::select('id')->where('session_id', $session_id)->where('user_id', 0)->get();
            if (isset($getlocalcartitems)) {

                foreach ($getlocalcartitems as $items) {
                    $item = Cart::find($items->id);
                    $item->user_id = Auth::user()->id;
                    $item->update();
                }
            }
            $cartitems = Cart::with(['sc','events', 'events_time', 'ticket_price'])->where('user_id', Auth::user()->id)->get();
        } else {
            $cartitems = Cart::with(['sc','events', 'events_time', 'ticket_price'])->where('session_id', Session::get('session_id'))->where('user_id', 0)->get();
        }
        return $cartitems;
    }

    public static function addtocart($event_id, $ticket_id, $quantity)
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
        }
        $ticket_price = TicketPrice::select('face_price', 'service_charge')->findOrFail($ticket_id);
        $amount = $ticket_price->face_price + $ticket_price->service_charge;

        $user_id = 0;
        if (Auth::check())
         {
            $user_id = Auth::user()->id;
            $ticket = Cart::select('id', 'quatity')->where(['ticket_id' => $ticket_id, 'event_id' => $event_id, 'user_id' => $user_id])->first();
            if (isset($ticket)) {
                $product_count = (int)$ticket->quatity;

                $id = $ticket->id;
                $cart = Cart::findOrFail($id);
                $cart->quatity = $quantity + $product_count;
                $cart->total = $amount * ($quantity + $product_count);

                $cart->update();
                $message = "Ticket has been Updated to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            } else {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->session_id = $session_id;
                $cart->quatity = $quantity;
                $cart->ticket_id = $ticket_id;
                $cart->event_id = $event_id;
                $cart->amount = $amount;
                $cart->total = $amount * $quantity;

                $cart->save();
                $message = "Ticket has been added to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            }
        } else {
            $ticket = Cart::select('id', 'quatity')->where(['ticket_id' => $ticket_id, 'event_id' => $event_id, 'session_id' => $session_id])->first();
            if (isset($ticket)) {
                $product_count = (int)$ticket->quatity;
                $id = $ticket->id;
                $cart = Cart::findOrFail($id);
                $cart->quatity = $quantity + $product_count;
                $cart->total = $amount * ($quantity + $product_count);

                $cart->update();
                $message = "Ticket has been Updated to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            } else {
                $cart = new Cart();
                $cart->session_id = $session_id;
                $cart->user_id = 0;
                $cart->quatity = $quantity;
                $cart->ticket_id = $ticket_id;
                $cart->event_id = $event_id;
                $cart->amount = $amount;
                $cart->total = $amount * $quantity;
                $cart->save();
                $message = "Ticket has been added to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            }
        }
        return $message;
    }

    public function user_details()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function events()
    {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }
    public function events_time()
    {
        return $this->belongsTo('App\Models\EventVenueSchedule', 'event_id', 'event_id');
    }
    public function ticket_price()
    {
        return $this->belongsTo('App\Models\TicketPrice', 'ticket_id');
    }
    public function sc()
    {
     return $this->belongsTo('App\Models\ScTicket','sc_id');
    }

    public static function addtocart_sc($idorclass, $gaselectedseats, $idorclassval, $ticket_id, $event_id, $sc_id, $seatno, $sectionname, $rowname, $price)
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
        }

        $amount = $price;
        $ticket_new = explode(",", $seatno);
        $quantity = count($ticket_new);

        $user_id = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $ticket = Cart::select('id', 'quatity', 'ticket_nos')->where(['ticket_id' => $ticket_id, 'amount' => $price, 'sc_id' => $sc_id, 'section' => $sectionname, 'row' => $rowname, 'event_id' => $event_id, 'user_id' => $user_id])->first();

           

            // $ticket_cart=explode(",", $ticket->ticket_nos);
            // print_r($ticket_cart);
            // print_r($ticket_new);
            // die();


            if (isset($ticket)) {
                $ticket_cart = explode(",", $ticket->ticket_nos);
                if (count($ticket_cart) > count($ticket_new)) {
                    $result = array_diff($ticket_cart, $ticket_new);

                    $final = array_merge($result, $ticket_new);
                } else {
                    $result = array_diff($ticket_new, $ticket_cart);

                    $final = array_merge($result, $ticket_cart);
                }

                $quantity = count($final);
                $id = $ticket->id;
                $cart = Cart::findOrFail($id);
                $cart->quatity = $quantity;

                $cart->total = $amount * $quantity;
                $cart->ticket_nos = implode(',', $final);
                if (isset($idorclass)) {
                    $cart->idorclass = $idorclass;
                }
                if (isset($idorclassval)) {
                    $cart->idorclassval = $idorclassval;
                }
                if (isset($gaselectedseats)) {
                    $cart->gaselectedseats = $gaselectedseats;
                }
                $cart->update();
                $message = "Ticket has been Updated to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            } else {
                $cart = new Cart();
                $cart->user_id = $user_id;
                $cart->session_id = $session_id;
                $cart->quatity = $quantity;
                $cart->sc_id = $sc_id;
                $cart->event_id = $event_id;
                $cart->ticket_id = $ticket_id;

                $cart->amount = $amount;
                $cart->total = $amount * $quantity;
                $cart->section = $sectionname;
                $cart->row = $rowname;
                $cart->ticket_nos = $seatno;

                $cart->idorclass = $idorclass;
                $cart->idorclassval = $idorclassval;
                $cart->gaselectedseats = $gaselectedseats;

                $cart->save();
                $message = "Ticket has been added to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            }
        } else {
            $ticket = Cart::select('id', 'quatity', 'ticket_nos')->where(['ticket_id' => $ticket_id, 'amount' => $price, 'sc_id' => $sc_id, 'section' => $sectionname, 'row' => $rowname, 'event_id' => $event_id, 'user_id' => 0, 'session_id' => $session_id])->first();

            if (isset($ticket)) {
                $ticket_cart = explode(",", $ticket->ticket_nos);
                if (count($ticket_cart) > count($ticket_new)) {
                    $result = array_diff($ticket_cart, $ticket_new);

                    $final = array_merge($result, $ticket_new);
                } else {
                    $result = array_diff($ticket_new, $ticket_cart);

                    $final = array_merge($result, $ticket_cart);
                }

                $quantity = count($final);
                $id = $ticket->id;
                $cart = Cart::findOrFail($id);
                $cart->quatity = $quantity;
                $cart->total = $amount * $quantity;
                $cart->ticket_nos = implode(',', $final);

                if (isset($idorclass)) {
                    $cart->idorclass = $idorclass;
                }
                if (isset($idorclassval)) {
                    $cart->idorclassval = $idorclassval;
                }
                if (isset($gaselectedseats)) {
                    $cart->gaselectedseats = $gaselectedseats;
                }

                $cart->update();
                $message = "Ticket has been Updated to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            } else {
                $cart = new Cart();
                $cart->session_id = $session_id;
                $cart->user_id = 0;
                $cart->session_id = $session_id;
                $cart->quatity = $quantity;
                $cart->sc_id = $sc_id;
                $cart->event_id = $event_id;
                $cart->ticket_id = $ticket_id;

                $cart->amount = $amount;
                $cart->total = $amount * $quantity;
                $cart->section = $sectionname;
                $cart->row = $rowname;
                $cart->ticket_nos = $seatno;

                $cart->idorclass = $idorclass;
                $cart->idorclassval = $idorclassval;
                $cart->gaselectedseats = $gaselectedseats;


                $cart->save();
                $message = "Ticket has been added to cart";
                session::flash('succes_message', $message);
                return [$staus = true, $message];
            }
        }
        return $message;
    }
}
