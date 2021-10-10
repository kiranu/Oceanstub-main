<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use View;
class CategoryController extends Controller
{
    public function sub_category($id){
        $search=null;
        $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')->Paginate(12);
        return view('home.category-events')->with(compact('events','search','id'));
    }
    public function category_event_search(Request $request){
        $id = $request->id;
        $search=$request->search;
        $filter=$request->filter;

         switch($request->filter){
            case 'date':
                $events=Event::with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->Where('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")
                ->with(['sch_venue' => function ($q) {$q->orderBy('start_date','desc');}])
                ->whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->paginate(12);
                break;
            case 'event_asc':
                $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->orWhere('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")->orderBy('first_title')->paginate(12);

                break;
            case 'event_desc':
                $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->orWhere('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")->orderByDesc('first_title')->paginate(12);

                break;

            case 'venu_asc':
                $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->orWhere('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")->with(['sch_venue.venue' => function ($q) {
                    $q->orderBy('name','asc');}])->paginate(12);

                break;

            case 'venu_desc':
                $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->orWhere('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")->with(['sch_venue.venue' => function ($q) {
                    $q->orderByDesc('name');}])->paginate(12);
                break;
            default:
            $events=Event::whereHas('event_details', function ($query) use($id) {$query->whereRaw("FIND_IN_SET(?,sub_categories)",$id);})
            ->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                ->orWhere('first_title','like',"%". "$search"."%")
                ->orWhere('second_title','like',"%". "$search"."%")->orderBy('id')->paginate(12);
                break;
        }
        if ($request->ajax()) {

        return response()->json(['view'=>(String)View::make('home.search_result')->with(['events'=>$events,'paginator' => $events])]);
        }else{

                return redirect()->back();
        }
    }
}
