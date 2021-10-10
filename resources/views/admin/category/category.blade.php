
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
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
                <a href="{{url('/admin/addcategory')}}" style="max-width: 150px; float:right" class="btn btn-block btn-success">Add Category</a>

              </div>

               <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Parent Category</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categorys as $category)
                    @if(!isset($category->parentcategory->category_name))
                        @php
                            $parent_category="Root";
                        @endphp
                        @else
                        @php
                            $parent_category=$category->parentcategory->category_name;
                        @endphp
                    @endif
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->category_name}}</td>
                  <td>{{$parent_category}}</td>

                  <td>
                    <img src="{{ asset('uploads/Admin/Category/'. $category->category_image)  }}"   width="50" height="50"  >
                  </td>

                  <td>@if($category->status ==1)
                    <a class="UpdateCategoryStatus" id="category-{{$category->id}}"
                    category_id="{{$category->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Active</a>
                    @else
                    <a class="UpdateCategoryStatus" id="category-{{$category->id}}"
                    category_id="{{$category->id}}" href="javascript:void(0)"><meta name="_token" content="{{ csrf_token() }}">  Inactive</a>
                    @endif

                  </td>
                  <td><a title="Edit Category" href="{{'category_edit/'.$category->id}}"><i class="fas fa-edit"></i></a>
                  <a title="Delete Catogory" class="confirmDelete" name="Category " href="{{'category_delete/'.$category->id}}"><i class="fas fa-trash"></i></a>
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

    //......UPDATE CATEGORY STATUS....................

    $(".UpdateCategoryStatus").on("click", function(){
        var status =$(this).text();
        var category_id =$(this).attr("category_id")
        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
          });
        $.ajax({
            type:'post',
            url:"{{route('admin.UpdateCategoryStatus')}}",
            data:{status:status,category_id:category_id},
            success:function(resp){

                if(resp['status']==0){
                    $('#category-'+category_id).html("<a class='UpdateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
                }else if(resp['status']==1){
                    $('#category-'+category_id).html("<a class='UpdateCategoryStatus' href='javascript:void(0)'>Active</a>");
                }

            }, error:function(){
                alert("Error update_category_status");
                }

        });



    });


}); 
</script>

@endsection
