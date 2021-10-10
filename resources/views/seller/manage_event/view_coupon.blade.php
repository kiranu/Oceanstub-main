@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
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
              <h3 class="card-title">Coupon View Page</h3>
            </div>
        </div>
        <table class="table table-striped" style="width: 78%;margin-left: 79px;">
            <thead>
            
            </thead>
            <tbody>
               @if($data_coupon->event_type != "3")
              <tr>
                <td>Event Type</td>
                @if($data_coupon->event_type == "0")
                <td>All Events</td>
                @elseif($data_coupon->event_type == "1")
                <td>Specific Category</td>
                 @elseif($data_coupon->event_type == "2")
                 <td>Specific Package</td>
                 @endif
              </tr>
              @endif
              @if($data_coupon->event_type == "1")
              <tr>
                <td>Event category</td>
                <td>{{$data_coupon->event_category}}</td>
              </tr>
             @endif
             @if($data_coupon->event_type == "2")
              <tr>
                <td>Package</td>
                <td>{{$data_coupon->event_package}}</td>
              </tr>
               @endif
               @if($data_coupon->event_type == "3")
              <tr>
                <td>Event Name</td>
                <td>{{$data_coupon->event_name}}</td>
              </tr>
              @endif
              <tr>
                <td>Applies to merchandise in the store online</td>
                <td>
                  @if($data_coupon->merchandise =="on")
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#4BD37B"/>
                    <path d="M11.5 3.5L6.25 8.9L4.5 7.1L2.75 8.9L6.25 12.5L13.25 5.3L11.5 3.5Z" fill="white"/>
                    </svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 0C6.41775 0 4.87103 0.469192 3.55544 1.34824C2.23985 2.22729 1.21447 3.47672 0.608967 4.93853C0.00346627 6.40034 -0.15496 8.00887 0.153721 9.56072C0.462403 11.1126 1.22433 12.538 2.34315 13.6569C3.46197 14.7757 4.88743 15.5376 6.43928 15.8463C7.99113 16.155 9.59966 15.9965 11.0615 15.391C12.5233 14.7855 13.7727 13.7602 14.6518 12.4446C15.5308 11.129 16 9.58225 16 8C16 6.94942 15.7931 5.90914 15.391 4.93853C14.989 3.96793 14.3997 3.08601 13.6569 2.34315C12.914 1.60028 12.0321 1.011 11.0615 0.608964C10.0909 0.206926 9.05058 0 8 0V0ZM10.168 9.032C10.243 9.10637 10.3025 9.19485 10.3431 9.29234C10.3837 9.38982 10.4046 9.49439 10.4046 9.6C10.4046 9.70561 10.3837 9.81017 10.3431 9.90766C10.3025 10.0051 10.243 10.0936 10.168 10.168C10.0936 10.243 10.0052 10.3025 9.90766 10.3431C9.81018 10.3837 9.70561 10.4046 9.6 10.4046C9.49439 10.4046 9.38983 10.3837 9.29234 10.3431C9.19485 10.3025 9.10637 10.243 9.032 10.168L8 9.128L6.968 10.168C6.89363 10.243 6.80515 10.3025 6.70766 10.3431C6.61018 10.3837 6.50561 10.4046 6.4 10.4046C6.29439 10.4046 6.18983 10.3837 6.09234 10.3431C5.99485 10.3025 5.90637 10.243 5.832 10.168C5.75702 10.0936 5.6975 10.0051 5.65689 9.90766C5.61627 9.81017 5.59536 9.70561 5.59536 9.6C5.59536 9.49439 5.61627 9.38982 5.65689 9.29234C5.6975 9.19485 5.75702 9.10637 5.832 9.032L6.872 8L5.832 6.968C5.68136 6.81736 5.59673 6.61304 5.59673 6.4C5.59673 6.18696 5.68136 5.98264 5.832 5.832C5.98265 5.68136 6.18696 5.59673 6.4 5.59673C6.61304 5.59673 6.81736 5.68136 6.968 5.832L8 6.872L9.032 5.832C9.18264 5.68136 9.38696 5.59673 9.6 5.59673C9.81304 5.59673 10.0174 5.68136 10.168 5.832C10.3186 5.98264 10.4033 6.18696 10.4033 6.4C10.4033 6.61304 10.3186 6.81736 10.168 6.968L9.128 8L10.168 9.032Z" fill="#FF5A79"/>
                    </svg>
                    @endif
                  </td>
              </tr>
              <tr>
                <td>Promotion Code</td>
                <td>{{$data_coupon->promo_code}}</td>
              </tr>
              <tr>
                <td>Automatically apply this coupon on checkout if the conditions meet</td>
                <td>
                  @if($data_coupon->auto_checkout =="on")
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 15.5C12.1421 15.5 15.5 12.1421 15.5 8C15.5 3.85786 12.1421 0.5 8 0.5C3.85786 0.5 0.5 3.85786 0.5 8C0.5 12.1421 3.85786 15.5 8 15.5Z" fill="#4BD37B"/>
                    <path d="M11.5 3.5L6.25 8.9L4.5 7.1L2.75 8.9L6.25 12.5L13.25 5.3L11.5 3.5Z" fill="white"/>
                    </svg>
                    @else

                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 0C6.41775 0 4.87103 0.469192 3.55544 1.34824C2.23985 2.22729 1.21447 3.47672 0.608967 4.93853C0.00346627 6.40034 -0.15496 8.00887 0.153721 9.56072C0.462403 11.1126 1.22433 12.538 2.34315 13.6569C3.46197 14.7757 4.88743 15.5376 6.43928 15.8463C7.99113 16.155 9.59966 15.9965 11.0615 15.391C12.5233 14.7855 13.7727 13.7602 14.6518 12.4446C15.5308 11.129 16 9.58225 16 8C16 6.94942 15.7931 5.90914 15.391 4.93853C14.989 3.96793 14.3997 3.08601 13.6569 2.34315C12.914 1.60028 12.0321 1.011 11.0615 0.608964C10.0909 0.206926 9.05058 0 8 0V0ZM10.168 9.032C10.243 9.10637 10.3025 9.19485 10.3431 9.29234C10.3837 9.38982 10.4046 9.49439 10.4046 9.6C10.4046 9.70561 10.3837 9.81017 10.3431 9.90766C10.3025 10.0051 10.243 10.0936 10.168 10.168C10.0936 10.243 10.0052 10.3025 9.90766 10.3431C9.81018 10.3837 9.70561 10.4046 9.6 10.4046C9.49439 10.4046 9.38983 10.3837 9.29234 10.3431C9.19485 10.3025 9.10637 10.243 9.032 10.168L8 9.128L6.968 10.168C6.89363 10.243 6.80515 10.3025 6.70766 10.3431C6.61018 10.3837 6.50561 10.4046 6.4 10.4046C6.29439 10.4046 6.18983 10.3837 6.09234 10.3431C5.99485 10.3025 5.90637 10.243 5.832 10.168C5.75702 10.0936 5.6975 10.0051 5.65689 9.90766C5.61627 9.81017 5.59536 9.70561 5.59536 9.6C5.59536 9.49439 5.61627 9.38982 5.65689 9.29234C5.6975 9.19485 5.75702 9.10637 5.832 9.032L6.872 8L5.832 6.968C5.68136 6.81736 5.59673 6.61304 5.59673 6.4C5.59673 6.18696 5.68136 5.98264 5.832 5.832C5.98265 5.68136 6.18696 5.59673 6.4 5.59673C6.61304 5.59673 6.81736 5.68136 6.968 5.832L8 6.872L9.032 5.832C9.18264 5.68136 9.38696 5.59673 9.6 5.59673C9.81304 5.59673 10.0174 5.68136 10.168 5.832C10.3186 5.98264 10.4033 6.18696 10.4033 6.4C10.4033 6.61304 10.3186 6.81736 10.168 6.968L9.128 8L10.168 9.032Z" fill="#FF5A79"/>
                    </svg>
                    @endif
                  </td>
              </tr>
              <tr>
                <td>Promotion Type</td>
                @if($data_coupon->promo_type =="0")
                <td>Buy one get one free</td>
                @elseif($data_coupon->promo_type =="1")
                <td>Buy two get one free</td>
                @elseif($data_coupon->promo_type =="2")
                <td>Percent</td>
                @elseif($data_coupon->promo_type =="3")
                <td>Amount Per Invoice</td>
                @elseif($data_coupon->promo_type =="4")
                <td>Amount Per Ticket</td>
                @endif

              </tr>
              @if($data_coupon->promo_type !="0" && $data_coupon->promo_type !="1")
                <tr>
                <td>Discount(Amount or Percentage)</td>
                <td>{{$data_coupon->discount}}</td>
              </tr>
              @endif
                <tr>


                <td>Effective From</td>
                <td>{{date("jS F, Y", strtotime($data_coupon->effective_date))}} <br> 
                  {{date("H:i a", strtotime($data_coupon->effective_time))}}</td>
              </tr>

             <!--  <tr>
                <td>Effective From</td>
                <td>22-05-2021,11:36 Am</td>
              </tr> -->
              <tr>
                <td>Expiration Date</td>
                <td>{{date("jS F, Y", strtotime($data_coupon->expire_date))}} <br> 
                  {{date("H:i a", strtotime($data_coupon->expire_time))}}</td>
              </tr>
        
               @isset($data_coupon->timezone)
              <tr>
                <td>Time Zone</td>
                <td>{{$data_coupon->timezone}}</td>
              </tr>
              @endisset
              <tr>
                <td>Must buy all the events that this coupon </td>
                <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8 0C6.41775 0 4.87103 0.469192 3.55544 1.34824C2.23985 2.22729 1.21447 3.47672 0.608967 4.93853C0.00346627 6.40034 -0.15496 8.00887 0.153721 9.56072C0.462403 11.1126 1.22433 12.538 2.34315 13.6569C3.46197 14.7757 4.88743 15.5376 6.43928 15.8463C7.99113 16.155 9.59966 15.9965 11.0615 15.391C12.5233 14.7855 13.7727 13.7602 14.6518 12.4446C15.5308 11.129 16 9.58225 16 8C16 6.94942 15.7931 5.90914 15.391 4.93853C14.989 3.96793 14.3997 3.08601 13.6569 2.34315C12.914 1.60028 12.0321 1.011 11.0615 0.608964C10.0909 0.206926 9.05058 0 8 0V0ZM10.168 9.032C10.243 9.10637 10.3025 9.19485 10.3431 9.29234C10.3837 9.38982 10.4046 9.49439 10.4046 9.6C10.4046 9.70561 10.3837 9.81017 10.3431 9.90766C10.3025 10.0051 10.243 10.0936 10.168 10.168C10.0936 10.243 10.0052 10.3025 9.90766 10.3431C9.81018 10.3837 9.70561 10.4046 9.6 10.4046C9.49439 10.4046 9.38983 10.3837 9.29234 10.3431C9.19485 10.3025 9.10637 10.243 9.032 10.168L8 9.128L6.968 10.168C6.89363 10.243 6.80515 10.3025 6.70766 10.3431C6.61018 10.3837 6.50561 10.4046 6.4 10.4046C6.29439 10.4046 6.18983 10.3837 6.09234 10.3431C5.99485 10.3025 5.90637 10.243 5.832 10.168C5.75702 10.0936 5.6975 10.0051 5.65689 9.90766C5.61627 9.81017 5.59536 9.70561 5.59536 9.6C5.59536 9.49439 5.61627 9.38982 5.65689 9.29234C5.6975 9.19485 5.75702 9.10637 5.832 9.032L6.872 8L5.832 6.968C5.68136 6.81736 5.59673 6.61304 5.59673 6.4C5.59673 6.18696 5.68136 5.98264 5.832 5.832C5.98265 5.68136 6.18696 5.59673 6.4 5.59673C6.61304 5.59673 6.81736 5.68136 6.968 5.832L8 6.872L9.032 5.832C9.18264 5.68136 9.38696 5.59673 9.6 5.59673C9.81304 5.59673 10.0174 5.68136 10.168 5.832C10.3186 5.98264 10.4033 6.18696 10.4033 6.4C10.4033 6.61304 10.3186 6.81736 10.168 6.968L9.128 8L10.168 9.032Z" fill="#FF5A79"/>
                    </svg></td>
              </tr>
              
               @isset($data_coupon->event_count)
              <tr>
                <td>Tickets must be for at least different events</td>
                <td>{{$data_coupon->event_count}}</td>
              </tr>
              @endisset
               @isset($data_coupon->min_pur_amt)
              <tr>
                <td>Min purchase $</td>
                <td>{{$data_coupon->min_pur_amt}}$</td>
              </tr>
              @endisset
               @isset($data_coupon->max_pur_amt)
              <tr>
                <td>Max purchase $</td>
                <td>{{$data_coupon->max_pur_amt}}$</td>
              </tr>
              @endisset
               @isset($data_coupon->min_ticket_price)
              <tr>
                <td>Min ticket $</td>
                <td>{{$data_coupon->min_ticket_price}}$</td>
              </tr>
              @endisset
               @isset($data_coupon->max_ticket_price)
               <tr>
                <td>Max ticket $</td>
                <td>{{$data_coupon->max_ticket_price}}$</td>
              </tr>
              @endisset
               @isset($data_coupon->min_no_ticket)
              <tr>
                <td>Min number of tickets</td>
                <td>{{$data_coupon->min_no_ticket}}</td>
              </tr>
              @endisset
               @isset($data_coupon->max_no_ticket)
               <tr>
                <td>Min number of tickets</td>
                <td>{{$data_coupon->max_no_ticket}}</td>
              </tr>
              @endisset
              @isset($data_coupon->max_no_usage)
              <tr>
                <td>Max number of usage</td>
                <td>{{$data_coupon->max_no_usage}}</td>
              </tr>
              @endisset
            </tbody>
          </table>
          <div class="edit-button" style="float: right;margin-right: 27%;">
              <a onclick="edit({{$data_coupon->id}})" class='fas fa-edit' style="font-size:14px;color:#008DFF;margin-right: 10px">Edit</a>

           <a 
            onclick="deletecode({{$data_coupon->id}});" class='fas fa-trash' style="font-size:14px;color:red;margin-right: 10px">Delete</a>

          </div>

   
      </div>
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
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

      <input name="EventCat" type="text" maxlength="200" id="EventCat" class="form-control" data-validation-required="1" style="width:200px;margin-left: 10px;">

    <!--   <a target="_blank" data-href="/ajevents/upcomingevents?cat=" id="cPriviewCat" href="#">Preview&nbsp;<sup><i class="fa fa-external-link"></i></sup></a> -->
  </div> 
           <div class="row cPackageRow promotion-event2" style="display: none;padding-left:30px;margin-top:0px;margin-bottom:20px">
                <span id="ctl00_CPMain_Label27" class="editLabel">Package:</span>
                <input name="Package" type="text" maxlength="300" 
                id="EventPack"  class="form-control"
                 data-validation-required="1" style="width:200px;margin-left: 10px;" autocomplete="off">
                
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
          <span id="ctl00_CPMain_Label12" class="editLabel">Discount(Amount or Percentage):</span>
          <input name="DiscAmount" type="text" value="" maxlength="25" id="DiscoAmount" class="form-control" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" style="width:100px;">
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

                <input name="MinNumberOfDifferentEvents" type="text" value="" maxlength="2" id="MinNumberOfDifferentEvents" class="form-control" data-validation-required="1" data-validation-number="int" data-validation-number-min="0" style="width:50px;margin-left: 5px;    height: 30px;">&nbsp;&nbsp;
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



