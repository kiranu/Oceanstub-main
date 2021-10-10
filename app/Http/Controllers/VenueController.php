<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\User;
use App\Models\Seller;
use App\Models\SeatingChart;
use Auth;
use Redirect;
use DB;
use Session;
use DataTables;
class VenueController extends Controller
{
    public function get_add_venue()
    {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    	 
        $countries = DB::select('select * from countries');


      

  $sc = SeatingChart::where(function($query) use($seller_id) {
       
      $query->where('seller_id',$seller_id);
         $query->orWhere('seller_id','!=',$seller_id)->where('publish_type',0);
             
})->get();


return view('seller.manage_venue.create_venue',compact('countries','sc','seller_id'));
}


    public function post_add_venue(Request $request)
    {


      	$this->validate($request,[
    	'name' => 'required',
    	'region' =>'required',
    	'StreetAddress' =>'required',
        'City' =>'required',
        'State' =>'required',
        'Zip' =>'required',
    	'Timezone' =>'required',
 		]);
        if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    	$venue = new Venue();
        $venue->seller_id = $seller_id;
    	$venue->name = $request->name;
        if($request->seating)
        {
    	$venue->seat_chart = $request->seating;
        }
    	$venue->region = $request->region;
    	$venue->street = $request->StreetAddress;
        $venue->city = $request->City;
        $venue->state = $request->State;
        $venue->zip_code = $request->Zip;
    	$venue->country = $request->country;
    	$venue->time_zone = $request->Timezone;
    	$venue->save();

    	return redirect('/seller/add_venue')->with('message', 'Venue Created Successfully...!');

    }
     public function list_venue()
    {
    return view('seller.manage_venue.venue',compact([]));
    }
    public function view_venue($id)
    {
    if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
       $venue= Venue::where('seller_id',$seller_id)
                    ->where('id',$id)->first();
    $sc = SeatingChart::where('id',$venue->seat_chart)->first();
 
      return view('seller.manage_venue.view_venue',compact('venue','sc'));
    }

    public function manageVenuesAjax()
    {

  if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

         $data = Venue::where('seller_id',$seller_id)->get();     
    
      return datatables()->of($data)

      ->addColumn('address', function($data){
                return $data->street.'<br>'.$data->city.'<br>'.$data->state.'<br>'.$data->zip_code.'<br>'.$data->country;
            })

        ->addColumn('seat_chart', function($data){
                if($data->seat_chart)
                {
               return  SeatingChart::where('id',$data->seat_chart)->first()->seating_chart_name;
           }else{
            return " ";}

            })

        // ->filter(function ($data) {
        //             if (request()->has('name')) 
        //             {
        //             $query->where('name','like',"%".request('name')."%");
        //             }
        //         })

        ->addColumn('action', function ($data) {
    return ' 
    <a class="btn btn-info btn-sm" href="'. route("seller.view_venue", $data->id) .'">View
    <i class="fa fa-eye" aria-hidden="true"></i>
</a>

     ';})
            
     ->escapeColumns([])->addIndexColumn()->make(true);
         
    }

    public function get_edit_venue($id)
    {
        if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
    	$venue= Venue::where('id',$id)->first();
        $sc = SeatingChart::where('seller_id',$seller_id)->get();
        $countries = DB::select('select * from countries');
    	
    	 return view('seller.manage_venue.edit_venue',compact('venue','countries','sc'));
    }
     public function post_edit_venue(Request $request)
    {
      
    	
    	$id= $request->id;
    	Venue::where('id',$id)->update(['name'=> $request->name,
                                       'seat_chart'=>$request->seating,
                                       'region'=>$request->region,

                                       'street'=>$request->StreetAddress,
                                       'state'=>$request->State,
                                       'zip_code'=>$request->Zip,
                                       'city'=>$request->City,

                                       'country'=>$request->country,
                                       'time_zone'=>$request->Timezone]);
    	return redirect('/seller/venue')->with('message', 'Venue Updated Successfully...!');
    }

    public function delete_venue($id)
    {
        $venue=Venue::findOrfail($id);
        $venue->delete();
        return redirect('/seller/venue')->with('message', 'Venue deleted Successfully...!');
    }
}
