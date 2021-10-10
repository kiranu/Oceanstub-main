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
          /*-----------------------------------------------------------------------------*/
                .LayoutFullWidthCenter .modulebody {
                margin-left: 120px;
                margin-right: 120px;
                }
                .eventInfo {
                padding-bottom: 20px;
                border-bottom: 1px solid #aaa;
                margin-bottom: 20px;
                -webkit-box-shadow: 0 1px 0 0 #d1d1d1;
                box-shadow: 0 1px 0 0 #ccc;
                margin: 0 auto;
                }
                .eventInfo .eventBasicInfo {
                padding: 0 30px 0 0;
                float: left;
                width: 90%;
                box-sizing: border-box;
                }
                .eventCalendarFull {
                width: 60px;
                margin-left: 10px;
                float: left;
                }
                .eventCalendarFull>div {
                border: 1px solid #c1c1c1;
                text-align: center;
                font-size: 13px;
                }
                .ui-widget-header {
                border: 1px solid #a3a3a3;
                background: #333333 url(images/ui-bg_diagonals-thick_8_333333_40x40.png) 50% 50% repeat;
                color: #eeeeee;
                font-weight: bold;
                }
                .eventCalendarFull .year {
                font-size: 9px;
                text-align: center;
                font-weight: bold;
                }
                .eventCalendarFull div.bottom {
                border-bottom-width: 3px;
                border-top-width: 0;
                }
                .eventCalendarFull div.bottom .day {
                height: 13px;
                line-height: 30px;
                font-size: 24px;
                font-weight: bold;
                }
                .eventCalendarFull div.bottom .dayOfWeek {
                font-size: 12px;
                font-weight: bold;
                }
                .eventCalendarFull .time {
                text-align: center;
                margin: 4px 0;
                }
                .eventInfo .eventBasicInfo .eventBasicInfoInner {
                margin-left: 90px;
                }
                .eventInfo .eventBasicInfo .eventLocation {
                line-height: 30px;
                clear: both;
                min-height: 80px;
                }
                .eventInfo .eventSecInfo {
                width: 50%;
                float: right;
                text-align: right;
                max-width: 95%;
                }
                .cDropDownMenu>div:hover {
                opacity: 1;
                }
                .add-to-calendar.cDropDownMenu>div>i {
                float: none;
                }
                .ColTextHighlight, .ui-widget-content .ColTextHighlight {
                color: #1287c0;
                }
                .addeventatc{
                float: right;
                position: absolute;
                right: 0px;
                top: 20px;
                z-index: 1;
                }
                .ui-widget-content a {
                color: #222222;
                }
                .Module td, .Module th {
                padding-left: 10px;
                padding-right: 11px;
                padding-top: 11px;
                padding-bottom: 10px;
                text-align: center;
                }
                table.cGALevels th, table.cGALevels td {
                    text-align: left;
                }
                
            
</style>


<!-- sc -->
<link rel="stylesheet" href="{{ asset('assets/seller/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('assets/seller/seatingchart/sales-preview-seating-chart.css') }} ">
<style >
   .priceVariationTR {    
   display: table-row;
   vertical-align: inherit;
   border-color: inherit;
   }
   .cPriceVariationTrColor {
   display: inline-block;
   width: 15px;
   height: 15px;
   border-radius: 15px;
   margin-right: 10px;
   margin-top: 2px;
   vertical-align: top;
   }
   .dot_tr {
   border-bottom: 1px dotted;
   }
   .pricetype_td{
   margin: -20px 0px -6px 21px;}
   .fa-hover {
   margin-right: 10px;
   transition: transform .2s ease 0s;
   opacity: .7;
   }
   .bottom-bor {
   border-right: 1px solid;
   border-left: 1px solid;
   border-top: 1px solid;
   border-bottom: 2px dotted;
   border-bottom-color: #0056b3;
   }
   .ad_varition {
   border-top: 1px solid;
   border-left: 1px solid;
   border-right: 1px solid;
   border-bottom: 1px solid;
   }
