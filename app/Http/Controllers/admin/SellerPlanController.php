<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerPlan;
use Session;
class SellerPlanController extends Controller
{
    public function index()
    {
        $seller_plans=SellerPlan::get();
       return view('admin.sellerplan.index')->with(compact('seller_plans'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.sellerplan.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
         'image' => 'image',
     ]);
        $sellerplan =New SellerPlan;
        $sellerplan->name= $request->name;
        $sellerplan->desc= $request->desc;
        $sellerplan->price= $request->price;
        $sellerplan->validity= $request->validity;
        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $file->move('uploads/Admin/Sellerplan',$filename);
            $sellerplan->image =$filename;
        }
       
        $sellerplan->status = 1;      
        $sellerplan->save();
     Session::flash('succes_message','sellerplan Added Successfully');
 
        return redirect('admin/seller_plan');
 
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller_plan=SellerPlan::FindorFail($id);
  
        return view('admin.sellerplan.show')->with(compact('seller_plan'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller_plan=SellerPlan::FindorFail($id);
  
        
        return view('admin.sellerplan.edit')->with(compact('seller_plan'));
        
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $request->validate([
         'image' => 'image',
     ]);
        $sellerplan=SellerPlan::FindorFail($id);
         $sellerplan->name= $request->name;
         $sellerplan->desc= $request->desc;
         $sellerplan->price= $request->price;
         $sellerplan->validity= $request->validity;
         if ($request->hasFile('image'))
         {
             $filename=$sellerplan->image ;
             @unlink('uploads/Admin/Sellerplan/'.$filename);
             $file = $request->file('image');
             $extention = $file->getClientOriginalExtension();
             $filename =time().'.'.$extention;
             $file->move('uploads/Admin/Sellerplan',$filename);
             $sellerplan->image =$filename;
         }
  
         $sellerplan->update();
     Session::flash('succes_message','sellerplan Updated Successfully');
 
        return redirect('admin/seller_plan');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellerplan=SellerPlan::FindorFail($id);
        @unlink('uploads/Admin/Sellerplan'.$sellerplan->image);
        $sellerplan->delete();
     Session::flash('danger_message','sellerplan Removed Successfully');
 
        return redirect('admin/seller_plan');
    }
    public function update_seller_plan_status(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
            // print_r($data);
            if($data['status']=="Active")
            {
                $status=0;
            }else{
                $status=1;
            }
            SellerPlan::where('id',$data['seller_plan_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'seller_plan_id'=>$data['seller_plan_id']]);
        }
    }
}
  