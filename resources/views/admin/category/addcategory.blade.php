@extends('admin.layouts.admin_app')
@section('title','OCEANSTUB|Admin Portal')
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
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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

            <h3 class="card-title">Add Category Details Here</h3>

            <div class="card-tools">

              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

          <!-- /.card-header -->

          <div class="card-body">

              <form name="CategoryForm" id="CategoryForm" action="{{url('/admin/addcategory_create')}}"
              method="POST" enctype='multipart/form-data'>
              @csrf

            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                <div class="form-group">

                    <label for="categoryname">Category Name</label>
                    <input type="name" class="form-control" id="category_name" name="category_name" placeholder="Enter Catergory Names" value="">
                  </div>
                  <label>Parent Category</label>
                  <select class="form-control"  name="parent_id" id="parent_id" class="select2" data-placeholder="Select Parent Category" style="width: 100%;">
                    <option value="0">Main Category</option>
                    @foreach($categorys as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      {{-- @if(!empty($category['subcategory']))
                        @foreach($category['subcategory'] as $subcategory)
                        <option value="{{$subcategory->id}}">--{{$subcategory->category_name}}</option>
                        @endforeach
                      @endif --}}
                    @endforeach
                  </select>
                </div>
               <div class="form-group">
                    <label for="category_image">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="category_image" id="category_image">
                        <label class="custom-file-label" name="category_image" id="category_image" for="category_image">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter Category Description"></textarea>
                      </div>
                   
                <!-- /.form-group -->
              <button type="submit" class="btn btn-primary">Submit</button>

              </div>
      
        </form>

    </section>
    <!-- /.content -->
  </div>

         <!-- footer -->
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection

