<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding:20px;">

             <div class="Help" style="float: right;margin: 24px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
  <h3 class="devider ColTextHighlight" style="color: #007bff; margin-top: 10px;" ;><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;Basic Information:
  </h3>
  <hr>

 
  <!-- <form action="{{URL('seller/add_event_first')}}" id="basic_info" method="POST">  -->
  <form id="basic_info">
    <!-- <input type="hidden" name="last_insert_id" class="last_insert_id" value=""> -->
    <div class="form-group row2">
      <span for="inputPassword3" class="col-sm-2 col-form-label">Event Titile:</span><br>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="first_title" name="first_title" value="" id="inputPassword3" placeholder="">
      </div>
    </div>
    <div class="form-group row1">
      <span for="inputPassword3" class="col-sm-2 col-form-label">Event Title Line 2 (optional):</span><br>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="second_title" name="second_title" id="inputPassword3" value=" " placeholder="">
      </div>
    </div>
    <div class="form-group row2">
      <span for="inputPassword3" class="col-sm-2 col-form-label">Currency:</span><br>
      <select class="form-control" id="currency" value="" name="currency" style="width:32%;margin-left:8px;">
        <option value="inr">INR</option>
        <option value="cad">CAD</option>
        <option value="usd" selected="">USD</option>
        <option value="eur">EUR</option>
        <option value="gbp">GBP</option>
        <option value="aud">AUD</option>
        <option value="czk">CZK</option>
      </select>
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
    <h3 class="devider ColTextHighlight cWizStep2" style="color: #007bff"><i class="fa fa-th fa-15x "></i>&nbsp;&nbsp;Event Type: </h3>
    <hr>
    <span class="checkbox" style="padding-left:10px;margin-bottom:10px">

      <input type="checkbox" id="ctl02_cIsOnline" value="on" name="online" onchange="showHide(this.checked)">


      <span class="checkmark" style="margin-left: 5px;"></span>
      It is an online Event.
    </span>
    <br>
    <div class="cOnlineOptions" style="display:none;  ">
      <h3 class="devider ColTextHighlight cWizStep2" style="color: #007bff;margin-top:20px"><i class="fa fa-youtube-play fa-15x "></i>&nbsp;&nbsp;Streaming Options:</h3>
      <hr>
      </h3>

      <div class="row" style="text-align:left;">
        <div class="cIsStream radio-group-data-Validation-Required" data-validation-required="1" style="padding-left:10px;">
          <span class="cRadioV2" style="display: block;">

            <input type="radio" name="cIsStream" value="false" checked="checked" onchange="hide(this.checked)">

            <span class="checkmark" style="margin-left: 5px;">

            </span>I will take care of streaming and ticket validation myself</span>
          <span class="cRadioV2" style="display: block;">

            <input type="radio" name="cIsStream" value="true" onchange="showHidetwo(this.checked)">

            <span class="checkmark" style="margin-left: 5px;"></span>I will add my Streaming embed code here to stream my event here so my site can take care of the ticket validation and admission control (Additional ₹0.25/ticket)</span>
        </div>
      </div>
      <br>
      <div class="cStreamOptions" style="display: none;padding-left:20px">
        <div class="row">
          <span for="ctl02_cStreamEmbedCode" class="editLabel">Embed code from your streaming service provider:</span>

          <textarea name="StreamEmbedCode" value="" rows="5" cols="20" id="ctl02_cStreamEmbedCode" class="editText" data-validation-required="1" style="width:100%;"></textarea>

        </div>
        <br>
        <div class="row cAllowReentry" style="text-align:left;">
          <span class="cCheckboxV2">
            <input id="ctl02_cAllowReentry" type="checkbox" name="cAllowReentry" value="yes">

            <span class="checkmark"></span> Allow exit and re-entry</span><br>
          <p class="hint" style="font-size: 12px;">While this option provides more convenience for the buyer, it may be less secure and allow the buyer to potentially watch on more than one device. Admin can always use the Gate Control feature to scan the ticket in 'Exit Mode' and allow for re-entry based on the buyer request.</p>
        </div>
        <div class="row">

          <span for="ctl02_cIsOnDemand" class="editLabel">Streaming Type:</span>

          <select name="IsOnDemand" id="ctl02_cIsOnDemand" class="cIsOnDemand" value="">
            <option value="false">Live</option>
            <option value="true">On-demand</option>
          </select>

        </div>

        <!--        <div class="row cOnDemandMinutesContainer" style="margin-top: 10px; display: none;">
                    <span class="editLabel">For how long can the buyer watch the video after first view?</span>
                    <input type="hidden" name="ctl02$cDurationSelectorOnDemandMinutes" id="ctl02_cDurationSelectorOnDemandMinutes" value="2880"><label class="cInputContainer valid">

                      <input type="number" maxlength="4" class="cDurationDays valid" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:40px;"> 

                    days</label> &amp; <label class="valid">
                      <input type="number" maxlength="4" class="cDurationHours valid" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:40px;">

                       hours</label> &amp; <label class="valid">
                        <input type="number" maxlength="4" class="cDurationMins valid" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:40px;">mins</label>
                  </div> -->


      </div>
    </div>
    <div class="cInPersonOptions" style="padding-left:20px;  margin-top: 10px;">
      <span class="editLabel">Seating Type:</span>
      <div class="cAssignedSeats radio-group-data-Validation-Required error" data-validation-required="6" aria-describedby="cValMsg574298 " aria-invalid="true">
        <div class="cAssignedSeats radio-group-data-Validation-Required" data-validation-required="6" aria-describedby="cValMsg574298 " aria-invalid="true">
          <span class="cRadioV2" style="display:block;">

            <input type="radio" id="seating" name="seating" value="0">

            <span class="checkmark" style="margin-left: 5px;"></span>General Admission (first-come, first-serve) or Standing</span>
          <span class="cRadioV2" style="display:block;">

            <input type="radio" name="seating" value="1">
            <span class="checkmark" style="margin-left: 5px;">
              <!--  <input type="radio" id="seating"  value="1" class="">  -->
            </span>
            Assigned seats (Tickets have a seat numbers on them) or combination of assigned seat and general admission
          </span>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
    <div class="row2 col-md-6" style="padding-left:20px;display: inline-block;">
      <span for="ctl02_cEventType" class="editLabel">Event Type:</span><br>
      <select  name="event_type" value="" multiple="multiple" id="type" class="cEventType form-control" >
        <option value="AmusementPark">Amusement Park</option>
        <option value="AppearanceOrSigning">Appearance or Signing</option>
        <option value="Attraction">Attraction</option>
        <option value="AwardsCeremony">Awards / Ceremony</option>
        <option value="CampTriporRetreat">Camp, Trip, or Retreat</option>
        <option value="Class">Class</option>
        <option value="Concert">Concert</option>
        <option value="Conference">Conference</option>
        <option value="Convention">Convention</option>
        <option value="Exhibition">Exhibition</option>
        <option value="FestivalFair">Festival / Fair</option>
        <option value="Fundraiser">Fund-raising</option>
        <option value="Gala">Gala</option>
        <option value="Game">Game</option>
        <option value="Meeting">Meeting</option>
        <option value="Museum">Museum</option>
        <option value="NetworkingSocial">Networking / Social</option>
        <option value="NightclubBar">Nightclub / Bar</option>
        <option value="NonProfitEvent">Non-Profit Event</option>
        <option value="Party">Party</option>
        <option value="Performance">Performance</option>
        <option value="ProfessionalEvent">Professional Event</option>
        <option value="Raffle">Raffle</option>
        <option value="ReligiousService">Religious Service</option>
        <option value="Rally">Rally</option>
        <option value="Rental">Rental</option>
        <option value="Retreat">Retreat</option>
        <option value="Reunion">Reunion</option>
        <option value="Screening">Screening</option>
        <option value="SeminarTalk">Seminar / Talk</option>
        <option value="ShowPerformance">Show / Performance</option>
        <option value="SportingEventRaceorCompetition">Sporting Event, Race or Competition</option>
        <option value="Tasting">Tasting</option>
        <option value="Tour">Tour</option>
        <option value="Tournament">Tournament</option>
        <option value="Tradeshow_Expo">Trade show / Expo</option>
        <option value="Transportation">Transportation</option>
        <option value="Trip">Trip</option>
        <option value="WorkshopTraining">Workshop / Training</option>
        <option value="Other">Other</option>
      </select>
      <br>
      <p class="hint" style="font-size:14px">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
    </div>
    <br>
    <div class="row2 col-md-6" style="padding-left:20px;display: inline-block;">
      <span for="ctl02_cEventType" class="editLabel">Event Genre:</span><br>
      <select  name="event_genre" value="" multiple="multiple" id="genre" class="cEventGenre form-control ">
        <option value="AutoBoat_Air">Auto, Boat &amp; Air</option>
        <option value="Adult">Adult</option>
        <option value="Business_Professional">Business / Professional</option>
        <option value="Charity_Causes">Charity / Causes</option>
        <option value="Comedy">Comedy</option>
        <option value="Community">Community</option>
        <option value="Culture">Culture</option>
        <option value="Education">Education</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Foodanddrink">Food and drink</option>
        <option value="Fashion_Beauty">Fashion / Beauty</option>
        <option value="Government_Politics">Government / Politics</option>
        <option value="Health_wellbeing">Health / Wellbeing</option>
        <option value="History_Heritage">History / Heritage</option>
        <option value="Hobbies_SpecialInterest">Hobbies / Special interest</option>
        <option value="Kids">Kids</option>
        <option value="Lifestyle">Lifestyle</option>
        <option value="Magic">Magic</option>
        <option value="Media_film">Media / film</option>
        <option value="Music">Music</option>
        <option value="Privatefriends_family_grou">Private (friends / family / group)</option>
        <option value="Performing_VisualArts">Performing / Visual Arts</option>
        <option value="SchoolActivities">School Activities</option>
        <option value="Religion_Spirituality">Religion / Spirituality</option>
        <option value="Science_Technology">Science / Technology</option>
        <option value="Seasonal_Holiday">Seasonal / Holiday</option>
        <option value="Sports_fitness">Sports / fitness</option>
        <option value="Supernatural">Supernatural</option>
        <option value="Theatre">Theatre</option>
        <option value="Travel_Tours">Travel / Tours</option>
        <option value="Other">Other</option>
      </select>
      <br>
      <p class="hint" style="font-size:14px">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p>
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
    <h3 class="devider ColTextHighlight cWizStep" style="color: #007bff;padding-left: 20px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 22 22" fill="none">
        <path d="M2.13891 8.2864L3.05558 7.74862V9.77751H18.9445V7.76696L19.8489 8.2864C19.9886 8.35946 20.1511 8.37573 20.3024 8.33182C20.4538 8.2879 20.5824 8.18719 20.6613 8.05073C20.7401 7.91427 20.7632 7.75261 20.7257 7.59952C20.6882 7.44642 20.593 7.31374 20.46 7.22918L11 1.78418L1.5278 7.22918C1.45477 7.26738 1.39022 7.31997 1.33804 7.38376C1.28585 7.44756 1.24711 7.52125 1.22415 7.60041C1.20119 7.67956 1.19447 7.76255 1.20441 7.84437C1.21435 7.92618 1.24073 8.00515 1.28198 8.0765C1.32323 8.14786 1.37848 8.21013 1.44442 8.25958C1.51036 8.30903 1.58562 8.34463 1.66567 8.36424C1.74573 8.38385 1.82892 8.38706 1.91025 8.37368C1.99157 8.36031 2.06935 8.33062 2.13891 8.2864ZM10.9084 4.34474C10.9827 4.30183 11.067 4.27924 11.1528 4.27924C11.2386 4.27924 11.3229 4.30183 11.3972 4.34474L15.5039 6.72196H13.5361L11.1528 5.35307L8.76946 6.72196H6.8078L10.9084 4.34474Z" fill="#007BFF" />
        <path d="M20.0749 16.5005H19.5555V15.9811C19.5555 15.7947 19.4815 15.6159 19.3497 15.4841C19.2179 15.3523 19.0391 15.2783 18.8527 15.2783H17.1111V10.7744H14.6666V15.2783H12.2222V10.7744H9.77772V15.2783H7.33328V10.7744H4.88883V15.2783H3.14717C2.96078 15.2783 2.78203 15.3523 2.65023 15.4841C2.51843 15.6159 2.44439 15.7947 2.44439 15.9811V16.5005H1.92495C1.73856 16.5005 1.5598 16.5746 1.42801 16.7064C1.29621 16.8382 1.22217 17.0169 1.22217 17.2033V18.945H20.7777V17.2033C20.7777 17.0169 20.7037 16.8382 20.5719 16.7064C20.4401 16.5746 20.2613 16.5005 20.0749 16.5005V16.5005Z" fill="#007BFF" />
      </svg>
      &nbsp;&nbsp;Venue:
      <hr>
    </h3>
    </h3>




    <div class=" cVenueSelection cWizStep3" data-wizstep-name="venue saveIfEdit" style="padding-left:20px">
      <p>Venue is where your event happens. A venue can be re-used by several events.</p>
      <span class="cRadioV2">
      </span>Select from my venues</span>
      <div class="cVenueSelectionContenttwo">

        <select class="js-example-basic-multiple-venue" name="venue" id="venue_list" style="width: 200px;">
          <option>Select a venue</option>
          @foreach($venues as $venue)
          <option value="{{$venue->id}}">{{$venue->name}}</option>
          @endforeach
        </select>

        <a class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" style="margin-left: 10px;" href="{{route('seller.add_venue')}}">Create a new venue</a>
      </div>

    </div>


    <br>
    <div class="tab-pane " id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="margin-left: 19px;">
      <div class="Help" style="float: right;margin:14px;">
               <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                <i class="fa fa-question-circle  fa-2x fa-hover"></i>
              </a>
                <a style="display: inline-block;" data-toggle="modal" data-target="#exampleModalLong"  target="_blank">
                  <i class="fa fa-youtube-play fa-2x fa-hover" ></i>
                </a>
            </div>
      <h4 class="devider ColTextHighlight" style="color: #007bff" ;>

        <i class="fa fa-calendar fa-15x"></i>&nbsp;&nbsp;Date & Time:
        <hr>
      </h4>

      <p class="hint cWizStep4"><i class="fa fa-lightbulb-o fa-15x"></i>All times are in venue's local time zone.</p>

      <h4 class=" cWizStep4 ColTextHighlight" style="color:#007bff;font-size: 20px;">Event's date/time &amp; duration:</h4>

      <!--   <div class="row2">

                  <button class="nsBtn medium utility cShowMessagePopup"  data-showmessagepopup_title="Event not complete" data-showmessagepopup_body="Complete and save the event before making it recurring.">Make the event recurring</button>

                  <div class="cHelp"><a class="showHint ColTextHighlight" href="" target="_blank" title="Create recurring events and event replication" data-title="Create recurring events and event replication"><i class=></i></a>
                  </div>
                  <p class="hint" style="padding-top:15px ">Use recurring events only if the event recurs several times. If the event happens just a few times, you can use event replication.</p>
                </div> -->



      <!-- <div class="row cSchedulerRow"></div>
                <style type="text/css">
                  #cRecurrenceItem { display:none;}
                  .cRecurrenceTypeDetails > div { display: none; }
                  .row .cRecurrenceType label { display:block;padding:5px;}
                  label > input {margin:0 5px; }
                  .cInclude .row label,
                  .cExclude .row label,
                  .cRecurrenceItem .row label {display:inline-block; padding:5px; }
                  .cWeekdays label { min-width:80px;}
                  .cMonthdays label { min-width:55px;}
                  .cMonthweeks label { min-width:50px;}
                  #cScheduler li i.fa { padding:5px; margin:0 5px;}
                </style>
                <input type="hidden" name="ctl02$cScheduler$cInclude" id="ctl02_cScheduler_cInclude" value="[]">
                <input type="hidden" name="ctl02$cScheduler$cExclude" id="ctl02_cScheduler_cExclude" value="[]"> -->

      <!--
                  <div class="" id="cScheduler">
                      <p><b class="">Recurs:</b> <a class="ColTextHighlight" href="#" id="cAddRecurrence" style="margin-left:50px;"><i class="fa fa-plus-square-o "></i>&nbsp;&nbsp;Add recurrence</a></p>
                      <ul class="cInclude"></ul>
                      
                      <p><b class="">Except:</b> <a class="ColTextHighlight" href="#" id="cAddException" style="margin-left:50px;"><i class="fa fa-plus-square-o"></i>&nbsp;&nbsp;Add exception</a></p>
                      <ul class="cExclude"></ul>
                      
                  </div>
                  -->

    </div>
    <div class=" cNonSchedulerRow cWizStep4" style="padding-left:20px">
      <span for="ctl02_cDateView" class="editLabel">Event Start Date And Time</span><br>

      <input name="start_date" type="date" value="" id="ctl02_cDateView" class="editText cDatePicker cDateView hasDatepicker valid eventstart form-control" style="width:160px;display:inline-block;">

      

 <!--     <input name="start_time" type="time" value="" id="ctl02_cTimeView" class="editText cTimePicker cTimeView hasTimepicker valid form-control" style="width:160px;display:inline-block;"> -->

