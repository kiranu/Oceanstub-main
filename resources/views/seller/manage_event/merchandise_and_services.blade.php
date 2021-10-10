@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
               @media all and (max-width:720px){
                .eventsedit{
                  padding-left: 10px!important;
                  padding-right: 10px!important;
                  font-size: 10px;
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
     
      
          <!-- Main content -->
          <div class="card card-info">
            <div class="card-header"  style="background-color: #007bff;">
              <h3 class="card-title">Merchandise / Services</h3>
            </div>
                       @if(session()->has('message'))
<div id="error" class="alert alert-success" style="width: 50%;margin-top: 20px;margin-right: 20px">
<button onclick="$('#error').remove();" type="button" class="close"  aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
{{ session()->get('message') }}
</div>
@endif
            <!-- /.card-header -->
            <!-- form start -->
          <br>
          <style>
            @media all and (max-width:720px) {
              .button-refresh{
                margin-left: 98px!important;
              }
              .nodata{
                padding-left: 60px!important;
             
              }
              
            }
          </style>
            <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all"style="padding-left: 20px;
            border: 1px solid black;
            width: 95%;
            margin: 0 auto;
            border-radius: 20px;
            padding-top: 5px;
            padding-bottom: 25px;
            min-height: 156px;">
                <div class="filterrow"  style="padding-left: 20px;">
                    <br>
                    <p><i class="fa fa-info-circle fa-15x"></i>&nbsp;&nbsp;Add merchandise, services and gift cards that can be sold by your staff from the POS (point of sales) page or can be purchased by users from the Store(s) pages.</p>
                    <br>
                </div>

                <div class="filterrow"  style="padding-left: 10px;">
                    <p class="filterLabelTitle ColTextHighlight" style="color:#007bff;font-weight: bold; ">Filters</p>
                </div>
                <form id="filter_mer">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Organizer:</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="organizer" id="Organizer">
                        <option value="0">All</option>
                      	<option value="{{$organizer_name->id}}">{{$organizer_name->name}}</option>
                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option value="All">All</option>
                        <option selected="selected" value="Active">Active</option>
                        <option value="Deleted">Deleted</option>
                      </select>
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Item Name:</label>
                    <div class="col-sm-9">
                  <input type="text" class="form-control" id="ItemName" name="ItemName">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Sold Out:</label>
                    <div class="col-sm-9">
                      <select class="form-control">
                        <option value="All">All</option>
                        <option selected="selected" value="Available">Available</option>
                        <option value="Sold Out">Sold Out</option>
                      </select>
                    </div>
                  </div>
                 
       
                   
                  </div>


                
<div class="filterrow3 clearfix button-refresh"style="margin-top:30px;margin-right:130px;margin-left:350px">
  <input type="submit" name="Refresh" value="Refresh" id="Refresh" class="btn btn-secondary">

</div>
</form>
</div>
<br>
<table id="mer_table" class="table ticketstatus"  
cellspacing="0" rules="rows" border="1" 
 style="border-collapse:collapse; display:none;">
<thead class="thead-dark ">
<tr >
<th scope="col">Index</th>

<th scope="col">Item Name</th>
<th scope="col">Code</th>
<th scope="col">keyword</th>
<th>Sale Price</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<tr style="font-weight: bold;">
</tr>
</tbody>
</table>
                
                <br>
                     <div class="filterrow" style="text-align:right; margin-right: 20px;" >
                      
                        <a href="{{route('get_add_merchandise')}}" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">  Add a new Merchandise / Gift Card / Service</a>
                
                    </div>
                <br>
                

             
            <div>


	<!-- <table class="cProductTable" cellspacing="0" rules="rows" border="0" id="ctl00_CPMain_GridView1" style="border-width:0px;border-collapse:collapse;">
		<tbody><tr>
            <br>
			<td colspan="6" style="padding-left: 400px;" class="nodata">There are no items to display.</td>
		</tr>
	</tbody></table> -->
  <div class="row" style="padding-left:20px"><p></p>


<table class="table"  style="padding-left: 20px;margin-right: 20px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <!-- <th scope="col">Active</th> -->
      <th scope="col">Sold Out</th>
        <th scope="col"></th>
 
    </tr>
  </thead>
  <tbody>
@foreach($merchandise as $mer)
    <tr>
     <!--  <th scope="row">1</th> -->
      <td>{{$mer->name}}</td>
      <td>{{$mer->sale_price}}</td>
     <!--  @if($mer->active == "on")
      <td>yes</td>
      @else
      <td>no</td>
      @endif -->
      @if($mer->sold_out == "on")
      <td>yes</td>
      @else
      <td>no</td>
      @endif
      

     <!--  <td>{{strip_tags($mer->description)}}</td> -->
    
      <td>
        <a title="Edit user" href="{{route('seller.edit_merchandise',$mer->id)}}" class="btn btn-info btn-sm">
          <i class="fas fa-pencil-alt"></i>
        </a>&nbsp;<a onclick="return confirm('Are you sure want to remove the merchandise?')"  href="{{route('seller.delete_merchandise',$mer->id)}}" class="btn btn-danger btn-sm">
          <i class="fas fa-trash"></i>
        </a>
        </td>
    </tr>

  @endforeach
  </tbody>
</table>

        </div>



  <br>
</div>
        </div>    
    </div>
  </div>
</div> 




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

         <!-- footer -->
         <!-- @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script>
  $( document ).ready(function() {
    $("#filter_mer").submit(function(stay){
    stay.preventDefault();
 
   var id =$('#Organizer').val();
   var name =$('#ItemName').val();
    
    $.ajax({
          type: 'GET',
          url: "{{route('seller.get_filter_merchandise')}}"+"?filter[id]="+id+"&filter[name]="+name,
          processData:false,
          dataType:'json',
          success: function(data)
          {
              $('#mer_table').show();
             $('#mer_table tbody > tr').remove();
             
             $.each(data, function(index,value){
             console.log( index + " : " + value);
var tablestring = "<tr><td>"+index+"</td><td>"+value.name+"</td><td>"+value.code+"</td><td>"+value.keyword+"</td><td>"+value.sale_price+"</td><td>"+value.price+"</td></tr>";
          $("#mer_table").append(tablestring);
         });

       }
    }); 
  });
});
</script>
@endsection