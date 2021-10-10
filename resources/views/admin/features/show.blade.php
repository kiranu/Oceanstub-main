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


            <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding-left: 10px;"><br>
                        <h3 class="devider ColTextHighlight" style="color: #007bff" ;=""><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;Features Details
                        </h3>
                        <hr>
                        <div class="block" style="padding-left:10px;">
                            <h3> {{$features->tittle}}</h3>
                            <p> {!!$features->desc!!}</p>
                                </div>
                    </div>
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
