<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketPrice;
use App\Models\EventTicket;
use App\Models\Event;
use App\Models\EventVenueSchedule;
use App\Models\Venue;
use App\Models\EventPolicy;
use App\Models\Seller;
use App\Models\SeatingChart;
use App\Models\ScAssigned;
use App\Models\ScTicket;
use App\Models\ScBuyTicket;


use Carbon\Carbon;
use Auth;
use Hash;
use Redirect;
use Session;
use Validator;

class TicketController extends Controller
{

  
  public function post_ticket(Request $request)
  {
      
      if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

  	$event_data = Event::where('seller_id',$seller_id)->latest('id')->first();

    $EventTicket = EventTicket::where('event_id',$event_data->id)->latest('id')->first();


EventTicket::where('id',$EventTicket->id)
        ->update(['tax' => $request->tax,
                   'cap_capacity' => $request->cap_capacity,
                   'note' => $request->note,
                   'color' => $request->color,
                   'hide_buyer' =>$request->hide_buyer ,
                 ]);


		return response()->json(['success' => true,]);
        
  }



   // public function get_price_level()
   // {
   // 	return view('seller.new_price_level');
   // }


   public function post_price_level(Request $request)
   {
   	
     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

   	$event_data = Event::where('seller_id',$seller_id)->latest('id')->first();


    $last_insert_id = $event_data->id;
    $ticket_data = EventTicket::where('event_id',$last_insert_id)->latest('id')->first();
    $last_ticket_id = $ticket_data->id;

    $validator = Validator::make($request->all(),['name'=>'required',

                                                  'face_price'=>'required',
                                                  
                                                  'buy_price' =>'required',
                                                  'min_trans'=> 'required',
                                                  'max_trans'=> 'required|gt:min_trans', 
                                                  'increment'=>'required|lt:max_trans',  
                                        // 'saleStartDate' => 'before_or_equal:saleEndDate',
                                        // 'saleEndDate' => 'after_or_equal:saleStartDate',
                                        /*'start_sale' =>'required',
                                        'end_sale'=>'required',*/

                                                  ]);
         if(!$validator->passes())
         {
         return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
         }
         else
         {
    $ticket = new TicketPrice();

    $ticket->event_ticket_id = $last_ticket_id;
       if($request->parent_id)
       {
         $ticket->parent_id = $request->parent_id;

       }

    $ticket->name = $request->name;

    if($request->parent_id)
    {
     $parent_color =TicketPrice::where('id',$request->parent_id)->first()->color; 
     $ticket->color = $parent_color;
    }else{
      $ticket->color = $request->color;

    }

    if($request->parent_id){
    $ticket->parent_id = $request->parent_id;
    }
    if($request->description){
      $ticket->description = $request->description;
    }
    $ticket->face_price = $request->face_price;
    if($request->service_charge){
    $ticket->service_charge = $request->service_charge;
    }
    
    $ticket->capacity = $request->capacity;
    if($request->sort_order){
      $ticket->sort_order = $request->sort_order;
    }
    

      if($request->price_password)
             {
             $pswd = implode(',',$request->price_password);
             
             $ticket->price_password =$pswd;
             }


   
      $ticket->buy_price = $request->buy_price;
           
   
   /* $ticket->prefix_bp = $request->prefix_bp;*/

    

    if($request->start_sale == "1")
    {
      $ticket->start_sale_date = $request->saleStartDate;
      $ticket->start_sale_time = $request->saleStartTime;
      
    }
    else{


        $ticket->start_sale_date =$event_data->event_sales->start_date;
      $ticket->start_sale_time = $event_data->event_sales->start_time;

    }
   
    if($request->end_sale == "1")
    {
        $ticket->end_sale_date = $request->saleEndDate;
        $ticket->end_sale_time = $request->saleEndTime;
    }else{
      $ticket->end_sale_date = $event_data->event_sales->end_date;
        $ticket->end_sale_time =  $event_data->event_sales->end_time;
    }

    $ticket->min_trans = $request->min_trans;
    $ticket->max_trans = $request->max_trans;
    $ticket->available_inc = $request->increment;
      
         $ticket->save();

        return response()->json(['status'=>1,'msg'=>'New price level  Created Successfully']);
         }

           
   }

