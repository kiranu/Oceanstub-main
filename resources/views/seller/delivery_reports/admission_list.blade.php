@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all and (max-width:720px) {
.refresh-export{
font-size: 12px;
padding-left: 0px!important;

}
.bottom-nodata{
font-size: 12px;
padding-left: 59px!important;
}
.bottom-bold{

font-size: 12px;
}
.button-refresh{
font-size: 11px;
}
.button-print{
font-size: 11px;
}
.button-export{
font-size: 11px;
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
              <h3 class="card-title">Admission Ticket
              </h3>
            </div>
        </div><br>
        <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all"style="padding-left: 0px;">
            <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 20px;
            border: 1px solid black;
            width: 95%;
            margin: 0 auto;
            padding-top: 25px;
            border-radius: 20px;
            padding-bottom: 25px;
            min-height: 156px;">
            <div class="filterrow"style="padding-left:10px;">
                <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight"style="color: #007bff; font-weight:bold">Filters:</span>
            </div><br>
            <div class="card-body" style="padding-left:30px;">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Event </label>
                <div class="col-sm-9">
                  <select class="form-control">
                    <option>Select Event</option>
                    <option value="0">ddd (Mar 20 2021  9:00PM)</option>
                    <option value="1">mbjbbjk (Mar 19 2021  9:00PM)</option>
                    <option value="3">Payment</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Price Levels </label>
                <div class="col-sm-9">
                  <select class="form-control">
                    <option>All Price Levels</option>
                    <option value="0"></option>
                    <option value="1"></option>
                    <option value="3"></option>
                  </select>
                </div>
              </div>
              <br>
              <br>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">From </label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="inputPassword3" placeholder="16-03-2021">
                </div>
              </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">To :</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputPassword3" placeholder="17-03-2021">
                  </div>
                </div>
                <br>
                <div class="row" style="margin-left: 10%;">
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Delivery methods:</label>
                      <div class="form-check">
                        <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Will-Call</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">eTickets</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Mail</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Direct</label>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>	Include:</label>
                      <div class="form-check">
                        <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Ticket Details</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Emails & Phone numbers</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Address</label>
                      </div>
                     
                    </div>
                  </div>
                  </div>
                  <div class="col-sm-3">
                    <!-- select -->
                    <div class="form-group">
                      <label>Questions :</label>
                      <div class="form-check">
                        <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Checkout Questions</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Per-Event Questions</label>
                      </div>
                      <div>
                        <input class="form-check-input" type="checkbox">
                        <label class="form-check-label">Per-Ticket Questions</label>
                      </div>
                    
                    </div>
                  </div>
                  </div>
                  </div>
                  <br>
                  
               
            
            <div class="filterrow refresh-export"style="padding-left:230px;">
                <input type="submit" name="ctl00$CPMain$cRefresh" value="Refresh" id="ctl00_CPMain_cRefresh" class="btn btn-secondary button-refresh" >
                <input type="submit" name="ctl00$CPMain$cPrint" value="Print" id="ctl00_CPMain_cPrint" class="btn btn-secondary button-print"style="margin-left:10px;">
                <input type="submit" name="ctl00$CPMain$cExport" value="Export" id="ctl00_CPMain_cExport" class="btn btn-secondary button-export"style="margin-left:10px;">
            </div>
        </div>    
        <div>
        </div>
      </div> 
            <table cellspacing="0" rules="rows" border="0" id="ctl00_CPMain_GridView1" style="border-width:0px;border-collapse:collapse;">
    <tbody><tr>
<br>
 
        <td colspan="8"style="padding-left:234px;" class="bottom-nodata">There are no data records to display.</td>
    </tr>
</tbody></table>
</div><br>
    <label id="ctl00_CPMain_cTotal" class="rightalign bold"style="padding-left:30px;">Total: 0</label>
        <br>
        <br>&nbsp;<br>
    
</div>



      



      </div>
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
      
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection