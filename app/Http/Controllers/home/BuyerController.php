<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buyer;
use Hash;
use Auth;
use Illuminate\Support\Facades\Validator;

class BuyerController extends Controller
{
    public function buyer_registration(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=> 'email|required|unique:users',
            'password'=>'required|required_with:password_confirmation|string|confirmed',
            'mobile'=> 'required',
            'name'=> 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{

        $user=new User;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->phone=$request->mobile;
        $user->name=$request->name;
        $user->user_type="buyer";
        $user->save();

        $user_id=$user->id;
        $buyer=new Buyer;
        $buyer->user_id=$user_id;
        $buyer->first_name=$request->name;

        $buyer->phone=$request->mobile;
        $buyer->save();
        return true;
        return response()->json(['success'=>'Data is successfully added']);
        }
    }
    public function buyer_login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
        $data=$request->all();
        
        if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'user_type'=>'buyer']))
        {
            



             if((Auth::guard('web')->user()->user_type)=='buyer')
            {
                
                // return true;

                       
                        return redirect('/');
                    

            }
            else{
              return response()->json(['errors'=>["Invalid User"]]);

                }
        }
        else{
            return response()->json(['errors'=>['Invalid Credentials']]);

        }
     }
    }
    public function buyer_profile(){
        $id=Auth::guard('web')->user()->id;
        $user=User::with('buyer')->findOrfail($id);
        $buyer_id=$user['buyer']->id;
        $buyer=Buyer::findOrfail($buyer_id);
        return view('home.profile')->with(compact('buyer'));
    }
    public function update_buyer_profile(Request $request){
        $id=Auth::guard('web')->user()->id;
        $user=User::with('buyer')->findOrfail($id);
        $buyer_id=$user['buyer']->id;

        $user->name=$request->first_name." ".$request->last_name;
        $user->update();

        $buyer=Buyer::findOrfail($buyer_id);
        $buyer->first_name=$request->first_name;
        $buyer->last_name=$request->last_name;
        $buyer->phone=$request->phone;
        $buyer->gender=$request->gender;
        $buyer->dob=$request->dob;
        $buyer->married=$request->married;
        $buyer->marriage_date=$request->marriage_date;
        $buyer->address=$request->address;
        $buyer->street_name=$request->street_name;
        $buyer->city=$request->city;
        $buyer->state=$request->state;
        $buyer->alerts=$request->alerts;
        $buyer->country_id=$request->country_id;
        $buyer->pincode=$request->pincode;
        $buyer->update();

        return redirect()->back();
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }
}
