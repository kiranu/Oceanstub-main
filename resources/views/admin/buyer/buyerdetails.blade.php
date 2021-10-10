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
      
      <div class="col-md-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                  {{-- <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="false">Overlay</a>
                  </li> --}}
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Ticket Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-normal-tab" data-toggle="pill" href="#custom-tabs-five-normal" role="tab" aria-controls="custom-tabs-five-normal" aria-selected="true">Buyer Information</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-five-tabContent">
                  <div class="tab-pane fade" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                    <div class="overlay-wrapper">
                      {{-- <div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                      <div class="text-bold pt-2">Loading...</div>
                      </div> --}}
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    <div class="overlay-wrapper">
                      {{-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                      <div class="text-bold pt-2">Loading...</div>
                      </div> --}}
                   @include('admin.buyer.buyerdetails.event_details')

                    </div>
                  </div>
                  <div class="tab-pane fade active show" id="custom-tabs-five-normal" role="tabpanel" aria-labelledby="custom-tabs-five-normal-tab">
                   @include('admin.buyer.buyerdetails.details')
                  </div>
                </div>
              </div>
              <!-- /.card -->
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