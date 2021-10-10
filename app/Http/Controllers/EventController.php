<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;
use App\Models\Event;
use App\Models\EventType;
use App\Models\EventVenueSchedule;
use App\Models\EventSales;
use App\Models\EventPolicy;
use App\Models\EventFile;
use App\Models\EventTicket;
use App\Models\TicketPrice;
use App\Models\Venue;
use App\Models\EventInvoiceQuestionbank;
use App\Models\EventTicketQuestionbank;
use App\Models\EventCategories;
use App\Models\Merchandise;
use App\Models\EventDetails;
use App\Models\EventCategory;
use App\Models\SeatingChart;
use App\Models\Category;
use App\Models\EventPaymentMethod;
use DateTime;
use Redirect;
use File;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Validator;
use Response;

class EventController extends Controller
{

  protected function get_EventList()
  {

    return view('seller.manage_event.events', compact([]));
  }
  protected function manageEventsAjax()
  {
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $data = Event::where('seller_id', $seller_id)->where('publish',1)->get();


    return datatables()->of($data)
    ->addColumn('action', function ($data) {
      return ' 
    <a class="btn btn-info btn-sm" href="' . route('seller.manage_event.edit_event', $data->id) . '"><i class="fas fa-pencil-alt"></i></a>
   <a class="btn btn-danger btn-sm" href="' . route('seller.manage_event.delete_event', $data->id) . '" ><i class="fas fa-trash"></i></a>';
    })
     ->addColumn('active', function ($data) {
      
    return'<div class="form-check">
                          <input class="form-check-input" type="checkbox" disabled="" checked>
                          <label class="form-check-label">Published</label>
                        </div>';
   
    })

    ->addColumn('date', function ($data) {
        
      
$date=   date("jS F, Y", strtotime($data->sch_venue->start_date));

$time= date("H:i a", strtotime($data->sch_venue->start_time));


        return $date=$date.", &nbsp;".$time;
      })
      ->addColumn('venue', function ($data) {
        $sch_venue = $data->sch_venue->venue_list;
        $venue = Venue::where('id', $sch_venue)->latest('id')->first();

        return $data = $venue->name;
      })
      ->editColumn('created_at', function ($data) {
        return  date("jS F, Y", strtotime($data->created_at));
      })
      ->escapeColumns([])->addIndexColumn()->make(true);
  }

  public function get_add_event()
  {
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $venues = Venue::where('seller_id', $seller_id)->get();



    if (Auth::check()) {

      $userId = Auth::user()->id;
      $organizer = User::where('id', $userId)->first();
      $organizer_name = $organizer->seller;
    } else {
      return redirect()->route('seller.login');
    }


    $events = Event::where('seller_id', $seller_id)->get();


    $mers = Merchandise::where('seller_id', $seller_id)->get();

    $countries = DB::select('select * from countries');


    // ticket
    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();

    $venue_sch = null;
    $venue = null;
    $ticket_prices = null;
    $var_ticket_prices = null;
    if ($event_data) {
      $venue_sch = $event_data->sch_venue;

      if ($event_data->sch_venue) {
        $venue = Venue::where('id', $event_data->sch_venue->venue_list)->first();
      }

      if ($event_data->event_ticket) {
        $tp = $event_data->event_ticket->ticket_price;

        foreach ($tp as $prices) {
          if ($prices->parent_id == null) {
            $ticket_prices[] = $prices;
          } else {
            $var_ticket_prices[] = $prices;
          }
        }
      }
    }

    $ticket = null;
    if ($event_data != null) {
      $ticket = EventTicket::where('event_id', $event_data->id)->latest('id')->first();
    }

    $category = Category::all();

    /*$cat =EventCategory::all();

$subcat=null;

foreach ($cat as $object)   
{
    $sub_catd=$object->sub_category;
    foreach($sub_catd as $subcategory)
   {
    $subcat[]=$subcategory->sub;
   }
}*/

    $sc = SeatingChart::where('seller_id', $seller_id)->get();

    return view(
      'seller.manage_event.create_event',
      compact(
        'venues',
        'organizer_name',
        'events',
        'mers',
        'countries',
        'venue_sch',
        'venue',
        'ticket_prices',
        'var_ticket_prices',
        'ticket',
        'category',
        'sc',
        'event_data'
      )
    );

    // end ticket

  }


  public function post_event_first(Request $request)
  {


  

    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $this->validate($request, [
      'first_title' => 'required',
      'currency' => 'required',
      'event_type' => 'required',
      'event_genre' => 'required',
      'venue' => 'required',
      'start_date' => 'required',
      'start_time' => 'required',
      'days' => 'required',
      'SaleStart' => 'required',
      'SaleEnd' => 'required',
      /*'sales_start_date' => 'before_or_equal:EndDate',
       'EndDate' => 'after_or_equal:sales_start_date'*/
    ]);

    $event = new Event();
    $event->seller_id = $seller_id;
    $event->first_title = $request->first_title;
    $event->second_title = $request->second_title;
    $event->currency = $request->currency;
    $event->save();




    $evnt_type = new EventType();
    $evnt_type->event_id = $event->id;

    if ($request->online == "on") {
      $evnt_type->online = $request->online;
      $evnt_type->streaming = $request->cIsStream;
      if ($request->cIsStream == "true") {

        $evnt_type->embed_code = $request->StreamEmbedCode;

        if ($request->cAllowReentry == "yes") {
          $evnt_type->allow_reentry = $request->cAllowReentry;
        }
        $evnt_type->on_demand = $request->IsOnDemand;
      }
    } else {
      $evnt_type->seating_type = $request->seating;
    }

    $evnt_type->event_type = $request->event_type;
    $evnt_type->event_genre = $request->event_genre;
    $evnt_type->save();



    $evnt_schedule = new EventVenueSchedule();
    $evnt_schedule->event_id = $event->id;
    $evnt_schedule->venue_list = $request->venue;
    $evnt_schedule->start_date = $request->start_date;

 

 $start_min = ($request->start_time*60)+$request->start_time_min;
  $start_time = Carbon::parse('00:00:00')->addMinutes($start_min);
    $event_time  = date("h:i:s", strtotime($start_time));

    
    $evnt_schedule->start_time =$event_time;
    $evnt_schedule->days = $request->days;
    $evnt_schedule->hours = $request->hours;
    $evnt_schedule->minuts = $request->mins;

    $end_date = Carbon::parse($request->start_date)->addDays($request->days);
    $end_date = date("Y-m-d", strtotime($end_date));
    $minutes = (($request->hours) * 60) + $request->mins;
    $end_time = Carbon::parse($event_time)->addMinutes($minutes);
    $end_time = date("h:i:s", strtotime($end_time));


    $evnt_schedule->end_date = $end_date;
    $evnt_schedule->end_time = $end_time;



    if ($request->show_time == "1") {
      $evnt_schedule->show_time = $request->show_time;
    }
    if ($request->show_date == "1") {
      $evnt_schedule->show_date = $request->show_date;
    }
    $evnt_schedule->time_zone=$request->Timezone;
    $evnt_schedule->save();

/*polycy*/
// $policy = new EventPolicy();
// $policy ->event_id = $event->id;
// $policy->save(); 
// $flyer =new EventFile();
// $flyer->event_id = $event->id;
// $flyer->save();
/*ticket*/
$ticket = new EventTicket();
$ticket->event_id = $event->id;
$ticket->save();
/*end ticket*/
// $details=new EventDetails();
// $details->event_id = $event->id;
// $details->save();
   


    $evnt_sales = new EventSales();

    $event_start_date = $request->start_date;
    $event_start_time = $request->start_time;
    $evnt_sales->event_id = $event->id;
    if ($request->SaleStart == "0") {
      $evnt_sales->start_date = $request->sales_start_date;
      $evnt_sales->start_time = $request->sales_start_time;
    }
    if ($request->SaleStart == "1") {

      $sale_start_date = Carbon::parse($request->start_date)

        ->subDays($request->StartDaysBefor);
      $sale_start_date = date("Y-m-d", strtotime($sale_start_date));

      $minutes = (($request->StartHoursBefor) * 60) + $request->StartMinsBefor;

      $sale_start_time = Carbon::parse($request->start_time)->subMinutes($minutes);
      $sale_start_time = date("h:i:s", strtotime($sale_start_time));

      $evnt_sales->start_date = $sale_start_date;
      $evnt_sales->start_time = $sale_start_time;
    }
    //date end validation


    if ($request->SaleEnd == "0") {
      $evnt_sales->end_date = $request->EndDate;
      $evnt_sales->end_time = $request->EndTime;
    }
    if ($request->SaleEnd == "1") {

      $sale_end_date = Carbon::parse($request->start_date)

        ->addDays($request->end_days);

      $sale_end_date = date("Y-m-d", strtotime($sale_end_date));

      $minutes = (($request->end_hours) * 60) + $request->end_mins;

      $sale_end_time = Carbon::parse($request->start_time)->addMinutes($minutes);
      $sale_end_time = date("h:i:s", strtotime($sale_end_time));

      $evnt_sales->end_date = $sale_end_date;
      $evnt_sales->end_time = $sale_end_time;
    }
    if ($request->SaleEnd == "2") {

      $sale_end_date = Carbon::parse($request->start_date)

        ->subDays($request->end_days);

      $sale_end_date = date("Y-m-d", strtotime($sale_end_date));

      $minutes = (($request->end_hours) * 60) + $request->end_mins;

      $sale_end_time = Carbon::parse($request->start_time)->subMinutes($minutes);
      $sale_end_time = date("h:i:s", strtotime($sale_end_time));

      $evnt_sales->end_date = $sale_end_date;
      $evnt_sales->end_time = $sale_end_time;
    }


Session::put('e_id',$event->id);
    try {
      $evnt_sales->save();
    } catch (exception $e) {
      report($e);
      return false;
    }

    return response()->json(['success' => true,]);
  }




  public function instruction()
  {
    return view('seller.manage_event.instruction');
  }

  public function policy(Request $request)
  {

    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $this->validate($request, [
      'return_policy' => 'required',
      'ExchangePolicy' => 'required',

    ]);


    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;

 EventPolicy::where('event_id',$last_insert_id)->delete();
 



    $event_policy = new EventPolicy();
    $event_policy->event_id = $last_insert_id;

    $event_policy->return_policy = $request->return_policy;
    if ($request->return_policy == "1") {
      $event_policy->rp_upto_hours = $request->ReturnUpToHoursBefore;
      $event_policy->sc_deduction = $request->DeductionStoreCredit;
      $event_policy->cc_deduction = $request->DeductionCreditCard;
    }
    $event_policy->exchange_upgrade = $request->ExchangePolicy;
    if ($request->ExchangePolicy != "0") {
      $event_policy->eu_upto_hours = $request->ExchangeHoursBefore;
    }
    if ($request->ExchangePolicy == "3") {
      $event_policy->eu_category = $request->ExchangeCategories;
    }
    try {
      $event_policy->save();
    } catch (exception $e) {
      report($e);
      return false;
    }


    return response()->json(['success' => true,]);
  }



  public function flyer(Request $request)
  {

    
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;

    $request->validate([
      'flyer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

   EventFile::where('event_id',$last_insert_id)->delete();
    $image = new EventFile();
    $image->event_id =  $last_insert_id;

    if ($request->file('flyer')) {
      $flyerPath = $request->file('flyer');
      $flyerName = $flyerPath->getClientOriginalName();
      $flyer_path = $request->file('flyer')
        ->storeAs('uploads', $flyerName, 'public');
      $image->flyer_name = $flyerName;
      $image->flyer_path = '/storage/' . $flyer_path;
    }
    if ($request->file('picture')) {
      $picturePath = $request->file('picture');
      $pictureName = $picturePath->getClientOriginalName();
      $pic_path = $request->file('picture')->storeAs('uploads', $pictureName, 'public');
      $image->picture_name = $pictureName;
      $image->picture_path = '/storage/' . $pic_path;
    }




    $image->video_id = $request->video_id;
    $image->social_media = $request->media_link;
    $image->save();
    return response()->json(['success' => true,]);
  }

  public function post_detailes(Request $request)
  {


    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    // $this->validate($request, ['EventDescription' => 'required',
    //                             'Afterpurchasenotes' => 'required',]);



    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;

    if ($request->EventDescription != null || $request->Afterpurchasenotes != null) {

      $event_description = $request->EventDescription;

      if ($event_description != null) {
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($event_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
          $data = $img->getAttribute('src');
          list($type, $data) = explode(';', $data);
          list($type, $data) = explode(',', $data);
          $data = base64_decode($data);
          $image_name = "/uploads/" . time() . $k . '.png';
          $path = public_path() . $image_name;
          file_put_contents($path, $data);
          $img->removeAttribute('src');
          $img->setAttribute('src', $image_name);
        }
        $event_description = $dom->saveHTML();
      } else {
        $event_description = null;
      }

      // note
      $note = $request->Afterpurchasenotes;

      if ($note != null) {
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($note, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
          $data = $img->getAttribute('src');
          list($type, $data) = explode(';', $data);
          list($type, $data) = explode(',', $data);
          $data = base64_decode($data);
          $image_name = "/uploads/" . time() . $k . '.png';
          $path = public_path() . $image_name;
          file_put_contents($path, $data);
          $img->removeAttribute('src');
          $img->setAttribute('src', $image_name);
        }
        $note = $dom->saveHTML();
      } else {
        $note = null;
      }
    }


    if ($request->eventstates != null) {
      $event_data = implode(',', $request->eventstates);
    } else {
      $event_data = null;
    }

    if ($request->merstates != null) {
      $mer_data = implode(',', $request->merstates);
    } else {
      $mer_data = null;
    }

    if ($request->cat != null) {
      $cat_data = implode(',', $request->cat);
    } else {
      $cat_data = null;
    }

    if ($request->subcat != null) {
      $subcat_data = implode(',', $request->subcat);
    } else {
      $subcat_data = null;
    }

EventDetails::where('event_id',$last_insert_id)->delete();
    $details  = new EventDetails();
    $details->event_id = $last_insert_id;
    $details->organizer_id = $request->organizer;
    $details->eventshown_id = $event_data;
    $details->merchshown_id = $mer_data;
    $details->categories = $cat_data;
    $details->sub_categories = $subcat_data;
    $details->purchase_notes = $note;
    $details->event_descriptions = $event_description;
    $details->remining_ticket = $request->Remainingtickets;
    if ($request->Remainingtickets == "3") {
      $details->remining_no = $request->reminingNo;
    }
    $details->tax_service = $request->TaxServiceCharges;
    $details->price_level = $request->IndicatingPriceLevel;
    $details->mark_as = $request->MarkAs;
    if ($request->TicketsBtnText != null) {
      $details->ticket_btn_text = $request->TicketsBtnText;
    } else {
      $details->ticket_btn_text = "Tickets";
    }
    if ($request->checkGroup == "true") {
      $details->check_group = $request->checkGroup;
      $details->group_name = $request->GroupId;
    }
    if ($request->HasPassword == "true") {
      $pswd = implode(',', $request->Passwords);
      $details->check_password = $request->HasPassword;
      $details->ticket_passworsd = $pswd;
    }
    if ($request->checkLimit == "true") {
      $details->check_limit = $request->checkLimit;
      $details->limit = $request->LimitTicketPerUser;
    }

    $details->save();


    return redirect()->back();
  }

  public function post_ticket_qus(Request $request)
  {
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $this->validate($request, ['str' => 'required',]);

    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;

    $ques = new EventTicketQuestionbank();
    $ques->event_id = $last_insert_id;
    $ques->qus_per_ticket = $request->str;

    try {

      $ques->save();
      return response()->json(['success' => true,]);
    } catch (\Exception $e) {


      return response()->json(['error' => $e,]);
    }
  }


  public function post_invoice_qus(Request $request)
  {

    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $this->validate($request, ['str' => 'required',]);

    $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
    $last_insert_id = $event_data->id;

    $ques = new EventInvoiceQuestionbank();
    $ques->event_id = $last_insert_id;
    $ques->qus_per_invoice = $request->str;

    try {

      $ques->save();
      return response()->json(['success' => true,]);
    } catch (\Exception $e) {


      return response()->json(['error' => $e,]);
    }
  }

  public function post_create_venue(Request $request)
  {

    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'region' => 'required',
      'StreetAddress' => 'required',
      'City' => 'required',
      'State' => 'required',
      'Zip' => 'required',
      'Timezone' => 'required',
    ]);
    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {

      $venue = new Venue();
      $venue->seller_id = $seller_id;
      $venue->name = $request->name;
      if ($request->seating) {
        $venue->seat_chart = $request->seating;
      }
      $venue->region = $request->region;
      $venue->street = $request->StreetAddress;
      $venue->city = $request->City;
      $venue->state = $request->State;
      $venue->zip_code = $request->Zip;
      $venue->country = $request->country;
      $venue->time_zone = $request->Timezone;

      $venue->save();
      return response()->json(['status' => 1,]);
    }

    /*  try {

          $venue->save();
          return response()->json(['success' => true,]);

        } catch (\Exception $e) {

            
            return response()->json(['error' => $e,]);
        }*/
  }


