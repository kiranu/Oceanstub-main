<div id="ticket" aria-labelledby="ui-id-48" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false" style="padding-left: 20px;">
    <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
    <h3 class="devider ColTextHighlight cWizStep6" data-wizstep-name="pricing" style="color: #007bff; ">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 20 20" fill="none">
            <path d="M4.9059 11.5414L8.4569 15.0944L14.9749 8.57637L11.4219 5.02537L4.9059 11.5414ZM19.1039 6.66437L17.5929 5.15237C17.2091 5.36207 16.7677 5.44182 16.3348 5.37968C15.9019 5.31754 15.5008 5.11685 15.1915 4.80766C14.8822 4.49847 14.6813 4.09741 14.619 3.66453C14.5568 3.23165 14.6363 2.79023 14.8459 2.40637L13.3349 0.894368C13.1444 0.705549 12.8871 0.599609 12.6189 0.599609C12.3507 0.599609 12.0934 0.705549 11.9029 0.894368L0.892903 11.9044C0.704084 12.0948 0.598145 12.3522 0.598145 12.6204C0.598145 12.8886 0.704084 13.1459 0.892903 13.3364L2.4049 14.8464C2.78888 14.6361 3.23068 14.556 3.66403 14.6181C4.09737 14.6802 4.49891 14.8811 4.8084 15.1907C5.1179 15.5003 5.31867 15.902 5.3806 16.3353C5.44253 16.7687 5.36229 17.2105 5.1519 17.5944L6.6639 19.1044C6.85411 19.2937 7.11155 19.3999 7.3799 19.3999C7.64826 19.3999 7.90569 19.2937 8.0959 19.1044L19.1039 8.09637C19.2932 7.90616 19.3995 7.64872 19.3995 7.38037C19.3995 7.11201 19.2932 6.85458 19.1039 6.66437ZM8.4569 16.7194L3.2809 11.5414L11.4229 3.40037L16.5989 8.57637L8.4569 16.7194Z" fill="#007BFF" />
        </svg>
        &nbsp;&nbsp;Pricing Structure and Capacity :
    </h3>
    <hr>
    </h3>
    <!-- ====================ticket form====================================== -->
    <!--   <form action="/seller/ticket" method="POST">
        @csrf -->
    <form id="ticket-form">
        <input type="hidden" name="id" id="id" @isset($event_data->event_ticket)
        value="{{$event_data->event_ticket->event_id}}"@endisset>
        <div class=" cWizStep6" style="padding-left:10px;display: inline-block;">
            <span for="ctl02_cTax" class="editLabel">
                Tax %</span>
            <input name="tax" type="number" maxlength="5" id="Tax" class="form-control editText" data-validation-number="float" data-validation-number-min="0" style="width:85px;display: inline-block;" data-validation-avoid-success-tick="1" min="0" @isset($event_data->event_ticket)
            value="{{$event_data->event_ticket->tax}}"
            @endisset
            >
            <span class="text-danger error-text tax_error"></span>
        </div>
        <br>
        <br>
        <h3 class="devider ColTextHighlight cWizStep6" style="color: #007bff"><i class="fa fa-ambulance fa-15x "></i>&nbsp;&nbsp;Social Distancing</h3>
        <hr>
        <div class="row  cWizStep6 cCapCapacity" style="padding-left:20px;">
            <span class="cCheckboxV2">

                <input id="CapCapacity" type="checkbox" name="cap" value="yes" onchange="checkboxcapa(this.checked)" @isset($event_data->event_ticket->cap) {{($event_data->event_ticket->cap == "yes" ? ' checked' : '') }} @endisset>

                <span class="checkmark" style="margin-left: 5px;">

                </span> Cap the maximum number of sold tickets due to social distancing</span>
        </div>
        <div class="showHidecapacity" style="margin-top:10px;margin-left: 0px; display: none;">
            <span id="ctl00_CPMain_Label10" class="editLabel" style="padding-left: 30px;">Capacity cap due to social distancing: </span><br>




            <input name="cap_capacity" type="number" value="@isset($event_data->event_ticket->cap_capacity){{$event_data->event_ticket->cap_capacity}}@endisset" id="CapCapacityNo" class="editText" data-validation-number="float" style="width:85px;margin-left: 40px;">




            <p class="hint" style="padding-left:30px;font-size:small;">
                Maximum number of tickets to sell across all price levels due to social distancing restrictions
            </p>


        </div>
        <!-- <div class="row  cTextV2  cWizStep6"style="padding-left: 40px;">
            <span class="cCapCapacityContainer" style="display: none;">
            
              <input name="ctl02$cCapacityCap" type="number" value="0" maxlength="4" id="ctl02_cCapacityCap" class="editText" data-validation-number="int" data-validation-number-min="0" style="width:85px;" data-validation-avoid-success-tick="1">
              <label for="ctl02_cCapacityCap" class="editLabel">Capacity cap due to social distancing:</label><span class="border" style="width: 105px;"></span>
              <p class="hint">Maximum number of tickets to sell across  all price levels due to social distancing restrictions</p>
            </span>
            </div>
            <br>
            
            <div class="row" style="display:none;"style="padding-left: 40px;">
            <label id="cConvRateLabel" class="editLabel" data-default-currency="INR>1 $ is how much:"> </label>
            <input name="ctl02$cConvRate" type="text" value="1.0000" maxlength="10" id="ctl02_cConvRate" class="cConvRate editText" style="width:85px;">
            </div> -->
        <br>
        <div class="row cWizStep6 ">
            <div class="Module ticketEditModule " role="region" aria-labelledby="cMH584792">
                <div class="cAddTickets formContainer formValidator ">
                    <div class="Help" style="float: right;margin:14px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
                    <h3 class="ColTextHighlight createpricelvl" style="padding-left: 20px; color: #007bff; font-size:25px;">
                        Create Your Price Levels And Set the Capacity
                        <hr>
                    </h3>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <div class="card">

                                        <div class="card-body">
                                            <h4 class="understandpricelvl"><i class="fa fa-bolt fa-15x"></i>&nbsp;&nbsp; Understanding Price levels &amp; Price variations</h4>
                                            <p class="priceoptions"><i class="fa fa-circle"></i> <b>Price levels:</b> Are prices for different areas of the venue or event that are limited by some capacity. Click "Add price level" to add a price level.</p>
                                            <p class="priceoptions"><i class="fa fa-circle"></i> <b>Price variations:</b> Each price level, may have price variations. Price variations share the inventory (capacity) with the price level. For example, your $50 price level, may have a $40 price variation for seniors and a $30 price variation for kids. It may also have a $35 price variation for early-birds that goes away on a certain date. Another example of the price variation could be "ticket + some additional item". For example, "+ 2 free drinks" or "+ a t-shirt" or "+ back-stage access"</p>
                                            <p class="priceoptions"><i class="fa fa-circle"></i> <b>Group pricing:</b> Group prices are a 'price variation'. For example if your individual tickets are $30, and you have tickets for family of 4 for $100, then create a price level for individuals at $30. Add a price variation for families, set the face price to $25 ($100 / 4), set the 'Minimum ticket per transaction' to 4 and 'Tickets available in increments of' to 4 so the buyers can buy 4 tickets (1 family), 8 (2 families), ... or keep the 'Tickets available in increments of' to 1 if the discounted price applies to any group of 4 or more.</p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

                    <!--  <div id="PriceTableContainer"> -->

