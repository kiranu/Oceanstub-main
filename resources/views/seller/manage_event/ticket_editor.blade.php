@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/seller/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('assets/seller/seatingchart/price-level-seating-chart.css') }} ">
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
         <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
               <h3 class="card-title">Ticket Editor - Add/Update Tickets</h3>
            </div>
         </div>
         <div class="card card-info" >
            <h6 class="card-title" style="text-align:center;margin: 10px 0px 7px 0px;">{{$event_data->first_title}}&nbsp;{{$event_data->second_title}} -
               {{date('l M d,Y',strtotime($event_data->sch_venue->start_date))}} , at 
               {{date('h.i a',strtotime($event_data->sch_venue->start_time))}} 
             </h6>
         </div>
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-12">
                     <!-- Default box -->
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">Step 1 : Create Your Price Levels</h3>
                        </div>
                        <div class="card-body">
                           <h4 class="understandpricelvl" ><i class="fa fa-bolt fa-15x"></i>&nbsp;&nbsp; Understanding Price levels &amp; Price variations</h4>
                           <p class="priceoptions" ><i class="fa fa-circle"></i> <b>Price levels:</b> Are prices for different areas of the venue or event that are limited by some capacity. Click "Add price level" to add a price level.</p>
                           <p class="priceoptions" ><i class="fa fa-circle"></i> <b>Price variations:</b> Each price level, may have price variations. Price variations share the inventory (capacity) with the price level. For example, your $50 price level, may have a $40 price variation for seniors and a $30 price variation for kids. It may also have a $35 price variation for early-birds that goes away on a certain date. Another example of the price variation could be "ticket + some additional item". For example, "+ 2 free drinks" or "+ a t-shirt" or "+ back-stage access"</p>
                           <p  class="priceoptions"><i class="fa fa-circle"></i> <b>Group pricing:</b> Group prices are a 'price variation'. For example if your individual tickets are $30, and you have tickets for family of 4 for $100, then create a price level for individuals at $30. Add a price variation for families, set the face price to $25 ($100 / 4), set the 'Minimum ticket per transaction' to 4 and 'Tickets available in increments of' to 4 so the buyers can buy 4 tickets (1 family), 8 (2 families), ... or keep the 'Tickets available in increments of' to 1 if the discounted price applies to any group of 4 or more.</p>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer-->
                     </div>
                     <!-- /.card -->
                  </div>
               </div>
            </div>
         </section>
         <section class="content">
            <div class="container-fluid">
               <!-- /.row -->
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <!-- ./card-header -->
                        <div class="card-body p-0">
@if($ticket_prices != null)
<table id="PriceTableA" class="table" style="margin-bottom: 50px;">
  <thead class="thead-dark">
   <tr>
      <th >Price Level/Variation</th>
      <th >Price</th>
      @isset($venue)
      @if($venue->seat_chart == null)
      <th>Capacity</th>
      @endif
      @endisset
      <th>Details</th>
      <th >Action</th>
   </tr>
