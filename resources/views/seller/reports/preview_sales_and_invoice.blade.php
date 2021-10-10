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
         <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">General Form</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">preview</h3>
            </div><br>
            <style>
              @media all and (max-width:720px) {
                .bottom-nodata{
                  font-size: 12px;
    padding-left: 4px!important;
                }
                .print-export{
                  padding-left: 7px!important;
                }
                
              }
            </style>
       
            <div id="filters ui-widget-content  ui-corner-all clearfix" class="filters ui-widget-content  ui-corner-all row" style="padding-left: 50px;
            border: 1px solid black;
            width: 95%;
            margin: 0 auto;
            border-radius: 20px;
            padding-top: 25px;
            padding-bottom: 25px;
            min-height: 350px;">
                <div class="filterrow">
                <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight"style="color: #007bff;font-weight:bold">Data:</span>
            </div>
            <div class="card-body"style="padding-left: 0px;">
                
                     <br>
                    <table cellspacing="0" rules="rows" border="0" id="ctl00_CPMain_GridView1" style="border-width:0px;border-collapse:collapse;">
                        <tbody><tr><br>
                            <td colspan="7"style="padding-left: 310px;" class="bottom-nodata">There are no data records to display.</td>
                        </tr>
                    </tbody></table><br>
                    <!-- /.form-group -->
          
              
          <div class="filterrow print-export"style="padding-left: 360px;">
                        <input type="submit" name="ctl00$CPMain$cRefresh" value="Print" id="ctl00_CPMain_cRefresh" class="btn btn-secondary">
                    
                        <input type="submit" name="ctl00$CPMain$cExport" value="Export" id="ctl00_CPMain_cExport" class="btn btn-secondary" style="margin-left:10px;">
                    </div>
                  
           
                 
                </div>
           
            
                  </div>
                    
      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection