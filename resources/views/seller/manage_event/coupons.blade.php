@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all and (max-width:720px){
.button-refresh{

margin-left: 92px!important;
}
.wordpromotion{
margin-left: 33px;
width: 95%;
padding-left: 2px!important;
}
.button-nodata{
padding-left: 35px!important;
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
        <!--  <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    
                  </ol>
                </div>
              </div>
            </div>
          </section> -->
      
          <!-- Main content -->
          <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">My Promotion Codes & Coupons</h3>
            </div>
            @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

            
        </div>
       <br>
     



        <div class="button" style="padding-left: 50px;">
          <!-- <a href="promotion" id="newpromo" class="btn btn-dark btn-sm active" role="button" aria-pressed="true">New Promotion</a> -->
          <button type="button" id="newpromo"  class="btn btn-dark btn-sm active"  >
          New Promotion
        </button>
        </div>
       <br>
  
       
             
    
<!-- ========================================data table===================== -->
     <div class="card-body">
        <table id="coupone_table" class="table table-bordered table-striped">
            <thead>
              <tr>
               <th></th>
                <th>Promotion Code</th>
                <!-- <th>Event</th> -->
                <!-- <th>Promotion Type</th> -->
            <!--     <th>Effective Date/Time</th>
                <th>Expire Date/Time</th> -->
                <th>Min Purchase Price</th>
                <th>Max Purchase Price</th>
                <th>Min Ticket Price</th>
                <th>Max Ticket Price</th>
                <th>Min No. Ticket </th>
                <th>Max No. Ticket </th>
                <th>Max No. Usage</th>
                <th>Actions</th>
              </tr>
              </thead>    
        </table>
     </div>
<!-- ========================================end data table===================== -->
    
  </div>    
</div>

  
   @include('layouts.seller_footer')
 
   </div>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:115%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Promotion Code or Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- form -->
<form id="PromoForm">        
                 
   <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>     

<input type="hidden" id="id" name="id" value="">

<div class="row"style="padding-left:30px;">
<span id="ctl00_CPMain_Label2" class="editLabel" style="font-size: larger;">Event:</span>

<select name="event" id="event"  class="form-control" onchange="promoevent(this.value)" style="width:260px;margin-left: 10px;">
<option value="0">All events</option>
<option value="1">Specific Category</option>
<option value="2">Specific Package</option>

@foreach($events as $event)
<option value="{{$event->first_title}}">{{$event->first_title}}</option>
@endforeach

</select>
<span class="text-danger error-text event_error"></span>
  </div><br>
  <div class="row cEventCatRow promotion-event" style="display: none;padding-left:30px;margin-top:0px;margin-bottom:20px">
      <span id="ctl00_CPMain_Label15" class="editLabel">Event category:</span>

      <input name="EventCat" type="text" maxlength="200" id="ctl00_CPMain_cEventCat" class="form-control" data-validation-required="1" style="width:200px;margin-left: 10px;">

    <!--   <a target="_blank" data-href="/ajevents/upcomingevents?cat=" id="cPriviewCat" href="#">Preview&nbsp;<sup><i class="fa fa-external-link"></i></sup></a> -->
  </div> 
           <div class="row cPackageRow promotion-event2" style="display: none;padding-left:30px;margin-top:0px;margin-bottom:20px">
                <span id="ctl00_CPMain_Label27" class="editLabel">Package:</span>
                <input name="Package" type="text" maxlength="300" id="ctl00_CPMain_cPackage"  class="form-control" data-validation-required="1" style="width:200px;margin-left: 10px;" autocomplete="off">
                
            </div>
            
            <div class="row">
                <span class="editLabel"style="padding-left: 30px;">
                <input id="AppliesToProducts"  type="checkbox" value="on" name="AppliesToProducts"style="margin-left: 10px;">

                <span for="ctl00_CPMain_cAppliesToProducts"style="margin-left: 5px;">Also applies to merchandise in the store online</span>
                </span>
            </div>
            <br>
            <div class="row">
                <span id="ctl00_CPMain_Label1" class="editLabel"style="padding-left: 30px;">Promotion Code:</span>
                <input  class="form-control" name="PromotionCode" type="text" value=""   id="promo_code"   style="width:90px;margin-left: 10px;">
                <span class="text-danger error-text PromotionCode_error"></span>
            </div>
            <br>
            <div class="row">
                <span autocompletetype="Disabled"style="padding-left: 20px;">
                <input id="AutoApply" value="on" type="checkbox" name="AutoApply"style="margin-left: 20px;">
                <span for="ctl00_CPMain_cAutoApply"style="margin-left: 5px;">Automatically apply this coupon on checkout if the conditions meet</span></span>
               
            </div>
            <br>
            <div class="row">
                <span id="ctl00_CPMain_Label4" class="editLabel"style="padding-left: 30px;">Promotion Type:</span>
                <select name="PromotionType" id="PromotionType" class="form-control" onchange="promotype(this.value)" style="width:200px;margin-left: 10px;">
                <option  value="0">Buy one get one free</option>
              <option value="1">Buy two get one free</option>
              <option  value="2">Percent</option>
              <option value="3">Amount Per Invoice</option>
              <option value="4">Amount Per Ticket</option>

              </select>
              <span class="text-danger error-text PromotionType_error"></span>
            </div>
            <br>
      <div class="row cPromotionAmount promotion-type" id="disco" style="display: none;padding-left: 30px;">
          <span id="ctl00_CPMain_Label12" class="editLabel">Discount(Amount or Percentage):</span><input name="DiscAmount" type="text" value="" maxlength="25" id="ctl00_CPMain_cAmount" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:100px;">
            </div> 
            <br>
           
            <h3 class="devider ColTextHighlight"style="color: #007bff;"><i class="fa fa-calendar fa-15x "style="padding-left: 30px;" ></i>&nbsp;&nbsp;Date Ranges:</h3>
<hr>
            <div class="row"style="padding-left: 50px;">
                <span id="ctl00_CPMain_Label7" class="editLabel ">Effective From:</span>
                <input name="eff_Date" type="date" value="" maxlength="10" id="StartDate" class="editText cDatePicker hasDatepicker effective-from" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:200px;margin-left: 10px;">
                <span class="text-danger error-text eff_Date_error"></span>
                <input name="eff_Time" type="time" value="" maxlength="10" id="StartTime" class="cTimePicker hasTimepicker " data-validation-required="1" data-validation-avoid-success-tick="1" style="width:85px; margin-left: 10px;">
                <span class="text-danger error-text eff_Time_error"></span>
            </div><br>
            <div class="row ">
                <span id="ctl00_CPMain_Label9" class="editLabel " style="padding-left: 50px;">Expiration Date:</span>
                <input name="expr_Date" type="date" value="" maxlength="10" id="EndDate" class="editText cDatePicker hasDatepicker expiration-date" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:200px;margin-left: 4px;">
                <span class="text-danger error-text expr_Date_error"></span>
                <input name="expr_Time" type="time" value="" maxlength="10" id="EndTime" class="cTimePicker hasTimepicker time-picker" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:85px; margin-left:10px;">
                <span class="text-danger error-text expr_Time_error"></span>
            </div>
            <br>
            <div class="row">
                <span id="ctl00_CPMain_Label29" class="editLabel "style="padding-left: 50px;">Time Zone:</span>
                <select name="Timezone" id="Timezone" class="form-control" maxlength="80" data-validation-required="1" style="width:391px;margin-left: 10px;">
<option selected="selected" value="India Standard Time">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
<option value="Dateline Standard Time">(UTC-12:00) International Date Line West</option>
<option value="UTC-11">(UTC-11:00) Coordinated Universal Time-11</option>
<option value="Aleutian Standard Time">(UTC-10:00) Aleutian Islands</option>
<option value="Hawaiian Standard Time">(UTC-10:00) Hawaii</option>
<option value="Marquesas Standard Time">(UTC-09:30) Marquesas Islands</option>
<option value="Alaskan Standard Time">(UTC-09:00) Alaska</option>
<option value="UTC-09">(UTC-09:00) Coordinated Universal Time-09</option>
<option value="Pacific Standard Time (Mexico)">(UTC-08:00) Baja California</option>
<option value="UTC-08">(UTC-08:00) Coordinated Universal Time-08</option>
<option value="Pacific Standard Time">(UTC-08:00) Pacific Time (US &amp; Canada)</option>
<option value="US Mountain Standard Time">(UTC-07:00) Arizona</option>



</select>
            </div>
           
            
            <h3 class="devider ColTextHighlight"style="padding-left: 30px;color: #007bff;">
            <i class="fa fa-filter fa-15x "></i>&nbsp;&nbsp;Conditions &amp; Restrictions</h3>
            <hr>
            <p class="hint"style="padding-left: 30px;font-size: small;">* Only set the restrictions that apply to your case.</p>

            <div class="row" id="must_buy" style="display:none;">
                <span class="editLabel"style="padding-left: 30px;">
                <input id="AppliesToProducts"  type="checkbox" value="on" name="must_buy"style="margin-left: 10px;">
                <span for="ctl00_CPMain_cAppliesToProducts"style="margin-left: 5px;">Must buy all the events that this coupon applies to</span>
                </span>
            </div>

          

            <div class="row cMinNumberOfDifferentEventsRow ticket-must" id="tick_least" style="display:none;" >
                <span id="ctl00_CPMain_Label25"style="padding-left: 35px;">Tickets must be for at least</span>&nbsp;&nbsp;

                <input name="MinNumberOfDifferentEvents" type="text" value="" maxlength="2" id="MinNumberOfDifferentEvents" class="form-control" data-validation-required="1" data-validation-number="int" data-validation-number-min="0" style="width:50px;margin-left:5px;height:30px;">
                 <span class="text-danger error-text MinNumberOfDifferentEvents_error"></span>
                &nbsp;&nbsp;

                <span id="ctl00_CPMain_Label26"style="padding-left: px;" class="diff-events">different events</span>
                 
            </div>
     
            <div class="block">
                <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Min purchase $:</span><br>
                <input name="MinPurAmount" type="text" value="" maxlength="25" id="puMinAmount" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
                <span class="text-danger error-text MinPurAmount_error"></span>
                <p class="hint"style="padding-left: 30px;font-size: small;">If the total amount of eligible tickets are less than the specified amount, the coupon won't apply.</p>
            </div><br>
            <div class="block">
              <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Max purchase $:</span><br>
              <input name="MaxPurAmount" type="text" value="" maxlength="25" id="puMaxAmount" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
              <span class="text-danger error-text MaxPurAmount_error"></span>
              <p class="hint"style="padding-left: 30px;font-size: small;">If the purchase amount is higher than the maximum purchase amount, maximum purchase amount will be considered as the purchase amount.</p>
          </div><br>
          <div class="block">
            <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Min ticket $:</span><br>
            <input name="MinTicketPrice" type="text" value=""  id="min_ticket_price" class="form-control"  style="width:60px;margin-left: 30px; height: 30px;">
            <span class="text-danger error-text MinTicketPrice_error"></span>
            <p class="hint"style="padding-left: 30px;font-size: small;">Minimum ticket price that is eligible for this coupon (Including service charge)</p>
        </div><br>
        <div class="block">
          <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Max ticket $:</span><br>
          <input name="MaxTicketPrice" type="text" value="" maxlength="25" id="max_ticket_price" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
          <span class="text-danger error-text MaxTicketPrice_error"></span>
          <p class="hint"style="padding-left: 30px;font-size: small;">Maximum ticket price that is eligible for this coupon (Including service charge)</p>
      </div><br>
      <div class="block">
        <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Min number of tickets:</span><br>
        <input name="min_no" type="text" value="" maxlength="25" id="min_no" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
        <span class="text-danger error-text min_no_error"></span>
        <p class="hint"style="padding-left: 30px;font-size: small;">Minimum number of eligible tickets required for this coupon to apply</p>
    </div><br>
    <div class="block">
      <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Max number of tickets:</span><br>
      <input name="max_no" type="text"  maxlength="25" id="max_no" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
      <span class="text-danger error-text max_no_error"></span>
      <p class="hint"style="padding-left: 30px;font-size: small;">If the eligible number of tickets is greater than the maximum number of tickets, extra tickets will not be qualified for discount.</p>
  </div><br>
  <div class="block">
    <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Max number of usage:</span><br>
    <input name="max_usage" type="text"  maxlength="25" id="max_usage" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:60px;margin-left: 30px; height: 30px;">
    <span class="text-danger error-text max_usage_error"></span>
    <p class="hint"style="padding-left: 30px;font-size: small;">Number of transactions (invoices) this coupon may apply to</p>
</div><br>

<!-- <div class="block">
  <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Minimum purchase amount:</span><br><input name="ctl00$CPMain$cMinAmount" type="text" value="0.00" maxlength="25" id="ctl00_CPMain_cMinAmount" class="editText" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:100px;margin-left: 50px;">
  <p class="hint"style="padding-left: 30px;font-size: small;">If the total amount of eligible tickets are less than the specified amount, the coupon won't apply.</p>
</div> -->

            <!-- <div class="row button-save"style="padding-left: 380px;">
                
                <button  class="btn btn-success" type="submit">Save Promotion</button>
                &nbsp;&nbsp;
            </div> -->




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" id="submit" value="" class="btn btn-success">
        <!-- <button type="submit" class="btn btn-success">Save Promotion</button> -->
      </div>


      </form>
    
 <!-- /form... -->

    </div>
  </div>
</div>
<!-- modal -->

   @endsection
   @section('bottom_scripts')


<script>
   $(document).ready( function () {
    $('#coupone_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,
            
             ajax: '{{ route('seller.coupon.ajax') }}',
             
             columns: [
           { data: 'DT_RowIndex', name: 'DT_RowIndex' },
           { data: 'promo_code', name: 'Promotion Code' },
           // { data: 'event', name: 'Event' },
           // { data: 'promo_type', name: 'Promotion Type' },
           // { data: 'effective', name: 'Effective Date/Time' },
           // { data: 'expire', name: 'Expire Date/Time' },
           { data: 'min_pur_amt', name: 'Min Purchase Price' },
           { data: 'max_pur_amt', name: 'Max Purchase Price' },
           { data: 'min_ticket_price', name: 'Min Ticket Price' },
           { data: 'max_ticket_price', name: 'Max Ticket Price' },
           { data: 'min_no_ticket', name: 'Min No. Ticket' },
           { data: 'max_no_ticket', name: 'Max No. Ticket' },
           { data: 'max_no_usage', name: 'Max No. Usage' },
           // { data: '', name: '' },
          
           { data: 'action', name: 'action', },
                   
        ],
         order: [[1, 'desc']]
         
                 
        });
     });
  </script>





<script>
  promoevent(0);
function promoevent(sel)
{
 
    if (sel=="0"){
   
     $("#must_buy").fadeOut();
    $("#tick_least").fadeIn();
    }

  if (sel=="1"){
   
    $(".promotion-event").fadeIn();
    $("#must_buy").fadeIn();
    $("#tick_least").fadeIn();
    }
    else {
      $(".promotion-event").fadeOut();
    }

    if (sel=="2")
    {

   $(".promotion-event2").fadeIn();
    $("#must_buy").fadeIn();
    $("#tick_least").fadeIn();
   }
   else {
      $(".promotion-event2").fadeOut();
    }
    if(sel !="1" && sel !="2" && sel !="0")
      {
       $("#must_buy").fadeOut();
    $("#tick_least").fadeOut();
    }


 }

  
  function promotype(sel)
  {
    if (sel == "2" || sel == "3" || sel == "4" ){
      $("#disco").fadeIn();
    }
    
    else{
      $("#disco").fadeOut();
    }
  }

$( document ).ready(function() {
  $('#newpromo').click(function(){

    $('.modal').modal('show');
    $('form').trigger("reset");
    
    $('#exampleModalLongTitle').attr("Add");
    $('#submit').val("save");
    
    
  });
      
  $("#PromoForm").submit(function(stay){
    stay.preventDefault();

    var value = $("#submit").attr('value');
    var formdata = $(this).serialize();

    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
   
    
    $.ajax({
          type: 'POST',
          url: "{{route('seller.coupons.post_promotion')}}",
          data: formdata,
          processData:false,
          dataType:'json',
          // contentType:false,
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            if (data.status == 0) {
              $.each(data.error,function(prefix,val)
                {
                  $('span.'+prefix+'_error').text(val[0]);
                });

            }else{
              alert(data.msg);
              $('.modal').modal('hide');
               window.location.reload();
            }



          },
         
    });
 
   });

});
</script>

   @endsection