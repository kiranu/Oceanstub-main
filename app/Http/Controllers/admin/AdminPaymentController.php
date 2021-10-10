<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SellerPayment;
use App\Models\BuyerPayment;

class AdminPaymentController extends Controller
{
    public function buyerpayment(){
        return view('admin.payment.buyerpayment');
    }
    public function buyerpayment_ajax(){
        $data=BuyerPayment::with('buyer')->get();

        return datatables()->of($data)
      ->addColumn('buyer_name', function ($data) {
      return " <a href=".url('admin/buyer-details/'.$data['buyer']->user_id).">".$data['buyer']->first_name."</a> " ;

   })->editColumn('id', function ($data) {
       return " <a href=".url('admin/buyer-payment-details/'.$data->id).">$data->id</a> ";
    })->escapeColumns([])->addIndexColumn()->make(true);
    }

    public function buyerpayment_details($id){
        $payment=BuyerPayment::with('buyer')->FindOrfail($id);
        return view('admin.payment.buyerpaymentdetails')->with('payment',$payment);

    }

    public function sellerpayment(){
        return view('admin.payment.sellerpayment');
    }
    public function sellerpayment_ajax(){
        $data=SellerPayment::with('seller')->get();

          return datatables()->of($data)
        ->addColumn('seller_name', function ($data) {
        return " <a href=".url('admin/seller-details/'.$data['seller']->id).">".$data['seller']->name."</a> " ;

     })->editColumn('id', function ($data) {
         return " <a href=".url('admin/seller-payment-details/'.$data->id).">$data->id</a> ";
      })->escapeColumns([])->addIndexColumn()->make(true);
    }
    public function sellerpayment_details($id){
        $payment=SellerPayment::with('seller')->FindOrfail($id);
        return view('admin.payment.sellerpaymentdetails')->with('payment',$payment);

    }
}
