@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
   <style type="text/css">
      .deliveryComment{
            display: block;
    text-align: left;
    color: #A15927;
    font-size: 85%;
    margin-left: 40px;

      }</style>
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
      <div class="content-wrapper" style="min-height:1269.392px !important;">
   
        <div class="card card-primary">
        <div class="card-header">
                <h3 class="card-title">Check Out</h3>
              </div>
</div>
        <!-- Main content -->
         <div class="col-md-9" style="margin:0 auto;">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Normal mode(Ctrl+F1)<br>
                        <small>All information required</small></a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Fast mode - Cash(Ctrl+F2)<br>
                              <small>No buyer information collected Direct delivery only</small></a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Fast mode - Credit (Ctrl+F3) <br>
                              <small>Direct delivery only</small></a></li>
                </ul>
              </div><!-- /.card-header -->
            
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;SHOPPING CART</h3>
              </div>
              <div class="card-body">
                  <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
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
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;DELIVERY METHOD</h3>
               
              </div>
              <div class="card-body" style="display:block;">
                <h6><strong>ocean - Friday June 25, 2021 at 08:00 PM</strong></h6>
                <div class="form-check" style="display:inline-block;">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Direct(<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Only visible to sales agents)
    
   
  </label>
</div>


<div style="display:inline-block;"><p><strong>No Charge</strong></p></div>
<br>
<span class="deliveryComment">Face to face sales. Print the tickets right away and hand them out</span>
<br>
<div class="form-check" style="display:inline-block;">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    e-Ticket as Email (Print or show on your phone) 
  </label>
</div>
<div style="display:inline-block;"><p><strong>No Charge</strong></p></div>

<br>
<span class="deliveryComment">Show on your phone or print your tickets. You can print right away or later from the confirmation email</span>
<br>
<div class="form-check" style="display:inline-block;">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Will-Call (Venue pickup) 
  </label>
</div>
<div style="display:inline-block;"><p><strong>No Charge</strong></p></div>
<br>
<span class="deliveryComment">Pickup at the venue before the event - You must present your credit card or ID</span>
<br>
              </div>
          
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;PRICE</h3>

                <div class="card-tools">
                 
                </div>
              </div>
              <div class="card-body">
                Start creating your amazing application!
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
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i>&nbsp;&nbsp;BUYER INFORMATION:&nbsp;<small> (<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;ONLY VISIBLE TO SALES AGENTS)</small></h3>

                <div class="card-tools">
                 
                </div>
              </div>
              <div class="card-body">
                Start creating your amazing application!
              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

          </div>
        </div>
      </div>
      <br>
      <br>
     
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection