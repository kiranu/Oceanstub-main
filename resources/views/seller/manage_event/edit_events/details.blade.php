<div id="options" style="padding-left: 20px;">
  <div class="Help" style="float: right;margin:18px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
    <h3 class="devider ColTextHighlight" style="color: #007bff" ;><i class="fa fa-info-circle fa-15x " style="color: #007bff" ;></i>&nbsp;&nbsp;Details:
    </h3>
    <hr>

   <!-- <form method="POST" action="{{URL('/seller/add_detailes')}}" enctype="multipart/form-data" > -->
    <form id="details-form">
      
    @csrf
     <input type="hidden" name="id" id="id" 
     @isset($event_data->event_details)
     value="{{$event_data->event_details->event_id}}" @endisset>
        <div class="row2"style="margin-left: 10px;display: none;">
        <span for="cSectionName1" >Organizer:</span><br> 
        <select name="organizer" id="organizer" style="margin-left: px;width:190px;">
        <option value="{{$organizer_name->id}}">{{$organizer_name->name}}</option>
        </select>
        <span class="text-danger error-text organizer_error"></span>
        </div>


<!-- <p class="hint" style="margin-left: 10px;font-size: 14px;">Will receive emails on sales and will have access to the sales reports</p> -->
<span for="cSectionName1"style="margin-left: 10px;" >Categories:</span><br>

<?php
if($event_data->event_details !=null){
$categories = explode(',',$event_data->event_details->categories);
$subcategories = explode(',',$event_data->event_details->sub_categories);
}else{
  $categories=null;
 $subcategories=null;
}
?>

<input  type="text" class="form-control" id="tokenfieldcat" name="cat[]"
@php
$temp='';

 @endphp
   @if($categories!=null)

   @foreach($categories as $info)
    @php $temp=$temp.','.$info @endphp 
     @endforeach 
    selected="selected"
 @else 
 value=""

 @endif
 value="{{$temp}}"

    style="width:50%"/>

<br>
 <span for="cSectionName1"style="margin-left: 10px;" >Sub Categories:</span>
<input  type="text" class="form-control" id="tokenfieldsub" name="subcat[]"

    @php
$temp='';

 @endphp
   @if($subcategories!=null)

   @foreach($subcategories as $info)
    @php $temp=$temp.','.$info @endphp 
     @endforeach 
    selected="selected"
 @else 
 value=""

 @endif
 value="{{$temp}}"
    style="width:50%"/>


<p class="hint" style="clear:both;margin-top: 10px;margin-left:10px;font-size: 14px;">

Optional - Allows buyer to filter events by category or you can create coupons that apply to all events in certain category - Separate by comma.
</p>

</div>
<!-- error -->

<h3 class="devider ColTextHighlight" style="margin-left: 15px; color: #007bff"><i style="color: #007bff" ; class="fa fa-info-circle fa-15x"></i>&nbsp;&nbsp;Description:</h3>
<hr>
<div class="row" style="margin-left: 15px;">
    <span for="ctl02_cComment" class="editLabel">Event Description: (Details, notes, additional videos or pictures, ...)</span>
</div>

<div class="row">
    <textarea id="summernote" name="EventDescription" 
       @isset($event_data->event_details) 
       value="{!! $event_data->event_details->event_descriptions !!}">
        {!! $event_data->event_details->event_descriptions !!}@endisset
    </textarea>
</div>
<br>
<div style="margin-top:25px;">
    <span for="ctl02_cComment2" style="margin-left: 15px;" class="editLabel">After purchase notes:</span>
    <p class="hint" style="margin-left: 15px; font-size: 14px;"> (It is NOT shown to the user before purchase. It shows up on the sales confirmation page and email for the users who purchase tickets.)</p>
</div>

<div class="row">
    <textarea id="summernote1" name="Afterpurchasenotes" @isset($event_data->event_details)
value="{!! $event_data->event_details->purchase_notes !!}" @endisset
     ></textarea>
</div>

<h3 class="devider ColTextHighlight" style="color: #007bff;margin-top:20px;"><i class="fa fa-gear fa-15x"></i>&nbsp;&nbsp;options:
</h3>
<hr>
<!--/ error -->


