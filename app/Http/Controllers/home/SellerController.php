<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\SellerPlan;
use App\Models\SellerPlanDetails;
use Hash;
use Auth;
class SellerController extends Controller
{
    public function seller_registration(){
        return view('home.seller.signup-step1');
    }
    public function seller_registrion_save(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|unique:users',
            'password'=>'required|required_with:password_confirmation|confirmed',
            'mobile'=> 'numeric',
            'first_name'=>'required',
            'last_name'=>'required',
            'country_code'=>'required',
            'business_name'=>'required',
            'agree'=> 'required',
        ]);
        $user=new User;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->phone=$request->mobile;
        $user->dial_code=$request->country_code;
        $user->name=$request->first_name;
        $user->user_type="seller";
        $user->save();

        $user_id=$user->id;

        $seller=new Seller;
        $seller->user_id=$user_id;
        $seller->email=$request->email;
        $seller->first_name=$request->first_name;
        $seller->last_name=$request->last_name;
        $seller->mobile=$request->mobile;
        $seller->country_code=$request->country_code;
        $seller->business_name=$request->business_name;
        $seller->url="oceanstub";
        $seller->slug="oceanstub";
        $seller->terms_and_condition=$request->agree;
        $seller->save();

        return redirect()->route('seller_registration_plan');

    }
    public function seller_registration_plan(){
        $plans=SellerPlan::get();
        $details=SellerPlanDetails::where('status',1)->get();
        return view('home.seller.signup-step2')->with(compact('plans','details'));
    }
}
