@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all  and (max-width: 720px) {
.events-past {
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
      <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Past Events</h3>
            </div>
        
            <table style="width: 100%; padding-left: 50px;" id="users-datatable" data-table="users-datatable" class="table table-hover table-striped table-bordered table-responsive dataTable no-footer events-past" role="grid" aria-describedby="users-datatable_info">
                      
                      <thead>
                          <tr role="row"><!-- <th class="sorting" tabindex="0" aria-controls="users-datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 40.2px;">sl/no</th> -->
                            <th class="sorting" tabindex="0" aria-controls="users-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 122.2px;">Event Name</th>
                            <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Company" style="width: px;">Venue</th>
                            <th class="project-actions no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 200px;">End Date</th></tr>
                      </thead>

                  <tbody>
    <?php 
        use Carbon\Carbon;

          foreach ($events as $key =>$value) {

         
           $end_date = $value->sch_venue->end_date;
           $end_time = $value->sch_venue->end_time;
           $current_date_time = Carbon::now();





           if($current_date_time->gt($end_date))
           {
            $x=$value;

            ?>
                   <tr>
                      <!-- <td>1</td> -->
                      <td>{{$x->first_title}}</td>
                      <td>{{$venues[$key]->name}}</td>
                       <td>{{date("jS F, Y", strtotime($end_date))}}</td>
                    </tr>
        <?php
           }

        }


            ?>
                     

                   
                    </tbody>
                  </table>
              </div>    
            <!-- /.card-header -->
            <!-- form start -->
             <br>
      </div>
         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection