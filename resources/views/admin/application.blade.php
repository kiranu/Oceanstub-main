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
       <div class="card card-info">
                <div class="card-header" style="background-color: #007bff;">
                    <h3 class="card-title">Application Management</h3>
                </div>





<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab"style="padding:20px;">
<h3 class="devider ColTextHighlight"   style="color: #007bff; margin-top: 10px;";><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;Basic Information:
</h3>
<hr>

          <div class="card-body">

             
          <form name="CategoryForm" id="CategoryForm" action="{{route('admin.application.update')}}"
              method="POST" enctype='multipart/form-data'>
              @csrf
            <div class="row">

              <div class="col-md-6">
        
				<div class="form-group" >
                    <label for="brand_code">Email</label>
                    <input type="text" class="form-control"  name="email" placeholder="Enter Email" value="{{$application->email}}" required> 
                  </div>
                  
                  <div class="form-group" >
                    <label for="brand_code">Mobile</label>
                    <input type="number" class="form-control"  name="mobile" placeholder="Enter Mobile number" value="{{$application->mobile}}" required> 
                  </div>
                   <div class="form-group" >
                    <label for="brand_code">Address</label>
                    <input type="text" class="form-control"  name="address" placeholder="Enter Address" value="{{$application->address}}" required> 
                  </div>
				         
                  
                 <div class="form-group">
                    <label for="category_image">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="logo">
                        <label class="custom-file-label" name="logo" id="logo" for="category_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" name="category_image" id="category_image">Upload</span>
                      </div>
                    </div>
                  </div>
                  @if(!empty($application->logo))
                  <div style="height: 100px;"><img style="width:50px;" src="{{url('uploads/Admin/Application/'.$application->logo)}}" alt="">
                </div>
                @endif
                   <div class="form-group" >
                        <label for="brand_code">Facebook Link</label>
                        <input type="text" class="form-control"  name="fb_link" placeholder="Facebook Page Link" value="{{$application->fb_link}}" > 
                    </div>
                     <div class="form-group" >
                        <label for="brand_code">Google Link</label>
                        <input type="text" class="form-control"  name="google_link" placeholder="Google" value="{{$application->google_link}}" > 
                    </div>
                     <div class="form-group" >
                        <label for="brand_code">Instagram Link</label>
                        <input type="text" class="form-control"  name="ig_link" placeholder="Instagram Link" value="{{$application->ig_link}}" > 
                    </div>
                     <div class="form-group" >
                        <label for="brand_code">LinkedIn Link</label>
                        <input type="text" class="form-control"  name="linkedin_link" placeholder="LinkedIn Link" value="{{$application->linkedin_link}}" > 
                    </div>
                     <div class="form-group" >
                        <label for="brand_code">Twitter Link</label>
                        <input type="text" class="form-control"  name="twitter_link" placeholder="Twitter Link" value="{{$application->twitter_link}}" > 
                    </div>




              <button type="submit" class="btn btn-primary">Submit</button>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
                  <div class="row">

                 
                  </div>
            </div>
            </div>
           
        </form>
      </div>
  </div>
</div>


         <!-- footer -->
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
@endsection