<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Features;
use Session;
class FeatureController extends Controller
{
    public function index()
    {
        $featuress=Features::get();
       return view('admin.features.index')->with(compact('featuress'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $features =New Features;
        $features->tittle= $request->tittle;
        $features->desc= $request->desc;
        $features->status = 1;
        $features->save();
     Session::flash('succes_message','Feature Details Added Successfully');

        return redirect('admin/features');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $features=Features::FindorFail($id);

        return view('admin.features.show')->with(compact('features'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $features=Features::FindorFail($id);


        return view('admin.features.edit')->with(compact('features'));

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

        $features=Features::FindorFail($id);
         $features->tittle= $request->tittle;
         $features->desc= $request->desc;
         $features->update();
     Session::flash('succes_message','Feature Details Updated Successfully');

        return redirect('admin/features');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $features=Features::FindorFail($id);

        $features->delete();
     Session::flash('danger_message','Feature Removed Successfully');

        return redirect('admin/features');
    }
    public function update_features_status(Request $request)
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
            Features::where('id',$data['features_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'features_id'=>$data['features_id']]);
        }
    }
}
