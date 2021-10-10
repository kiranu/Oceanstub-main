@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
.btn-res{
   background:#cc0000;
   border-color:#990000;   
    margin-top: -25px;
   
    float: right;
    margin-right: 377px;
}
@media only screen and (max-width: 600px) {
  .col-mrgin{
    margin: 0px;
    margin-top:23px;
  }.btn-res{
  float: right;
   
    margin-bottom: 41px;
   
    margin-right: 23px;
    margin-top: -28px;}
}
</style>
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
   <div class="wrapper">
      @include('layouts.seller_navbar')
      @include('layouts.seller_sidebar')
      <div class="content-wrapper">
         <!-- <section class="content-header">
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
            </div>
         </section> -->
         <!-- Main content -->
         <div class="card card-info">
            <div class="card-header" style="background-color: #007bff;">
               <h3 class="card-title">Update Venue</h3>

            </div>
            @if(session()->has('message'))
<div id="error" class="alert alert-success" style="width: 50%;margin-top: 20px;margin-right: 20px">
<button onclick="$('#error').remove();" type="button" class="close"  aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
{{ session()->get('message') }}
</div>
@endif
          
            <!-- form start -->
            <form class="form-horizontal" action="{{URL('seller/edit_venue')}}" method="POST">
               @csrf
               <div class="card-body">
                  <div class="form-group row">
                     <h3>Update Venue </h3>
                     <div class="col-sm-10">
                     </div>
                  </div>
                
                  <div class="form-group row">
                     <label for="" class="col-sm-2  col-form-label">Venue Name </label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" id="" value="{{old('name', $venue->name)}}" name="name" placeholder="Name">
                     </div>
                  </div>





                    <div class="form-group row">
                     <label for="" class="col-sm-2 col-form-label">Seating Chart</label>
                     <div class="col-sm-3">
              
                
                  

                          <select id="ScList" class="form-control" id="" name="seating">
                        
                         <option value="" disabled selected hidden>Choose Seating Chart</option>
                         @isset($sc)
                         @foreach($sc as $name)
                         <option value="{{$name->id}}"
                           {{$venue->seat_chart == $name->id ? 'selected' : '' }}
                           >{{$name->seating_chart_name}}</option>
                         @endforeach
                         @endisset
                      </select>

                     </div>
                       <div class="col-md-3 col-mrgin">
                        <a style="width:100%;" href="{{route('seller.get_customSeatingChart')}}" class="btn btn-success">Create New Seating Chart</a>
                     </div>

                  </div>
                

                   <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-2 col-form-label">Region </label>
                     <div class="col-sm-6">
                        <input type="text" value="{{old('region', $venue->region)}}" class="form-control " id="" name="region" placeholder="Region">
                     </div>
                  </div>

                   <div class="form-group row">
                     <label f class="col-md-2 col-form-label">Address </label>
                     <div class="col-md-3" style="display:block;">
                       <input  type="text" class="form-control" id="" 
                       value="{{old('StreetAddress', $venue->street)}}" name="StreetAddress" placeholder="Street Name">
                     </div>
                      <div class="col-md-3 col-mrgin" style="display:block;">
                       <input type="text" class="form-control" id="" 
                       value="{{old('city', $venue->city)}}" name="City" placeholder="City">
                     </div>

                  </div>



                   <div class="form-group row">
                     <label class="col-md-2 col-form-label"></label>
                     <div class="col-md-3" style="display:block;">
                        <input type="text" class="form-control" id="" 
                        value="{{old('state', $venue->state)}}" name="State" placeholder="State">
                     </div>

                      <div class="col-md-3 col-mrgin"style="display:block;" >
                        <input type="text" class="form-control" id="" 
                        value="{{old('zip_code', $venue->zip_code)}}" name="Zip" placeholder="Zip Code">
                     </div>

                  </div>



                   <div class="form-group row">
                     <label for="inputPassword3" class="col-sm-2 col-form-label">Country </label>
                     <div class="col-sm-6">

                        <select class="form-control " name="country" > 
                           @foreach($countries as $country)
                           <option value="{{$country->name}}" 
                            {{$venue->country == $country->name ? 'selected' : '' }}
                            >{{$country->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>

<div class="form-group row">
   <label  class="col-sm-2 col-form-label">Time Zone </label>
   <div class="col-sm-6">
      <select name="Timezone" id="Timezone" class="form-control">
         <option value="India Standard Time" 

             {{$venue->time_zone == "India Standard Time" ? 'selected' : '' }}

         >(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
         <option value="Dateline Standard Time">(UTC-12:00) International Date Line West</option>
         <option value="UTC-11"
         {{$venue->time_zone == "UTC-11" ? 'selected' : '' }}

         >(UTC-11:00) Coordinated Universal Time-11</option>
         <option value="Aleutian Standard Time"
          {{$venue->time_zone == "Aleutian Standard Time" ? 'selected' : '' }}
         >(UTC-10:00) Aleutian Islands</option>

         <option value="Hawaiian Standard Time"
         {{$venue->time_zone == "Hawaiian Standard Time" ? 'selected' : '' }}
         >(UTC-10:00) Hawaii</option>
         <option value="Marquesas Standard Time"
         {{$venue->time_zone == "Marquesas Standard Time" ? 'selected' : '' }}
         >(UTC-09:30) Marquesas Islands</option>
         <option value="Alaskan Standard Time"
         {{$venue->time_zone == "Alaskan Standard Time" ? 'selected' : '' }}
         >(UTC-09:00) Alaska</option>
         <option value="UTC-09"
         {{$venue->time_zone == "UTC-09" ? 'selected' : '' }}
         >(UTC-09:00) Coordinated Universal Time-09</option>
         <option value="Pacific Standard Time (Mexico)"
         {{$venue->time_zone == "Pacific Standard Time (Mexico)" ? 'selected' : '' }}
         >(UTC-08:00) Baja California</option>
         <option value="UTC-08"
         {{$venue->time_zone == "UTC-08" ? 'selected' : '' }}

         >(UTC-08:00) Coordinated Universal Time-08</option>
         <option value="Pacific Standard Time"
         {{$venue->time_zone == "Pacific Standard Time" ? 'selected' : '' }}

         >(UTC-08:00) Pacific Time (US &amp; Canada)</option>
         <option value="US Mountain Standard Time"
         {{$venue->time_zone == "US Mountain Standard Time" ? 'selected' : '' }}

         >(UTC-07:00) Arizona</option>

      </select>
   </div>
</div>
<input type="hidden" class="form-control" id="" value="{{$venue->id}}" name="id" >

               </div>
               <button  type="submit" class="btn-res btn btn-success ">Save Changes</button>

              <!--  <div class="card-footer">
                  <input type="hidden" class="form-control" id="" value="{{$venue->id}}" name="id" >
                  <a href="{{ URL('/seating_chart')}}" class="btn btn-success">Create Seating Chart</a>
                  <button style="background: red;border-color: red" type="submit" class="btn btn-success float-right">Save Changes</button>
               </div> -->
         </div>
         </form>
         <br>
         <br>
      </div>
     
      @include('layouts.seller_footer')
   </div>
   @endsection
   @section('bottom_scripts')
   @endsection