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
              <h3 class="card-title">About Us
              </h3>
            </div>
        </div>
        <div class="cHtmlEditorContent"style="padding-left: 16px;">
            <p>ARJUN EVENTS is the fast, easy and safe way to find and purchase tickets. You can get information and buy tickets online in a few minutes. 
<p>Simply purchase your tickets on your computer or phone, print your tickets or show them on your smartphone and get admitted.<img src="images/edit.JPG" width="30" height="3
  0"></p>
<br>
<h5><b>Why use ARJUN EVENTS</b></h5>
<ol>
<li>
<h6><b>Purchase tickets using your credit/debit card from the comfort of your computer.</b></h6>
</li>
<li>
<h6><b>Choose Your Price preference and Seat:</b></h6>
    If the event is assigned seat, you can pick your seat on the interactive seating chart.
</li>
<li>
<h6><b>Fast and easy delivery</b></h6>
You can simply print your tickets at home or show your e-tickets on your phone to easily get admitted
</li>
<!--    <li>
<h4>Last minute tickets.</h4>
Is it last minute? There is no more ticket available anywhere? Try our Traded tickets. You may find some good locations in our Traded Tickets.
</li>
--> 
</ol>

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