  public function PostPaymentMethod(Request $request)
  {


    if ($request->BankTransfer == "on") {
      $validator = Validator::make($request->all(), [
        'AccountHolderName' => 'required',
        'AccountHoldingBranch' => 'required',
        'AccountNumber' => 'required',
        'Re-enterAccountNumber' => 'required_with:AccountNumber|same:AccountNumber',
        'IFSC' => 'required',
      ]);
    }
    if ($request->PayPal == "on") {
      $validator = Validator::make($request->all(), [
        'PayPalId' => 'required',
      ]);
    }


    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
      if (Auth::check()) {
        $uid = Auth::id();
        $seller_id = Seller::where('user_id', $uid)->first()->id;
      } else {
        return redirect()->route('seller.login');
      }
      $event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
      $last_insert_id = $event_data->id;

      EventPaymentMethod::where('event_id',$last_insert_id)->delete();
      $pm = new EventPaymentMethod();
      $pm->seller_id = $seller_id;
      $pm->event_id = $last_insert_id;
      $pm->holder_name = $request->AccountHolderName;
      $pm->branch = $request->AccountHoldingBranch;
      $pm->account_no = $request->AccountNumber;
      $pm->ifsc = $request->IFSC;
      $pm->paypal_id = $request->PayPalId;

      try {
        $pm->save();
        return response()->json(['status' => 1, 'msg' => 'created successfull..!']);
      } catch (\Exception $e) {
        return response()->json(['error' => $e,]);
      }
    }
  }

  /*=====================edit event============================*/
  public function get_edit_event($id)
  {
    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
    $venue_sch = null;
    $venue = null;
    $tic_prices = null;
    $var_ticket_prices = null;
    if (Auth::check()) {
      $userId = Auth::user()->id;
      $organizer = User::where('id', $userId)->first();
      $organizer_name = $organizer->seller;
    } else {
      return redirect()->route('seller.login');
    }
    $events = Event::where('seller_id', $seller_id)->get();
    $mers = Merchandise::where('seller_id', $seller_id)->get();
    $event_data = Event::where('id', $id)->first();
    $venues = Venue::all();
    $venue_sch = $event_data->sch_venue;
    $venue = Venue::where('id', $event_data->sch_venue->venue_list)->first();
    if ($event_data->event_ticket) {
      $ticket_prices = $event_data->event_ticket->ticket_price;
    }
    $countries = DB::select('select * from countries');

    if ($event_data->event_details != null) {
      $evn_id = explode(',', $event_data->event_details->eventshown_id);
      foreach ($evn_id as $key => $value) {
        $show_evn[] = Event::where('id', $value)->first();
      }
    } else {
      $show_evn = null;
    }
    if ($event_data->event_details != null) {
      $mer_id = explode(',', $event_data->event_details->merchshown_id);
      foreach ($mer_id as $key => $value) {
        $show_mer[] = Merchandise::where('id', $value)->first();
      }
    } else {
      $show_mer = null;
    }



    if ($event_data) {
      $venue_sch = $event_data->sch_venue;

      if ($event_data->sch_venue) 
      {
        $venue = Venue::where('id', $event_data->sch_venue->venue_list)->first();
      }


      if ($event_data->event_ticket) 
      {
        $tp = $event_data->event_ticket->ticket_price;

        foreach ($tp as $prices)
         {

          if ($prices->parent_id == null) 
          {
            $tic_prices[] = $prices;
          } 
          else 
          {
            $var_ticket_prices[] = $prices;
          }

        }
      }



    }

    $ticket = null;
    if ($event_data != null) {
      $ticket = EventTicket::where('event_id', $event_data->id)->latest('id')->first();
    }

    $cat = EventCategory::all();

    $subcat = null;

    foreach ($cat as $object) {
      $sub_catd = $object->sub_category;
      foreach ($sub_catd as $subcategory) {
        $subcat[] = $subcategory->sub;
      }
    }
    $sc = SeatingChart::where('seller_id', $seller_id)->get();

    return view('seller.manage_event.edit_event')
      ->with(compact(
        'event_data',
        'venues',
        'countries',
        'venue_sch',
        'organizer_name',
        'events',
        'mers',
        'show_evn',
        'show_mer',
        'ticket',
        'venue',
        'tic_prices',
        'var_ticket_prices',
        'ticket',
        'cat',
        'subcat',
        'sc',
      ));
  }



  public function post_editinformation(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'online' => 'sometimes',
      'cIsStream' => 'required_with:online,on',

      /*'cIsStream'=> 'sometimes',
                        'StreamEmbedCode' => 'required_with:cIsStream,yes',*/
      'first_title' => 'required',
      'currency' => 'required',
      'event_type' => 'required',
      'event_genre' => 'required',
      'venue' => 'required',
      'start_date' => 'required',
      'start_time' => 'required',
      'days' => 'required',
      'SaleStart' => 'required',
      'SaleEnd' => 'required',
      'sales_start_date' => 'before_or_equal:EndDate',
      'EndDate' => 'after_or_equal:sales_start_date'

    ]);
    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
      $id = $request->event_id;

      Event::where('id', $id)
        ->update([
          'first_title' => $request->first_title,
          'second_title' => $request->second_title,
          'currency' => $request->currency,
        ]);


      EventType::where('event_id', $id)
        ->update([
          'online' => $request->online,
          'streaming' => $request->cIsStream,
          'embed_code' => $request->StreamEmbedCode,
          'allow_reentry' => $request->cAllowReentry,
          'on_demand' => $request->IsOnDemand,
          'seating_type' => $request->seating,
          'event_type' => $request->event_type,
          'event_genre' => $request->event_genre,
        ]);



 $start_min = ($request->start_time*60)+$request->start_time_min;
  $start_time = Carbon::parse('00:00:00')->addMinutes($start_min);
    $event_time  = date("h:i:s", strtotime($start_time));

      $end_date = Carbon::parse($request->start_date)->addDays($request->days);
      $end_date = date("Y-m-d", strtotime($end_date));
      $minutes = (($request->hours) * 60) + $request->mins;
      $end_time = Carbon::parse($event_time)->addMinutes($minutes);
      $end_time = date("h:i:s", strtotime($end_time));




      EventVenueSchedule::where('event_id', $id)
        ->update([
          'venue_list' => $request->venue,
          'start_date' => $request->start_date,
          'start_time' => $event_time,
          'end_date' => $end_date,
          'end_time' => $end_time,
          'time_zone'=>$request->Timezone,
          'days' => $request->days,
          'hours' => $request->hours,
          'minuts' => $request->mins,
          'show_time' => $request->show_time,
          'show_date' => $request->show_date,
        ]);
      if ($request->SaleStart == "0") {
        $sale_start_date = $request->sales_start_date;
        $sale_start_time = $request->sales_start_time;
      }

      if ($request->SaleStart == "1") {
        $sale_start_date = Carbon::parse($request->start_date)
          ->subDays($request->StartDaysBefor);
        $sale_start_date = date("Y-m-d", strtotime($sale_start_date));
        $minutes = (($request->StartHoursBefor) * 60) + $request->StartMinsBefor;
        $sale_start_time = Carbon::parse($request->start_time)->subMinutes($minutes);
        $sale_start_time = date("h:i:s", strtotime($sale_start_time));
      }

      if ($request->SaleEnd == "0") {
        $sale_end_date = $request->EndDate;
        $sale_end_time = $request->EndTime;
      }
      if ($request->SaleEnd == "1") {
        $sale_end_date = Carbon::parse($request->start_date)
          ->addDays($request->end_days);
        $sale_end_date = date("Y-m-d", strtotime($sale_end_date));
        $minutes = (($request->end_hours) * 60) + $request->end_mins;
        $sale_end_time = Carbon::parse($request->start_time)->addMinutes($minutes);
        $sale_end_time = date("h:i:s", strtotime($sale_end_time));
      }
      if ($request->SaleEnd == "2") {
        $sale_end_date = Carbon::parse($request->start_date)
          ->subDays($request->end_days);
        $sale_end_date = date("Y-m-d", strtotime($sale_end_date));
        $minutes = (($request->end_hours) * 60) + $request->end_mins;
        $sale_end_time = Carbon::parse($request->start_time)->subMinutes($minutes);
        $sale_end_time = date("h:i:s", strtotime($sale_end_time));
      }

      EventSales::where('event_id', $id)
        ->update([
          'start_date' => $sale_start_date,
          'start_time' => $sale_start_time,
          'end_date' => $sale_end_date,
          'end_time' => $sale_end_time,

        ]);

      return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
    }
  }

  public function post_editPolicy(Request $request)
  {
    // dd($request->id);die;
    $validator = Validator::make($request->all(), [
      'return_policy' => 'required',
      'ExchangePolicy' => 'required',
    ]);
    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
      $id = $request->id;

      EventPolicy::where('event_id', $id)->update([
        'return_policy' => $request->return_policy,
        'rp_upto_hours' => $request->ReturnUpToHoursBefore,
        'sc_deduction' => $request->DeductionStoreCredit,
        'cc_deduction' => $request->DeductionCreditCard,
        'exchange_upgrade' => $request->ExchangePolicy,
        'eu_upto_hours' => $request->ExchangeHoursBefore,
        'eu_category' => $request->ExchangeCategories,
      ]);
      return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
    }
  }
  public function post_editFlyer(request $request)
  {

    $validator = Validator::make($request->all(), [
      'flyer' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
      $id = $request->id;

      if ($request->file('flyer')) {
        $flyerPath = $request->file('flyer');
        $flyerName = $flyerPath->getClientOriginalName();
        $flyer_path = $request->file('flyer')->storeAs('uploads', $flyerName, 'public');

        EventFile::where('event_id', $id)->update([
          'flyer_name' => $flyerName,
          'flyer_path' => '/storage/' . $flyer_path,
          'video_id' => $request->video_id,
          'social_media' => $request->media_link,
        ]);
      } elseif ($request->file('picture')) {
        $picturePath = $request->file('picture');
        $pictureName = $picturePath->getClientOriginalName();
        $pic_path = $request->file('picture')->storeAs('uploads', $pictureName, 'public');
        EventFile::where('event_id', $id)->update([
          'picture_name' => $pictureName,
          'picture_path' => '/storage/' . $pic_path,
          'video_id' => $request->video_id,
          'social_media' => $request->media_link,
        ]);
      } else {


        EventFile::where('event_id', $id)->update([
          'video_id' => $request->video_id,
          'social_media' => $request->media_link,
        ]);
      }
      return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
    }
  }
  public function post_editDetailes(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'organizer' => 'required',
        'HasPassword' => 'sometimes',
        'Passwords' => 'required_with:HasPassword,true|max:8',
        'checkGroup' => 'sometimes',
        'GroupId' => 'required_with:checkGroup,true',
        'checkLimit' => 'sometimes',
        'LimitTicketPerUser' => 'required_with:checkLimit,true',

      ]
    );



    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
      $id = $request->id;
      if ($request->eventstates != null) {
        $event_data = implode(',', $request->eventstates);
      } else {
        $event_data = null;
      }

      if ($request->merstates != null) {
        $mer_data = implode(',', $request->merstates);
      } else {
        $mer_data = null;
      }

      if ($request->cat != null) {
        $cat_data = implode(',', $request->cat);
      } else {
        $cat_data = null;
      }

      if ($request->subcat != null) {
        $subcat_data = implode(',', $request->subcat);
      } else {
        $subcat_data = null;
      }

      EventDetails::where('event_id', $id)
        ->update([
          'organizer_id' => $request->organizer,
          'eventshown_id' => $event_data,
          'categories' => $cat_data,
          'sub_categories' => $subcat_data,
          'merchshown_id' => $mer_data,
        ]);

      $event_description = $request->EventDescription;

      if ($event_description != null) {
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($event_description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
          $data = $img->getAttribute('src');
          list($type, $data) = explode(';', $data);
          list($type, $data) = explode(',', $data);
          $data = base64_decode($data);
          $image_name = "/uploads/" . time() . $k . '.png';
          $path = public_path() . $image_name;
          file_put_contents($path, $data);
          $img->removeAttribute('src');
          $img->setAttribute('src', $image_name);
        }
        $event_description = $dom->saveHTML();
      } else {
        $event_description = null;
      }

      // note
      $note = $request->Afterpurchasenotes;
      if ($note != null) {
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($note, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
          $data = $img->getAttribute('src');
          list($type, $data) = explode(';', $data);
          list($type, $data) = explode(',', $data);
          $data = base64_decode($data);
          $image_name = "/uploads/" . time() . $k . '.png';
          $path = public_path() . $image_name;
          file_put_contents($path, $data);
          $img->removeAttribute('src');
          $img->setAttribute('src', $image_name);
        }
        $note = $dom->saveHTML();
      } else {
        $note = null;
      }



      EventDetails::where('event_id', $id)
        ->update([
          'purchase_notes' => $note,
          'event_descriptions' => $event_description,
        ]);

      if ($request->TicketsBtnText != null) {
        $ticket = $request->TicketsBtnText;
      } else {
        $ticket = "Tickets";
      }
      EventDetails::where('event_id', $id)
        ->update([
          'remining_ticket' => $request->Remainingtickets,
          'remining_no' => $request->reminingNo,
          'tax_service' => $request->TaxServiceCharges,
          'price_level' => $request->IndicatingPriceLevel,
          'mark_as' => $request->MarkAs,
          'ticket_btn_text' => $ticket,
        ]);




      EventDetails::where('event_id', $id)
        ->update([
          'check_group' => $request->checkGroup,
          'group_name' => $request->GroupId,
          'check_password' => $request->HasPassword,
          'ticket_passworsd' => implode(',', $request->Passwords),
          'check_limit' => $request->checkLimit,
          'limit' => $request->LimitTicketPerUser,
        ]);

      return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
    }
  }

  public function Edit_PostPaymentMethod(Request $request)
  {
if ($request->BankTransfer == "on") {
      $validator = Validator::make($request->all(), [
        'AccountHolderName' => 'required',
        'AccountHoldingBranch' => 'required',
      
        'AccountNumber' => 'required',
        'Re-enterAccountNumber' => 'required_with:AccountNumber|same:AccountNumber',
        'IFSC' => 'required',
      ]);
    }
    if ($request->PayPal == "on") {
      $validator = Validator::make($request->all(), [
        'PayPalId' => 'required',
      ]);
    }


    if (!$validator->passes()) {
      return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {

$id= $request->id;
 

      try {
        EventPaymentMethod::where('event_id', $id)
        ->update([
                  'holder_name'=>$request->AccountHolderName,
          'branch'=>$request->AccountHoldingBranch,
          'account_no'=>$request->AccountNumber,
          'ifsc'=>$request->IFSC,
          'paypal_id'=>$request->PayPalId,
         ]);

     
        return response()->json(['status' => 1, 'msg' => 'Updated successfull..!']);
      } catch (\Exception $e) {
        return response()->json(['error' => $e,]);
      }
    }
  }

  /*---------------------past events---------------------------------*/
  public function get_PastEvents()
  {

    if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }

    $events = Event::where('seller_id', $seller_id)->get();
    $venues = Venue::where('seller_id', $seller_id)->get();

    return view('seller.past_events', compact('events', 'venues'));
  }


  public function eventDelete($id)
  {
    $event = Event::findOrfail($id);
    $event->delete();
    return redirect()->back()->with('message', 'Event deleted Successfully...!');
  }

  public function displayImage($filename)

  {

    $path = storage::disk('public')->path("uploads/$filename");

    if (!File::exists($path)) {
      abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
  }

  /*publish*/

  public function EventPublish(Request $request)
  {

// $event_id=Session::get('e_id');
        if (Auth::check()) {
      $uid = Auth::id();
      $seller_id = Seller::where('user_id', $uid)->first()->id;
    } else {
      return redirect()->route('seller.login');
    }
$event_data = Event::where('seller_id', $seller_id)->latest('id')->first();
      $event_id = $event_data->id;


$policy=EventPolicy::where('event_id',$event_id)->first();
if($policy == null) 
{
return redirect()->back()->with('error','Delivery And Returns Form Not Save..!');
}
$flyer=EventFile::where('event_id',$event_id)->first();
if($flyer == null) 
{
return redirect()->back()->with('error','Picture And Video Form Not Save..!');
}
 $details=EventDetails::where('event_id',$event_id)->first();
 if($details == null) 
{
return redirect()->back()->with('error','Details Form Not Save..!');
}
 $pay=EventPaymentMethod::where('event_id',$event_id)->first();
  if($pay == null) 
{
return redirect()->back()->with('error','Payment Method Form Not Save..!');
}


Event::where('id', $event_id)->update([
          'publish' => $request->Publish,]);

 
return redirect()->back()->with('success','Event Published Successfully..!');
  }
}
