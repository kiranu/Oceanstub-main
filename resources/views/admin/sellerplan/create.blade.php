@extends('admin.layouts.admin_app')
@section('title','OCEANSTUB|Admin Portal')
@section('top_scripts')
@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
                    <h1>Add Seller Plans</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Add Plans</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                    <h3 class="card-title">Add Plan Details Here</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form name="CategoryForm" id="CategoryForm" action="{{url('/admin/seller_plan')}}"
                        method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label for="brand_code">Plan Name</label>
                                    <input type="name" class="form-control"  name="name" placeholder="Enter Brand Name" value="{{old('name')}}" required> 
                                </div>
                                <div class="form-group">
                                    <label><strong>Description :</strong></label></br>
                                    <textarea id="summernote1"  name="desc" >{{old('desc')}}</textarea> 
                                </div>
                                <div class="form-group" >
                                    <label for="brand_code">Plan Validity</label>
                                    <input type="number" class="form-control"  name="validity" placeholder="Enter Validity in days" value="{{old('validity')}}" required> 
                                </div>
                                <div class="form-group" >
                                    <label for="brand_code">Plan Amount</label>
                                    <input type="number" class="form-control"  name="price" placeholder="Enter Price" value="{{old('price')}}" required> 
                                </div>
                                <div class="form-group">
                                    <div class="container">
                                        <label for="Image"> Select Image </label>
                                        <input type="file" class="form-control"  name="image" id="image" >
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Image</button> -->
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
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
    @section('bottom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
    </script>
    @endsection
