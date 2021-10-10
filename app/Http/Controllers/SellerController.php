<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Crypt;
use Session;
use DB;

class SellerController extends Controller
{
  // public function __construct()
  // {
  //     $this->middleware('guest')->except('logout');
  //     $this->middleware('guest:seller')->except('logout');
     
  // }
    public function get_register()
    {
        $countries = DB::select('select * from countries');
        return view('seller.register',compact('countries'));
    }
    public function post_register(Request $request)
    {
      
      $user = new User();
      $user->user_type = "seller";
      $user->dial_code = $request->dc;
      $user->phone = $request->mobile;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->save();

      $seller = new Seller();
      $seller->user_id = $user->id;
      $seller->name = $request->name;
      $seller->save();
      return redirect('/seller');
       
    }
}
