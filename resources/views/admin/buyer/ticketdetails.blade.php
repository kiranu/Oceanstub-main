@extends('admin.layouts.admin_app')
@section('title','OCEANSTUB|Admin Portal')
@section('top_scripts')
@endsection
@section('style')
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
  <!-- Navbar -->
  @include('admin.layouts.admin_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('admin.layouts.admin_sidebar')
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">

<div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding-left: 10px;"><br>
               <h3 class="devider ColTextHighlight" style="color: #007bff" ;=""><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;Ticket Details
               </h3>
               <hr>
               <div class="block" style="padding-left:10px;">

                  <p><span class="ColTextHighlight" style="color: #007bff">Ticket Name: </span> {{$ticket['ticket']->name}}</p>
                 <p><span class="ColTextHighlight" style="color: #007bff">Ticket Price: </span> {{$ticket['ticket']->buy_price}}{{$ticket['ticket']->prefix_sc}}</p>
                  <p><span class="ColTextHighlight" style="color: #007bff">Booked On: </span>{{$ticket->created_at->format('d-m-Y h:i:sa')}}</p>
                  <p><span class="ColTextHighlight" style="color: #007bff">Description: </span>{{$ticket['ticket']->description}}</p>

                  </div>
               <br>
               <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Event Details</h3>
               <hr>
                 <p><span class="ColTextHighlight" style="color: #007bff">Event Name: </span> {{$ticket['events']->first_title}} {{$ticket['events']->second_title}}</p>

                  {{-- <p><span class="ColTextHighlight" style="color: #007bff">Hosted By: </span> {{$ticket['seller']->name}}</p> --}}


               </div>






      </div>
      </div>
      </div>
         <!-- footer -->
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection
