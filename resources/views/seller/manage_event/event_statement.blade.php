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
      <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Event Statement</h3>
            </div>
        </div>

        <br>
        <style>
          @media all and (max-width:550px) {
            .button-refresh{
              margin-left: 94px!important;
            }
            .tabl-box{
              font-size: 11px;
            }
            .title-box{
              font-size: 11px;
            }
            
          }
        </style>
             <div id="filters ui-widget-content  ui-corner-all clearfix" class="filters ui-widget-content  ui-corner-all row" style="padding-left: 20px;
             border: 1px solid black;
             width: 95%;
             margin: 0 auto;
             border-radius: 20px;
             padding-top: 25px;
             padding-bottom: 25px;
             min-height: 156px;">
               <div class="card-body">
                 <div class="filterrow2">
                     <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight" style="color: #007bff;font-weight: bold;">Filters:</span>
                 </div><br>
                
               
                  <div class="form-group row" style="padding-left: 10px;">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Report Type:</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option>Sale by ticket type</option>
                        <option value="209385">Financial</option>
                        <option value="209308">Sales by orgin</option>
                        <option value="209133">Coupons & Discounts</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row"  style="padding-left: 10px;">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Organizer:</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option>All</option>
                      	<option value="1">Rahul</option>
                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row"  style="padding-left: 10px;">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Promotion Word:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="">
                    </div>
                  </div>
       
                   
                  </div>
                
<div class="filterrow3 clearfix button-refresh"style="margin-top:30px;margin-right:150px;margin-left:350px">
  <input type="submit" name="ctl00$CPMain$cRefresh2" value="Refresh" id="ctl00_CPMain_cRefresh2" class="btn btn-secondary">

</div>
             </div>
            
<br>
<div class="row" style="padding-left: 20px;"><h5>Sell Summary:</h5><p></p>


<table class="table tabl-box" style="margin-right: 20px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Price Level</th>
        <th scope="col">Buy Price</th>
        <th scope="col">Price</th>
        <th scope="col">Sold Units</th>
        <th scope="col">Total Buy Value</th>
        <th scope="col">Total Sale Value</th>
        
      </tr>
    </thead>
    <tbody>
        <tr>
          <th scope="row">Total Sale</th>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        </tbody>
</table>
</div>
<br>
<div class="row" style="padding-left:20px"><h5>Unsold Tickets:</h5><p></p>


<table class="table title-box" style="padding-left: 20px;margin-right: 20px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Title</th>
        <th scope="col"></th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        
        <th scope="col">Unsold</th>
        
      </tr>
    </thead>
  </div>
    <tbody>
        <tr>
          <th scope="row">Total Remaining</th>
          <td></td>
          <td></td>
      
        </tr>
        </tbody>
</table>

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