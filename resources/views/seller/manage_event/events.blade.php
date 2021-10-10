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
          
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">Events</h3>
            </div>
          <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="events_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th></th>
                   <!--  <th>ID</th> -->
                    <th>Event</th>
                    <th>Currency</th>
                    <th>Date/Time</th>
                    <th>Venue</th>
                    <th>Created At</th>
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                
            
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
  <script>
   $(document).ready( function () {
    $('#events_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,
            
             ajax: '{{ route('manage.events.ajax') }}',
             

             columns: [
             
           { data: 'DT_RowIndex', name: 'DT_RowIndex' },

           // { data: 'id', name: 'id' },
           { data: 'first_title', name: 'Event'},
           { data: 'currency', name: 'Currency'},
           { data: 'date', name: 'date'},
           {data: 'venue', name: 'venue' },
           {data: 'created_at', name: 'created_at' },
           {data: 'active', name: 'active' },
           { data: 'action', name: 'Action' }
         
                   
        ],
        
        order: [[1, 'asc']]
               
        });
     });
  </script>
@endsection