<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\QueryBuilder\QueryBuilder;

use View;
class SearchController extends Controller
{
    public function home_search(Request $request){
        $search=$request->search;
        // dd($search);
        $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
        ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")
                    ->paginate(12);
                    // dd($events);
        return view('home.ticket-search')->with(compact('events','search'));
    }
    public function event_search(Request $request){



            $search=$request->search;
            $filter=$request->filter;

             switch($request->filter){
                case 'date':
                    $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->with(['sch_venue' => function ($q) {
                        $q->orderBy('start_date','desc');}])->paginate(12);
                    break;
                case 'event_asc':
                    $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->orderBy('first_title')->paginate(12);

                    break;
                case 'event_desc':
                    $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->orderByDesc('first_title')->paginate(12);

                    break;

                case 'venu_asc':
                    $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->with(['sch_venue.venue' => function ($q) {
                        $q->orderBy('name','asc');}])->paginate(12);

                    break;

                case 'venu_desc':
                    $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->with(['sch_venue.venue' => function ($q) {
                        $q->orderByDesc('name');}])->paginate(12);
                    break;
                default:
                $events=Event::where('publish',1)->with('sch_venue','sch_venue.venue','seller','event_files','event_details','event_ticket.ticket_price')
                    ->orWhere('first_title','like',"%". "$search"."%")
                    ->orWhere('second_title','like',"%". "$search"."%")->orderBy('id')->paginate(12);
                    break;
            }
            if ($request->ajax()) {
            // return view('home.search_result', compact('events'))->render();

            return response()->json(['view'=>(String)View::make('home.search_result')->with(['events'=>$events,'paginator' => $events])]);
            }else{
            // print_r($events);die();

        return view('home.ticket-search',['paginator' => $events])->with(compact('events','search'));

            }
    }
    public function link_search(){
          $events = QueryBuilder::for(Event::class)
            ->allowedFilters(['first_title','second_title'])
            ->get();

            // $events = QueryBuilder::for(Model::class)
            // ->allowedSearches(['first_title', 'second_title'])->get();
            return response()->json(['view'=>(String)View::make('home.search_result')->with(compact('events'))]);

    }
}