  public function get_edit_price_level(Request $request)
   {
     $id = $request->id;

         $price= TicketPrice::where('id', $id)->first();
       
        try {
          return response()->json(['success' => true, 'data' => $price]);

        } catch (\Exception $e) {

            
            return response()->json(['error' => $e,]);
        }
       
    
        
   }
   public function post_edit_price_level(Request $request)
   {
  
     $id= $request->id;
      $validator = Validator::make($request->all(),['name'=>'required',
                                                  'face_price'=>'required',
                                                  
                                                  'buy_price' =>'required',
                                                  'min_trans'=> 'required',
                                                  'max_trans'=> 'required|gt:min_trans', 
                                                  'increment'=>'required|lt:max_trans',  
                                        // 'saleStartDate' => 'before_or_equal:saleEndDate',
                                        // 'saleEndDate' => 'after_or_equal:saleStartDate',
                                        

                                                  ]);
         if(!$validator->passes())
         {
         return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
         }
         else
         {
         
      TicketPrice::where('id',$id)->update([
                                        'event_ticket_id' => $request->ticket_id,
                                        'name'=>$request->name ,
                                        'description'=>$request->description ,
                                        'face_price'=>$request->face_price ,
                                        'service_charge'=> $request->service_charge ,
                                        'color'=> $request->color,
                                        'capacity'=>$request->capacity ,
                                        'sort_order'=>$request->sort_order ,
                                        'buy_price'=> $request->buy_price,
                                        'start_sale_date'=>$request->saleStartDate ,
                                        'start_sale_time'=> $request->saleStartTime,
                                        'end_sale_date'=>$request->saleEndDate ,
                                        'end_sale_time'=>$request->saleEndTime ,
                                        'min_trans'=> $request->min_trans,
                                        'max_trans'=> $request->max_trans,
                                        'available_inc'=>$request->increment,
                                      ]);
                  TicketPrice::where('parent_id',$id)->update(['color'=> $request->color,]);

      return response()->json(['status'=>1,'msg'=>' price level  updated Successfully']);
         }

        //   try { return response()->json(['success' => true,]);}
        // catch (\Exception $e){return response()->json(['error' => $e,]);}
                                      
   }
   public function delete_price_level(Request $request)
   {
     $id = $request->id;
       
        try {

            TicketPrice::find($id)->delete();
            TicketPrice::where('parent_id',$id)->delete();
            return response()->json(['success' => true,]);

            } catch (\Exception $e){return response()->json(['error' => $e,]);}
   }


