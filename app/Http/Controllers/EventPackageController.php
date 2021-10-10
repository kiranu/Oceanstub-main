<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Auth;
use DateTime;
use Session;
use App\Models\Event_Package;
use App\Models\Event_Package_List;
use App\Models\Event_Package_Image;
use App\Models\Event_Package_Coupon;

class EventPackageController extends Controller
{
    public function packages(){
        return view('seller.manage_event.packages');
    }
    public function create_package(){
        return view('seller.manage_event.new_package');
    }
    public function save_package(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_title' => 'required|image',
          ]);
        // dd($request->all());

        $user_id=Auth::user()->id;
        $seller=Seller::select('id','name')->where('user_id',$user_id)->first();
        $seller_id=$seller->id;
        $package=new Event_Package;
        $package->seller_id=$seller_id;
        $package->user_id=$user_id;
        $package->first_title=$request->first_title;
        $package->second_title=$request->second_title;
        $package->currency="USD";
        $package->event_type=$request->event_type;
        $package->event_genre=$request->event_genre;

        $start_date = new DateTime($request->start_date);
        $start_time = new DateTime($request->start_time);

        $merge = new DateTime($start_date->format('Y-m-d') .' ' .$start_time->format('H:i'));
        $start_date_time=$merge->format('Y-m-d H:i');
        $package->start_date_time=$start_date_time;

        $end_date = new DateTime($request->end_date);
        $end_time = new DateTime($request->end_time);
        $merge = new DateTime($end_date->format('Y-m-d') .' ' .$end_time->format('H:i'));
        $end_date_time=$merge->format('Y-m-d H:i');

        $package->end_date_time=$end_date_time;
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $file->move('uploads/Seller/Package/flyer',$filename);
            $package->image ="uploads/Seller/Package/flyer/".$filename;
        }
        $package->video_link_type=$request->video_link_type;
        $package->facebook_link=$request->facebook_link;
        $package->youtube_link=$request->youtube_link;
        $package->organiser=$seller->name;
        $package->button_name=$request->button_name;
        $package->category_id=implode(",", $request->category_id);
        $package->link=$request->link;
        $package->short_link=$request->short_link;
        if($request->status="on"){
                $package->status=1;
            }
        if($request->private="on"){
                $package->private=1;
            }


        $package->save();

        $package_id=$package->id;

        foreach ($request->events as $event){
            $package_list=new Event_Package_List;
            $package_list->package_id=$package_id;
            $package_list->event_id=$event;
            $package_list->status=1;
            $package_list->save();
        }
        return redirect()->route('seller.package');
    }
    public function updtae_package(Request $request){
        $package_id=$request->id;

        $user_id=Auth::user()->id;
        $seller=Seller::select('id','name')->where('user_id',$user_id)->first();
        $seller_id=$seller->id;
        $package=Event_Package::findOrFail($package_id);
        $package->seller_id=$seller_id;
        $package->user_id=$user_id;
        $package->first_title=$request->first_title;
        $package->second_title=$request->second_title;
        $package->currency="USD";
        $package->event_type=$request->event_type;
        $package->event_genre=$request->event_genre;

        $start_date = new DateTime($request->start_date);
        $start_time = new DateTime($request->start_time);

        $merge = new DateTime($start_date->format('Y-m-d') .' ' .$start_time->format('H:i'));
        $start_date_time=$merge->format('Y-m-d H:i');
        $package->start_date_time=$start_date_time;

        $end_date = new DateTime($request->end_date);
        $end_time = new DateTime($request->end_time);
        $merge = new DateTime($end_date->format('Y-m-d') .' ' .$end_time->format('H:i'));
        $end_date_time=$merge->format('Y-m-d H:i');

        $package->end_date_time=$end_date_time;
        if ($request->hasFile('image'))
        {
            @unlink($package->image);

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename =time().'.'.$extention;
            $file->move('uploads/Seller/Package/flyer',$filename);
            $package->image ="uploads/Seller/Package/flyer/".$filename;
        }
        $package->video_link_type=$request->video_link_type;
        $package->facebook_link=$request->facebook_link;
        $package->youtube_link=$request->youtube_link;
        $package->organiser=$seller->name;
        $package->button_name=$request->button_name;
        $package->category_id=implode(",", $request->category_id);
        $package->link=$request->link;
        $package->short_link=$request->short_link;
        if($request->status="on"){
                $package->status=1;
            }else{
                $package->status=0;
            }
        if($request->private="on"){
                $package->private=1;
            }else{
                $package->private=0;
            }
        $package->update();

        Event_Package_List::where(['package_id'=>$package_id])->delete();

        foreach ($request->events as $event){
            $package_list=new Event_Package_List;
            $package_list->package_id=$package_id;
            $package_list->event_id=$event;
            $package_list->status=1;
            $package_list->save();
            }
        return redirect()->route('seller.package');
    }
    public function packages_ajax(){
        $data=Event_Package::with('event_list.event','event_list')->get();

          return datatables()->of($data)
     ->editColumn('id', function ($data) {
         return " <a href=".url('seller/package-details/'.$data->id).">Package_$data->id</a> ";

      })
      ->addColumn('action',function ($data)
    { return'
    <a class="btn btn-info btn-sm" href="'.route('seller.package.edit',$data->id).'"><i class="fas fa-pencil-alt"></i></a>
    <a class="btn btn-danger btn-sm" href="'.route('seller.package.delete',$data->id).'" ><i class="fas fa-trash"></i></a>' ;})
      ->escapeColumns([])->addIndexColumn()->make(true);
    }
    public function packagedetails($id){
        $package=Event_Package::with('event_list.events')->findOrFail($id);
        // dd($package['event_list']);

        return view('seller.manage_event.packagedetails')->with(compact('package'));
    }
    public function editpackage($id){
        $package=Event_Package::with('event_list.events','event_list')->findOrFail($id);
        return view('seller.manage_event.edit_package')->with(compact('package'));

    }
    public function deletepackage($id){
        $package=Event_Package::findOrFail($id);
        @unlink($package->image);
        $package->delete();
        Session::flash('danger_message','Package Deleted Successfully');

        return redirect()->route('seller.package');
    }
    public function deleteeventpackage($id){
        $event=Event_Package_List::findOrFail($id);
        $event->delete();
        Session::flash('danger_message','Event removed from this Package');
        return redirect()->back();
    }

}
