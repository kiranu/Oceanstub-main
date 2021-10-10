<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerPlanDetails;
use Session;
class SellerPlanDetailsController extends Controller
{
    public function index()
    {
        $seller_plans=SellerPlanDetails::get();
       return view('admin.sellerplandetails.index')->with(compact('seller_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.sellerplandetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sellerplan =New SellerPlanDetails;
        $sellerplan->name= $request->name;
        $sellerplan->Basic= $request->Basic;
        $sellerplan->Premium= $request->Premium;
        $sellerplan->status = 1;
        $sellerplan->save();
     Session::flash('succes_message','Plan Details Added Successfully');

        return redirect('admin/seller_plan_details');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller_plan=SellerPlanDetails::FindorFail($id);

        return view('admin.sellerplandetails.show')->with(compact('seller_plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller_plan=SellerPlanDetails::FindorFail($id);


        return view('admin.sellerplandetails.edit')->with(compact('seller_plan'));

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

        $sellerplan=SellerPlanDetails::FindorFail($id);
         $sellerplan->name= $request->name;
         $sellerplan->Basic= $request->Basic;
         $sellerplan->Premium= $request->Premium;
         $sellerplan->update();
     Session::flash('succes_message','Plan Details Updated Successfully');

        return redirect('admin/seller_plan_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellerplan=SellerPlanDetails::FindorFail($id);

        $sellerplan->delete();
     Session::flash('danger_message','sellerplan Removed Successfully');

        return redirect('admin/seller_plan_details');
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
            SellerPlanDetails::where('id',$data['seller_plan_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'seller_plan_id'=>$data['seller_plan_id']]);
        }
    }
}
