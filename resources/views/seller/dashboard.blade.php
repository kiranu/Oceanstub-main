@extends('layouts.seller_app')
@section('title','OceanStub | Dashboard')
@section('top_scripts')
@endsection
@section('style')
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      @include('layouts.seller_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('layouts.seller_sidebar')
      <!-- /Main Sidebar Container -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0">Dashboard</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <!-- Small boxes (Stat box) -->
               <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-book"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text">Past Events</span>
                           <span class="info-box-number">40</span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bell"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text">Upcoming Events</span>
                           <span class="info-box-number">10</span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <!-- fix for small devices only -->
                  <div class="clearfix hidden-md-up"></div>
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text">Users</span>
                           <span class="info-box-number">11</span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-3">
                     <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                           <span class="info-box-text"> Visitors</span>
                           <span class="info-box-number">100</span>
                        </div>
                        <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
               <!-- Main row -->
               <div class="row">
                  <!-- Left col -->
                  <section class="col-lg-7 connectedSortable">
                     <!-- Custom tabs (Charts with tabs)-->
                     <div class="card">
                        <div class="card-header">
                           <h3 class="card-title">
                              <i class="fas fa-chart-pie mr-1"></i>
                              Sales
                           </h3>
                           <div class="card-tools">
                              <ul class="nav nav-pills ml-auto">
                                 <li class="nav-item">
                                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="tab-content p-0">
                              <!-- Morris chart - Sales -->
                              <div class="chart tab-pane active" id="revenue-chart"
                                 style="position: relative; height: 300px;">
                                 <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                              </div>
                              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                 <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </section>
                  <!-- /.Left col -->
                  <!-- right col (We are only adding the ID to make the widgets sortable)-->
                  <section class="col-lg-5 ">
                     <!-- Map card -->
                     <div style="display:none" class="card bg-gradient-primary">
                        <div class="card-header border-0">
                           <h3 class="card-title">
                              <i class="fas fa-map-marker-alt mr-1"></i>
                              Visitors
                           </h3>
                           <!-- card tools -->
                           <div class="card-tools">
                              <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                              <i class="far fa-calendar-alt"></i>
                              </button>
                              <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                              </button>
                           </div>
                           <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                           <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-footer bg-transparent">
                           <div class="row">
                              <div class="col-4 text-center">
                                 <div id="sparkline-1"></div>
                                 <div class="text-white">Visitors</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                 <div id="sparkline-2"></div>
                                 <div class="text-white">Online</div>
                              </div>
                              <!-- ./col -->
                              <div class="col-4 text-center">
                                 <div id="sparkline-3"></div>
                                 <div class="text-white">Sales</div>
                              </div>
                              <!-- ./col -->
                           </div>
                           <!-- /.row -->
                        </div>
                     </div>
                     <!-- /.card -->
                     <!-- Calendar -->
                     <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                           <h3 class="card-title">
                              <i class="far fa-calendar-alt"></i>
                              Calendar
                           </h3>
                           <!-- tools card -->
                           <div class="card-tools">
                              <!-- button with a dropdown -->
                              <div class="btn-group">
                                 <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                 <i class="fas fa-bars"></i>
                                 </button>
                                 <div class="dropdown-menu" role="menu">
                                    <a href="#" class="dropdown-item">Add new event</a>
                                    <a href="#" class="dropdown-item">Clear events</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
                                 </div>
                              </div>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                              </button>
                           </div>
                           <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                           <!--The calendar -->
                           <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </section>
                  <!-- right col -->
               </div>
               <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
 
      <!-- footer -->
      @include('layouts.seller_footer')
  
   </div>
   <!-- ./wrapper -->
@endsection
@section('bottom_scripts')
@endsection