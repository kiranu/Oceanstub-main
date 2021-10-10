@extends('admin.layouts.admin_app')
@section('title','OCEANSTUB|Admin Portal')
@section('top_scripts')

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
            <h1>Edit Seller Plans</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Plans</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      @if(Session::has('succes_message'))
      <p class="alert alert-success">{{ Session::get('succes_message') }}</p>
      @endif
      @if ($errors->any())
     <div class="alert alert-danger">
     <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">

          <div class="card-header">

            <h3 class="card-title">Edit Plan Details Here</h3>

            <div class="card-tools">

              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

          <!-- /.card-header -->

          <div class="card-body">


          <form name="CategoryForm" id="CategoryForm" action="{{url('admin/seller_plan_details/'.$seller_plan->id)}}"
              method="POST" enctype='multipart/form-data'>
              @csrf
              @method('PUT')
            <div class="row">

              <div class="col-md-6">

				<div class="form-group" >
                    <label for="brand_code">Name</label>
                    <input type="name" class="form-control"  name="name" placeholder=" Name" value="{{$seller_plan->name}}" required>
                  </div>

                  <div class="form-group" >
                    <label for="brand_code">Basic </label>
                    <input type="text" class="form-control"  name="Basic" placeholder="Basic" value="{{$seller_plan->Basic}}" required>
                  </div>
                   <div class="form-group" >
                    <label for="brand_code">Premium</label>
                    <input type="text" class="form-control"  name="Premium" placeholder="Premium" value="{{$seller_plan->Premium}}" required>
                  </div>

              <button type="submit" class="btn btn-primary">Submit</button>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->

            </div>
            </div>
            </div>
        </form>
      </div>
      </div>
      </br>
      </br>
   </section>
    <!-- /.content -->
      </div>
         <!-- footer -->
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