</thead>
<tbody>
   @if(isset($ticket_prices))
   @foreach($ticket_prices as $price)
   <?php 
      $bcolor=$price->color;
      
      ?>
   <tr class="bottom-bor">
      <td>
         <div class="cPriceVariationTrColor" style="background-color:<?=$bcolor;?>"></div>
         <div class="pricetype_td">{{$price->name}}&nbsp;
            <br>
            <span>{{$price->description}}</span>
         </div>
      </td>
      <td>${{$price->face_price}} 
         <sub>+ ${{$price->service_charge}}</sub>
      </td>
      @if($venue->seat_chart == null)
      <td>{{$price->capacity}}</td>
      @endif
      <td >@if($price->price_password !=null)
         &nbsp;<i class="fa fa-lock"></i>&nbsp;
         @endif
         Available from: {{date("d/m/Y",strtotime($price->start_sale_date))}}&nbsp; {{date("h:i a",strtotime($price->start_sale_time))}}
         <br>
         Available till: {{date("d/m/Y",strtotime($price->end_sale_date))}}&nbsp; {{date("h:i a",strtotime($price->end_sale_time))}}
         <br>Min. number to purchase: {{$price->min_trans}}
         <br>Max. number to purchase: {{$price->max_trans}}
         <br>Available in increments of: {{$price->available_inc}}
         <br>
      </td>
      <td >
         <a onclick="priceEdit({{$price->id}})">
         <i class="fa fa-pencil fa-hover fa-15x "></i></a> 
         &nbsp;
         <a  class="varpriceDelete" data-id="{{$price->id}}" 
            ><i class="fa fa-trash-o fa-hover fa-15x"></i></a>
      </td>
   </tr>
   @isset($var_ticket_prices)
   @foreach($var_ticket_prices as $var_price)
   @if($var_price->parent_id == $price->id)
   <?php 
      $color=$var_price->color;
      
      ?>
   <tr class="bottom-bor">
      <td style="padding-left: 50px;">
         <div class="cPriceVariationTrColor" style="background-color:<?=$color?>;"></div>
         <div class="pricetype_td">{{$var_price->name}}&nbsp;
            <br>
            <span>{{$var_price->description}}</span>
         </div>
      </td>
      <td>${{$var_price->face_price}} 
         <sub>+ ${{$var_price->service_charge}}</sub>
      </td>
      @if($venue->seat_chart == null)
      <td>{{$var_price->capacity}}</td>
      @endif
      <td >@if($var_price->price_password !=null)
         &nbsp;<i class="fa fa-lock"></i>&nbsp;
         @endif
         Available from: {{date("d/m/Y",strtotime($var_price->start_sale_date))}}&nbsp; {{date("h:i a",strtotime($var_price->start_sale_time))}}
         <br>
         Available till: {{date("d/m/Y",strtotime($var_price->end_sale_date))}}&nbsp; {{date("h:i a",strtotime($var_price->end_sale_time))}}
         <br>Min. number to purchase: {{$var_price->min_trans}}
         <br>Max. number to purchase: {{$var_price->max_trans}}
         <br>Available in increments of: {{$var_price->available_inc}}
         <br>
      </td>
      <td>
         <a onclick="priceEdit({{$var_price->id}})">
         <i class="fa fa-pencil fa-hover fa-15x "></i></a> 
         &nbsp;
         <a  class="varpriceDelete" data-id="{{$var_price->id}}">
         <i class="fa fa-trash-o fa-hover fa-15x"></i></a>
      </td>
   </tr>
   @endif
   @endforeach
   @endisset
   <tr class="ad_varition" >
      <td colspan="5">
         <a class="fa-hover add_var_price_level"   data-id="{{$price->id}}" >
         <i class="fa fa-plus-square-o" aria-hidden="true">
         </i>
         &nbsp;&nbsp;Add a price variation for: "{{$price->name}}"
         </a>
      </td>
   </tr>
   <tr style="border: 2px solid;"></tr>
   @endforeach
   @endif
   <!-- next row -->
