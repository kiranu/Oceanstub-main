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
           
                
               <br>
             
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">View  Venue </h3>
            </div>
 @if(session()->has('message'))
<div id="error" class="alert alert-success" style="width: 50%;margin-top: 20px;margin-right: 20px">
<button onclick="$('#error').remove();" type="button" class="close"  aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
{{ session()->get('message') }}
</div>
@endif
        </div>
        <table class="table table-striped" style="width: 78%;margin-left: 79px;">
            <thead>
            
            </thead>
            <tbody>
              <tr>
                <td>Venue Name</td>
                <td>{{$venue->name}}</td>
              </tr>
              @isset($venue->seat_chart)
              <tr>
                <td>Seating Chart</td>
                <td>{{$sc->seating_chart_name}}</td>
              </tr>
              @endisset
              <tr>
                <td>Region</td>
                <td>{{$venue->region}}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>{{$venue->street}},{{$venue->city}},{{$venue->state}},{{$venue->zip_code}}</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>{{$venue->country}}</td>
              </tr>
              <tr>
                <td>Time Zone</td>
                <td>{{$venue->time_zone}}</td>
              </tr>
              
            
            </tbody>
          </table>
          <div class="edit-button" style="float: right;margin-right: 27%;">
              <a href="{{route('seller.venue.get_edit', $venue->id)}}" class='fas fa-edit' style="font-size:14px;color:#008DFF;margin-right: 10px">Edit</a>
              <a onclick="return confirm('Are you sure want to remove the venue?')" href="{{route('seller.venue.delete', $venue->id)}}" class='fas fa-trash' style="font-size:14px;color:red;margin-right: 10px">Delete</a>

          </div>
          <br>
          <br>
          <br>
          <br>
          







 
 

  

      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection