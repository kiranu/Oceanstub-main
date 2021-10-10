<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\ScTicket;

class CartController extends Controller
{


    public function get_checkout()
    {
     return view('home.checkout');

    }
    public function cart(){
        $cartitems=Cart::cartitems();
        
        return view('home.cart')->with(compact('cartitems'));
    }
    public function addtocart(Request $request){
        // dd($request->all());
        $event_id=$request->event_id;
        $quantity=$request->quantity;
        $ticket_id=$request->ticket_id;

        $i=1;
        $response=null;
        if(!empty($request->ticket_id)){
        foreach($request->ticket_id as $ticket){
            if($request->quantity[$i] >0){
                  $response[$i]=Cart::addtocart($event_id,$ticket_id[$i],$quantity[$i]);
            }
            $i++;
        }
    }
        return redirect()->route('cart');
        // dd($response);
    }
    public function addtocart_sc(Request $request){
        //  dd($request->all());
        $event_id=$request->event_id;
        $seatno=$request->seatno;
        $sc_id=$request->sc_id;
        $sectionname=$request->sectionname;
        $rowname=$request->rowname;
        $price=$request->price;
        $ticket_id=$request->ticketid;

        //for seating chart
        $idorclass=$request->idorclass;
        $idorclassval=$request->idorclassval;
        $gaselectedseats=$request->gaselectedseats;


         $response=Cart::addtocart_sc($idorclass,$gaselectedseats,$idorclassval,$ticket_id,$event_id,$sc_id,$seatno,$sectionname,$rowname,$price);
         return $response;


    }
    public function delete_cart($id){
        $cart =Cart::find($id);
        $cart->delete();
        return redirect()->route('cart');


    }
    public function update_sc(Request $request){
        $id=$request->sc_id;
        
        $sc=ScTicket::find($id);
        $sc->sc_assigned_data=$request->sc_data;
        $sc->update();
        return true;
    }

}
