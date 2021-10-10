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
      <section class="content-header">
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
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <div class="card card-info">
        <div class="card-header" style="background-color: #007bff;">
            <h3 class="card-title">New Packages</h3>
        </div>
        <br>
        <style>
          @media all and (max-width:720px) {
            .button-save{
              padding-left: 96px!important;
            }
            .button-save{
              padding-left: 120px!important;
            }
            .flyerupload{
                    width: 240px;
                     padding-left: 44px!important;
                 }
             .ticket-upload{
                    font-size: 15px;
                    padding-left: 36px!important;
                    }

          }
        </style>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="row">
        <div class="col-12 col-sm-12">
        <div class="card card-gray-dark card-tabs">
        <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pictures & Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tabs-one-detail-tabcustom" data-toggle="pill" href="#tabs-one-detail-tabcustomhref" role="tab" aria-controls="tabs-one-detail-tabcustomhreftab" aria-selected="false">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-Payment-tab" data-toggle="pill" href="#custom-tabs-one-Payment-tabhhref" role="tab" aria-controls="custom-tabs-one-Payment-tab-two" aria-selected="false">Final</a>
                </li>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab"style="padding-left:30px;">
                    <h3 class="devider ColTextHighlight"   style="color: #007bff";><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;General Information:
                    </h3>
                    <hr>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach


                    </ul>
                    </div>
                    @endif
        <form method="post" action="{{route('seller.savepackage')}}" enctype="multipart/form-data">
            @csrf
                    <div class="form-group row"style="padding-left:10px;">
                        <span for="inputPassword3" class="col-sm-2 col-form-label">Package name:</span>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputPassword3" name="first_title" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row"style="padding-left:10px;">
                        <span for="inputPassword3" name="second_title" class="col-sm-2 col-form-label"Event Title Line 2: (optional):>Secondary Name: (optional)</span>
                        </span>
                        <div class="col-sm-4">
                            <input type="text" name="second_title" class="form-control" id="inputPassword3" placeholder="">
                        </div>
                    </div>
                    <br>
                    <h3 class="devider ColTextHighlight cWizStep2"style="color: #007bff"><i class="fa fa-th fa-15x "></i>&nbsp;&nbsp;Package Type: </h3>
                    <hr>
                    <div class="" style="padding-top: 20px;padding-left:10px;">
                        <span for="ctl02_cEventType" class="editLabel">Event Type:</span><br>
                        <select size="4" name="event_type"  id="ctl02_cEventType" class="cEventType" style="width:251px;">
                            <option value="AmusementPark">Amusement Park</option>
                            <option value="AppearanceOrSigning">Appearance or Signing</option>
                            <option value="Attraction">Attraction</option>
                            <option value="AwardsCeremony">Awards / Ceremony</option>
                            <option value="CampTriporRetreat">Camp, Trip, or Retreat</option>
                            <option value="Class">Class</option>
                            <option value="Concert">Concert</option>
                            <option value="Conference">Conference</option>

                        </select>
                        {{-- <p class="hint"style="font-size:14px;">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p> --}}
                    </div>
                    <div class="" style="padding-top: 20px;padding-left:10px;">
                        <span for="ctl02_cEventType" class="editLabel">Event Genre:</span><br>
                        <select size="4" name="event_genre"  id="ctl02_cEventGenre" class="cEventGenre" style="width:251px;">
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
                        {{-- <p class="hint"style="font-size:14px;">Hold down the Ctrl (windows) or Command (Mac) button to select multiple options.</p> --}}
                    </div>
                    <br>
                    </h3>
                    {{-- <div class="row" style="text-align:right; padding-bottom:20px;">
                        <a href="#" class="cEditVenue" style="margin-left: 10px; margin-right: 10px; display: none;"><i class="fa fa-edit fa-hover fa-15x"></i>&nbsp;Edit venue</a>
                        <a target="_blank" href="" class="cSeatingChartDesigner" style="display: none;"><i class="fa fa-th fa-hover fa-15x"></i>&nbsp;Design seating chart</a>
                    </div> --}}
                    <h3 class="devider ColTextHighlight  cNonSchedulerRow" style="color: #007bff"><i class="fa fa-calendar fa-15x "></i>&nbsp;&nbsp;Date &amp; Time:</h3>
                    <hr>
                    <p class="hint" style="padding-left:10px;"><i class="fa fa-lightbulb-o fa-15x"></i>&nbsp;&nbsp;All times are in venue's local time zone.</p>
                    <div class="row2" style="padding-left:10px;">
                        <span id="ctl00_CPMain_cPackageEdit_Label10" class="editLabel">Sale for the package starts at:</span>
                        <span class="">
                        <input name="start_date" value="{{old('start_date')}}"  type="date" value="30-03-2021" maxlength="10" id="ctl00_CPMain_cPackageEdit_cStartDateView" class="cDatePicker cStartDateView hasDatepicker" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:160px;direction:ltr;border-color:inherit;">
                        <input name="start_time" value="{{old('start_time')}}" type="time" value="12:00 AM" maxlength="10" id="ctl00_CPMain_cPackageEdit_cStartTimeView" class="cTimePicker hasTimepicker" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:85px;border-color:inherit;">
                        </span>
                        <p class="hint">Ticket sales will start automatically at this date and time</p>
                    </div>
                    <br>
                    <div class="row2"style="padding-left:10px;">
                        <span id="ctl00_CPMain_cPackageEdit_Label11" class="editLabel">Sale for the package ends at:</span>
                        <span class="">
                        <input name="end_date"  type="date" value="31-03-2021" maxlength="10" id="ctl00_CPMain_cPackageEdit_cEndDateView" class="cDatePicker cEndDateView hasDatepicker" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:160px;border-color:inherit;">
                        <input name="end_time" type="time" value="10:00 PM" maxlength="10" id="ctl00_CPMain_cPackageEdit_cEndTimeView" class="cTimePicker cEndTimeView hasTimepicker" data-validation-required="1" data-validation-avoid-success-tick="1" style="width:85px;border-color:inherit;">
                        </span>
                        <p class="hint">Ticket sales will end automatically at this date and time</p>
                    </div>
                    <br>

                    <br>
                        <div class="row2" style="text-align:center;">
                            <a data-toggle="pill"  href="#" class="btn btn-secondary nxtbtn sStep2" style="margin-top: 10px; width:218px"><span>Step 2 Events </span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>

                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab"style="padding-left:20px;">
                    <h3 class="devider ColTextHighlight"style="color: #007bff"></i>&nbsp;&nbsp;Package Events:</h3>
                    <hr>
                    <br>
                    @php
                    use App\Models\Event;
                         $events=Event::my_events();

                   @endphp
                    <div class="row2"style="margin-left:5px;">
                        <select multiple class="select2" name="events[]" id="events" data-placeholder="Select Events" style="margin-left:5px;width: 266px;" required>
                            @foreach ($events as $event )

                            </option>
                            <option value="{{$event->id}}">{{$event->first_title}}
                            @endforeach

                        </select>
                        <p class="hint">Select Minimum 2 Events for a Package</p>

                        <button class="btn btn-secondary" id="cAddEventToPackage" data-showdiscount="0"style="margin-left:10px;margin-top: 5px;">Add event to package</button>
                    </div>
                    <br><br>
                        <div class="row2" style="text-align:center;">
                                <a class="btn btn-secondary Step1" data-toggle="pill" href="#custom-tabs-one-home" style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 1 Information</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                <a data-toggle="pill"  href="#" class="btn btn-secondary Step3" style="margin-top: 10px; width:218px"><span>Step 3 Pictures &amp; video</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
                                <br>
                         </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div id="picture" class="cPictures ui-tabs-panel ui-corner-bottom ui-widget-content" aria-labelledby="ui-id-24" role="tabpanel" aria-hidden="false" style="">
                        <div class="cFlyerContainer  cWizStep5"style="padding-left:30px;">
                            <h3 class="devider ColTextHighlight"style="color: #007bff";>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="20" viewBox="0 0 16 12" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 1H1.5C1.36739 1 1.24021 1.05268 1.14645 1.14645C1.05268 1.24021 1 1.36739 1 1.5V10.5C1 10.6326 1.05268 10.7598 1.14645 10.8536C1.24021 10.9473 1.36739 11 1.5 11H14.5C14.6326 11 14.7598 10.9473 14.8536 10.8536C14.9473 10.7598 15 10.6326 15 10.5V1.5C15 1.36739 14.9473 1.24021 14.8536 1.14645C14.7598 1.05268 14.6326 1 14.5 1ZM1.5 0C1.10218 0 0.720644 0.158035 0.43934 0.43934C0.158035 0.720644 0 1.10218 0 1.5L0 10.5C0 10.8978 0.158035 11.2794 0.43934 11.5607C0.720644 11.842 1.10218 12 1.5 12H14.5C14.8978 12 15.2794 11.842 15.5607 11.5607C15.842 11.2794 16 10.8978 16 10.5V1.5C16 1.10218 15.842 0.720644 15.5607 0.43934C15.2794 0.158035 14.8978 0 14.5 0H1.5Z" fill="#007BFF"/>
                                    <path d="M10.648 5.64595C10.7222 5.57189 10.8179 5.52306 10.9215 5.50637C11.025 5.48968 11.1312 5.50598 11.225 5.55295L15.002 7.49995V11H1.00195V9.99995L3.64795 7.64595C3.72969 7.56452 3.83707 7.51385 3.95189 7.50255C4.06672 7.49125 4.18191 7.52001 4.27795 7.58395L6.93795 9.35695L10.648 5.64695V5.64595Z" fill="#007BFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.50195 5C4.69894 5 4.89399 4.9612 5.07598 4.88582C5.25797 4.81044 5.42333 4.69995 5.56261 4.56066C5.7019 4.42137 5.81239 4.25601 5.88777 4.07403C5.96315 3.89204 6.00195 3.69698 6.00195 3.5C6.00195 3.30302 5.96315 3.10796 5.88777 2.92597C5.81239 2.74399 5.7019 2.57863 5.56261 2.43934C5.42333 2.30005 5.25797 2.18956 5.07598 2.11418C4.89399 2.0388 4.69894 2 4.50195 2C4.10413 2 3.7226 2.15804 3.44129 2.43934C3.15999 2.72064 3.00195 3.10218 3.00195 3.5C3.00195 3.89782 3.15999 4.27936 3.44129 4.56066C3.7226 4.84196 4.10413 5 4.50195 5V5Z" fill="#007BFF"/>
                                </svg>
                                &nbsp;&nbsp;Flyer:
                            </h3>
                            <hr>
                            <div class="row" style="padding-left:10px;">
                                <span id="ctl02_Label24" class="editLabel"style="padding-left: 10px;">Upload a flyer for your event: (.jpg, .gif, .png)</span>
                                <p class="hint"style="padding-left: 10px; font-size:14px">Flyers will show on your homepage, event information page, find tickets page and the tickets. It is the main picture for the event.</p>
                                <div class="row imgContainer" style="padding-left:10px;">
                                    <div class="cImageUploader" style="text-align:center;" data-type="EventFlyer" data-uploadfilename="209443" data-noimage="">
                                        <div class="row  flyerupload"style="padding-left: 346px;">
                                            <input type="file" name="image" class="btn btn-dark" onchange="previewFile(this);">
                                            {{-- <i class="fa fa-upload "></i>&nbsp;&nbsp; Select / Upload Flyer</button>&nbsp;&nbsp; --}}
                                            {{-- <i class="fa fa-trash fa-2x delete fa-hover" title="Remove Image" style="display: none;"></i> --}}
                                        </div>
                                        <br>
                                        <div class="row ticket-upload"style="padding-left: 340px;">
                                            <img id="previewImg" src="https://ticketor.net/usercontent/0/evt/0.gif" style="border-width:1px;border-style:solid;     border-radius: 20px;width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="cSeatingChartContainer cAdv">
                                <div class="row imgContainer">
                                    <div class="cImageUploader" style="text-align:center;" data-type="TicketAddition" data-uploadfilename="209443" data-noimage="">
                                        <div class="row">
                                            <img id="ctl02_cETicketAdditionPreview" src="" style="border-width: 0px; display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="cSeatingChartContainer cAdv">
                                <h3 class="devider ColTextHighlight"style="color: #007bff;><i class="fa fa-play-circle fa-15xstyle="color: #007bff;"></i>&nbsp;&nbsp;Video (optional):</h3>
                                <hr>
                                <div class="row cSeatingChartContainer"style="padding-left:10px;">
                                    <table id="ctl02_cVideoType" class="leftAlign" border="0">
                                        <tbody>
                                            <tr>
                                                <td><input id="ctl02_cVideoType_0" type="radio" name="video_link_type" value="Youtube" checked="checked"><span for="ctl02_cVideoType_0"style="padding-left: 20px; ">YouTube Video - https://YouTube.com/watch?v=VIDEO_ID</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <br>
                                <span style="padding-left: 10px; ">Youtube ID: <input name="youtube_link" type="text" maxlength="20" id="ctl02_cVideo"></span><br>
                                <p class="hint"style="padding-left: 10px; font-size:14">Enter your YouTube video ID. Do NOT enter the full video URL, just the ID part of it.</p>
                                <br>

                                <div class="row cSeatingChartContainer"style="padding-left:10px;">
                                    <table id="ctl02_cVideoType" class="leftAlign" border="0">
                                        <tbody>
                                            <tr>
                                                <td><input id="ctl02_cVideoType_1" type="radio" name="video_link_type" value="Facebook"><span for="ctl02_cVideoType_1"style="padding-left: 20px; ">Facebook Video - https://facebook.com/video.php?v=VIDEO_ID</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br>
                                </div>
                                <span style="padding-left: 10px; ">Facebook ID: <input name="facebook_link" type="text" maxlength="20" id="ctl02_cVideo"></span><br>
                                <p class="hint"style="padding-left: 10px; font-size:14">Enter your Facebook video ID. Do NOT enter the full video URL, just the ID part of it.</p>
                                <br>
                                <div class="row2" style="text-align:center;">
                                    <a class="btn btn-secondary  sStep2" data-toggle="pill"  style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 2 Events</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                    <a data-toggle="pill"  href="#" class="btn btn-secondary nxtbtn Step4" style="margin-top: 10px; width:218px"><span>Step 4 Details </span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
                                    <br>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-one-detail-tabcustomhref" role="tabpanel" aria-labelledby="tabs-one-detail-tabcustomhreftab"style="padding-left:10px;">
                    <div id="options" style="padding-left: 20px;">
                        <h3 class="devider ColTextHighlight"   style="color: #007bff";><i class="fa fa-info-circle fa-15x " style="color: #007bff";></i>&nbsp;&nbsp;Details:
                        </h3>
                        <hr>
                        <div class="row2"style="padding-left:10px;">
                            {{-- <span id="ctl00_CPMain_cPackageEdit_Label7" class="editLabel">Organizer:</span><br>
                            <select name="ctl00$CPMain$cPackageEdit$cPartnerView" id="ctl00_CPMain_cPackageEdit_cPartnerView" class="editText" style="width:160px;">
                                <option selected="selected" value="1090816">RAHUL GS</option>
                            </select> --}}

                            <div class="row2 cAdv  cTextV2" style="padding-top:12px">
                                <span for="ctl00_CPMain_cPackageEdit_cBuyTicketsBtn" class="editLabel">Buy tickets button text: (optional)</span><br>
                                <input name="button_name" type="text" maxlength="50" id="ctl00_CPMain_cPackageEdit_cBuyTicketsBtn" class="editText" style="width:260px;" data-validation-avoid-success-tick="1"><br>
                                <p class="hint" style="clear:both;font-size:14px">Leave blank to use the default value: 'Tickets'</p>
                            </div>
                            <br>
                            <div class="row">
                                <span class="editText"><input id="ctl00_CPMain_cPackageEdit_cActive" type="checkbox" name="status" checked="checked"><span for="ctl00_CPMain_cPackageEdit_cActive"style="margin-left:5px">Active (Check this box to make the package visible to users)</span></span>
                            </div>
                            <br>
                            <div class="row">
                                <span class="editText"><input id="ctl00_CPMain_cPackageEdit_cHidden" type="checkbox" name="private"><span for="ctl00_CPMain_cPackageEdit_cHidden"style="margin-left:5px">Private (Only Admin, Sales Agents and users who have the direct link have access)</span></span>
                            </div>
                            <br>
                            <div class="row2">
                                <span id="ctl00_CPMain_cPackageEdit_Label14" class="editLabel">Categories:</span><br>
                                @php
                                use App\Models\Category;
                                     $categorys =Category::category();

                               @endphp
                                <div class="row2"style="margin-left:5px;">
                                    <select name="category_id[]"  multiple class="select2" data-placeholder="Select Categorys" style="margin-left:5px;width: 266px;">
                                        @foreach ($categorys as $category )
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="hint"style="font-size:14px;">Optional - Allows you to filter packages and events by category - Separate by comma.</p>
                            </div>
                            {{-- <div class="row" style="margin-left: 10px;">
                                <span for="ctl02_cComment" class="editLabel">Description: (package description, videos, pictures, ...)</span>
                            </div>
                            <div id="summernote"></div> --}}

                            <br><br>
                                <div class="row2" style="text-align:center;">
                                    <a class="btn btn-secondary  Step3" data-toggle="pill" style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 3 Photos & Videos</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                    <a data-toggle="pill"  href="#" class="btn btn-secondary  Step5" style="margin-top: 10px; width:218px"><span>Step 5 Final </span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
                                    <br>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-tabs-one-Payment-tabhhref" role="tabpanel" aria-labelledby="tabs-one-detail-tabcustomhreftab"style="padding-left:10px;">
                    <div id="options" style="padding-left: 20px;">
                        <h3 class="devider ColTextHighlight"   style="color: #007bff";><i class="fa fa-info-circle fa-15x " style="color: #007bff";></i>&nbsp;&nbsp;Final:
                        </h3>
                        {{-- <h3 class="devider ColTextHighlight"   style="color: #007bff";><i class="fa fa-info-circle fa-15x " style="color: #007bff";></i>&nbsp;&nbsp;Discount:
                        </h3>
                        <hr>
                        <div class="row"style="padding-left:10px;">
                            <p>The package total price will be the total of all the tickets in the package. However, if you want to offer discounts for package buyers, use the coupons and create a coupon for the package.</p>
                            <br>
                            <a class="btn btn-secondary" href="/coupons" target="_blank">Coupons</a>
                        </div><br> --}}
                          <div class="row "style="padding-left:10px;">
                              <p>Make sure all the package data is entered properly &amp; save changes before promoting your package:</p>
                          </div><br>
                          <h3 style="color: #007bff;"class="devider ColTextHighlight"><i class="fa fa-link fa-15x " style="font-size: font-size: 1.5em;"></i> Link:
                            <div class="cHelp"></div>

                        </h3>
                <hr>

                <h5><b style="padding-left:10px;">Link to the ticketing page:</b></h5>
                <p class="hint" style="padding-left:10px;">Direct link to the ticketing page. Use it in your website, social media or other digital communication.</p>
                <input type="text" name="link" value="" style="margin-left:10px;"><br>
                <h5 style="margin-top: 20px;"><b style="padding-left:10px;"> Short link to the ticketing homepage:</b></h5>
                <p class="hint" style="padding-left:10px;">Link to your homepage, where all your events are listed. Use it on flyers and in verbal communication.</p>
                <div class="cCopiable">
                            <!-- <a href="javascript:void(0)" title="Copy value" class="cCopy"><i class="fa fa-copy fa-hover"></i></a> -->
                            <a href="" target="_blank" title="Go to link" class="cNavigate"><i class="fa fa-external-link-square fa-hover"></i></a>
                            <input type="text"  name="short_link" value="" style="margin-left:10px;">
                        </div>
                        {{-- <h5 style="margin-top: 20px;"><b style="padding-left:10px;">Embed ticketing section in your site:</b></h5>
                        <a style="color:color: #000;background: #eee none;border-color: #969696;height: 28px;padding: 0 10px;font-size: 14px;
line-height: 30px;border: 1px solid #ccc;height: 28px;margin-left:10px;" href="#" class="nsBtn medium utility cEmbed" data-pagetitle="lnlbni" data-pageurl=""><i class="fa fa-code"></i>&nbsp;&nbsp;Get code to add to your site</a><br><br>
<h3 style="margin-top:20px;color: #007bff;" class="devider ColTextHighlight"><i class="fa fa-link fa-15x "></i>&nbsp;&nbsp;Trackable links:
                            <div class="cHelp"></div>

                        </h3>
                        <hr>
                        <p  style="margin-left:10px;">Generate trackable links for sub promoters and online posts. Just enter the promoter nickname or the media name and copy the link. When a user clicks on the link and buys tickets, we will track the name, so you can get sales reports based on their origin.</p>
                        <div class="ro trackingRow"  style="margin-left:10px;">
                            <span class="editLabel" for="trackingName">Tracking name:</span>
                            <input type="text" class="editText" id="trackingName">
                            <a href="#" id="trackingBtn" class="btn btn-primary">Generate Link</a>
                        </div>
                           <br>
                           <br> --}}


                            <div class="row2" style="text-align:center;">
                                <a class="btn btn-secondary prvbtn Step4"  style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 4</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <button type="submit" class="btn btn-success " style="margin-top: 10px; width:218px"><span>Save </span> &nbsp;&nbsp;</button>
                            </form>

                                <br>
                            </div>

                                    </div>
                                </div>




    </div>

                <!-- </div> -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>



      </div>
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){

$(document).on('click', '.Step1', function(event){
    event.preventDefault();
    document.getElementById("custom-tabs-one-home-tab").click();
    });

 $(document).on('click', '.sStep2', function(event){
    event.preventDefault();
    document.getElementById("custom-tabs-one-profile-tab").click();
    });
$(document).on('click', '.Step3', function(event){
    event.preventDefault();
    document.getElementById("custom-tabs-one-messages-tab").click();
 });
 $(document).on('click', '.Step4', function(event){
    event.preventDefault();
    document.getElementById("tabs-one-detail-tabcustom").click();
 });
 $(document).on('click', '.Step5', function(event){
    event.preventDefault();
    document.getElementById("custom-tabs-one-Payment-tab").click();
 });

});


    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