</style>
<style>
   .guide {
   border: 1px dotted;
   padding: 5px;
   margin: 10px 0;
   border-radius: 5px;
   display: inline-block;
   }
   .clearfix {
   display: block;
   }
   .seat{
   border: solid 1px #aaa;
   overflow: hidden;
   display: inline-block;
   float: left;
   background-color: #ff3818;
   }
   .seat{
   width: 20px;
   height: 20px;
   margin-left: 1px;
   margin-right: 1px;
   margin: 2px 10px 5px 5px;
   }
   .sold {
   border-color: red;
   text-decoration: line-through;
   color: red;
   opacity: .5;
   background-color: #ddd;
   }
   .block1{
   border-color: #d4fb00;
   text-decoration: line-through;
   color: red;
   opacity: .3;
   background-color: #ddd;
   }
   .reserved{
   background: #751739;
   color: #fff;
   }
   .handicap{
   color: #9c4336;
   background: linear-gradient(135deg,rgba(0,24,242,1) 0%,rgba(0,24,242,1) 25%,rgba(255,255,255,1) 26%,rgba(255,255,255,1) 50%,rgba(0,24,242,1) 51%,rgba(0,24,242,1) 76%,rgba(255,255,255,1) 76%,rgba(0,24,242,1) 76%,rgba(255,255,255,1) 77%,rgba(255,255,255,1) 100%);
   background-color: #0018f2;
   border-color: blue;
   }
</style>
<!-- /sc -->
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
         <!-- Content Header (Page header) -->
           
            <!-- Main content -->
      
            <div class="card card-info" >
                <div class="card-header" style="background-color: #007bff;">
                    <h3 class="card-title">Find Ticket</h3>
                </div>
            </div>
@if(isset($venue_sch) && isset($event))
             <div class="modulebody ui-widget-content ui-corner-bottom findTicketModule ">
                <div class="eventInfo clearfix">
                    <div class="eventBasicInfo" style="position: relative;">
                        <div class="eventCalendarFull" aria-label="Saturday, May 22, 2021 8:00:00 PM">
                            <div class="ui-widget-header" aria-hidden="true">
                              {{date("F", strtotime($venue_sch->start_date))}}<span class="year">,
                                {{date(" Y", strtotime($venue_sch->start_date))}}</span></div>
                            <div class="bottom" aria-hidden="true">
                                <p class="day">{{date("j ", strtotime($venue_sch->start_date))}}</p>
                                <p class="dayOfWeek">{{date("D", strtotime($venue_sch->start_date))}}</p>
                            </div>
                            <p class="time" aria-hidden="true">{{date("H:i a", strtotime($venue_sch->start_time))}}</p>
                        </div>
                        <div class="eventBasicInfoInner">
                            <h1 class="eventName" style="font-size: 20px;">

                                <a href="" class="showMoreInfo"  data-toggle="modal" data-target="#exampleModalCentertable">
                                    {{$event->first_title}}<br>
                              @if($event->second_title != null)
                              <span class="farsiText">{{$event->second_title}}</span>
                              @else
                              <span class="farsiText"></span>
                               @endif
                            </a>
                        </h1>
                            <br>
                            <div class="row">
                                <time datetime="2021-05-22T20:00:00.0000000">
                                From&nbsp;:&nbsp;{{date("l", strtotime($venue_sch->start_date))}} &nbsp;
                                {{date("jS F, Y", strtotime($venue_sch->start_date))}} - 
                                 {{date("H:i a", strtotime($venue_sch->start_time))}} 


                                <br>to&nbsp;:&nbsp;{{date("l", strtotime($venue_sch->end_date))}} &nbsp;
                                 {{date("jS F, Y", strtotime($venue_sch->end_date))}} - 
                                  {{date("H:i a", strtotime($venue_sch->end_time))}} 
                                <sub>(local time)</sub>
                                </time>
                                <br>
                            </div>
                            <div class="row eventLocation">
                                <a href="javascript:void(0)" rel="nofollow" title="Unspecified address">
                                <i class="fa  fa-15x fa-hover"></i>&nbsp;&nbsp;
                                @isset($venue->name)
                                <span class="cEventLocaltion">@&nbsp;<span>{{$venue->name}}</span>&nbsp;-<span> {{$venue->region}}</span></span><br>
                                <span class="venueAddress">
                                <span>{{$venue->street}},</span>
                                <span>{{$venue->city}},</span>
                                <span>{{$venue->state}},</span>
                                <span>{{$venue->zip_code}},</span>
                                <span>{{$venue->country}}</span>
                                @endisset
                                </span>
                                </a>
                            </div>
                        </div>
                     <!--    <div class="cAddToCalendar " style="padding-bottom:50px;">
                            <div id="cEventAddToCalendar" class="add-to-calendar cAutoDropDown cDropDownMenu" style="padding-top: 15px; height: 22px;">
                                <div class="clearfix ColTextHighlight addeventatc" >
                                    <i class="fa fa-calendar-plus-o  fa-15x fa-hover "></i>&nbsp; Add to Calendar
                                    <ul class="ui-widget-content ui-corner-all" style="list-style: none;">
                                        <li><a class="icon-google" title="Add to Google calendar" target="_blank" href="">
                                            <i class="fa fa-plus"></i> Google Calendar</a>
                                        </li>
                                        <li><a class="icon-yahoo" title="Add to Yahoo calendar" target="_blank" href="">
                                            <i class="fa fa-plus"></i> Yahoo! Calendar</a>
                                        </li>
                                        <li><a class="icon-ical" title="Add to iCal calendar" target="_blank" href="">
                                            <i class="fa fa-plus"></i> iCal Calendar</a>
                                        </li>
                                        <li><a class="icon-outlook" title="Add to Outlook calendar" target="_blank" href="">
                                            <i class="fa fa-plus"></i> Outlook Calendar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCentertable" style="margin-left:20px;color: white;" href="">More Information</a>
                        </div>


                     <div class="row ticket-upload"style="padding-left:20px;display:inline-block;padding-top:40px;">

                        <img id="FlyerPreview" src="https://ticketor.net/usercontent/0/evt/0.gif" style="border-width:1px;border-style:solid;border-radius: 20px;width: 200px;">

                      </div>



                    </div>
                </div>
                <br>