<div class="card-body p-0">
    @if($tic_prices != null)
    <table id="PriceTableA" class="table" style="border-bottom: 1px solid; margin-bottom: 50px; border-left: 1px solid; border-right: 1px solid;">
        <thead class="thead-dark">
            <tr>
                <th>Price Level/Variation</th>
                <th>Price</th>
                @isset($venue) @if($venue->seat_chart == null)
                <th>Capacity</th>
                @endif @endisset
                <th>Details</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($tic_prices)) 
            @foreach($tic_prices as $price)

            <?php 
      $bcolor=$price->color; ?>
            <tr class="bottom-bor">
                <td>
                    <div class="cPriceVariationTrColor" style="background-color:<?=$bcolor;?>"></div>
                    <div class="pricetype_td">
                        {{$price->name}}&nbsp;
                        <br />
                        <span>{{$price->description}}</span>
                    </div>
                </td>
                <td>
                    ${{$price->face_price}}
                    <sub>+ ${{$price->service_charge}}</sub>
                </td>
                @if($venue->seat_chart == null)
                <td>{{$price->capacity}}</td>
                @endif

                <td>
                    @if($price->price_password !=null) &nbsp;<i class="fa fa-lock"></i>&nbsp; @endif Available from: {{date("d/m/Y",strtotime($price->start_sale_date))}}&nbsp; {{date("h:i a",strtotime($price->start_sale_time))}}

                    <br />

                    Available till: {{date("d/m/Y",strtotime($price->end_sale_date))}}&nbsp; {{date("h:i a",strtotime($price->end_sale_time))}}

                    <br />
                    Min. number to purchase: {{$price->min_trans}} <br />
                    Max. number to purchase: {{$price->max_trans}} <br />
                    Available in increments of: {{$price->available_inc}}

                    <br />
                </td>
                <td>
                    <a onclick="priceEdit({{$price->id}})"> <i class="fa fa-pencil fa-hover fa-15x"></i></a>
                    &nbsp;

                    <a class="varpriceDelete" data-id="{{$price->id}}"><i class="fa fa-trash-o fa-hover fa-15x"></i></a>
                </td>
            </tr>

            @isset($var_ticket_prices) @foreach($var_ticket_prices as $var_price) @if($var_price->parent_id == $price->id)
            <?php 
      $color=$var_price->color; ?>
            <tr class="bottom-bor">
                <td style="padding-left: 50px;">
                    <div class="cPriceVariationTrColor" style="background-color: <?=$color?>;"></div>
                    <div class="pricetype_td">
                        {{$var_price->name}}&nbsp;
                        <br />
                        <span>{{$var_price->description}}</span>
                    </div>
                </td>
                <td>
                    ${{$var_price->buy_price}}
                    <sub>+ ${{$var_price->service_charge}}</sub>
                </td>
                @if($venue->seat_chart == null)
                <td>{{$var_price->capacity}}</td>
                @endif

                <td>
                    @if($var_price->price_password !=null) &nbsp;<i class="fa fa-lock"></i>&nbsp; @endif Available from: {{date("d/m/Y",strtotime($var_price->start_sale_date))}}&nbsp; {{date("h:i a",strtotime($var_price->start_sale_time))}}

                    <br />

                    Available till: {{date("d/m/Y",strtotime($var_price->end_sale_date))}}&nbsp; {{date("h:i a",strtotime($var_price->end_sale_time))}}

                    <br />
                    Min. number to purchase: {{$var_price->min_trans}} <br />
                    Max. number to purchase: {{$var_price->max_trans}} <br />
                    Available in increments of: {{$var_price->available_inc}}

                    <br />
                </td>
                <td>
                    <a onclick="priceEdit({{$var_price->id}})"> <i class="fa fa-pencil fa-hover fa-15x"></i></a>
                    &nbsp;

                    <a class="varpriceDelete" data-id="{{$var_price->id}}"> <i class="fa fa-trash-o fa-hover fa-15x"></i></a>
                </td>
            </tr>
            @endif @endforeach @endisset

            <tr class="ad_varition">
                <td colspan="5">
                    <a class="fa-hover add_var_price_level" data-id="{{$price->id}}">
                        <i class="fa fa-plus-square-o" aria-hidden="true"> </i>
                        &nbsp;&nbsp;Add a price variation for: "{{$price->name}}"
                    </a>
                </td>
            </tr>
            <tr style="border: 2px solid;"></tr>
            @endforeach @endif
            <!-- next row -->
        </tbody>
    </table>
    @endif
