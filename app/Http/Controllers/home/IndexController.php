<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventVenueSchedule;
use App\Models\Category;
use App\Models\SellerPlan;
use App\Models\SellerPlanDetails;
use App\Models\Features;
use App\Events\ContactUsEvent;


use View;
class IndexController extends Controller
{
    public function index(Request $request){
        $todayevents=EventVenueSchedule::where('start_date','=',date("Y-m-d"))->with('event','venue')->paginate(4);
        $categorys = Category::select('id','category_name','category_image')->where(['status'=> 1,'parent_id'=>0])->Paginate(6);
        $upcomingevents=Event::whereHas('sch_venue', function ($query) 
            {
                $query->where('publish',1);
                $query->where('start_date','>',date("Y-m-d"));

            })->with('sch_venue','seller','event_files')->get();

        return view('home.index')->with(compact('categorys','todayevents','upcomingevents'));
    }

    public function category_list(Request $request){
        if ($request->ajax()) {
            $categorys = Category::Paginate(6);
            return view('home.index_sub.category', compact('categorys'))->render();
        }
    }
    public function find_ticket($id) {
        $event=Event::with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price','sc')->FindOrfail($id);

        return view('home.find_ticket')->with(compact('event'));
    }
    public function category($id){
        $subcategorys = Category::select('id','category_name','category_image')->where(['status'=> 1,'parent_id'=>$id])->Paginate(6);
        $category_name=Category::select('category_name')->FindOrfail($id);
        $tittle=$category_name->category_name;
        return view('home.categories')->with(compact('subcategorys','tittle'));
    }
    public function buy_tickets(){
        $search=null;
        $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')->Paginate(12);
       
        return view('home.ticket-search')->with(compact('events','search'));
    }
    public function contact(){
        return view('home.contact');
    }
    public function features(){
        $features=Features::where('status',1)->get();
        return view('home.features')->with(compact('features'));
    }
    public function pricing(){
        $plans=SellerPlan::get();
        $details=SellerPlanDetails::where('status',1)->get();
        return view('home.pricing')->with(compact('plans','details'));
    }
    public function contact_form_submit(Request $request){
        $contact=$request->all();
        event(new ContactUsEvent($contact));
        $request->session()->flash('success', "Mail send Successfully");
        return redirect()->back();
    }

    public function event_date_search(Request $request){
        $date =$request->date;
        $events=Event::whereHas('sch_venue', function ($query) use($date) {$query->whereDate('start_date',$date);})->with('sch_venue','seller','event_files')->get();
        return response()->json(['view'=>(String)View::make('home.index_sub.upcomming-events')->with(['upcomingevents'=>$events])]);

    }


}
