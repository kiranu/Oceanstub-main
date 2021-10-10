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
               <h3 class="devider ColTextHighlight" style="color: #007bff" ;=""><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;Event Details
               </h3>
               <hr>
               <div class="block" style="padding-left:10px;">
                  <p><span class="ColTextHighlight" style="color: #007bff">Event Name: </span> {{$event->first_title}} {{$event->second_title}}</p>
               
                  <p><span class="ColTextHighlight" style="color: #007bff">Hosted By: </span> {{$event['seller']->name}}</p>
                 
                  </div>
               <br>
               <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Venue and Time</h3>
               <hr>
              
                 <p><span class="ColTextHighlight" style="color: #007bff">Location: </span> {{$event['sch_venue']->venue->name}}</p>
                  <p><span class="ColTextHighlight" style="color: #007bff">Start Date: </span>{{$event['sch_venue']->start_date->format('d-m-Y')." on ".$event['sch_venue']->start_time->format('h:i:sa')}}</p>
                  <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Images</h3>
               <hr>
               <img src="{{url($event['event_files']->flyer_path)}}" height="100" width="100">
              
               </div>

               @if ($event['event_ticket']->cap_capacity !== null)
                   
                <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Ticket Details</h3>
               <hr>
                 <p><span class="ColTextHighlight" style="color: #007bff">Total Ticket: </span> {{$event['event_ticket']->cap_capacity}}</p>

                 <div class="card-body">
           <table id="sections" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      
                      <th>Ticket Name</th>
                      <th>Price</th>
                      <th>Quatity</th>
                      <th>Booked</th>
                      <th>Balance</th>
                     </tr>
                    </thead>
                    <tbody>
                    @foreach ($event['event_ticket']->ticket_price as $ticket)
                 <tr>
                 <td>{{$ticket->name}}</td>
                 <td>{{$ticket->buy_price}}</td>
                 <td>{{$ticket->capacity}}</td>
                 <td>{{$ticket->sold}}</td>
                 <td>{{(int)$ticket->capacity-(int)$ticket->sold}}</td>
                 </tr>
                    @endforeach
                 </tbody>

                  </table>
</div>
    <br>
    <br>
    <br>
               @endif
             
                    
     

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