</div>


                    <br>

                    <div class="row addpricelvl" style="padding-left: 20px;">

                        <button type="button" id="add_price_level" class="btn btn-secondary">
                            Add a price level
                        </button>
                        &nbsp;&nbsp;


                        <a class="ColTextHighlight" href="{{route('seller.ticket.salesPage')}}" style="color:#007bff;font-size:18px;" target="_blank" title="View the ticket sales page">Preview the ticket sales page <sup><i class="fas fa-external-link-alt"></i></sup></a>
                    </div>
                    <br>


                    <div id="cTicketSummery" style="padding:0px;">
                        <h4 style="border-bottom:0px none;">Tickets status:</h4>
                        <div>
                            <table class="table ticketstatus" style="padding-left: 20px;">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th scope="col">Ticket Type</th>
                                        <th scope="col">Available</th>
                                        <th scope="col">Expired</th>
                                        <th scope="col">Sold</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total_ava=null;
                                    $total_exp=null;
                                    $total_sold=null;
                                    $total_tot=null;
                                     @endphp
                                    @foreach($ticket->ticket_price as $ticket)
                                     <tr>
                                        <td>{{$ticket->name}}</td>
                                          @php
                                        $sold =$ticket->sold;
                                        $return =$ticket->return;
                                        $capacity = $ticket->capacity;
                                        $available = $capacity -($sold+$return);

                                        $total_ava = $total_ava+$available;
                                        $total_sold = $total_sold+$sold;
                                        $total_tot= $total_tot+$capacity;
                                        @endphp
                                        <td>{{$available}}</td>
                                        <td>0</td>
                                         <td>{{$ticket->sold}}</td>
                                        <td>{{$ticket->capacity}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>

                                        <th scope="row"> Total</th>
                                        <td>{{$total_ava}}</td>
                                        <td>0</td>
                                        <td>{{$total_sold}}</td>
                                        <td>{{$total_tot}}</td>
                                    </tr>
                                </tbody>
                                
                            </table>


                            @isset($venue)
                            @if($venue->seat_chart != null)
                            <h3 class="devider ColTextHighlight" style="color: #007bff"><i class="fa fa-th fa-15x " style="color: #007bff"></i>&nbsp;&nbsp; Seating Chart & Tickets:

                            </h3>
                            <hr>

                            <div style="width:100%;height:150px;">
                                <a href="{{route('get_SCadd_ticket')}}" style="margin: 26px 49px 18px 40px;margin-left: 457px;" type="button" class="btn btn-secondary">Add/Update Tickets</a>


                                <div class="row" style="float: right;
    margin-top: 101px; margin-right: 112px;">
                                    <a href="" target="_blank">Go to seating chart designer</a>
                                </div>
                            </div>

                            @endif
                            @endisset


                            <h3 class="devider ColTextHighlight" style="color: #007bff"><i class="fa fa-info-circle fa-15x " style="color: #007bff"></i>&nbsp;&nbsp;Tickets Details:</h3>
                            <hr>
                            <div class=" cAdv  cTextV2 " style="padding-left: 10px;">
                                <span for="ctl02_cTicketorNote" class="editLabel ticketdetails">Notes on the tickets</span><br>

                                <input name="note" type="text" value="@isset($event_data->event_ticket->note){{$event_data->event_ticket->note}}@endisset" maxlength="100" id="Note" class="form-control editText ticketoptio" style="width:391px;">

                                <p class="hint" style="font-size:14px;">For example: "Doors open at 8:30" or "21 and over only"</p>
                            </div>

                            <div class="row  cTextV2 " style="padding-left:15px;">


                    <span for="ctl02_cTicketDesigns" class="editLabel">E-Ticket design</span>
                                    <select name="color" id="color" class="col-md-4 form-control editText cTicketDesigns">


                                        <option value="0" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "0" ? 'selected' : '')}}@endisset>Classic
                                        </option>

                                        <option value="1" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "1" ? 'selecte' : '')}}@endisset>Purple
                                        </option>

                                        <option value="2" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "2" ? 'selected' : '')}}@endisset>Yellow.
                                        </option>

                                        <option value="3" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "3" ? 'selected' : '')}}@endisset>Orange
                                        </option>

                                        <option value="4" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "4" ? 'selected' : '')}} @endisset>Red
                                        </option>



                                        <option value="5" @isset($event_data->event_ticket->color)
                                            {{($event_data->event_ticket->color == "5" ? 'selected' : '')}}@endisset>black
                                        </option>
                                    </select>
                            </div>
                            <br>
                            <div class="row  cWizStep6 cCapCapacity" style="padding-left:20px;">
                                <span class="cCheckboxV2">
                                    <input id="CapCapacity" name="hide_buyer" type="checkbox" value="1" @isset($event_data->event_ticket->hide_buyer)
                                    {{($event_data->event_ticket->hide_buyer == "1" ? 'checked' : '')}}@endisset>
                                    <span class="checkmark" style="margin-left: 5px;">
                                    </span> Do not show the buyer name on the ticket</span>
                            </div>
                            <br>
                            <div>


                                @if(isset($venue_sch) && isset($venue))
                                <div id="ctl02_cETicketSampleContainer" class="row" style="padding-left:15px;">
                                    <span id="ctl02_Label23" class="editLabel ">Sample e-ticket: (Ticket color and pricing information does not reflect your actual pricing)
                                    </span>
                                </div>
                                <br>

                                <section class="container" style="    width: 88%;">

                                    <div class="row">
                                        <article class="card fl-left" style="background-color: #008DFF;border-radius: 10px;">
                                            <section class="date">
                                                <div class="ticket-qrcode">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="black">
                                                        <path d="M4.21875 4.21875H15.4688V1.40625H1.40625V15.4688H4.21875V4.21875Z" fill="black" />
                                                        <path d="M15.4688 15.4688V7.03125H7.03125V15.4688H15.4688ZM9.84375 9.84375H12.6562V12.6562H9.84375V9.84375Z" fill="black" />
                                                        <path d="M28.8281 4.21875H40.7812V15.4688H43.5938V1.40625H28.8281V4.21875Z" fill="black" />
                                                        <path d="M37.9688 15.4688V7.03125H29.5312V15.4688H37.9688ZM32.3438 9.84375H35.1562V12.6562H32.3438V9.84375Z" fill="black" />
                                                        <path d="M15.4688 40.7812H4.21875V29.5312H1.40625V43.5938H15.4688V40.7812Z" fill="black" />
                                                        <path d="M15.4688 29.5312H7.03125V37.9688H15.4688V29.5312ZM12.6562 35.1562H9.84375V32.3438H12.6562V35.1562Z" fill="black" />
                                                        <path d="M40.7812 40.7812H28.8281V43.5938H43.5938V29.5312H40.7812V40.7812Z" fill="black" />
                                                        <path d="M23.9062 26.7188H35.1562V32.3438H37.9688V23.9062H23.9062V26.7188Z" fill="black" />
                                                        <path d="M37.9688 37.9688V35.1562H21.0938V23.9062H7.03125V26.7188H18.2812V37.9688H37.9688Z" fill="black" />
                                                        <path d="M18.2812 7.03125H21.0938V15.4688H18.2812V7.03125Z" fill="black" />
                                                        <path d="M7.03125 21.0938H26.7188V7.03125H23.9062V18.2812H7.03125V21.0938Z" fill="black" />
                                                        <path d="M29.5312 18.2812H37.9688V21.0938H29.5312V18.2812Z" fill="black" />
                                                        <path d="M29.5312 29.5312H32.3438V32.3438H29.5312V29.5312Z" fill="black" />
                                                        <path d="M23.9062 29.5312H26.7188V32.3438H23.9062V29.5312Z" fill="black" />
                                                    </svg>
                                                </div>
                                                <time datetime="23th feb" style="color:white;">
                                                    <span style="color:white;">{{date("j ", strtotime($venue_sch->start_date))}}</span>
                                                    <span>{{date("F", strtotime($venue_sch->start_date))}}</span>
                                                </time>
                                            </section>
                                            <section class="card-cont">

                                                <div class="ticket-barcode">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="73" viewBox="0 0 24 73" fill="none">
                                                        <path d="M23.25 73H0L0 70.4336H23.25V73ZM23.2335 69.1708H0L0 67.8672H23.2335V69.1708ZM23.2335 65.3008H0L0 64.038H23.2335V65.3008ZM23.2335 58.9052H0L0 57.6423H23.2335V58.9052ZM23.2335 53.7723H0L0 51.2467H23.2335V53.7723ZM23.2335 47.3767H0L0 46.1139H23.2335V47.3767ZM23.2335 44.8103H0L0 43.5475H23.2335V44.8103ZM23.2335 42.2439H0L0 40.9811H23.2335V42.2439ZM23.2335 37.1517H0L0 34.5853H23.2335V37.1517ZM23.2335 30.7561H0L0 28.1897H23.2335V30.7561ZM23.2335 25.6234H0L0 23.0569H23.2335V25.6234ZM23.2335 20.4905H0L0 17.9239H23.2335L23.2335 20.4905ZM23.2335 16.6613H0L0 14.0948H23.2335V16.6613ZM23.2335 10.2248H0L0 6.39563H23.2335V10.2248ZM23.2335 5.13281H0L0 3.82922H23.2335V5.13281ZM23.25 2.56641H0L0 0H23.25V2.56641Z" fill="black" />
                                                    </svg>

                                                </div>

                                                <h3><b>{{$event_data->frist_title}}&nbsp;@isset($event_data->second_titel){{$event_data->second_titel}}@endisset</b></h3>
                                                <div class="even-date">
                                                    <i class="fa fa-calendar"></i>
                                                    <time>
                                                        <span>wednesday 28 december 2014</span>
                                                        <span>08:55pm to 12:00 am</span>
                                                    </time>
                                                </div>
                                                <div class="even-info">
                                                    <i class="fa fa-map-marker"></i>
                                                    @isset($venue->name)
                                                    <p>
                                                        {{$venue->name}}, {{$venue->street}},{{$venue->city}},
                                                    </p>
                                                    @endisset

                                                </div>
                                                <h3 style="margin-top: 10px;"><b>Price : 20$</b></h3>
                                                <p style="margin-top: 10px;">Print this e-ticket in color or black while or show it on your phone. You will not get admitted without this ticket.</p>
                                            </section>

                                        </article>
                                    </div>
                                    @endif
                                    <!-- <img id="cETicketSample" class="imageticket" src="{{ asset('assets/seller/images/ticket.jpg')}}" style="width: 150px;"> -->
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row step1-step3" style="padding-left:220px;">
                            <div class="row2" style="text-align:center;">
                                <a data-toggle="pill" href="#custom-tabs-one-messages" class="btn btn-secondary prvbtn add_event_prev_button" style="width:202px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 3 Pictures & video</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a data-toggle="pill" href="#tabs-one-detail-tabcustomhref" class="btn btn-secondary nxtbtn add_event_next_button" style="margin-top: 10px; width:202px"><span>Step 5 Details</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
                                <br>
                                <br>
                                <button type="submit" class="btn btn-success  btn-sm svbtn" style="width: 120px;">Save Changes</button>
                                <a class="dltbtn btn btn-success  btn-sm" onclick="clear_form_elements('ticket-form');" style="margin-left: 5px;">Delete</a>



                            </div>
                        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
