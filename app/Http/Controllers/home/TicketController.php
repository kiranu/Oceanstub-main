<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_list;

class TicketController extends Controller
{
    public function all_tickets(){
    $heading="ALL TICKETS";
    $tickets=Order_list::mytickets();
    return view("home.tickets")->with(compact("heading","tickets"));

    }
    public function upcoming_tickets(){
        $heading="ALL TICKETS";
        $tickets=Order_list::upcoming_ticket();
        return view("home.tickets")->with(compact("heading","tickets"));
    }
    public function ticket_details(Request $request){
        $ticket_id=$request->ticket_id;
        $ticket=Order_list::with('event','events_time','buyer','ticket','events_time.venue')->findOrFail($ticket_id);
        return $ticket;
    }

}
