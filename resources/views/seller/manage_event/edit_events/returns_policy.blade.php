<div class="card-body">
   <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
    <h3 class="devider ColTextHighlight"style="color: #007bff;">
        <i class="fa fa-reply fa-15x " style="color: #007bff ;padding-top:10px"></i>&nbsp;&nbsp;Returns policy:
        <hr>
    </h3>
    <p class="hint"style="padding-left:10px">Setting a return policy allows for self-service returns for your buyers in accordance to the policy you set. Admins can always return tickets, regardless of the return policy.&nbsp;&nbsp;
        <a style="color: #007bff" href="{{URL('seller/instruction')}}" >(learn more)</a>
    </p>
    <span for="ctl02_cReturnPolicy" class="editLabel"style="padding-left:10px">Returns policy:</span>
    <!--   <form action="{{URL('seller/add_event_policy')}}" id="policy" method="POST">
        @csrf -->
    <form id="policy_form">

        <input type="hidden" name="id" value="@isset($event_data->event_policies->event_id){{$event_data->event_policies->event_id}}@endisset" id="id">
        <div class="row clearfix  cTextV2 "style="padding-left:10px;">
            
            <select name="return_policy" id="return_policy" class="editText cReturnPolicy" onchange="getval(this.value)"data-validation-avoid-success-tick="1">
              
                <option  value="0"@isset($event_data->event_policies) {{($event_data->event_policies->return_policy == "0" ? 'selected' : '')}} @endisset>No returns - All sales are final</option>
                <option value="1"@isset($event_data->event_policies) {{($event_data->event_policies->return_policy == "1" ? 'selected' : '')}} @endisset>Return accepted...</option>
            </select>
            <span class="text-danger error-text return_policy_error"></span>
        </div>
        <br>
    
        <div class="cReturn return-accept" style="margin-left: 20px; display: none;">

            <div class="row">

                <input name="ReturnUpToHoursBefore"
                @isset($event_data->event_policies)
                value="{{$event_data->event_policies->rp_upto_hours}}"
                @endisset
                 type="number"  min="0" maxlength="5" class="editText cReturnHoursBefore valid" data-validation-number="UInt" style="width:85px;" aria-describedby="cValMsg281453">

                <span class="errorMsg" id="cValMsg281453" style="display: inline;"></span>

                <span for="ctl02_cReturnHoursBefore" id="ctl02_Label5" class="editLabel" style="margin-left: 10px;">Up to</span>

                <span id="ctl02_Label17">&nbsp;hours before the event</span>
            </div>


            <br>
            <div class="row">
                <input name="DeductionStoreCredit" type="number" 
                 @isset($event_data->event_policies)
                value="{{$event_data->event_policies->sc_deduction}}"
                @endisset
                 
                 min="0" maxlength="5"  class="editText" data-validation-number="float" style="width:85px;">
                <span for="ctl02_cReturnForStoreCreditPercent" id="ctl02_Label15" class="editLabel" style="margin-left: 10px;">Deduction</span>
                <span id="ctl02_Label18">% if returned for store credit.</span>
            </div>
            <br>
            <div class="row">
                <input name="DeductionCreditCard" 
                 @isset($event_data->event_policies)
                value="{{$event_data->event_policies->cc_deduction}}"
                @endisset
                 

                type="number"  min="0" maxlength="5"  class="editText" data-validation-number="float" style="width:85px;">
                <span for="ctl02_cReturnToCreditPercent" id="ctl02_Label16" class="editLabel" style="margin-left: 10px;">Deduction</span>
                <span id="ctl02_Label19">% if returned to credit card</span>
            </div>
        </div>
      
        <br>
        <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
        <h3 class="devider ColTextHighlight" style="color: #007bff">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16" fill="none">
                <g clip-path="url(#clip0)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.999917 11.4997C0.999917 11.6323 1.0526 11.7594 1.14636 11.8532C1.24013 11.947 1.36731 11.9997 1.49992 11.9997H13.2929L10.1459 15.1457C10.052 15.2395 9.99929 15.3669 9.99929 15.4997C9.99929 15.6324 10.052 15.7598 10.1459 15.8537C10.2398 15.9475 10.3671 16.0003 10.4999 16.0003C10.6327 16.0003 10.76 15.9475 10.8539 15.8537L14.8539 11.8537C14.9005 11.8072 14.9374 11.752 14.9626 11.6913C14.9878 11.6305 15.0008 11.5654 15.0008 11.4997C15.0008 11.4339 14.9878 11.3688 14.9626 11.308C14.9374 11.2473 14.9005 11.1921 14.8539 11.1457L10.8539 7.14566C10.76 7.05177 10.6327 6.99902 10.4999 6.99902C10.3671 6.99902 10.2398 7.05177 10.1459 7.14566C10.052 7.23954 9.99929 7.36688 9.99929 7.49966C9.99929 7.63243 10.052 7.75977 10.1459 7.85366L13.2929 10.9997H1.49992C1.36731 10.9997 1.24013 11.0523 1.14636 11.1461C1.0526 11.2399 0.999917 11.367 0.999917 11.4997V11.4997ZM14.9999 4.49966C14.9999 4.63226 14.9472 4.75944 14.8535 4.85321C14.7597 4.94698 14.6325 4.99966 14.4999 4.99966H2.70692L5.85392 8.14565C5.90041 8.19214 5.93728 8.24733 5.96244 8.30807C5.9876 8.36881 6.00055 8.43391 6.00055 8.49965C6.00055 8.5654 5.9876 8.6305 5.96244 8.69124C5.93728 8.75198 5.90041 8.80717 5.85392 8.85365C5.80743 8.90014 5.75224 8.93702 5.6915 8.96218C5.63076 8.98734 5.56566 9.00029 5.49992 9.00029C5.43417 9.00029 5.36907 8.98734 5.30833 8.96218C5.24759 8.93702 5.1924 8.90014 5.14592 8.85365L1.14592 4.85366C1.09935 4.80721 1.06241 4.75203 1.0372 4.69129C1.012 4.63054 0.999023 4.56542 0.999023 4.49966C0.999023 4.43389 1.012 4.36877 1.0372 4.30802C1.06241 4.24728 1.09935 4.1921 1.14592 4.14566L5.14592 0.145655C5.2398 0.0517684 5.36714 -0.000976562 5.49992 -0.000976562C5.63269 -0.000976563 5.76003 0.0517684 5.85392 0.145655C5.9478 0.239542 6.00055 0.366879 6.00055 0.499655C6.00055 0.632431 5.9478 0.759768 5.85392 0.853655L2.70692 3.99966H14.4999C14.6325 3.99966 14.7597 4.05233 14.8535 4.1461C14.9472 4.23987 14.9999 4.36705 14.9999 4.49966Z" fill="#007BFF"/>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="22" height="22" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            &nbsp;&nbsp;Exchange / upgrade policy:
        </h3>
        <hr>
        <p class="hint"style="padding-left:10px">Setting an exchange / upgrade policy allows for self-service upgrades for your buyers in accordance to the policy you set. Admins can always exchange tickets, regardless of the policy.&nbsp;&nbsp;<a  style="color: #007bff" target="_blank">(learn more)</a></p>
        <p class="hint" style="padding-left: 10px ;">Exchange does not return money or give credit to the buyer. If the buyer exchanges their tickets with less expensive tickets, they will loose the difference.</p>
        <span for="ctl02_cExchangePolicy" class="editLabel" style="padding-left: 10px ;">Exchange / upgrade policy:</span>
        <div class="row2 clearfix cTextV2  " style="padding-left: 10px ;">

            <select name="ExchangePolicy" id="ctl02_cExchangePolicy" 
             onchange="getcategory(this.value)"; class="editText cExchangePolicy exchangeupgrade" data-validation-avoid-success-tick="1" style="width:80%">
                <option  value="0"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "0" ? 'selected' : '')}}@endisset>No exchange - All sales are final</option>

                <option  value="1"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "1" ? 'selected' : '')}}@endisset
                >Exchange / upgrade accepted within the same event (no refund)</option>

                <option value="2"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "2" ? 'selected' : '')}}@endisset
                >Exchange / upgrade accepted within the same event and other recurrences of this event (no refund)</option>

                <option value="3"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "3" ? 'selected' : '')}}@endisset
                >Exchange / upgrade accepted within the same event and events in following category (no refund):</option>

                <option value="4"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "4" ? 'selected' : '')}}@endisset
                >Exchange / upgrade accepted within the same event and events from the same event organizer (no refund):</option>

                <option value="5"@isset($event_data->event_policies)
                {{($event_data->event_policies->exchange_upgrade == "5" ? 'selected' : '')}}@endisset
                >Exchange / upgrade accepted with any event (no refund)</option>
            </select>
            <span class="text-danger error-text ExchangePolicy_error"></span>
        </div>
        <br>

        <div class="row cExchangeCategories cateExchange" style="display:none;padding-left: 15px ;">
            <span id="ctl02_Label29" class="editLabel">Category</span>

            <input name="ExchangeCategories"@isset($event_data->event_policies) 
            value="{{$event_data->event_policies->eu_category}}"@endisset 

            type="text" maxlength="100" id="ctl02_cExchangeCategories" class="editText " data-validation-required="1" style="width:291px;margin-left: 5px;">
        </div>
        <br>
        <!-- error -->
        <div class="cExchange" style="display: none;padding-left: 15px ;">
            <div class="row"style="padding-left:10px;">
                <span id="ctl02_Label25" class="editLabel"style="padding-right: 6px;">Up to</span>
                <input name="ExchangeHoursBefore" type="number" 
                @isset($event_data->event_policies)value="{{$event_data->event_policies->eu_upto_hours}}"@endisset
                 maxlength="5" id="ctl02_cExchangeHoursBefore" class="editText cExchangeHoursBefore" data-validation-number="UInt" min="0" style="width:55px;">
                <span id="ctl02_Label26" style="padding-left: 6px;">hours before the event</span>
            </div>
            </div>
        
            
            
            <br>
            <!-- div closing problem -->
            <!--/ error -->
            <div>
            <div class="row step1-step3" style="padding-left:220px;">
                <div class="row2" style="text-align:center;">
                     <a class="btn btn-secondary prvbtn add_event_prev_button" data-toggle="pill" href="#custom-tabs-one-home" style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 1 Information</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <a data-toggle="pill" href="#custom-tabs-one-messages" class="btn btn-secondary nxtbtn add_event_next_button" style="margin-top: 10px; width:218px"><span>Step 3 Pictures & video</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
                    <br>
                    <br>

                    <button type="submit" class="btn btn-success  btn-sm svbtn" style="width: 120px;">Save Changes</button>


<a class="dltbtn btn btn-success  btn-sm" onclick="clear_form_elements('policy_form');"   style="margin-left: 5px;">Delete</a>
 
                </div>
                
               
    </form>
    </div>
    </div>
    <div class="col-md-4">
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<br>    <br>    <br>    