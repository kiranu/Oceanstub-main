<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\User;
use App\Models\Seller;
use Auth;
use Redirect;
use Session;
use Validator;
class CouponController extends Controller
{
    public function get_coupon()
    {
    if(Auth::check())
       {
        $id = Auth::id(); 
        $seller_id = Seller::where('user_id',$id)->first()->id;
       }else{
        return redirect()->route('seller.login');
    }

        $events = Event::where('seller_id',$seller_id)->get();

        
        return view('seller.manage_event.coupons',compact([],'events'));
    }
    
    public function manageCouponAjax()
    {
      $data = Coupon::where('seller_id',Session::get('seller_id'))->get();
       return datatables()->of($data)
    ->addColumn('action', function ($data) {



    return ' 
    
 <a class="btn btn-info btn-sm" href="'. route("seller.view.coupon", $data->id) .'">View
    <i class="fa fa-eye" aria-hidden="true"></i>
</a>

    ';})

            
     ->escapeColumns([])->addIndexColumn()->make(true);


    }




    public function get_promo()
    {
       

        return view('seller.manage_event.promotion');
    }
    public function post_promo(Request $request)
    {      
       $validator = Validator::make($request->all(), [
                    'eff_Date' => 'required|before_or_equal:expr_Date',
                    'expr_Date' => 'required|after_or_equal:eff_Date',
                    'event'=> 'required',
                    'PromotionCode'=>'required|unique:coupons,promo_code',
                    'PromotionType'=> 'required',
                    'eff_Time'=> 'required',
                    'expr_Time'=> 'required',
                    'Timezone'=> 'required',
                    'MinPurAmount'=> 'required',
                    'MaxPurAmount'=> 'required|gt:MinPurAmount',
                    'MinTicketPrice'=>'required',
                    'MaxTicketPrice'=>'required|gt:MinTicketPrice',
                    'min_no'=> 'required',
                    'max_no'=> 'required|gt:min_no',
                    'max_usage'=> 'required',
                    ]);

if($request->event == "0"){
 $validator = Validator::make($request->all(), 
    ['MinNumberOfDifferentEvents'=> 'required']);
       }

if($request->must_buy == "on"){
 $validator = Validator::make($request->all(), 
    ['MinNumberOfDifferentEvents'=> 'required']);
       }
 if(!$validator->passes()){
    return response()->json(['status' =>0, 'error'=> $validator->errors()->toArray()]);
}else{

    if(Auth::check())
       {
        $id = Auth::id(); 
        $seller_id = Seller::where('user_id',$id)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }
       $promo  = new  Coupon();
       $promo->seller_id = $seller_id;
       $promo->event_count = $request->MinNumberOfDifferentEvents;
      if($request->event == "0")
      {
       $promo->event_type = $request->event;
       
       if($request->must_buy){
       $promo->must_buy = $request->must_buy;
     }
      }
       elseif($request->event == "1")
      {
        $promo->event_type = $request->event;
        $promo->event_category = $request->EventCat;
        
        if($request->must_buy){
        $promo->must_buy = $request->must_buy;
      }
      }
       elseif($request->event == "2")
      {
       $promo->event_type = $request->event;
       $promo->event_package = $request->Package;
       

       if($request->must_buy){
       $promo->must_buy = $request->must_buy;
        }
      }
       else
      {
       $promo->event_type = "3"; 
       $promo->event_name = $request->event;
      }

       
       $promo->promo_code = $request->PromotionCode;

       $promo->promo_type = $request->PromotionType;

       if($request->PromotionType != "0" || $request->PromotionType !="1")
       {
           $promo->discount = $request->DiscAmount;
       }
       $promo->effective_date = $request->eff_Date ;
       $promo->effective_time = $request->eff_Time ;
       $promo->expire_date = $request->expr_Date ;
       $promo->expire_time = $request->expr_Time ;
       $promo->timezone = $request->Timezone ;
       
       $promo->min_pur_amt = $request->MinPurAmount ;
       $promo->max_pur_amt = $request->MaxPurAmount ;
       $promo->min_ticket_price = $request->MinTicketPrice ;
       $promo->max_ticket_price = $request->MaxTicketPrice ;
       $promo->min_no_ticket = $request->min_no ;
       $promo->max_no_ticket = $request->max_no ;
       $promo->max_no_usage = $request->max_usage ;
       $promo->merchandise = $request->AppliesToProducts ;
       $promo->auto_checkout = $request->AutoApply ;
        
                $promo->save();
                return response()->json(['status' => 1,'msg'=>'New Promotion Code added successfull..!']);

              }
   
    }

  public function get_viewCoupon($id)
  {

     if(Auth::check())
       {
        $uid = Auth::id(); 
        $seller_id = Seller::where('user_id',$uid)->first()->id;
       }else{
        return redirect()->route('seller.login');
       }

    $events = Event::where('seller_id',$seller_id)->get();


   $data_coupon = Coupon::where('id', $id)->first();

 
    return view('seller.manage_event.view_coupon',compact('data_coupon','events'));
  }



    public function get_edit_promo(Request $request)
    {
       
        $id = $request->id;
        $data_coupon = Coupon::where('id', $id)->first();
        
        return response()->json(['success' => true, 'data' => $data_coupon]);
    
    }
    public function post_edit_promo(Request $request)
    {
  
      $validator = Validator::make($request->all(), [
                  'eff_Date' => 'required|before_or_equal:expr_Date',
                  'expr_Date' => 'required|after_or_equal:eff_Date',
                  'event'=> 'required',
                  'PromotionCode'=> 'required',
                  'PromotionType'=> 'required',
                  'eff_Time'=> 'required',
                  'expr_Time'=> 'required',
                  'Timezone'=> 'required',
                  'MinPurAmount'=> 'required',
                  'MaxPurAmount'=> 'required|gt:MinPurAmount',
                  'MinTicketPrice'=>'required',
                  'MaxTicketPrice'=>'required|gt:MinTicketPrice',
                  'min_no'=> 'required',
                  'max_no'=> 'required|gt:min_no',
                  'max_usage'=> 'required',
               ]);
if($request->event == "0"){
 $validator = Validator::make($request->all(), 
    ['MinNumberOfDifferentEvents'=> 'required']);
       }

if($request->must_buy == "on"){
 $validator = Validator::make($request->all(), 
    ['MinNumberOfDifferentEvents'=> 'required']);
       }

  if(!$validator->passes()){
  return response()->json(['status' =>0, 'error'=> $validator->errors()->toArray()]);
     }
     else{
      $id= $request->id;

      Coupon::where('id',$id)
      ->update([
                'event_type' => $request->event,
                'promo_code'=> $request->PromotionCode,
                'event_package'=>$request->Package,
                'promo_type'=>$request->PromotionType,
                'effective_date'=>$request->eff_Date,
                'effective_time'=>$request->eff_Time,
                'expire_date'=>$request->expr_Date,
                'expire_time'=>$request->expr_Time,
                'timezone' => $request->Timezone,
                'event_count' => $request->MinNumberOfDifferentEvents,
                'min_pur_amt' => $request->MinPurAmount,
                'max_pur_amt' => $request->MaxPurAmount,
                'min_ticket_price' => $request->MinTicketPrice,
                'max_ticket_price' => $request->MaxTicketPrice,
                'min_no_ticket' => $request->min_no,
                'max_no_ticket' => $request->max_no,
                'max_no_usage' => $request->max_usage,
                'merchandise' => $request->AppliesToProducts,
                'auto_checkout' => $request->AutoApply,
                ]);               
     return response()->json(['status' => 1,'msg'=>' Promotion Code Updated successfull..!']);
        }

    }
    public function delete(Request $request)
    {
        $id = $request->id;
       
        try {

            Coupon::find($id)->delete();
            return response()->json(['success' => true,]);

            } catch (Throwable $e) {
            report($e);

            return false;
            }
    }
}