<!-- startr sc -->

 <div class="card-body">
                          
                        
                        
                        <!-- end other tiket booking option -->
                           <p style="color:#007bff;font-size:18px;">Click on a Section / Row/ Seat or Table to add / update tickets</p>
                           <div class="card-body">
                              <div class=" col-md-6" >
                                 <!--  -->
                                 <div class="guide">

                                    @isset($ticket_prices)
                                     @foreach($ticket_prices as $price)
                                    <div class="clearfix">
                                       <div class="seat " style="background-color:<?=$price->color ?>;"></div>
                                       <span class="seatTitle"> ${{$price->face_price}} - {{$price->name}} <sub>({{$price->description}})</sub></span>
                                    </div>
                                    @isset($var_ticket_prices)
                                      @foreach($var_ticket_prices as $var_price)
                                      @if($var_price->parent_id == $price->id)
                                    <div class="clearfix" style="padding-left: 27px;">
                                       <div class="seat " style="background-color:<?=$var_price->color ?>;"></div>
                                       <span class="seatTitle"> ${{$var_price->face_price}} - {{$var_price->name}} <sub>({{$var_price->description}})</sub></span>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endisset
                                   @endforeach
                                @endisset

                                    <div class="clearfix">
                                       <div class="seat" style="background-color: #ddd;"></div>
                                       <span class="seatTitle">Not available</span>
                                    </div>
                                    <div class="clearfix">
                                       <div class="seat sold" style="background-color: #ddd;"></div>
                                       <span class="seatTitle">Sold</span>
                                    </div>
                                    <div class="clearfix">
                                       <div class="seat block1"></div>
                                       <span class="seatTitle">Blocked</span>
                                    </div>
                                    <div class="clearfix">
                                       <div class="seat reserved"></div>
                                       <span class="seatTitle">In your shopping cart</span>
                                    </div>
                                    <div class="clearfix">
                                       <div class="seat handicap"></div>
                                       <span class="seatTitle">Accessible (Wheelchair or companion)</span>
                                    </div>
                                    <br>
                                    <div class="guideStats"> Capacity: 138<br> Available: 138<br> Sold: 0</div>
                                 </div>
                                 <!--  -->
                              </div>
                           </div>
                         <!-- seating chart -->


                         <textarea style="display:none" id="sketchpaddata">@isset($ScAss->sc_assigned_data){{$ScAss->sc_assigned_data}}@endisset</textarea>
                           <div class="card-body pb-0" style="
                              background: #ddd">
                                <div  id="playground"></div>
                                <div class="individual-seat-details-for-table-with-seats tooltips">
                                    <p class="rowname-tooltip mt-0 mb-0"></p>
                                    <p class="seatno mt-0 mb-0"></p>
                                    <p class="avaliability mt-0 mb-0">cc</p>
                                </div>
                           </div>
                            <!-- end seating chart -->
                           <!-- cardinfo -->
                           <br>
                           <div >
                              <h6 class="card-title " style="text-align:center;background-color: #fff7d3;
                                 border: 1px solid #f6e595;
                                 color: #000;padding: 3px;
                                 margin: 5px auto;
                                 text-align: center;
                                 -moz-border-radius: 5px;
                                 -webkit-border-radius: 5px;
                                 width: 100%;">Capacity: 138, Available: 138, Sold: 0</h6>
                           </div>
                           <!-- card nfo -->
                           <!-- seating chart -->















             <!--    <div class="row" style="padding-left:20px">
                    <p></p>
                    <table class="table"  style="padding-left: 20px;margin-right: 20px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 140px;">Ticket type</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">I need</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">
                                    <div class="cLevelDesc cPriceLevel">
                                        <p class="cLevelPrice" style="    line-height: 0px;padding-top: 10px;"><b>INR ₹0.03</b> </p>
                                        <p class="cLevelSectio" style="    line-height: 0px;">zdcxv</p>
                                        <p class="cLevelDescription" style="    line-height: 0px;">dbgdg</p>
                                        <br>

                                        <p class="cLevelAvail ColTextHighlight" style="    width: 250px;"><i class="fa fa-hourglass-half fa-15x "></i>&nbsp;&nbsp;Sale will end in <span class="cTickingTimer" data-remaining="99893">1 days and 3:36:53</span></p>
                                        <p>

                                            
                                        </p>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <label>
                                        <select aria-describedby="pl32757740-e336-4eb2-9f37-023401050540_0" class="editText form-control" data-ga="FindTicketFromList_PickNumber" data-groupid="32757740-e336-4eb2-9f37-023401050540" data-variationindex="0">
                                            <option selected="selected">0</option>
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row1" style="text-align:right;">
                        <button id="" class="btn btn-dark" data-ga="FindTicketFromList_FindTickets">Add to Cart</button>
                    </div>
                    <br>
                </div> -->
                
            </div>
            @else
            <p>no tickets found....</p>
            @endif
        </div>
      
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCentertable" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
 @if(isset($venue_sch) && isset($event) && isset($venue) && isset($policy))
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$event->first_title}} &nbsp;</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="modulebody ui-widget-content ui-corner-bottom findTicketModule ">
                        <div class="eventInfo clearfix">
                            <div class="eventBasicInfo" style="position: relative;">
                                <div class="eventCalendarFull" aria-label="Saturday, May 22, 2021 8:00:00 PM">
                             
                                    <div class="ui-widget-header" aria-hidden="true">{{date("F", strtotime($venue_sch->start_date))}}<span class="year">,{{date(" Y", strtotime($venue_sch->start_date))}}</span></div>
                                    <div class="bottom" aria-hidden="true">
                                        <p class="day">{{date("j ", strtotime($venue_sch->start_date))}}</p>
                                        <p class="dayOfWeek">{{date("D", strtotime($venue_sch->start_date))}}</p>
                                    </div>
                                    <p class="time" aria-hidden="true">{{date("H:i a", strtotime($venue_sch->start_time))}}</p>
                                </div>
                                <div class="eventBasicInfoInner">
                                    <h1 class="eventName" style="font-size: 20px;"><a href="" class="showMoreInfo">{{$event->first_title}}<br><span class="farsiText"> @if($event->second_title != null)
                                      <span class="farsiText">{{$event->second_title}}</span>
                                      @else<span class="farsiText"></span>
                                       @endif
                                    </a></h1>
                                    <br>
                                    <div class="row">
                                        <time datetime="2021-05-22T20:00:00.0000000">
                                        From&nbsp;:&nbsp;{{date("l", strtotime($venue_sch->start_date))}} &nbsp;
                                            {{date("jS F, Y", strtotime($venue_sch->start_date))}} - 
                                             {{date("H:i a", strtotime($venue_sch->start_time))}} 

                                        <br>to&nbsp;:&nbsp;{{date("l", strtotime($venue_sch->end_date))}} &nbsp;
                                                     {{date("jS F, Y", strtotime($venue_sch->end_date))}} - 
                                                      {{date("H:i a", strtotime($venue_sch->end_time))}}
                                        <sub>(local time)</sub>
                                        </time>
                                        <br>
                                    </div>
                                    <div class="row eventLocation">
                                        <a href="javascript:void(0)" rel="nofollow" title="Unspecified address">
                                        <i class="fa  fa-15x fa-hover"></i>&nbsp;&nbsp;
                                        @ <span class="cEventLocaltion"><span>{{$venue->name}}</span><span> - {{$venue->region}}</span></span><br>
                                        <span class="venueAddress">
                                          <span>{{$venue->street}},</span>
                                                <span>{{$venue->city}},</span>
                                                <span>{{$venue->state}},</span>
                                                <span>{{$venue->zip_code}},</span>
                                                <span>{{$venue->country}}</span>
                                        </span>
                                        </a>
                                    </div>
                                    <div class="row1" style="text-align:right;">
                                        <button id="" class="btn btn-dark" data-ga="FindTicketFromList_FindTickets">Buy Ticket</button>
                                    </div>
                                </div>
                                <div class="eventReturnPolicy">
                                    <h4>Returns Policy:</h4>
                                    @if($policy->return_policy == "0")
                                    <p>All sales are final (No returns)</p>
                                    @elseif($policy->return_policy == "1")
                                    <p>Return accepted...</p>
                                     @isset($policy->rp_upto_hours)
                                    <span for="ctl02_cReturnHoursBefore" id="ctl02_Label5" class="editLabel">Up to</span>
                                    <span id="ctl02_Label17">{{$policy->rp_upto_hours}}hours before the event</span><br>
                                      @endisset
                                      @isset($policy->sc_deduction)
                                     <span for="ctl02_cReturnForStoreCreditPercent" id="ctl02_Label15" class="editLabel" >Deduction</span>
                                      <span id="ctl02_Label18">{{$policy->sc_deduction}}% if returned for store credit.</span><br>
                                      @endisset
                                         @isset($policy->cc_deduction)
                                      <span for="ctl02_cReturnToCreditPercent" id="ctl02_Label16" class="editLabel">Deduction</span>
                                   
                                     <span id="ctl02_Label19">{{$policy->cc_deduction}}% if returned to credit card</span>
                                      @endisset

                                    @endif
                                    <br>
                                    <h4>Exchange / Upgrade Policy:</h4>
                                     @if($policy->exchange_upgrade == "0")
                                     <p>No exchange - All sales are final</p>
                                      @elseif($policy->exchange_upgrade == "1")
                                        <p>Exchange / upgrade accepted within the same event (no money back) 
                                            <!-- <a href="" target="_blank">Click here to go to the event</a> -->
                                        </p><br>
                                         @isset($policy->eu_upto_hours)
                                          <p>Exchange / upgrade accepted up to {{$policy->eu_upto_hours}} hours before the event.</p>
                                            @endisset
                                      @elseif($policy->exchange_upgrade == "2")
                                        <p>Exchange / upgrade accepted within the same event and other recurrences of this event (no money back) 
                                            <!-- <a href="" target="_blank">Click here to go to the event</a> -->
                                        </p><br>
                                        @isset($policy->eu_upto_hours)
                                            <p>Exchange / upgrade accepted up to {{$policy->eu_upto_hours}} hours before the event.</p> 
                                          @endisset
                                      @elseif($policy->exchange_upgrade == "3")

                                      <p>Exchange / upgrade accepted within the same event 

                                       @isset($policy->eu_category) and events in <strong>
                                        {{$policy->eu_category}}
                                      </strong> category  (no money back) @endisset

                                       <!-- <a href="" target="_blank">Click here to go to the event</a> -->
                                   </p>
                                         <br>
                                         @isset($policy->eu_upto_hours)
                                      <p>Exchange / upgrade accepted up to {{$policy->eu_upto_hours}} hours before the event.</p> 
                                        @endisset
                                      @elseif($policy->exchange_upgrade == "4")
                                        <p>Exchange / upgrade accepted within the same event and events from the same event organizer(no money back) 
                                           <!--  <a href="" target="_blank">
                                            Click here to go to the event</a> -->
                                        </p><br>
                                         @isset($policy->eu_upto_hours)
                                         <p>Exchange / upgrade accepted up to {{$policy->eu_upto_hours}} hours before the event.</p> 
                                         @endisset

                                      @elseif($policy->exchange_upgrade == "5")
                                    <p>Exchange / upgrade accepted with any event(no money back)
                                   <!--   <a href="" target="_blank">
                                    Click here to go to the event</a> -->
                                </p><br>

                                    <p>Exchange / upgrade accepted up to 2 hours before the event.</p>
                                    <br>@isset($policy->eu_upto_hours)
                                     <p>Exchange / upgrade accepted up to {{$policy->eu_upto_hours}} hours before the event.</p> @endisset

                                     @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <p>no more information...</p>
            @endif
      </div>
      <div id="ticketdetailsbigpopup" title="Select Ticket">
        <form id="seatsubdetails">
            <label for="Sectionname">Section</label>
          : <input type="text" readonly class="ind-sec-name b-0"  name="sectionname"><br>
            <label for="rowname" class="rowride">Row : </label>
            <input type="text" readonly class="ind-row-name b-0 rowride"  name="rowname"><br class="rowride">
            <label for="seatname" class="seathide">Seat :</label>
            <input type="text" readonly class="ind-sec-seat-no b-0 seathide"  name="seatno"><br class="seathide">
            <label for="price">Price : </label>
            <input type="text" readonly class="ind-sec-seat-price b-0"  name="price"><br>
            <div class="variablepricecontainer">
            </div>
            <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                <div class="ui-dialog-buttonset">
                    <button type="button" class="ui-button ui-corner-all ui-widget seatadd">Add</button>
                    <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Close</button>
                </div>
            </div>
        </form>
      </div>
      <div id="ticketdetails" title="Confirmation">
         <p class="innermessage">Ticket added to your shopping cart.</p>
         <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
                <a href="{{route('seller.manage_event.preview_checkout')}}" class="ui-button ui-corner-all ui-widget dailog-cancel">Proceed to checkout </a>
               <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Close</button>
            </div>
         </div>
      </div>
      <div id="rowoftikets" title="Confirmation">
         <p class="mb-0">Section : </p>
         <p class="mb-0">Row : </p>
         <p class="mb-0">Price : </p>
         <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
                <a href="{{route('seller.manage_event.preview_checkout')}}" class="ui-button ui-corner-all ui-widget dailog-cancel">Proceed to checkout </a>
                
               <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Close</button>
            </div>
         </div>
      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="https://unpkg.com/konva@7.0.3/konva.min.js"></script>
<script src="{{ asset('assets/seller/seatingchart/seatingchart-sale-preview.js') }} "></script>


<script>
 function buy_ticket_save(data){
         $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
         $.ajax({
               type: "POST",
               url: "{{route('seller.manage_event.preview_buy_ticket')}}",
               data: data,
              processData:false,
               dataType:'json',
                 success: function(data)
                 {
                    
                     
                 }, 
           });
   }
</script>


@endsection