</script>




<script>
  function edit(id)
{
  

     $.ajax({
          type: 'GET',
          url:"{{route('seller.coupons.editgetpromotion')}}",
         data: 'id='+id,
                   
         success: function (data)
            {
                 $('#id').val(data.data.id);
              $('.modal').modal('show');    
                var merchandise = data.data.merchandise;
                var autoapply = data.data.auto_checkout;
                
                if(data.data.event_type !="3"){
                  $('#event').val(data.data.event_type).attr('selected', true);
                   promoevent(data.data.event_type);

                  }
                  else{
                    $('#event').val(data.data.event_name).attr('selected', true);
                  }

                  if(data.data.event_type =="1"){
                    $('#EventCat').val(data.data.event_category);
                  }
                    if(data.data.event_type =="2"){
                      $('#EventPack').val(data.data.event_package);

                    }




               if(merchandise == "on"){
                $("#AppliesToProducts").prop('checked', true);
            }else{
                $("#AppliesToProducts").prop('checked', false);
            }

              $('#promo_code').val(data.data.promo_code);
              // $('#AutoApply').val(data.data.auto_checkout);
              if(autoapply == "on"){
                $("#AutoApply").prop('checked', true);
            }else{
                $("#AutoApply").prop('checked', false);
            }

              $('#PromotionType').val(data.data.promo_type);
              if(data.data.promo_type !="0"||data.data.promo_type !="1")
              {
                promotype(data.data.promo_type);
                $('#DiscoAmount').val(data.data.discount);
              }
              $('#StartDate').val(data.data.effective_date);
              $('#StartTime').val(data.data.effective_time);
              $('#EndDate').val(data.data.expire_date);
              $('#EndTime').val(data.data.expire_time);
              $('#Timezone').val(data.data.timezone);
              $('#MinNumberOfDifferentEvents').val(data.data.event_count);
              $('#puMinAmount').val(data.data.min_pur_amt);
              $('#puMaxAmount').val(data.data.max_pur_amt);
              $('#min_ticket_price').val(data.data.min_ticket_price);
              $('#max_ticket_price').val(data.data.max_ticket_price);
              $('#min_no').val(data.data.min_no_ticket);
              $('#max_no').val(data.data.max_no_ticket);
              $('#max_usage').val(data.data.max_no_usage);
              
              $('#submit').val("save changes");
             },
    });
}

</script>
<script>
$( document ).ready(function() { 

  $("#PromoForm").submit(function(stay){
    stay.preventDefault();
    var formdata = $(this).serialize();
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
      type: 'POST',
          url:"{{route('seller.coupons.editpostpromotion')}}",
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

            }
            else{
              alert(data.msg);
              $('.modal').modal('hide');
               window.location.reload();
            }
          },
    });
  });
});    
</script>
<script>
function deletecode(id)
{
  
  // return confirm('Are you sure want to remove the Coupon?');
  
  $.ajax({
          type: 'GET',
          url:"{{route('seller.delete.promotion')}}",
         data: 'id='+id,
                   
         success: function (data)
            {
               
              alert("deleted ")
               window.location.href ="{{route('coupon')}}"
            }
  });
}
</script>
@endsection