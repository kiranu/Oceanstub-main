<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Http\Controllers\EventController;
use App\Models\Event;
use App\Models\EventTicket;
use App\Models\TicketInvoice;
use App\Models\EventReferrals;
use App\Models\Order_list;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Buyer;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Exports\BulkExport;
use App\Imports\BulkImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class SellerReportsController extends Controller
{

  // private $events_audit;
    // protected $events_audit;

    // public function __construct($events_audit)
    // {
    //     $this->events_audit = $events_audit;
    // }



public function get_salesAndInvoice(Request $request)
{


  if (Auth::check()) 
    {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $events = Event::where('seller_id', $seller_id)->get();

    $invoice=null;

if($request->Event)
    {
$invoice = Order_list::whereHas('order',function ($query)use($request)
 {
  if($request->Type !== "0"){
    $query->where('status',$request->Type);
  }
  $query->where('event_id',$request->Event);
  $query->whereBetween('updated_at',[$request->FromDate,$request->ToDate]);
  })->get();

}

return view('seller.reports.sales_and_invoice',compact('events','invoice'));
}

  // public function get_salesAndInvoicePreview()
  // {
  //   return view('seller.reports.preview_sales_and_invoice');
  // }

  public function get_SoldTickets(Request $request)
  {

    if (Auth::check()) 
    {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $events = Event::where('seller_id', $seller_id)->get();
$sold=null;

   if($request->Event)
    {
$sold = Order_list::where('event_id',$request->Event)->

whereHas('order',function ($query)use($request)
 {
  if($request->Type !== "0"){
    $query->where('status',$request->Type);
  }
  $query->whereBetween('updated_at',[$request->FromDate,$request->ToDate]);
  })->get();

}
    return view('seller.reports.sold_tickets', compact('events','sold'));
  }


  


  public function get_EventAudit(Request $request)
  {
    
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $events = Event::where('seller_id', $seller_id)->get();

    $events_audit=null;

    if($request->Event)
    {
Session::put(['event_id' => $request->Event,'from' => $request->FromDate,'to' => $request->ToDate]);
        // $audit_data = new Order_list;
        // $audit_data->rty($request);

$events_audit = Order_list::where('event_id',$request->Event)->
whereHas('order',function ($query)use($request)
 {
  $query->whereBetween('updated_at',[$request->FromDate,$request->ToDate]);
      })->get();

// $collection_audit = collect($events_audit);

   }

    return view('seller.reports.event_audit', compact('events','events_audit'));
  }

  
  public function EventAudit_export(Request $request)
  {

    return Excel::download(new BulkExport, 'EventAudit.xlsx');
  }
  public function get_Referrals(Request $request)
  {

    
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $events = Event::where('seller_id', $seller_id)->get();
     $reffer=null;

    if($request->Event)
    {


$reffer = Order_list::where('event_id',$request->Event)->
whereHas('order',function ($query)use($request)
 {
  if($request->Type !== "0"){
    $query->where('status',$request->Type);
  }
  $query->whereBetween('updated_at',[$request->FromDate,$request->ToDate])->where('referrer_code',$request->refferel);
      })->get();


   }
    return view('seller.reports.referrals', compact('events','reffer'));
  }

  public function getUnsoldTickets()
  {
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $events = Event::where('seller_id', $seller_id)->get();
    return view('seller.reports.unsold_tickets', compact('events'));
  }
}
