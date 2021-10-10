@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            @include('layouts.seller_navbar')
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            @include('layouts.seller_sidebar')
            <!-- /Main Sidebar Container -->
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">

<div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding-left: 10px;"><br>
               <h3 class="devider ColTextHighlight" style="color: #007bff" ;=""><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;package Details
               </h3>
               <hr>
               <div class="block" style="padding-left:10px;">
                  <p><span class="ColTextHighlight" style="color: #007bff">package Name: </span> {{$package->first_title}} {{$package->second_title}}</p>

                  <p><span class="ColTextHighlight" style="color: #007bff">Hosted By: </span> {{$package->organiser}}</p>

                  </div>
               <br>
               <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Venue and Time</h3>
               <hr>

                  <p><span class="ColTextHighlight" style="color: #007bff">Start Date: </span>{{$package->start_date_time}}</p>
                  <span class="cNewPlan">
                      @if(isset($package->image))
               <h3 class="devider ColTextHighlight" style="color: #007bff">Images</h3>
               <hr>
               <img src="{{url($package->image)}}" height="100" width="100">

               </div>

               @endif
                <span class="cNewPlan">
               <h3 class="devider ColTextHighlight" style="color: #007bff">Event Details</h3>
               <hr>

                 <div class="card-body">
           <table id="sections" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                      <th>event Name</th>
                      <th>Status</th>
                      <th>Remove</th>

                     </tr>
                    </thead>
                    <tbody>
                    @foreach ($package['event_list'] as $event)
                 <tr>
                 <td>{{$event['events']->first_title}}</td>
                 <td>{{$event->status}}</td>
                 <td><a class="btn btn-danger btn-sm" href="{{route('seller.package.event.delete',$event->id)}}" ><i class="fas fa-trash"></i></a>'</td>
                 </tr>
                    @endforeach
                 </tbody>

                  </table>
</div>
    <br>
    <br>
    <br>




      </div>
      </div>
      </div>
         <!-- footer -->
          <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
    </div>
    @endsection
    @section('bottom_scripts')
@endsection
