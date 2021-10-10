@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
            <style>
               @media all  and (max-width: 720px) {
               .venueview {
               padding-left: 10px!important;
               padding-right: 10px!important;
               font-size: 10px;
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
    <div class="card card-info">
            <div class="card-header" style="background-color: #007bff;">
               <h3 class="card-title">View Venue</h3>
            </div>
         <!--  @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif -->
          @if(session()->has('message'))
<div id="error" class="alert alert-success" style="width: 50%;margin-top: 20px;margin-right: 20px">
<button onclick="$('#error').remove();" type="button" class="close"  aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
{{ session()->get('message') }}
</div>
@endif

            <br>
    <div class="card-footer">
     <a href="{{route('seller.add_venue')}}" class="btn btn-success">Create New Venue</a>
               
    </div>    

 <div class="card-body">
                <table id="venue_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>Venue Name</th>
                    <th>Region</th>
                    <th>Seating Chart</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                
            
                </table>
              </div>
    </div>   
    <br><br>         
</div>
 <!-- footer -->
@include('layouts.seller_footer')
<!-- /footer -->
@endsection
@section('bottom_scripts')


<script>
   $(document).ready( function () {
    $('#venue_table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            
             ajax: '{{route('seller.venues.ajax')}}',
             
             columns: [
           { data: 'DT_RowIndex', name: 'DT_RowIndex' },
           { data: 'name', name: 'name' },
           { data: 'region', name: 'region' },
           { data: 'seat_chart', name: 'seat_chart' },
           { data: 'address', name: 'address', },
           { data: 'action', name: 'action', },
                   
        ],
         order: [[1, 'asc']]
                 
        });
     });
  </script>
@endsection