<br>
<br> <br>
<style>
    #SectionColor {


        width: 300px;

        float: right;


    }

    .color_div {
        width: 8%;
        height: 24px;

    }

    .cselected {
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

                    <div class="row1" style="padding-left:30px;">
                        <span for="cSectionName1">Name:</span><br>
                        <input type="text" id="name" name="name" maxlength="50" value="">
                        <span class="text-danger error-text name_error"></span>
                        <p class="hint priceLevelView" style="font-size:14px;">Ex: Student Tickets, Senior Tickets, Early bird, ...</p>
                    </div>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cDescription">Description:</span><br>
                        <input type="text" id="Description" name="description" value="" class="wide" maxlength="300"><br>
                        <p class="hint sectionView" id="descHint" style="font-size:14px;">Optional - Ex: Free valet parking</p>
                    </div>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cSellPrice1">Face Price: $ </span><br>
                        <input type="number" value="" step="0.01" id="face-price" name="face_price" class="small cFacePrice error" maxlength="10" data-validation-required="1" data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" data-validation-number="float" data-validation-number-min="0" min="0" aria-describedby="cValMsg991180 " aria-invalid="true">
                        <span class="text-danger error-text face_price_error"></span>
                        <p class="hint" style="font-size:14px;">Tickets face price (Ex: 55.00)</p>
                    </div>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cServiceCharge1">Service Charge: $</span><br>
                        <!--   <select id="ServiceChargeType" name="prefix_sc" class="cServiceChargeType" value="" style="width:60px;">
                            <option selected="" value="$">$</option>
                            <option value="%">%</option>
                        </select> -->
                        <input type="number" step="0.01" id="ServiceCharge" name="service_charge" class="small cServiceCharge valid" maxlength="10" data-validation-required="1" data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" value="0" data-validation-number="float" data-validation-number-min="0" min="0" aria-describedby="cValMsg117078 ">
                        <span class="text-danger error-text service_charge_error"></span>

                        <!--  <a href="" class="cCostCalculator" data-toggle="modal" data-target="#exampleModalCenter1">Cost Calculator</a> -->

                        <p class="hint" style="font-size:14px;">Amount you want to collect for this type of ticket as service charge.<br>

                        </p>
                    </div>


                    @isset($venue) </table>
                    @if($venue->seat_chart == null)
                    <div class="row2 cCapacityRow sectionView" style="padding-left:30px;">
                        <span for="cCapacity">Capacity:</span><br>

                        <input type="number" id="Capacity" name="capacity" class="small cCapacity error" maxlength="5" data-validation-required="1" data-validation-regex="^\d{1,5}$" value="" data-validation-number="int" data-validation-number-min="0" min="0" max="99999" aria-describedby="cValMsg994874 " aria-invalid="true">

                        <span class="text-danger error-text capacity_error"></span>
                        <p class="hint" style="font-size:14px;">Maximum number of tickets to sell at this price.</p>
                    </div>
                    @endif
                    @endisset


                    <br>
                    <h2 style="color:#007bff;padding-left: 30px;" class="ColTextHighlight">
                        Additional details: (Optional)
                        <hr>
                    </h2>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cSortOrder1">Sort Order:</span><br>
                        <select id="SortOrder" value="" name="sort_order" style="width:60px;">

                            @for($i=1;$i<=20;$i++) <option value="{{$i}}">{{$i}}</option>
                                @endfor

                        </select>
                        <span class="text-danger error-text sort_order_error"></span>
                        <p class="hint" style="font-size:14px;">Determines the order in which prices are shown on the sales page. Smaller orders show first. If sort orders are the same, then they get sorted by price.</p>
                    </div>
                    <div id="hintsPassword" class="row2" style="padding-left:30px;">
                        <span for="cPricePassword">Password:</span><br>



                        <!--   <input type="password" id="PricePassword" name="price_password" value="" maxlength="50"> -->

                        <textarea name="price_password[]" value="" rows="5" cols="20" id="PricePassword" class="editText" data-validation-required="1" data-validation-disallow="," style="width:170px;"></textarea>


                        <span class="text-danger error-text price_password_error"></span>
                        <p class="hint" style="font-size:14px;">If you want this price to only be available to certain people, you can protect it with a password. Multiple passwords can be separated by comma.</p>
                    </div>
                    <div class="row2 cHideWizard" style="padding-left:30px;">
                        <span for="cBuyPrice1">Buy Price: $</span><br>

                        <!--  <select id="BuyPrice1Type"  name="prefix_bp" value="" class="cBuyPriceType" style="width:60px;">
                            <option value="$">$</option>
                            <option selected=""  value="%">%</option>
                        </select>
 -->
                        <input type="number" min="0" value="" id="BuyPrice1" name="buy_price" class="small cBuyPrice valid">
                        <span class="text-danger error-text buy_price_error"></span>
                        <p class="hint" style="font-size:14px;">If you are re-selling tickets on behalf of somebody else, enter your purchase price</p>
                    </div>

                    <div class="row2" style="padding-left:30px;">
                        <span for="cStart1">Start sale at:</span><br>

                        <select id="Startsale" value="" name="start_sale" class="medium" onchange="startsale(this)">
                            <option selected="" value="0">When the event sale starts</option>
                            <option value="1">Exactly at:</option>
                        </select>
                        <span class="text-danger error-text start_sale_error"></span>
                        <span class="startsaledatepicker" style="display:none;">

                            <input type="date" value="" id="saleStartDate" name="saleStartDate" class="cDatePicker cEndDateView hasDatepicker " style="width:160px;">


                            <input type="time" id="saleStartTime" name="saleStartTime" value="" class="cTimePicker cEndTimeView hasTimepicker" style="width:85px;">
                            <span class="text-danger error-text saleStartDate_error"></span>
                        </span>
                    </div>
                    <br>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cEnd1">End sale at:</span><br>
                        <select id="saleEnd" value="" name="end_sale" class="medium" onchange="Endsale(this)">
                            <option selected="" value="0">When the event sale ends</option>
                            <option value="1">Exactly at:</option>
                        </select>
                        <span class="text-danger error-text end_sale_error"></span>
                        <span class="endsaledatepicker" style="display:none;">

                            <input type="date" value="" name="saleEndDate" id="EndDateView" class="cDatePicker cEndDateView hasDatepicker " style="width:160px;">



                            <input type="time" name="saleEndTime" value="" id="EndTimeView" class="cTimePicker cEndTimeView hasTimepicker" style="width:85px;">
                            <span class="text-danger error-text saleEndDate_error"></span>
                        </span>
                    </div>
                    <br>
                    <div class="row" style="padding-left:40px;">
                        <span>By default, users can purchase any number of tickets. Use section below to limit that. You can set minimum, maximum and increments. You can use this feature to create group tickets or to force buyers to purchase in pairs or triples.</span>
                    </div>
                    <br>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cMin" style="width:270px;">Minimum ticket per transaction:</span><br>
                        <input type="number" id="Minper" name="min_trans" class="small cMin valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="1" min="1" max="99" aria-describedby="cValMsg456194 ">
                        <span class="text-danger error-text min_trans_error"></span>
                        <p class="hint" style="font-size:14px;">Minimum number of tickets allowed to be purchased at this price (default = 1)</p>
                    </div>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cMax" style="width:270px;">Maximum ticket per transaction:</span><br>
                        <input type="number" id="Maxper" name="max_trans" class="small cMax valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="30" min="1" max="99" aria-describedby="cValMsg791711 ">
                        <span class="text-danger error-text max_trans_error"></span>
                        <p class="hint" style="font-size:14px;">Maximum number of tickets allowed to be purchased at this price per transaction<br>
                            Not enforced for administrators and sales agents.
                        </p>
                    </div>
                    <div class="row2" style="padding-left:30px;">
                        <span for="cIncrement" style="width:270px;">Tickets available in increments of:</span><br>
                        <input type="number" id="Increment" name="increment" class="small cIncrement valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="1" min="1" max="99" aria-describedby="cValMsg143756 ">
                        <span class="text-danger error-text increment_error"></span>
                        <p class="hint" style="font-size:14px;">Example: if minimum is set to 4, maximum is set to 10 and increment is set to 2, then buyer can purchase 4, 6, 8 or 10 tickets</p>
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

<!-- end price level Modal -->
<!-- Modal -->
<!-- <div class="modal1 fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document"style=" padding-left: 130px;">
        <div class="modal-content"    >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cost Calculator:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="costCalculator" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 70.5042px; max-height: none; height: auto;">
                    <div class="row1"style="padding-left:20px;">
                        <span for="cSectionName1">Ticket Face Price: ₹</span><br>
                        <input type="number" class="col-lg-6 form-control" step="0.01" data-validation-required="1" min="0" data-validation-number="float" data-validation-number-min="0" data-validation-avoid-success-tick="1" id="cMerchantPercentage" value="2.9" maxlength="5" aria-label="" style="width: 75px;">
                    </div>
                    <br>
                    <div class="row1"style="padding-left:20px;">
                        <span for="inputPassword3" class="col-sm-2 col-form-label">Ticket Fee:</span><br>
                        <select type="text"  value="" class="col-lg-6 form-control">
                            <option value="0" >2.5%</option>
                            <option value="1" >2.7%</option>
                        </select>
                    </div>
                    <br>
                    <div class="row1"style="padding-left:20px;">
                        <span for="inputPassword3" class="col-sm-2 col-form-label">Ticketor's Flat Fee / Ticket : </span><br>
                        <select type="text"  value="" class="col-lg-6 form-control">
                            <option value="2">0.25</option>
                            <option value="3">0.49</option>
                        </select>
                    </div>
                    <br>
                    <div class="row1"style="padding-left:20px;">
                        <span for="inputPassword3" class="col-sm-2 col-form-label">My payment processor charges %:  </span><br>
                        <input type="number" class="col-lg-6 form-control" step="0.01" data-validation-required="1" min="0" data-validation-number="float" data-validation-number-min="0" data-validation-avoid-success-tick="1" id="cMerchantPercentage" value="2.9" maxlength="5" aria-label="" style="width: 75px;">
                    </div>
                    <br>
                    <p style="padding-left:20px;">Total Fees: ₹<b class="cTotalFee">0</b> (Ticketor + Payment Processor)</p>
                    <p style="padding-left:20px;"><b>Set the service-charge to ₹<span class="cTotalFee">0</span>, to transfer all charges to the buyer,</b></p>
                    <p style="padding-left:20px;">or anything over, to make profit. </p>
                </div>
            </div>
        </div>
    </div>
</div> -->