   public function get_salesPage()
   {
     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

    $event_data = Event::where('seller_id',$seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;
    $event = Event::where('id',$last_insert_id)->first();
    $venue_sch=EventVenueSchedule::where('event_id',$last_insert_id)->first();
/*
    $end_date = Carbon::parse($venue_sch->start_date)->addDays($venue_sch->days);


    $minutes = (($venue_sch->hours)*60)+$venue_sch->mins;
    $end_time = Carbon::parse($venue_sch->start_time)->addMinutes($minutes);*/
    $venue =Venue::where('id',$venue_sch->venue_list)->first();
    $ticket = EventTicket::where('event_id',$last_insert_id)->first();
    $ticket_evnt_id = $ticket->event_id;
    $policy=EventPolicy::where('event_id',$ticket_evnt_id)->first();

    if($venue->seat_chart != null)
    {
        $ScAss =ScTicket::where('event_id',$event_data->id)->where('sc_id',$venue->seat_chart)->first();

    }else{
      $ScAss=null;
    }

    $var_ticket_prices= null;
$ticket_prices= null;

   if($event_data->event_ticket)
        {
        $tp=$event_data->event_ticket->ticket_price;
        
        foreach($tp as $prices)
        {
            if($prices->parent_id == null)
            {
            $ticket_prices[]=$prices;
             }
            else{
                $var_ticket_prices[]=$prices;
                }
        }
        } 
 
    return view('seller.manage_event.ticket_sales_page',compact('event',
                                                                'venue_sch',
                                                                 'venue',
                                                                'policy',
                                                                'ScAss',
                                                                'var_ticket_prices',
                                                                'ticket_prices'));
   }
   /*===================edit ticket========================*/
   public function post_editTicket(Request $request)
   {

    // dd();die;
         $validator = Validator::make($request->all(),[
           'tax'=> 'required',
                                                       ]);
  if(!$validator->passes())
  {
  return response()->json(['status' =>0, 'error'=> $validator->errors()->toArray()]);
       }
       else
       {
$id=$request->id;
EventTicket::where('event_id',$id)
                          ->update(['tax'=> $request->tax,
                                    'cap'=> $request->cap,
                                    'cap_capacity' => $request->cap_capacity,
                                    'note' => $request->note,
                                    'color' => $request->color,
                                    'hide_buyer' => $request->hide_buyer,
                                     ]);
  return response()->json(['status' => 1,'msg'=>'Updated successfull..!']);
       }
   }


   /*-===========Seating chart====================*/
   public function get_SCadd_ticket()
   {


     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

  $event_data = Event::where('seller_id',$seller_id)->latest('id')->first();
  $venue =Venue::where('id',$event_data->sch_venue->venue_list)->first();
  $sc = SeatingChart::where('id',$venue->seat_chart)->first();

  $assigned=ScTicket::where('event_id',$event_data->id)->where('sc_id',$sc->id)->first();


$var_ticket_prices= null;
$ticket_prices= null;

   if($event_data->event_ticket)
        {
        $tp=$event_data->event_ticket->ticket_price;
        
        foreach($tp as $prices)
        {
            if($prices->parent_id == null)
            {
            $ticket_prices[]=$prices;
             }
            else{
                $var_ticket_prices[]=$prices;
                }
        }
        } 





   return view('seller.manage_event.ticket_editor',compact('sc','venue','ticket_prices','var_ticket_prices','event_data','assigned'));

   }


   public function postAdd_assigned_seat(Request $request)
   {

 /*dd($request->all());*/

 if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

  $event_data = Event::where('seller_id',$seller_id)->latest('id')->first();

$venue =Venue::where('id',$event_data->sch_venue->venue_list)->first();
  $sc_id = SeatingChart::where('id',$venue->seat_chart)->first()->id;

$assigned = new ScAssigned();
 $assigned->event_id =$event_data->id;
 $assigned->sc_id =$sc_id;
 $assigned->section=$request->sectiontype;
 $assigned->section_name=$request->sectionname;
 /*if($request->)
 {
  $assigned->rows=;
 }
  if($request->)
 {
  $assigned->seats=$request->;
 }
  if($request->)
 {
  $assigned->blocked="6";
 }
  if($request->)
 {
  $assigned->wheel_chair=;
 } */
 $assigned->pricelevel_id=$request->pricelevel;
 $assigned->capacity=$request->maxcapacity;


 try {
            $assigned->save();

          }
        catch (exception $e) 
        {
             report($e);
             return false;
        }

          return response()->json(['success' => true, 'id'=>$assigned->id ]);
 
   }
    public function postEdit_assigned_seat(Request $request)
   {

 /*dd($request->all());*/
$id = $request->ass_id;
 ScAssigned::where('id',$id)->update([
                                        'section' => $request->sectiontype,
                                        'section_name' => $request->sectionname,
                                        'pricelevel_id' => $request->pricelevel,
                                        'capacity' => $request->maxcapacity,
                                        ]);



return response()->json(['success' => true,]);




   }
    public function delete_assigned_seat(Request $request)
   {
    ScAssigned::find($request->id)->delete();
     return response()->json(['success' => true,]);
   }



   public function postSC_ticket(Request $request)
   {

     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

  $event_data = Event::where('seller_id',$seller_id)->latest('id')->first();

$venue =Venue::where('id',$event_data->sch_venue->venue_list)->first();
  $sc_id = SeatingChart::where('id',$venue->seat_chart)->first()->id;

    $as_sc = new ScTicket();
    $as_sc->event_id =$event_data->id;
    $as_sc->sc_id =$sc_id;
    $as_sc->sc_assigned_data = $request->ScAssignedData;



 try {
            $as_sc->save();
             return response()->json(['status' => true,'id'=>$as_sc->id, 'sc_data' => $as_sc->sc_assigned_data]);

          }
        catch (exception $e) 
        {
             report($e);
             return false;
        }


    
   
   }
   public function updateSC_ticket(Request $request)
   {
   


$id = $request->respons_id;
 ScTicket::where('id',$id)->update(['sc_assigned_data'=>$request->ScAssignedData,]);
 return response()->json(['status' => true,]);

   }
   
public function PostBuyTicket(Request $request)
{
if(Auth::check())
   {$uid = Auth::id(); 
    $seller_id = Seller::where('user_id',$uid)->first()->id;
   }else{return redirect()->route('seller.login');}
$event_data=Event::where('seller_id',$seller_id)->latest('id')->first();
$venue =Venue::where('id',$event_data->sch_venue->venue_list)->first();
$sc_id = SeatingChart::where('id',$venue->seat_chart)->first()->id;


$buy = new ScBuyTicket;
$buy->event_id=$event_data->id;
$buy->sc_id=$sc_id;
$buy->section =$request->sectionname;
$buy->price=$request->price;
if($request->rowname){
$buy->row=$request->rowname;
}
if($request->gaselectedseats){
  $buy->no_of_seats = $request->gaselectedseats;
}else{
  $count=count(explode(',',$request->seatno));
$buy->no_of_seats =$count; 
}
if($request->seatno && $request->gaselectedseats == null){
$buy->seats=$request->seatno;
}



 try {
            $buy->save();
             return response()->json(['status' => true,]);

          }
        catch (exception $e) 
        {
             report($e);
             return false;
        }

}
public function previw_checkout()
{
  if(Auth::check())
   {$uid = Auth::id(); 
    $seller_id = Seller::where('user_id',$uid)->first()->id;
   }else{return redirect()->route('seller.login');}
$event_data=Event::where('seller_id',$seller_id)->latest('id')->first();
$venue =Venue::where('id',$event_data->sch_venue->venue_list)->first();
$sc_id = SeatingChart::where('id',$venue->seat_chart)->first()->id;

$tickets =ScBuyTicket::where('event_id',$event_data->id)->where('sc_id',$sc_id)->get();



return view('seller.manage_event.checkout',compact('tickets','event_data'));
}

public function DeleteBuyTicket(Request $request)
{
 try {ScBuyTicket::find($request->id)->delete();
       return response()->json(['status' => true,]);}
 catch (exception $e){
             report($e);
            return false;}
}

}