<div class="fromat_time_div">
  <input class="fromat_time" name="start_time" type="number" min="0" max="23" value="23" placeholder="23">
  <span style="margin-top:4px;">:</span>
  <input class="fromat_time" name="start_time_min" type="number" min="0" max="59" value="00" placeholder="00">
</div>


    </div>
    <br>

    <div class="form-group row" style="margin-left:9.5px;">
     <!--  <span for="ctl02_cDateView" class="editLabel">Time Zone</span><br> -->
      <div class="col-sm-5">
      <select name="Timezone" id="Timezone" class=" form-control">
      <option  value="India Standard Time">(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
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
      </div>
      <br>


    <div class="row cWizStep4" style="margin-left:20px;">
      <span class="cCheckboxV2">

        <input id="show_date" type="checkbox" value="1" name="show_date">
        <span class="checkmark" style="margin-left:5px"></span> Do not show event date</span>
      <p class="hint" style="font-size:14px;">Use this option if the ticket is not for a certain date (for example admission ticket to an amusement park or museum) or it is for a multi-day event</p>
    </div>
    <div class="row2cWizStep4" style="margin-left:20px;">
      <span class="cCheckboxV2">
        <input id="show_time" type="checkbox" value="1" name="show_time">
        <span class="checkmark" style="margin-left:5px"></span> Do not show the event time</span>
      <p class="hint" style="font-size:14px;">Use this option if the event is not for a certain time</p>
    </div>
    <div class=" cWizStep4" style="padding-left:20px">
      <span id="ctl02_Label6" class="editLabel">Event Duration:</span><br>
      <input type="hidden" name="ctl02$cDurationSelectorEndDate" id="ctl02_cDurationSelectorEndDate" value="120">
      <span class="cInputContainer valid duration">

        <input type="number" name="days" id="days" value="0" maxlength="4" class="cDurationDays valid form-control" style="width:69px;display:inline-block;" min="0">

        days</span> <span class="valid">
        <input type="number" name="hours" id="hours" value="0" maxlength="4" class=" form-control cDurationHours valid" style="width:69px;display:inline-block;" min="0" max="24">
        hours</span> <span class="valid">

        <input type="number" name="mins" id="mins" max="60" value="0" maxlength="4" class="cDurationMins valid form-control" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:69px; display:inline-block;" min="0">mins</span>

    </div>
    <h4 style="padding-top:30px; padding-bottom:0px;padding-left:10px; color:#007bff;font-size: 20px;" class="cAdv ColTextHighlight">Sales start date &amp; duration:</h4>
    <br>



    <div class=" cAdv " style="padding-left:10px">
      <span for="ctl02_cIsStartDateRelative" id="ctl02_Label10" class="editLabel" style="display:inline-block;">Sale for the event starts:</span><br>

      <select name="SaleStart" id="start_at" class="cIsStartDateRelative form-control" onchange="eventstartat(this)" ; style="width:30% ;display:inline-block;">
        <option value="0">at:</option>
        <option value="1">certain time before the event</option>
      </select>

      <span class="cIsStartDateRelative0" style="display:inline-block;width:60% ">

        <input name="sales_start_date" type="date" value="" maxlength="10" id="sales_start_date" class="cDatePicker cStartDateView hasDatepicker valid salestartevent form-control" data-validation-required="1" data-validation-avoid-success-tick="1" style="display:inline-block;width:30% ">

        <input name="sales_start_time" type="time" value="" maxlength="10" id="sales_start_time" class="cTimePicker hasTimepicker valid form-control" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:30% ;display:inline-block;">

      </span>

      <span class="cIsStartDateRelative1" style="
                 display: none;">

        <input type="hidden" id="ctl02_cDurationSelectorSalesStartDate" value="2640">
        <span class="cInputContainer">

          <input type="number" name="StartDaysBefor" maxlength="4" class="cDurationDays form-control" value="0" style="width:69px;display:inline-block;" min="0"> days</span>


        <span>
          <input type="number" name="StartHoursBefor" value="0" maxlength="4" class="cDurationHours form-control" style="width:69px;display:inline-block;" min="0">
          hours</span>


        <span>
          <input type="number" value="0" name="StartMinsBefor" maxlength="4" class="cDurationMins form-control" style="width:69px;display:inline-block;" min="0">
          mins</span>

        <span style="padding:0;">before the event</span>
      </span>
      <p class="hint" style="font-size:14px;">Ticket sales will start automatically at this date and time</p>
    </div>


    <div class=" cAdv" style="padding-left:10px">
      <span for="ctl02_cIsEndDateRelative" class="editLabel" style="display:inline-block;">Sale for the event ends:</span><br>

      <select style="width:30% ;display:inline-block;" name="SaleEnd" id="sales_end_at" class="cIsEndDateRelative eventend form-control" onchange="eventendat(this)" ;>
        <option value="0">at:</option>
        <option value="1">certain time after the event begins</option>
        <option value="2">certain time before the event begins</option>
      </select>

      <span class="cIsEndDateRelative0" style="display:inline-block;width:60% ">
        <input type="date" value="" name="EndDate" maxlength="10" id="ctl02_cEndDateView" class="cDatePicker cEndDateView hasDatepicker form-control " style="display:inline-block;width:30% ">

        <input type="time" name="EndTime" value="" maxlength="10" id="ctl02_cEndTimeView" class="cTimePicker cEndTimeView hasTimepicker form-control" data-validation-required="1" data-validation-avoid-success-tick="1" style="display:inline-block;width:30% ">
      </span>

      <span class="cIsEndDateRelative1 cIsEndDateRelative2" style="display: none;">

        <input type="hidden" id="ctl02_cDurationSelectorSalesEndDate" value="">
        <span class="cInputContainer valid">

          <input type="number" value="0" name="end_days" id="end_days" maxlength="4" class="cDurationDays valid form-control" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:69px;display:inline-block;" min="0">

          days</span>
        <span class="valid">
          <input type="number" value="0" name="end_hours" id="end_hours" maxlength="4" class="cDurationHours valid form-control" data-validation-avoid-success-tick="1" data-validation-number="uint" style="width:69px;display:inline-block;" min="0">

          hours</span> <span class="valid">
          <input type="number" value="0" name="end_mins" id="end_mins" maxlength="4" class="cDurationMins valid form-control" data-validation-avoid-success-tick="1" data-validation-number="uint" min="0" style="width:69px;display:inline-block;">mins</span>

        <span class="cIsEndDateRelative12" style="padding: 0px;"> after the event begins</span>
        <span class="cIsEndDateRelative23" style="padding: 0px; display: none;">before the event begins</span>
      </span>
      <p class="hint" style="font-size:14px;">Ticket sales will end automatically at this date and time</p>
    </div>




    <div class="row delivery" style="padding-left:220px;">
      <div class="row2" style="text-align:center;">
        <a href="#custom-tabs-one-profile" data-toggle="pill" class="btn btn-secondary nxtbtn add_event_next_button"><span>Step 2 Delivery & Returns</span>
          &nbsp;&nbsp; <i class="fa-angle-double-right fa fa-15x"></i></a> <br><br>
        <button type="submit" class="btn btn-success  btn-sm svbtn">Save</button>


        <!-- <span style="font-size: 18px;color:red;margin-left: 5px;">Delete</span> -->
      </div>

  </form>
</div>
<br><br>


<!--venue Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width:180%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create new venue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>


      </div>
      <form id="create-venue-form">
        <div class="modal-body row">


          <div class="col-md-12">
            <span for="cSectionName1">Venue Name *</span><br>
            <input type="text" id="" name="name" class="form-control col-md-12 venue-name-add">
            <span class="text-danger error-text name_error"></span>
          </div>

          <br>

          <div class="col-md-6" style="display:inline-block">
            <span for="cSectionName1">Seating Chart Name</span><br>
            <select id="ScList" class="form-control col-md-12" id="" name="seating">
              <option value="" disabled selected hidden>Choose Seating Chart</option>
              @isset($sc)
              @foreach($sc as $name)
              <option value="{{$name->id}}">{{$name->seating_chart_name}}</option>
              @endforeach
              @endisset
            </select>
            <span class="text-danger error-text first_title_error"></span>
          </div>

          <div class="col-md-6 col-mrgin" style="display:inline-block;margin-top:24px;">
            <a style="width:100%;" href="{{route('seller.get_customSeatingChart')}}" class="btn btn-success">Create New Seating Chart</a>
          </div>

          <div class="col-md-12">
            <span for="cSectionName1">Region: (optional)</span><br>
            <input type="text" id="region" name="region" class="form-control col-md-12">
            <span class="text-danger error-text region_error"></span>


          </div>
          <div class="col-md-6">
            <span for="cSectionName1">Street Address *</span><br>
            <input type="text" id="" name="StreetAddress" maxlength="50" class="form-control col-md-12">

            <span class="text-danger error-text StreetAddress_error"></span>
          </div>
          <div class="col-md-6">
            <span for="cSectionName1">City *</span><br>
            <input type="text" id="city" name="City" maxlength="50" class="form-control col-md-12">
            <span class="text-danger error-text City_error"></span>
          </div>
          <div class="col-md-6">
            <span for="cSectionName1">State *</span><br>
            <input type="text" id="State" name="State" maxlength="50" class="form-control col-md-12">
            <span class="text-danger error-text State_error"></span>
          </div>
          <div class="col-md-6">
            <span for="cSectionName1">Zip Code *</span><br>
            <input type="text" id="Zip" name="Zip" maxlength="50" class="form-control col-md-12">
            <span class="text-danger error-text Zip_error"></span>
          </div>
          <!--  <div style="clear:both;padding-left:30px">
                    <i class="fa fa-map-marker"></i>&nbsp;&nbsp;<a class="cGoogleMap" href="#">Verify Address on Google Maps</a>
                </div> -->
          <br>
          <div class="col-md-12">
            <span for="cStart1">Country *</span><br>

            <select class="form-control" name="country">
              <!-- <option >Choose Country</option> -->
              @foreach($countries as $country)
              <option value="{{$country->name}}">{{$country->name}}</option>
              @endforeach
            </select>
            <span class="text-danger error-text country_error"></span>
          </div>
          <br>
          <div class="col-md-12">
            <span for="cStart1">Time Zone *</span><br>

            <select name="Timezone" id="Timezone" class="form-control col-md-12">
              <!-- <option>Choose Time Zone</option> -->
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
            <span class="text-danger error-text Timezone_error"></span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- / venue modal -->