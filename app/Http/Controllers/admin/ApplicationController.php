<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Session;
class ApplicationController extends Controller
{
    public function edit()
    {
        $application=Application::first();
        return view('admin.application')->with(compact('application'));
    }
 
    
    public function update(Request $request)
    {
     $request->validate([
         'logo' => 'image',
     ]);
        $application=Application::first();
         $application->fb_link= $request->fb_link;
         $application->google_link= $request->google_link;
         $application->ig_link= $request->ig_link;
         $application->linkedin_link= $request->linkedin_link;
         $application->twitter_link= $request->twitter_link;
         $application->email= $request->email;
         $application->mobile= $request->mobile;
         $application->address= $request->address;
         if ($request->hasFile('logo'))
         {
             $filename=$application->logo ;
             @unlink('uploads/Admin/Application/'.$filename);
             $file = $request->file('logo');
             $extention = $file->getClientOriginalExtension();
             $filename =time().'.'.$extention;
             $file->move('uploads/Admin/Application',$filename);
             $application->logo =$filename;
         }
         $application->update();
         Session::flash('succes_message','application Updated Successfully');
        return redirect()->back();
    }
 
}
