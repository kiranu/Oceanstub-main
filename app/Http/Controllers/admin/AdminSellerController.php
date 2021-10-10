<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class AdminSellerController extends Controller
{

    public function activesellers(){
        return view('admin.seller.active');
    }
    protected function activesellers_ajax(){
        $data=User::whereHas('seller', function ($query) {
            $query->where('status',1);
        })->with('seller')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['seller']->name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/seller-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function pendingsellers(){
        return view('admin.seller.pending');
    }
    protected function pendingsellers_ajax(){
        $data=User::whereHas('seller', function ($query) {
            $query->where('status',2);
        })->with('seller')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['seller']->name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/seller-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function blockedsellers(){
        return view('admin.seller.blocked');
    }
    protected function blockedsellers_ajax(){
        $data=User::whereHas('seller', function ($query) {
            $query->where('status',0);
        })->with('seller')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['seller']->name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/seller-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function sellerdetails($id){
        $seller=User::with('seller')->FindOrfail($id);
        return view('admin.seller.sellerdetails')->with(compact('seller'));
    }
    public function sellerevents($id){
              $data=Event::where('seller_id',$id)->whereHas('sch_venue', function ($query) {
                $query->where('start_date','<',date("Y-m-d"));
            })->with('sch_venue','seller')->get();


              return datatables()->of($data)
              ->addColumn('start_on', function ($data) {
            return $data['sch_venue']->start_date->format('d-m-Y')." on ".$data['sch_venue']->start_time->format('h:i:sa') ;

          })->editColumn('id', function ($data) {
            return " <a href=".url('admin/event-details/'.$data->id).">$data->id</a> ";

          })->addColumn('hosted_by', function ($data) {
            return $data['seller']->name;

          })
          ->editColumn('desc', function ($data) {
            $description = substr($data->desc,0,59);
            return $description;
          })


              ->escapeColumns([])->addIndexColumn()->make(true);
    }
}
