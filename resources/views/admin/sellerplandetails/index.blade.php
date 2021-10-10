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
    @if(Session::has('succes_message'))
    <p class="alert alert-success notification">{{ Session::get('succes_message') }}</p>
    @endif
    @if(Session::has('danger_message'))
    <p class="alert alert-danger notification">{{ Session::get('danger_message') }}</p>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seller Plans</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Seller Plan</h3>
              <a href="{{url('admin/seller_plan_details/create')}}" style="max-width: 150px; float:right" class="btn btn-block btn-success">Add Seller Plan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th>Name</th>
                  <th>Basic</th>
                  <th>Premium</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
            @foreach ($seller_plans as $seller_plan)
                <tr>
                  <td>{{$seller_plan->name}}</td>
                  <td>{{$seller_plan->Basic}}</td>
                  <td>{{$seller_plan->Premium}}</td>
                  <td>@if($seller_plan->status ==1)
                    <a class="UpdateSellerPlanStatus" id="seller_plan-{{$seller_plan->id}}"
                    seller_plan_id="{{$seller_plan->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Active</a>
                    @else
                    <a class="UpdateSellerPlanStatus" id="seller_plan-{{$seller_plan->id}}"
                    seller_plan_id="{{$seller_plan->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Inactive</a>
                    @endif

                  </td>
                  <td><a title="Edit seller_plan" href="{{url('admin/seller_plan_details/'.$seller_plan->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                  <a title="Delete Plan" class="confirmDelete" name="seller_plan " href="{{url('admin/seller_plan_details/delete/'.$seller_plan->id)}}"><i class="fas fa-trash"></i></a>
                  </td>

                </tr>
               @endforeach
                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
      </div>
         <!-- footer -->
         @include('admin.layouts.admin_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
$(function() {
    $(".confirmDelete").on("click", function(){
        // event.preventDefault();

        var name = $(this).attr("name");
        if(confirm("Are you Sure you Wand to delete "+name+"?"))
        {
            return true;
        }
            return false;
    });

    //......UPDATE seller_plan STATUS....................

    $(".UpdateSellerPlanStatus").on("click", function(){
        var status =$(this).text();
        var seller_plan_id =$(this).attr("seller_plan_id")
        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
          });
        $.ajax({
            type:'post',
            url:"{{route('admin.update_seller_plan_details_status')}}",
            data:{status:status,seller_plan_id:seller_plan_id},
            success:function(resp){

                if(resp['status']==0){
                    $('#seller_plan-'+seller_plan_id).html("<a class='UpdateSellerPlanStatus' href='javascript:void(0)'>Inactive</a>");
                }else if(resp['status']==1){
                    $('#seller_plan-'+seller_plan_id).html("<a class='UpdateSellerPlanStatus' href='javascript:void(0)'>Active</a>");
                }

            }, error:function(){
                alert("Error update_seller_plan_status");
                }

        });



    });


});
</script>
@endsection
