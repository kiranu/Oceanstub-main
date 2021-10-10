<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventTicket;
use App\Models\Event;

class AdminTicketController extends Controller
{
    public function alltickets(){
        return view('admin.ticket.alltickets');

    }
    public function alltickets_ajax(){
        $data=EventTicket::with('ticket_price','event')->get();
          return datatables()->of($data)
          ->addColumn('event_name', function ($data) {
            return " <a href=".url('admin/event-details/'.$data->event_id)."> ".$data['event']->first_title." ".$data['event']->second_title." </a> ";

                  
          })->editColumn('id', function ($data) {
        return " <a href=".url('admin/ticket-details/'.$data->event_id)."> view </a> ";
      })->editColumn('cap_capacity', function ($data) {
          if($data->cap_capacity != null){
                return $data->cap_capacity;
            }else{
                return "Not Defined";
            }
      })->escapeColumns([])->addIndexColumn()->make(true);
    }
    public function ticketdetails($id){
        $event=Event::with('sch_venue','seller','sch_venue.venue','event_ticket','event_ticket.ticket_price')->FindOrfail($id);

        return view('admin.ticket.ticketdetails')->with(compact('event'));

    }
}