</tbody>
</table>
@endif
                       

                        </div>
                        <!-- /.card-body -->
                        <div class="card-body">
                           <div class="row addpricelvl"style="padding-left: 20px;">              
                              <button  type="button" id="add_price_level" class="btn btn-secondary"  >
                              Add a price level
                              </button>
                              &nbsp;&nbsp;
                              <a class="ColTextHighlight" href="{{route('seller.ticket.salesPage')}}" 
                                 style="color:#007bff;font-size:18px;" target="_blank" title="View the ticket sales page">Preview the ticket sales page <sup><i class="fas fa-external-link-alt"></i></sup></a>
                           </div>
                        </div>
                        <!-- /.card-body -->

                       
                        <div class="card-body">
                          
                        
                        
                        <!-- end other tiket booing option -->
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
                           <div class="card-body pb-0" style="
                              background: #ddd">
                              <div  id="playground"></div>
                           </div>
                           @isset($sc)
                           <textarea id="sketchpaddata"  style="display:none"; rows="5" cols="5" value="{{$sc->seating_chart_data}}"></textarea>

                             
                           <textarea id="sketchpaddatapriceleveladded"  style="display:none"; rows="5" cols="5" value="@isset($assigned){{$assigned->sc_assigned_data}}@endisset"></textarea>
                           


                           <input type="hidden" name="sc_id"  id="sc_id" value="{{$sc->id}}">
                           <form id="seatingchartdataform">
                              <input type="hidden" name="ass_id"  id="ass_id" value="">
                              <input type="hidden" name="sectionname" id="sectionname">
                              <input type="hidden" name="pricelevel" id="pricelevel">
                              <input type="hidden" name="maxcapacity" id="maxcapacity">
                              <input type="hidden" name="sectiontype" id="sectiontype">

                           </form>
                           <form id="seatingchart_json_save">
                              @isset($assigned)
                              <input type="hidden" id="respons_id" value="{{$assigned->id}}" name="respons_id">
                              @endisset
                              <textarea id="seatingchart_json" name="ScAssignedData" style="display: none;"></textarea>
                                 <input id="respons_save" type="submit" class="btn btn-success seatingchartSvebtn" value="Save">
                           </form>
                           @endisset

                           @php $tp=json_encode($ticket_prices); 
                                   $var_tp=json_encode($var_ticket_prices);
                           @endphp
                           <textarea id="pricedetails" style="display:none">{{$tp}}</textarea>

                            <textarea id="var_pricedetails" style="display:none">{{$var_tp}}</textarea>
                           


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
                        </div>
                     </div>
                     <!-- /.card -->
                  </div>
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </section>
         <br>
         <br>
      </div>
      <div id="section" title="Add/Update Tickets">
         <fieldset class="ui-dialog-content ui-widget-content shape">
            <div class="row">
               <label class="ocean-stub-blue" for="cSectionName">Select Seats:</label>
               <input type="text" id="salepriorityforsection" readonly>
            </div>
            <!-- <div class="row">
               <label class="ocean-stub-blue" for="cSectionName">Name:</label>
               <input id="sectionname" type="text" maxlength="20">
               </div> -->
            <div class="row">
               <label class="ocean-stub-blue" for="cSectionName">Price Level: </label>
               <select id="alignmentforsection">
               </select>
            </div>
            <!-- <div class="row">
               <label class="ocean-stub-blue" for="cSectionName">Sell Preference:</label>
               <select id="sellpreferenceforsection">
                   <option value="0">Left to Right</option>
                   <option value="1">Right to Left</option>
               </select>
               </div> -->
            <!-- <div class="row addticketssuboptions">
               <a href="javascript:void(0)" class="seat-block">Block</a>
               <a href="javascript:void(0)">Unblock</a>
               <a href="javascript:void(0)">Mark as Accessible</a>
               <a href="javascript:void(0)">Unmark as Accessible</a> 
            </div> -->
         </fieldset>
         <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
               <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget section-save">
                  <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>
                  Add Tickets
               </button>
               <button type="button" class="ui-button ui-corner-all ui-widget updateTicket">Update Tickets</button>
               <button type="button" class="ui-button ui-corner-all ui-widget delete-ticket">Delete Tickets</button>
            </div>
         </div>
      </div>
      <div id="ticketassignmessage" title="Message">
         <p class="innermessage"></p>
         <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
               <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Ok</button>
            </div>
         </div>
      </div>


      <!-- price level model -->
      <style >
   #SectionColor{
   width: 300px;
   float: right;
   }
   .color_div{
   width: 8%;
   height: 24px;
   }.cselected{
   border: 1px solid black;
   }
</style>
<!-- Modal -->
<div class="modal fade" id="add_price_leve_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="width:140%">
         <div class="modal-header">
            <h5 class="modal-title" id="TitlePcice">
               Price Level
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="price-level-form">
               <input type="hidden" id="id" name="id" value="">
               <input type="hidden" id="ticket_id" name="ticket_id" value="">
               <input type="hidden" id="parent_id" name="parent_id" value="">
                   <div class="form-group" id="SectionColor">
                  
