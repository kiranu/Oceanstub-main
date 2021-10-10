<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
class AdminLoginController extends Controller
{
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data=$request->all();
        // print_r($data);die;
        if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'user_type'=>'admin']))
        {  
            // dd(Auth::guard('admin')->user()->id);
             if((Auth::guard('web')->user()->user_type)=='admin')
            {
               
                return redirect('/admin/dashboard');
  
            }
            else{
                return redirect()->back()->with('error_message',' Invalid User');
                }
        }
        else{
            return redirect()->back()->with('error_message',' Invalid credentials');

        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/admin');
    }
}
