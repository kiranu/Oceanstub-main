<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\User;
use App\Models\Seller;
use Redirect;
class SellerLoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:seller')->except('logout');
       
    // }
    public function get_login(){
        return view('seller.login');
    }
    public function login(Request $request) {

        $email= $request->get('email');
        $password= $request->get ('password');
        $usr="seller";

        $seller = [
            'email'=>$email,
            'password'=>$password,
            'user_type'=>$usr,
         ];
        
            if (Auth::attempt($seller))                
             {
                $user_id = Auth::user()->id;
                  $user = User::where('id',$user_id)->first();
                 $seller_id = $user->seller->id;
                 $request->session()->put('seller_id',$seller_id);
                return redirect('seller/dashboard');
                
            } 
            else {
            
                return redirect('/seller')->with('error','Invalid Credentials , Please try again.');
               
            }
        }



        public function logout(Request $request)
        {
    
            Auth::guard('seller')->logout();
    
            $request->session()->flush();
    
            $request->session()->regenerate();

            $request->session()->forget('seller_id');
            
            return redirect()->guest(route('seller.login'));
        }
}
