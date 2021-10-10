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
            <h1>Features</h1>
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
              <h3 class="card-title">Features</h3>
              <a href="{{url('admin/features/create')}}" style="max-width: 150px; float:right" class="btn btn-block btn-success">Add Features</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th>Id</th>
                  <th>Tittle</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
            @foreach ($featuress as $features)
                <tr>
                  <td><a href="{{url('admin/features/'.$features->id)}}">{{$features->id}}</a></td>
                  <td>{{$features->tittle}}</td>
                  <td>@if($features->status ==1)
                    <a class="UpdatefeaturesStatus" id="features-{{$features->id}}"
                    features_id="{{$features->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Active</a>
                    @else
                    <a class="UpdatefeaturesStatus" id="features-{{$features->id}}"
                    features_id="{{$features->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Inactive</a>
                    @endif

                  </td>
                  <td><a title="Edit features" href="{{url('admin/features/'.$features->id.'/edit')}}"><i class="fas fa-edit"></i></a>
                  <a title="Delete features" class="confirmDelete" name="features " href="{{url('admin/features/delete/'.$features->id)}}"><i class="fas fa-trash"></i></a>
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

    //......UPDATE features STATUS....................

    $(".UpdatefeaturesStatus").on("click", function(){
        var status =$(this).text();
        var features_id =$(this).attr("features_id")
        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
          });
        $.ajax({
            type:'post',
            url:"{{route('admin.update_features_status')}}",
            data:{status:status,features_id:features_id},
            success:function(resp){

                if(resp['status']==0){
                    $('#features-'+features_id).html("<a class='UpdatefeaturesStatus' href='javascript:void(0)'>Inactive</a>");
                }else if(resp['status']==1){
                    $('#features-'+features_id).html("<a class='UpdatefeaturesStatus' href='javascript:void(0)'>Active</a>");
                }

            }, error:function(){
                alert("Error update_features_status");
                }

        });



    });


});
</script>
@endsection
