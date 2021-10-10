@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
          @media all and (max-width:720px) {
.print-tickets{
  padding-left:8px!important;
    font-size: 14px;
    margin-bottom: 10px;
}
.print-unsold-tickets{
  margin-left: 0px!important;
    font-size: 14px;
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
      <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Print Tickets
              </h3>
            </div>
        </div>
  

        <div class="modulebody ui-widget-content ui-corner-bottom">
            <p class="hidePrint" style="padding-left:45px;">Use this page to print all will-call or mail or unsold tickets in bulk. </p>
            
                </div>
                <div class="modulebody ui-widget-content ui-corner-bottom"style="padding-left: 30px;margin-right: 20px;">
                <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 30px;
                border: 1px solid black;
                width: 95%;
                margin: 0 auto;
                padding-top: 25px;
                border-radius: 20px;
                padding-bottom: 25px;
                min-height: 156px;"><br>
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Event</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option></option>
                        <option value="0"></option>
                      
                      </select>
                      <span id="ctl00_CPMain_cETicketType" class="hint event-date-sub"style="font-size:small"></span>
                    </div>
                  </div>
                  <br>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Ticket Sold After</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputPassword3" placeholder="">
                      <span id="ctl00_CPMain_Label3" class="hint " style="font-size:small">If you have already printed tickets for sales up to a certain time, you can set this date/time to only print tickets that are sold after your last print.</span>

                    </div>
                  </div>
                    

               
               
               
             <br>
             <br>
             <div class="card-foote print-tickets"style="padding-left:250px;">
              <a href="printalltickets.html" class="btn btn-secondary print-tickets">Print All Tickets </a>
              <a href="printunsoldticket.html" class="btn btn-secondary print-unsold-tickets"style="margin-left:10px;">Print Unsold Tickets </a>

       
            </div>
                <div class="clear"></div>
            </div>
            
          </div>
        </div>
    </div>

      



      
  
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
@endsection