<span for="color">Color</span><br>
                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" id="seatcolor" value="" name="color">

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>

                  </div>
                  <!-- /.input group -->
                </div>
               <div class="row1"style="padding-left:30px;">
                  <span for="cSectionName1">Name:</span><br>
                  <input type="text" id="name" name="name" maxlength="50" value="">
                  <span class="text-danger error-text name_error"></span>
                  <p class="hint priceLevelView"style="font-size:14px;">Ex: Student Tickets, Senior Tickets, Early bird, ...</p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cDescription">Description:</span><br>
                  <input type="text" id="Description" name="description" value="" class="wide" maxlength="300"><br>
                  <p class="hint sectionView" id="descHint" style="font-size:14px;">Optional - Ex: Free valet parking</p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cSellPrice1">Face Price: $ </span><br>
                  <input type="number" 
                     value=""
                     step="0.01" 
                     id="face-price"
                     name="face_price" 
                     class="small cFacePrice error" 
                     maxlength="10" 
                     data-validation-required="1" 
                     data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" 
                     data-validation-number="float" 
                     data-validation-number-min="0" 
                     min="0" 
                     aria-describedby="cValMsg991180 "
                     aria-invalid="true">
                  <span class="text-danger error-text face_price_error"></span>
                  <p class="hint"style="font-size:14px;">Tickets face price (Ex: 55.00)</p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cServiceCharge1">Service Charge: $</span><br>
                  <!--   <select id="ServiceChargeType" name="prefix_sc" class="cServiceChargeType" value="" style="width:60px;">
                     <option selected="" value="$">$</option>
                     <option value="%">%</option>
                     </select> -->
                  <input type="number" step="0.01" id="ServiceCharge" name="service_charge" class="small cServiceCharge valid" maxlength="10" data-validation-required="1" data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" 
                     value="0" data-validation-number="float" data-validation-number-min="0" 
                     min="0" aria-describedby="cValMsg117078 ">
                  <span class="text-danger error-text service_charge_error"></span>
                  <!--  <a href="" class="cCostCalculator" data-toggle="modal" data-target="#exampleModalCenter1">Cost Calculator</a> -->
                  <p class="hint"style="font-size:14px;">Amount you want to collect for this type of ticket as service charge.<br>
                  </p>
               </div>
               @isset($venue)                           </table>
               @if($venue->seat_chart == null)
               <div class="row2 cCapacityRow sectionView"style="padding-left:30px;">
                  <span for="cCapacity">Capacity:</span><br>
                  <input type="number" id="Capacity"  name="capacity" class="small cCapacity error" maxlength="5" data-validation-required="1" data-validation-regex="^\d{1,5}$" value="" data-validation-number="int" data-validation-number-min="0" min="0" max="99999" aria-describedby="cValMsg994874 " aria-invalid="true">
                  <span class="text-danger error-text capacity_error"></span>
                  <p class="hint"style="font-size:14px;">Maximum number of tickets to sell at this price.</p>
               </div>
               @endif
               @endisset
               <br>
               <h2 style="color:#007bff;padding-left: 30px;" class="ColTextHighlight">
                  Additional details: (Optional)
                  <hr>
               </h2>
               <div class="row2"style="padding-left:30px;">
                  <span for="cSortOrder1">Sort Order:</span><br>
                  <select id="SortOrder" value="" name="sort_order" style="width:60px;">
                     @for($i=1;$i<=20;$i++)
                     <option value="{{$i}}">{{$i}}</option>
                     @endfor
                  </select>
                  <span class="text-danger error-text sort_order_error"></span>
                  <p class="hint"style="font-size:14px;">Determines the order in which prices are shown on the sales page. Smaller orders show first. If sort orders are the same, then they get sorted by price.</p>
               </div>
               <div id="hintsPassword" class="row2"style="padding-left:30px;">
                  <span for="cPricePassword">Password:</span><br>
                  <!--   <input type="password" id="PricePassword" name="price_password" value="" maxlength="50"> -->
                  <textarea name="price_password[]" value="" rows="5" cols="20" id="PricePassword" class="editText" data-validation-required="1" data-validation-disallow="," style="width:170px;"></textarea>
                  <span class="text-danger error-text price_password_error"></span>
                  <p class="hint"style="font-size:14px;">If you want this price to only be available to certain people, you can protect it with a password. Multiple passwords can be separated by comma.</p>
               </div>
               <div class="row2 cHideWizard"style="padding-left:30px;">
                  <span for="cBuyPrice1">Buy Price: $</span><br>
                  <!--  <select id="BuyPrice1Type"  name="prefix_bp" value="" class="cBuyPriceType" style="width:60px;">
                     <option value="$">$</option>
                     <option selected=""  value="%">%</option>
                     </select>
                     -->
                  <input type="number"  value="" id="BuyPrice1" name="buy_price" class="small cBuyPrice valid" >
                  <span class="text-danger error-text buy_price_error"></span>
                  <p class="hint"style="font-size:14px;">If you are re-selling tickets on behalf of somebody else, enter your purchase price</p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cStart1">Start sale at:</span><br>
                  <select id="Startsale" value="" name="start_sale" class="medium" onchange="startsale(this)">
                     <option selected="" value="0">When the event sale starts</option>
                     <option value="1">Exactly at:</option>
                  </select>
                  <span class="text-danger error-text start_sale_error"></span>
                  <span class="startsaledatepicker" style="display:none;">
                  <input  type="date" value="" id="saleStartDate" name="saleStartDate"   class="cDatePicker cEndDateView hasDatepicker " 
                     style="width:160px;">
                  <input  type="time" id="saleStartTime" name="saleStartTime" value=""   class="cTimePicker cEndTimeView hasTimepicker" style="width:85px;">
                  <span class="text-danger error-text saleStartDate_error"></span>
                  </span>
               </div>
               <br>
               <div class="row2"style="padding-left:30px;">
                  <span for="cEnd1">End sale at:</span><br>
                  <select id="saleEnd" value="" name="end_sale" class="medium" onchange="Endsale(this)">
                     <option selected="" value="0">When the event sale ends</option>
                     <option  value="1">Exactly at:</option>
                  </select>
                  <span class="text-danger error-text end_sale_error"></span>
                  <span class="endsaledatepicker" style="display:none;">
                  <input  type="date" value=""  name="saleEndDate"  id="EndDateView"
                     class="cDatePicker cEndDateView hasDatepicker "   style="width:160px;">
                  <input  type="time" name="saleEndTime" value=""  id="EndTimeView" class="cTimePicker cEndTimeView hasTimepicker"  style="width:85px;">
                  <span class="text-danger error-text saleEndDate_error"></span>
                  </span>
               </div>
               <br>
               <div class="row"style="padding-left:40px;">
                  <span>By default, users can purchase any number of tickets. Use section below to limit that. You can set minimum, maximum and increments. You can use this feature to create group tickets or to force buyers to purchase in pairs or triples.</span>
               </div>
               <br>
               <div class="row2"style="padding-left:30px;">
                  <span for="cMin" style="width:270px;">Minimum ticket per transaction:</span><br>
                  <input type="number" id="Minper" name="min_trans" class="small cMin valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="1" min="1" max="99" aria-describedby="cValMsg456194 ">
                  <span class="text-danger error-text min_trans_error"></span>
                  <p class="hint"style="font-size:14px;">Minimum number of tickets allowed to be purchased at this price (default = 1)</p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cMax" style="width:270px;">Maximum ticket per transaction:</span><br>
                  <input type="number" id="Maxper" name="max_trans" class="small cMax valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="30" min="1" max="99" aria-describedby="cValMsg791711 ">
                  <span class="text-danger error-text max_trans_error"></span>
                  <p class="hint"style="font-size:14px;">Maximum number of tickets allowed to be purchased at this price per transaction<br>
                     Not enforced for administrators and sales agents.
                  </p>
               </div>
               <div class="row2"style="padding-left:30px;">
                  <span for="cIncrement" style="width:270px;">Tickets available in increments of:</span><br>
                  <input type="number"
                     id="Increment" 
                     name="increment" 
                     class="small cIncrement valid" 
                     maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="1" min="1" max="99" aria-describedby="cValMsg143756 ">
                  <span class="text-danger error-text increment_error"></span>
                  <p class="hint"style="font-size:14px;">Example: if minimum is set to 4, maximum is set to 10 and increment is set to 2, then buyer can purchase 4, 6, 8 or 10 tickets</p>
               </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <!--   <button type="submit" class="btn btn-primary">Save </button> -->
         <input type="submit" class="btn btn-primary" id="sub" name="" value="Save">
         </form>
         </div>
      </div>
   </div>
