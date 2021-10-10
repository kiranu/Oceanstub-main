@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
@media all and (max-width:720px){
.return-policy{
padding-left: 0px!important;
margin-right: 0px!important;
}
.top-header{
padding-left: 0px!important;
font-size: 20px;
}
.top-header2{
padding-left: 0px!important;
font-size: 15px;
}
.return-button{
font-size: 12px;
}
.editicon{
margin-left: 406px!important;
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
      <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Terms of Use
              </h3>
            </div>
        </div>



     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">TERMS & CONDITIONS: <a href="{{route('seller.content_management.edit_terms_of_use',$policy->id)}}"><i class="fas fa-edit"></i></a></h3>

               
              </div>
              <div class="card-body">
                {!!html_entity_decode($policy->terms_of_use)!!}
             
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
      
      </div>
        
         @include('layouts.seller_footer')
     
      </div>
@endsection
@section('bottom_scripts')
@endsection