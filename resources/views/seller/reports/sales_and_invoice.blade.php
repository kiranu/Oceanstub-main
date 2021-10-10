  @extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all and (max-width:720px){

.form-box{
padding-left: 35px!important;
font-size: 14px;
margin-bottom: 10px;
}
.to-box {
padding-left: 53px!important;
font-size: 14px;
margin-bottom: 10px;
}
.refresh-preview{
padding-left: 60px!important;
}
.bottom-nodata{
font-size: 12px;
padding-left: 82px!important;
}
.bottom-bold{
font-size: 10px;
}
}
</style>
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
  <!-- Navbar -->
  @include('layouts.seller_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('layouts.seller_sidebar')
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">
 
      
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">Sales & Invoices</h3>
            </div><br>
            <div class="hideForETicketPrint hideForInvoicePrint"style="padding-left: 0px;margin-right:0px">
                <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all"style="padding-left: 20px;
                        border: 1px solid black;
                        width: 95%;
                        margin: 0 auto;
                        padding-top: 25px;
                        border-radius: 20px;
                        padding-bottom: 25px;
                        min-height: 156px;">
                    <div class="filterrow" style="position:relative;">
                        <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight"style="color: #007bff;font-weight:bold">Filters:</span>
                        </div>
                      
                        <div class="card-body">



                           <?php
                                $today =  Carbon\Carbon::now();
                                 $ago =  Carbon\Carbon::now()->subDays(90);
                                
                                ?>

                         <form method="GET" action="{{route('seller.sales_invoice')}}">       
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">From :</label>
                            <div class="col-sm-9">
                              <input  type="date"
                              value="{{date('Y-m-d', strtotime($ago))}}"  name="FromDate"
                               id="" class="editText cDatePicker cDateView hasDatepicker valid eventstart" style="width:260px;">
                            </div>
                          </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">To :</label>
                              <div class="col-sm-9">
                                <input  type="date" 
                                
                                 value="{{date('Y-m-d', strtotime($today))}}" name="ToDate" 

                                 class="editText cDatePicker cDateView hasDatepicker valid eventstart"  style="width:260px;">
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Buyer :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Type :</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="Type">
                                  <option value="0">All</option>
                                  <option value="1">Sale</option>
                                  <option value="3">Return</option>
                                  <option value="1">Payment</option>
                                </select>
                                 
                              </div>
                            </div>
                           <!--  <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Payment Type :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="6">Cash</option>
                                  <option value="10">Check</option>
                                  <option value="11">Invoiced</option>
                                  <option value="8">Free</option>
                                  <option value="9">Gift Card</option>
                                  <option value="!6">Non-Cash</option>
                                </select>
                              </div>
                            </div>
                            <br>
                            <br> -->
                         <!--    <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Agent :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="-1">No Agent</option>
                                  <option value="-2">Any Agents</option>
                                </select>
                              </div>
                            </div> -->
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Organizer :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="1085713">ARJUN S</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Payment status :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="paid">Fully paid</option>
                                  <option value="unpaid">Unpaid</option>
                                  <!-- <option value="pastdue">Past-due</option> -->
                                </select>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Event :</label>
                              <div class="col-sm-9">
                             <select class="form-control" name="Event" value="">
                              <!-- <option value="0" >All</option > -->
                              @foreach($events as $event)                                                    
                              <option value="{{$event->id}}">{{$event->first_title}}
                                @isset($event->second_title){{$event->second_title}}@endisset
                              ({{date("jS F, Y", strtotime($event->sch_venue->start_date))}} &nbsp; {{date("h:i a", strtotime($event->sch_venue->start_time))}})</option>
                              @endforeach

                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Products :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="password">
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Shipping :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="0">Not Required</option>
                                  <option value="1">Not Shipped Yet</option>
                                  <option value="2">Back Ordered</option>
                                  <option value="3">Shipped</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Will-call :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="0">Not Required</option>
                                  <option value="1">Not Delivered Yet</option>
                                  <option value="3">Delivered</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Promotions :</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>All</option>
                                  <option value="-1">No Promotion</option>
                                  <option value="-2">Any Promotion</option>
                                </select>
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Invoice/Conf. No :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Barcode :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Credit Card No :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="last 4 digit">
                              </div>
                            </div>
                            <br>
                            </div>

                    <div class="filterrow refresh-preview"style="padding-left: 260px;">
                        <input type="submit"  value="Refresh"  class="btn btn-secondary">

                      
                        </div>

                      </form>
                    </div>
                </div>    
<br>
                <div>


	@isset($invoice)
  <div class="card" id="SoldInvoice">
                          
                  
                       
<table class="table ticketstatus  " style="padding-left: 20px;" >
  <thead class="thead-dark ">
    <tr >
      
        <th >Invoice</th>
         <th >Event</th>
        <th >Type</th>
        <th >Date</th>
         <th >Name</th>
         <th>Email</th>
         <th>Service Charge</th>
         <th>Discount</th>
         <th>Promo Code</th>
         <th>Tax</th>
    </tr>
     </thead>
      <tbody >
@foreach($invoice as $data)
    <tr >
        <td>{{$data->id}}</td>
         <td >{{$data->event->first_title}} ({{date("jS F, Y", strtotime($data->event->sch_venue->start_date))}})</td>

        <td>
          @if($data->order->status == "1")
            <p>sale</p>
            @elseif($data->order->status == "3")
            <p>Return</p>
            @endif
        </td>

        <td>
          {{date('Y-m-d H:i a', strtotime($data->order->updated_at))}}
        </td>
       
        <td >
            {{$data->buyer->first_name}}
        </td>

        <td>
            {{$data->buyer->user->email}}
        </td>
        <td>{{$data->ticket->service_charge}}</td>
        <td>{{$data->order->offer_amount}}</td>
        <td>{{$data->order->promo_code}}</td>
         <td>{{$data->ticket->event_ticket->tax}}</td>
     
       
        
    </tr>
    @endforeach
    </tbody>
</table> 
 <?php
          $total_sc = 0;
          $total_dic=0;
          $total_tax=0;
          $total=0;
          foreach($invoice as $data){

          $sc=  $data->ticket->service_charge;

            $total_sc=  $total_sc+$sc;

            $dic =$data->order->offer_amount;
            $total_dic=$total_dic+$dic;

            $tax=$data->ticket->event_ticket->tax;
            $total_tax=$total_tax+$tax;

            $amnt=$data->amount;
            $total=$total+$amnt;
          }
         
          ?>
                       
 <label id="ctl00_CPMain_cTotalServiceCharge" class="rightalign bold bottom-bold"style="padding-left: 30px;">
  Total service charge: ${{$total_sc}}<br>
  Total discount: ${{$total_dic}}<br>
  Total Tax: ${{$total_tax}}<br>
<!--   Total Refund Protection: 0.00<br>
  Total ads fee: 0.00<br>  -->
Total amount: ${{$total}}
</label>                 
 </div>
  @endisset
              </div>
  
            </div>
        </div>    
    </div>
</div>     
@include('layouts.seller_footer')
</div>
@endsection
@section('bottom_scripts')
@endsection