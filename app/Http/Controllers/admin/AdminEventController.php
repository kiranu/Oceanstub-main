<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function upcomingevents(){ 
        return view('admin.events.upcomingevents');
    }
    protected function upcomingevents_ajax(){
        $data=Event::whereHas('sch_venue', function ($query) {
            $query->where('start_date','>',date("Y-m-d"));
        })->with('sch_venue','seller')->get();

          return datatables()->of($data)
          ->addColumn('start_on', function ($data) {
         return $data['sch_venue']->start_date->format('d-m-Y')." on ".$data['sch_venue']->start_time->format('h:i:sa') ;
              
      })->addColumn('hosted_by', function ($data) {
        return $data['seller']->name ;
             
     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/event-details/'.$data->id).">$data->id</a> ";
 
      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
        }
    
 
    public function ongoingevents(){ 
        return view('admin.events.ongoingevents');
    }
    protected function ongoingevents_ajax(){
        $data=Event::whereHas('sch_venue', function ($query) {
            $query->where('start_date','=',date("Y-m-d"));
        })->with('sch_venue','seller')->get();
          return datatables()->of($data)
          ->addColumn('start_on', function ($data) {
         return $data['sch_venue']->start_date->format('d-m-Y')." on ".$data['sch_venue']->start_time->format('h:i:sa') ;
              
      })->addColumn('hosted_by', function ($data) {
        return $data['seller']->name ;
             
     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/event-details/'.$data->id).">$data->id</a> ";
 
      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      })
        
                  
          ->escapeColumns([])->addIndexColumn()->make(true);
        }
    
    public function completedevents(){ 
        return view('admin.events.completedevents');
    }
    protected function completedevents_ajax(){
        $data=Event::whereHas('sch_venue', function ($query) {
            $query->where('start_date','<',date("Y-m-d"));
        })->with('sch_venue','seller')->get();

 
          return datatables()->of($data)
          ->addColumn('start_on', function ($data) {
         return $data['sch_venue']->start_date->format('d-m-Y')." on ".$data['sch_venue']->start_time->format('h:i:sa') ;
              
      })->addColumn('hosted_by', function ($data) {
        return $data['seller']->name ;
             
     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/event-details/'.$data->id).">$data->id</a> ";
 
      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      })
        
                  
          ->escapeColumns([])->addIndexColumn()->make(true);
        }
    public function eventdetails($id){ 
        $event=Event::with('sch_venue','seller','sch_venue.venue','event_ticket','event_ticket.ticket_price','event_files')->FindOrfail($id);
        //  print($event);die;

        return view('admin.events.eventdetails')->with(compact('event'));
    }



}
