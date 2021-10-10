<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TicketInvoice;
use App\Models\Order_list;

class AdminBuyerController extends Controller
{
    public function activebuyers(){
        return view('admin.buyer.active');
    }
    protected function activebuyers_ajax(){
        $data=User::whereHas('buyer', function ($query) {
            $query->where('status',2)->whereNotNull('email_verified_at');
        })->with('buyer')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['buyer']->first_name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/buyer-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function pendingbuyers(){
        return view('admin.buyer.pending');
    }
    protected function pendingbuyers_ajax(){
        $data=User::whereHas('buyer', function ($query) {
            $query->where('status',2)->whereNull('email_verified_at');
        })->with('buyer')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['buyer']->first_name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/buyer-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function blockedbuyers(){
        return view('admin.buyer.blocked');
    }
    protected function blockedbuyers_ajax(){
        $data=User::whereHas('buyer', function ($query) {
            $query->where('status',0);
        })->with('buyer')->get();


          return datatables()->of($data)
        ->addColumn('name', function ($data) {
        return $data['buyer']->first_name ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/buyer-details/'.$data->id).">$data->id</a> ";

      })
      ->editColumn('desc', function ($data) {
         $description = substr($data->desc,0,59);
        return $description;
      }) ->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function buyerdetails($id){
        $buyer=User::with('buyer')->FindOrfail($id);
        return view('admin.buyer.buyerdetails')->with(compact('buyer'));
    }
    public function buyertickets($id){
              $data=Order_list::where('buyer_id',$id)->with('events','ticket','buyer')->get();

              return datatables()->of($data)
              ->addColumn('bookedtime', function ($data) {
            return $data['created_at']->format('d-m-Y h:i:sa');

          }) ->addColumn('ticket', function ($data) {
            return " <a href=".url('admin/ticketinvoice-details/'.$data->id).">".$data['ticket']->name."</br>".$data['ticket']->buy_price.$data['ticket']->prefix_sc."</a>";

          }) ->addColumn('eventdetails', function ($data) {
            return $data['events']->first_title." ".$data['events']->second_title."</br>";

          })->escapeColumns([])->addIndexColumn()->make(true);
    }
    public function ticketinvoicedetails($id){
        $ticket=Order_list::with('events','ticket','buyer')->FindOrfail($id);
        return view('admin.buyer.ticketdetails')->with(compact('ticket'));

    }
}