<div class="row2 ">
              <span for="cSectionName1"style="margin-left: 15px;" >Remaining tickets:</span><br> 
              <select class="remainingticketsuboption" onchange="getnumber(this.value);" 
              name="Remainingtickets" id="Remainingtickets" style="margin-left: 15px;width:400px;">

                <option value="1" @isset($event_data->event_details) {{($event_data->event_details->remining_ticket == "1" ? ' selected' : '')}} @endisset>Do not show the number of remaining tickets</option>
                <option value="2" 

                @isset($event_data->event_details) 
                {{($event_data->event_details->remining_ticket == "2" ? ' selected' : '')}} @endisset

                >Show the number of remaining tickets</option>
                <option value="3"
                @isset($event_data->event_details) {{($event_data->event_details->remining_ticket == "3" ? ' selected' : '')}} @endisset
                 >Only show the number of remaining tickets if</option>
              </select>
            </div>

 <br>
        <div class="row" id="Remainingtic" style="display:none;padding-left: 15px ;">
             <span id="ctl02_Label25" class="editLabel"style="padding-right: 6px;">Less than</span>
                <input name="reminingNo" type="number" 

                value="@isset($event_data->event_details){{$event_data->event_details->remining_no}}@endisset"

                 maxlength="5"  class="editText" data-validation-number="UInt" min="0" style="width:55px;">
                <span id="ctl02_Label26" style="padding-left: 6px;">tickets are remaining</span>
        </div>
        


            
            <div class="row2">
              <span for="cSectionName1"style="margin-left: 15px;" >Tax & Service Charges:</span><br> 
              <select name="TaxServiceCharges" id="TaxServiceCharges" class="taxservicesuboption" style="margin-left: 15px;width:400px;">

                <option value="1"
                @isset($event_data->event_details) {{($event_data->event_details->tax_service == "1" ? ' selected' : '')}} @endisset
                >Always display tax & service charges along with the price.</option>
                <option value="2"
                 @isset($event_data->event_details) {{($event_data->event_details->tax_service == "2" ? ' selected' : '')}} @endisset
                >Only display tax & service charges on the checkout page.</option>
                
              </select>
            </div>
            <br>
            <div class="row2">
              <span for="cSectionName1"style="margin-left: 15px;" >Show a message indicating that the price level is selling out:</span><br>

              <select name="IndicatingPriceLevel" id="IndicatingPriceLevel" style="margin-left: 15px;width:190px;">
                <option value="0"
                 @isset($event_data->event_details) {{($event_data->event_details->price_level == "0" ? ' selected' : '')}} @endisset
                 >Never</option>
                <option value="90"
                @isset($event_data->event_details) {{($event_data->event_details->price_level == "90" ? ' selected' : '')}} @endisset
                 >When 90% of the capacity is sold</option>
                <option value="80"
                @isset($event_data->event_details) {{($event_data->event_details->price_level == "80" ? ' selected' : '')}} @endisset

                 >When 80% of the capacity is sold</option>
                <option value="70" 
                @isset($event_data->event_details) {{($event_data->event_details->price_level == "70" ? ' selected' : '')}} @endisset

                >When 70% of the capacity is sold</option>
                <option value="50"
                @isset($event_data->event_details) {{($event_data->event_details->price_level == "50" ? ' selected' : '')}} @endisset
                 >When 50% of the capacity is sold</option>
                <option value="1" 
                @isset($event_data->event_details) {{($event_data->event_details->price_level == "1" ? ' selected' : '')}} @endisset
                >Always</option>
              </select>
            </div>

            <p class="hint" style="clear:both;margin-left: 15px;font-size: 14px;">The message will encourage the buyers to buy sooner</p>
            <span for="cSectionName1"style="margin-left: 15px;" >Mark Event As: (optional)</span><br> 

            <input style="margin-left: 15px;" name="MarkAs" 
            value="@isset($event_data->event_details) {{$event_data->event_details->mark_as}} @endisset" 

            type="text" maxlength="15" id="MarkAs" class="editText" style="width:200px;" data-validation-avoid-success-tick="1">

            <p style="margin-left: 15px;font-size: 14px;" class="hint" style="clear:both;margin-top: 10px; ">Shows a red ribbon on event thumbnail with your text. Examples: SOLD OUT, ON SALE, SELLING FAST, COMING SOON</p>


            <span for="cSectionName1"style="margin-left: 15px;" >Buy tickets button text: (optional)</span><br> 


            <input style="margin-left: 15px;"
            value="@isset($event_data->event_details) 
            {{$event_data->event_details->ticket_btn_text}} @endisset"
             name="TicketsBtnText" type="text" maxlength="50" id="TicketsBtnText" class="editText" style="width:391px;" data-validation-avoid-success-tick="1">

            <p style="margin-left: 15px;font-size: 14px;" class="hint" style="clear:both;font-size: 14px;">Leave blank to use the default value: 'Tickets'</p>


            <br>
            <h3 style="margin-left: 15px;color:#007bff" class="devider ColTextHighlight cAR"><i class="fa fa-lock fa-15x" style="color: #007bff";></i>&nbsp;&nbsp;Availability &amp; Restrictions:</h3>
            <hr>
            <p style="margin-left: 15px;" style="margin:8px 0;" class="hint">You can change or remove the restrictions at any time.<br>
              These restrictions does not apply to admins and sales agents.
            </p>
            <div class="row cLimitToGroup cHideShowNextRow" style="margin-left: 15px;display: none;">
              <span class="cCheckboxV2">

                <input id="ctl02_cLimitToGroup" type="checkbox" value="true" 

                 name="checkGroup" onchange="showusers(this.checked)"
                 @isset($event_data->event_details)
                 {{($event_data->event_details->check_group == "true" ? ' checked' : '')}}@endisset>
               <span class="text-danger error-text checkGroup_error"></span>

                <span class="checkmark"></span> Only users in certain group can purchase tickets.</span>
            </div>

            <div class="row  cTextV2  cLimitToGroupContainer" style="display: none;margin-top:10px;margin-left: 30px; margin-bottom: 10px;">
              <span class="editLabel">Group</span>

              <select style="margin-left: 5px; width:170px;" name="GroupId" id="GroupId" class="filterText " data-validation-required="1"  data-validation-avoid-success-tick="1">
                <option value="34" @isset($event_data->event_details)
                {{($event_data->event_details->group_name == "34" ? 'selected' : '') }} @endisset>gruop name</option>
              </select>
               <span class="text-danger error-text GroupId_error"></span>

            </div>
            <div class="row cHasPassword  cHideShowNextRow" style="margin-left: 15px;">
              <span class="cCheckboxV2">

                <input id="HasPassword" value="true" type="checkbox" name="HasPassword" onchange="showPassword(this.checked)" @isset($event_data->event_details)
                {{($event_data->event_details->check_password == "true" ? ' checked' : '')}}@endisset>
                 <span class="text-danger error-text HasPassword_error"></span>

                <span class="checkmark"></span> Only users who have a password can purchase tickets</span>
            </div>



            <div class="row  cHasPasswordContainer " style="display:none; margin-top:10px;margin-left: 30px;">
              <span for="ctl02_cPasswords" class="editLabel">Passwords:</span>  <br>  

            <!--   <input style="margin-left: 5px;" 
              value="@isset($event_data->event_detail_ava) {{$event_data->event_detail_ava->ticket_passworsd}} @endisset" 
              name="PasswordTicket"
               type="text"
               maxlength="50" 
              id="PasswordTicket" class="editText" style="width:391px;" data-validation-avoid-success-tick="1"
              > -->
              <?php 
               if($event_data->event_details != null)
               {
                $pswds = explode(',',$event_data->event_details->ticket_passworsd);
               
                
              }else{
               $pswds = null;
              }
              ?>
             <textarea name="Passwords[]" rows="5" cols="20" id="Passwords" class="editText" data-validation-required="1" data-validation-disallow="," style="width:170px;"
             @php
             $temp='';
             @endphp
             @if($pswds != null)
             @foreach($pswds as $pswrd)
              @php $temp=$temp."\n".$pswrd @endphp 
             @endforeach
             @else
             value=""
             @endif
              
             >
               @php
             $temp='';
             @endphp
             @if($pswds != null)
             @foreach($pswds as $pswrd)
            {{$temp=$temp."\n".$pswrd}}
             
              
             @endforeach
             @else
             value=""
             @endif
             </textarea>


               <span class="text-danger error-text PasswordTicket_error"></span>

              <p class="hint" style="clear:both;margin-left: 15px;font-size: 14px;">One password per line - Maximum password length 8 characters</p>
              <p class="hint" style="clear:both;margin-left: 30px;font-size: 14px;">Each password can only be used in one transaction</p>


            </div>


            <div class="row cHasMaxTicketsPerPerson  cHideShowNextRow" style="margin-left: 15px;">
              <span class="cCheckboxV2">

                <input id="ctl02_cHasMaxTicketsPerPerson" type="checkbox"
                value="true" 
                 onchange="showlimit(this.checked)" name="checkLimit"
                 @isset($event_data->event_details) 
             {{($event_data->event_details->check_limit == "true" ? ' checked' : '')}}@endisset>
              <span class="text-danger error-text checkLimit_error"></span>

                <span class="checkmark"></span>
                 Limit the number of tickets per user (email)</span>
            </div>
            <div class="block show-limit" style="margin-top:10px;margin-left: 0px; display: none;">
              <span id="ctl00_CPMain_Label10" class="editLabel"style="padding-left: 30px;">Max. number of tickets per account:</span><br>

              <input name="LimitTicketPerUser" type="number" 
              value="@isset($event_data->event_details){{$event_data->event_details->limit}}@endisset"
               maxlength="5"
               id="LimitTicketPerUser" class="editText" data-validation-number="float" data-validation-number-min="0" style="width:85px;margin-left: 40px; "data-validation-avoid-success-tick="1" min="0">
                <span class="text-danger error-text LimitTicketPerUser_error"></span>


              <p class="hint"style="padding-left: 30px;font-size: small;">The maximum is enforced per user (email address) across all their transactions.</p>
            </div>


            <div class=" cAdv" style="margin-top: 20px;margin-left: 15px;">
              <h3 class="devider ColTextHighlight cQuestionsDevider"style="color: #007bff">

                <i class="fa fa-question-circle fa-15x "style="color: #007bff"></i>&nbsp;&nbsp;Questions to be asked:
                <hr>

              </h3>
              <p style="margin:8px 0;margin-left: 10px;">
                &nbsp;&nbsp;
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                  <path d="M12.8 1.61286L19.501 12.7739C20.464 14.3769 19.991 16.4859 18.444 17.4839C17.9248 17.8201 17.3196 17.9992 16.701 17.9999H3.298C1.477 17.9999 0 16.4699 0 14.5809C0 13.9419 0.173 13.3169 0.498 12.7739L7.2 1.61286C8.162 0.00985825 10.196 -0.481142 11.743 0.516858C12.171 0.792858 12.533 1.16786 12.8 1.61286V1.61286ZM10 13.9999C10.2652 13.9999 10.5196 13.8945 10.7071 13.707C10.8946 13.5194 11 13.2651 11 12.9999C11 12.7346 10.8946 12.4803 10.7071 12.2928C10.5196 12.1052 10.2652 11.9999 10 11.9999C9.73478 11.9999 9.48043 12.1052 9.29289 12.2928C9.10536 12.4803 9 12.7346 9 12.9999C9 13.2651 9.10536 13.5194 9.29289 13.707C9.48043 13.8945 9.73478 13.9999 10 13.9999V13.9999ZM10 4.99986C9.73478 4.99986 9.48043 5.10522 9.29289 5.29275C9.10536 5.48029 9 5.73464 9 5.99986V9.99986C9 10.2651 9.10536 10.5194 9.29289 10.707C9.48043 10.8945 9.73478 10.9999 10 10.9999C10.2652 10.9999 10.5196 10.8945 10.7071 10.707C10.8946 10.5194 11 10.2651 11 9.99986V5.99986C11 5.73464 10.8946 5.48029 10.7071 5.29275C10.5196 5.10522 10.2652 4.99986 10 4.99986Z" fill="#000000"/>
                </svg>
                &nbsp;&nbsp;Asking unnecessary questions during purchase may cause the buyer to abandon the sales and may result in business loss. Only ask questions if really necessary.
              </p>
          <!--     <p style="text-align:right; margin-bottom:15px;"><a href="/question_bank" target="_blank" class="cManageQuestions ColTextHighlight"><i class="fa fa-plus-circle fa-hover fa-15x"></i>&nbsp;&nbsp;Create and manage questions&nbsp;<sup><i class="fa fa-external-link"></i></sup></a></p> -->

              <br>

             
              <h4><b>Questions to be asked per invoice:</b></h4>
              <p style="margin:8px 0;margin-left: px;font-size:14px" class="hint">For example: How did you hear about this event?</p>

           

 <div class="cMultiQuestionPicker ">
 
               

                <input  type="text" id="ctl02_QuestionPickerInvoice_cQuestionIds" class="cQuestionIds " style="display:none;">

                <ol id="ctl02_QuestionPickerInvoice_cSelectedQuestions" class="selectedQuestions"></ol>

                <input type="text"
                id="QusPerInvoice" 
                name="QusPerInvoice" 
                 class="editText cQuestionAutoComplete ui-autocomplete-input questionperinvoice" style="width:450px;">


                <a  class="cAddQuestion" id="subInvoiceQuestion">

                  <i class="fa fa-arrow-circle-right fa-hover ">
                    
                  </i>Add the question</a>


                <p class="hint" style="margin-top:10px;font-size:14px">Enter a few letters of the question that you have already created in the question manager, to select it. then click on <i>Add the question</i> button.</p>

        
              </div>

 
