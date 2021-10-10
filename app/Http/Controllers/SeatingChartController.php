<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatingChart;
use App\Models\Seller;
use Redirect;
use File;
use Hash;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use Validator;
use Response;

class SeatingChartController extends Controller
{

    public function get_custom_SeatingChart()
    {
        return view('seller.manage_venue.create_custom_chart');
    }


  public function post_SeatingChart(Request $request)
  {
    

        if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }


    $validator = Validator::make($request->all(),
                            ['SeatingChartData'=>'required',
                              'SeatingChartName' => 'required',
                            ]);
if(!$validator->passes())
{
return response()->json(['status' =>0, 'error'=> $validator->errors()->toArray()]);
}
else
   {

      $sc_data = new SeatingChart();
      $sc_data->seller_id =$seller_id;
      $sc_data->seating_chart_name =$request->SeatingChartName;
      $sc_data->publish_type=$request->publish;
      $sc_data->seating_chart_data = $request->SeatingChartData;
      $sc_data->save();

    return response()->json(['status' => 1,'msg'=>'SeatingChart Created successfully..!']);
   }
  }




  protected function get_list_SeatingChart()
  {
    
   if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }


   return view('seller.manage_venue.seating_chart',compact([]));
  }
  protected function manageScAjax()
  {
 
        $id = Auth::id(); 
        $seller_id = Seller::where('user_id',$id)->first()->id;
       

     $data = SeatingChart::where('seller_id',$seller_id)->latest()->get();

       return datatables()->of($data)
      ->editColumn('created_at', function ($data) 
      {     
        return  date("jS F, Y", strtotime($data->created_at));
      
      })
      ->addColumn('action', function ($data) {
    return ' 
    <a class="btn btn-info btn-sm" href="'.route("seller.view_seatingchart",$data->id) .'">View
    <i class="fa fa-eye" aria-hidden="true"></i>
</a>';})->escapeColumns([])->addIndexColumn()->make(true);
  }


  public function view_page_SeatingChart($id)
  {
      $sc = SeatingChart::where('id',$id)->first();
      return view('seller.manage_venue.view_custom_chart',compact('sc'));
  }

  public function edit_page_SeatingChart($id)
  {
    $sc = SeatingChart::where('id',$id)->first();
    return view('seller.manage_venue.edit_custom_chart',compact('sc'));
  }
  public function post_EditSeatingChart(Request $request)
  {
  
   $validator = Validator::make($request->all(),
                            ['SeatingChartData'=>'required',
                              'SeatingChartName' => 'required',
                            ]);
    if(!$validator->passes())
    {
    return response()->json(['status' =>0, 'error'=> $validator->errors()->toArray()]);
    }
    else
       {
      $id = $request->id;

      SeatingChart::where('id',$id)
      ->update([
               'seating_chart_name'=>$request->SeatingChartName,
               'publish_type'=>$request->publish,
               'seating_chart_data'=>$request->SeatingChartData,
              ]);

    return response()->json(['status' => 1,'msg'=>'SeatingChart Updated successfully..!']);
   }
  }


  public function delete_SeatingChart($id)
  {
    $sc=SeatingChart::findOrfail($id);
        $sc->delete();
        return redirect()->route('seller.seating_chart_list')->with('message', 'SeatingChart deleted Successfully...!');
  }
}
