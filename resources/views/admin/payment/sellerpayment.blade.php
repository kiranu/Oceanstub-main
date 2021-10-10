@extends('admin.layouts.admin_app')
@section('title','OCEANSTUB')
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
        <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Seller Payment</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Seller Payment</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">Seller Payments</h3>
            </div>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  

                  <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="seller_payment_table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>Payment Id</th> 
                          <th>Seller Name</th> 
                          <th>Purpose</th>
                          <th>Amount</th>
                          <th>Status</th> 
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
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
  <script>
   $(document).ready( function () {
    $('#seller_payment_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,
            
             ajax: '{{ route('admin.sellerpayment.ajax') }}',
             

             columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex' },
           {data: 'id', name: 'id' },
           {data: 'seller_name', name: 'seller_name'},
           {data: 'purpose', name: 'purpose'},
           {data:'amount', name: 'amount' },
           {data:'status', name: 'status' },
        ],
        
        order: [[1, 'desc']]
               
        });
     });
  </script>
@endsection