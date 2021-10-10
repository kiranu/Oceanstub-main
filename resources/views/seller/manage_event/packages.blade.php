@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all and (max-width:720px) {
.button-editpackage{
margin-top: 10px;
}
.button-newpackage{
margin-top: 10px;

}
.table-box{
font-size: 11px;
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
       <!-- Content Header (Page header) -->
       <!-- <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">

                  </ol>
                </div>
              </div>
            </div>
          </section> -->

          <!-- Main content -->
                  <div class="card card-info">
                    <div class="card-header"style="background-color: #007bff;">
                        <h3 class="card-title">Packages</h3>

                      <a href="{{route('seller.create_package')}}" class="btn btn-secondary button-newpackage">Add Package </a>

                    </div>
                  <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12">


                    <div class="card">

                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="package_table" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>id</th>
                            <th>Package Name</th>
                            <th>Hosted By</th>
                            <th>Status</th>
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
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script>
    $(document).ready( function () {
     $('#package_table').DataTable({
            processing: true,
             serverSide: true,
             searching: true,
             searching: true,

              ajax: '{{ route('seller.package.ajax') }}',


              columns: [
            // {data: 'DT_RowIndex', name: 'DT_RowIndex' },
            {data: 'id', name: 'id' },
            {data: 'first_title', name: 'first_title' },
            {data: 'organiser', name: 'organiser'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'},

         ],

         order: [[1, 'desc']]

         });
      });
   </script>
@endsection