</div>
      <!-- footer -->
      @include('layouts.seller_footer')
      <!-- /footer -->
   </div>
   <div class="individual-seat-details-for-table-with-seats tooltips">
      <p class="seatno mt-0"></p>
      <p class="avaliability"></p>
   </div>
   @endsection
   @section('bottom_scripts')
  



   <script>
   $(document).ready(function () 
   {
       $('#add_price_level').click(function(){
            $('#add_price_leve_model').modal('show'); 

            
            
            $('#price-level-form').trigger("reset");
            $("#TitlePcice").text("Add New Price level");
            $('#sub').val("Save");
             $("#Startsale.select").val(0);
              $("#saleEnd.select").val(0);
              $(".startsaledatepicker").css("display","none");
              $(".endsaledatepicker").css("display","none");
       });
   
       $('.add_var_price_level').click(function(){
         $('#price-level-form').trigger("reset");
          $("#Startsale.select").val(0);
           $("#saleEnd.select").val(0);
           $(".startsaledatepicker").css("display","none");
           $(".endsaledatepicker").css("display","none");

            $('#add_price_leve_model').modal('show'); 
            $('#price-level-form').trigger("reset");
            $('#parent_id').val($(this).attr("data-id"));
   $('#sub').val("Save");
   $("#TitlePcice").text("New Price Variation");
   $('#descHint').text("Optional - Ex: Must show student ID");
   $('#SectionColor').css("display",'none');
   
       });
   
   
   
       $("#price-level-form").submit(function (stay) 
       {
           stay.preventDefault();
           var formdata = $(this).serialize();
           var value = $("#sub").attr('value');
   
           $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
          if(value == "Save")
          {
           $.ajax({
               type: "POST",
               url: "{{route('seller.ticket.price')}}",
               data: formdata,
              processData:false,
               dataType:'json',
                
                 beforeSend:function(){
                 $(document).find('span.error-text').text('');
                 },
                 success: function(data)
                 {
                   
                   if (data.status == 0)
                    {
                      
                      $.each(data.error,function(prefix,val)
                       {
   
                       $('span.'+prefix+'_error').text(val[0]);
                       });
   
                   }else{
                     alert(data.msg);
                     $('.modal').modal('hide');
                      $( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );


                     /*  $('#price-level-form')[0].reset();
                       document.getElementById("price-level-form").reset();*/
                       $('#price-level-form').trigger("reset");

                       $("#Startsale.select").val(0);
                       $("#saleEnd.select").val(0);
                       $(".startsaledatepicker").css("display","none");
                       $(".endsaledatepicker").css("display","none");
                   }
                 },
              
           });
       }
   
       else{
            $.ajax({
               type: "POST",
               url: "{{route('seller.ticket.postedit_price')}}",
               data: formdata,
                processData:false,
               dataType:'json',
                
                 beforeSend:function(){
                 $(document).find('span.error-text').text('');
                 },
                 success: function(data)
                 {
                   
                   if (data.status == 0)
                    {
                      
                      $.each(data.error,function(prefix,val)
                       {
   
                       $('span.'+prefix+'_error').text(val[0]);
                       });
   
                   }else{
                     alert(data.msg);
                     $('.modal').modal('hide');
                     location.reload();
                     /* $( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );*/
                     /*  $('#price-level-form')[0].reset();
                       document.getElementById("price-level-form").reset();*/
                       $('#price-level-form').trigger("reset");
                       $("#Startsale.select").val(0);
                       $("#saleEnd.select").val(0);
                       $(".startsaledatepicker").css("display","none");
                       $(".endsaledatepicker").css("display","none");
                   }
                 },
           });
        }
   });
   });
</script>
<script type="text/javascript">
   function priceEdit(id)
   {
       $.ajax({
               type: 'GET',
               url: "{{route('ticket.getedit_price')}}",
               data: 'id='+id,
   
               success: function (data)
               {
   
                  $('#add_price_leve_model').modal('show');
                  $('#PricePassword').attr("hidden", true);
                  $('#hintsPassword').attr("hidden", true);
                  $("#TitlePcice").text("Update Price level");
                 
                  if(data.data.parent_id != null)
                  {
                    $('#SectionColor').css("display",'none');
   
   $("#TitlePcice").text("Update Price Variation");
   $('#descHint').text("Optional - Ex: Must show student ID");
   
                  }
                
                  
                  $('#sub').val("Save Changes");
                  $('#id').val(data.data.id);
                  $("#EventId").val(data.data.event_id);
                  $('#ticket_id').val(data.data.event_ticket_id);
                  $('#name').val(data.data.name);
                  $('#Description').val(data.data.description);
                  $('#Increment').val(data.data.available_inc);
                  $('#BuyPrice1').val(data.data.buy_price);
                  $('#Capacity').val(data.data.capacity);
                  $('#EndDateView').val(data.data.end_sale_date);
                  $('#EndTimeView').val(data.data.end_sale_time);
                  $('#face-price').val(data.data.face_price);
                  $('#Maxper').val(data.data.max_trans);
                  $('#Minper').val(data.data.min_trans)
                  $('#ServiceCharge').val(data.data.service_charge);
                  $('#SortOrder').val(data.data.sort_order);
   
                  
                  $("#seatcolor").val(data.data.color).change();
           
           $('#Startsale option[value=1]').attr('selected','selected');
   
                  $(".startsaledatepicker").fadeIn();
   
                   $('#saleEnd option[value=1]').attr('selected','selected');
   
                  $(".endsaledatepicker").fadeIn();
                  $('#saleStartDate').val(data.data.start_sale_date);
                  $('#saleStartTime').val(data.data.start_sale_time);
               }, error: function (data) 
               {
                   console.log("error");
                   console.log(data);
               },
           });
   }
</script>
<script type="text/javascript">
   $(document).ready(function () 
   {
     $('.varpriceDelete').click(function(){
       var result = confirm('Are you sure want to remove the Price Level?');
       if(result)
      {
      var id =$(this).attr("data-id"); 
            
       
       $.ajax({
               type: 'GET',
               url: "{{route('ticket.delete_price')}}",
               data: 'id='+id,
   
               success: function (data)
               {
                alert("Deleted..");
                location.reload();
                 /*$( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );*/
               }
               , error: function (data) 
               {
                   console.log("error");
                   console.log(data);
               },
           });
   }
   
          });
   
   
   });
</script>
<script>
   function sectiondetailssave(data){
         $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
         $.ajax({
               type: "POST",
               url: "{{route('seller.manage_event.add_assigned_seat')}}",
               data: data,
              processData:false,
               dataType:'json',
                 success: function(data)
                 {
                     //console.log(data.id);
                     updateid(data);
                 }, 
           });
   }

    function sectiondetailsupdate(data){


      
         $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
         $.ajax({
               type: "POST",
               url: "{{route('seller.manage_event.edit_assigned_seat')}}",
               data: data,
              processData:false,
               dataType:'json',
                 success: function(data)
                 {

                     //var id =data.id;
                     //console.log(data);
                 }, 
           });
   }
    function sectiondetailsdelete(id){
        var id = id;
         $.ajax({
               type: "GET",
               url: "{{route('seller.manage_event.delete_assigned_seat')}}",
               data: 'id='+id,
              processData:false,
               dataType:'json',
                 success: function(data)
                 {
                 
                 }, 
           });
   }
   
</script>

<script type="text/javascript">




$(document).ready(function () {
        $("#seatingchart_json_save").submit(function (stay) {
            stay.preventDefault();


            var id = $('#respons_id').val();
              var formdata = $(this).serialize();

            $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });

            if(id != '' && id != undefined )
            {
               
                $.ajax({
                type: "POST",
                url: "{{route('seller.manage_event.update_assigned_sc')}}",
                data: formdata,
                cache: false,
                processData:false,
                dataType:'json',
                /*contentType:false,*/

                beforeSend:function(){
                $(document).find('span.error-text').text('');
                },
                success: function(data)
                {

               
                },
            });
            }else{

                $.ajax({
                type: "POST",
                url: "{{route('seller.manage_event.store_assigned_sc')}}",
                data: formdata,
                cache: false,
                processData:false,
                dataType:'json',
                /*contentType:false,*/

                beforeSend:function(){
                $(document).find('span.error-text').text('');
                },
                success: function(data)
                {

                 
                  $('#respons_id').val(data.id);
              /*$('#sketchpaddatapriceleveladded').val(data.sc_assigned_data);*/
                  $('#respons_save').val("Save Changes");

              
                },
            });

            }
            

          
        
          
           
        });
    });

</script>

   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
   <script src="https://unpkg.com/konva@7.0.3/konva.min.js"></script>
   <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
   <script src="{{ asset('assets/seller/seatingchart/price-assign.js') }} "></script>

    <!-- color pcker -->
           <script>

$('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
           </script>   
   @endsection