<h4><b>Questions to be asked per ticket:</b></h4>

<p style="margin:8px 0;font-size:14px" class="hint">For example: What option do you want for dinner?</p>





 <div class="cMultiQuestionPicker ">
    <input type="text"
      id="QusPerTicket" 
      name="QusPerTicket" 
     class="editText cQuestionAutoComplete ui-autocomplete-input questionperinvoice" style="width:450px;">
    <a  class="cAddQuestion" id="Question">
    <i class="fa fa-arrow-circle-right fa-hover ">
    </i>Add the question</a>
    <p class="hint" style="margin-top:10px;font-size:14px">Enter a few letters of the question that you have already created in the question manager, to select it. then click on <i>Add the question</i> button.</p>
  </div>
</div>




  <div class=" cAdv">
              <br>
              <h3 class="devider ColTextHighlight" style="margin-left: 15px;color: #007bff;">
                <i class="fa fa-star fa-15x " style="color: #007bff;"></i>&nbsp;&nbsp;Pre-checkout items:



              <!--   <div class="cHelp">
                  <a style="float:right;margin-top: -50px;"class="showHint ColTextHighlight" href="" target="_blank" title="Suggesting (promoting) related or featured events, merchandise or donation options in the checkout flow, on the pre-checkout page" data-title="Suggesting (promoting) related or featured events, merchandise or donation options in the checkout flow, on the pre-checkout page"><i ></i></a></div> -->



              </h3>
              <hr style="padding-left: 20px;">
              <h3 style="margin-left: 20px;font-size: 18px;"><b>Items to be shown on the pre-checkout page for purchases that include this event. (Items similar or related to this event.)</b></h3>
              <br>
              <input type="hidden" name="ctl02$cPrecheckoutSettings$cSelectedProducts" id="ctl02_cPrecheckoutSettings_cSelectedProducts">
              <input type="hidden" name="ctl02$cPrecheckoutSettings$cSelectedDonations" id="ctl02_cPrecheckoutSettings_cSelectedDonations">
              <input type="hidden" name="ctl02$cPrecheckoutSettings$cSelectedEvents" id="ctl02_cPrecheckoutSettings_cSelectedEvents">
              <div class="cPreCheckoutSettingsModule" style="margin-left: 15px;">
                <input type="hidden" name="ctl02$cPrecheckoutSettings$cPrecheckoutSelectedValue" id="ctl02_cPrecheckoutSettings_cPrecheckoutSelectedValue" value="//">
                <div id="cPrecheckoutSettings">
                  <div class="row box_pre" style="padding-left:10px;">
                    <p class="hint"style="font-size:14px;">Pre-checkout page is a promotional page that you can use to promote featured / related items (events, merchandise or donation options) prior to checkout. The items to be promoted can be selected globally, which affects all purchases, or/and can be selected per event, such as similar or relevant items, so they will only show up if the buyer is purchasing that specific event.
                    </p>
                    <p class="hint"style="font-size:14px;">If any item is selected to be shown on the pre-checkout page, the buyers will be taken to the pre-checkout page prior the checkout, where they can see related events, merchandise or donation options which they can add to their shopping cart prior to checkout.</p>
                  </div>
                  <br>



            <div class="cPrecheckoutSettingsOn" style="padding-left:10px;">
                <!-- <div class="row">
                    <h4>Donation options to be shown:</h4>
                    <hr>
                    <p class="hint">You should have one or more donation pages to add donations on the pre-checkout page. You can add donations from <i>Control Panel &gt; Account &amp; Settings  &gt; Pages &amp; Navigations</i></p>
                </div>
                <div class="row">
                    <i class="fa  fa-plus"></i>&nbsp;&nbsp;<a href="javascript:void(0)" class="cPicker" data-datatype="donations" data-selecttype="multi" data-callbackfunction="PrecheckoutDonationsSelected">Select Donations</a>
                </div> -->
                
                <div class="row">
                    <h4>Events to be shown:</h4>
                </div>
                <div class="row">
                 

                <select style="width:450px !important" id="ShownEvents" class="js-example-basic-multiple" name="eventstates[]"
               
  
                 multiple="multiple">
        @if($show_evn != null)
             @foreach($events as $key => $row)
                <option value="{{$row['id']}}" 
               @isset($show_evn[$key]){{($show_evn[$key]->id == $row['id'] ? 'selected' : '') }}@endisset>
              {{$row['first_title']}}</option>
              @endforeach
              @else
               @foreach($events as $event)
               <option value="{{$event->id}}">{{$event->first_title}}</option>
          @endforeach
        @endif 

                </select>
                </div>
                <br>
                <div class="row">
                    <h4>Merchandise to be shown:</h4>
                </div>
                <div class="row">
                  
                <select style="width:450px !important" class="js-example-basic-multiple-mer" name="merstates[]" multiple="multiple">
                   


                  @if($show_mer != null)
                  @foreach($mers as $key => $row)
                  <option value="{{$row['id']}}"
                 @isset($show_mer[$key]){{($show_mer[$key]->id == $row['id'] ? 'selected' : '')}}@endisset>
                  {{$row['name']}}</option>
                  @endforeach

                  @else
                   @foreach($mers as $mer)
                    <option value="{{$mer->id}}">{{$mer->name}}</option>
                    @endforeach
                  @endif  



                  </select>
                </div>
                <!-- <br>
                <h3 class="devider ColTextHighlight cActionsDevider" style="margin-top: 20px;color: #007bff;"><i class="fa fa-bolt fa-15x "></i>&nbsp;&nbsp;Actions:</h3>
                <hr> -->
               <!--  <div class="row ">
                    <button class="nsBtn medium utility cShowMessagePopup" data-showmessagepopup_title="Event not complete" data-showmessagepopup_body="Complete and save the event before replicating it. For a list of incomplete or missing information, click on the warning message at the top of the page.">Duplicate Event</button>
                    <div class="cHelp">
                        <a class="showHint ColTextHighlight" href="" target="_blank" title="Create recurring events and event replication" data-title="Create recurring events and event replication">
                            <i style="float:right;" class="fa fa-question-circle  fa-2x fa-hover"></i>
                        </a>
                    </div>
                </div> -->
              <!--   <div class="row " style="margin-top: 20px;">
                    <i class="fa fa-barcode fa-15x"></i>&nbsp;&nbsp;<a href="javascript:void(0)" data-eventid="209527" class="cResetScannedTickets" style="margin-top:-5px;">Reset scanned tickets</a>
                    <div class="cHelp">
                        <a class="showHint ColTextHighlight" href="" target="_blank" title="Gate Control &amp; E-Ticket Validation" data-title="Gate Control &amp; E-Ticket Validation">
                            <i class="fa fa-question-circle  fa-2x fa-hover"></i>
                        </a>
                    </div>
                </div>
                <br> -->

<br>  <br>  

                <div class="row step1-step3" style="padding-left:220px;">
                    <div class="row2" style="text-align:center;">

    <a data-toggle="pill" href="#custom-tabs-one-settings" class="btn btn-secondary prvbtn add_event_prev_button" style="width:200px;margin-left:26px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 4 Tickets</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;





          <a  class="btn btn-secondary nxtbtn add_event_next_button" 
          data-toggle="pill" href="#custom-tabs-one-Payment-tabhhref" style="margin-top: 10px;width:200px;">
            
            <span>Step 6 Payment</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>

                        <br>
                        <br>
                        <button type="submit" class="btn btn-success  btn-sm svbtn" style="width: 120px;">Save Changes</button>
<a class="dltbtn btn btn-success  btn-sm" onclick="clear_form_elements('details-form');"   style="margin-left: 5px;">Delete</a>

                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <br>
</div>

<br>  <br>  <br>  