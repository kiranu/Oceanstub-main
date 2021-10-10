@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>

@media all  and
 (max-width: 720px) {
   .seatingchart{
     margin-bottom: 10px;
    font-size: 15px;
    margin-left: 5px;
    width: 95%;
   }
   .customseatingchart{
    font-size: 15px;
    width: 95%;
    margin-left: 5px;
   }
   .fullbody{
    margin-left: 10px;
   }
   .seatingchartpic{
   width: 30%;
   margin-left: 0px;
   margin-top: 20px;
   margin-bottom: 20px;
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



      <div class="card card-info">
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title createseating">Seating Chart</h3>
            </div>

            @if(session()->has('message'))
<div id="error" class="alert alert-success" style="width: 50%;margin-top: 20px;margin-right: 20px">
<button onclick="$('#error').remove();" type="button" class="close"  aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
{{ session()->get('message') }}
</div>
@endif
            <div class="card-footer fullbody">
            <button type="button" class="btn btn-info btn-lg mr-3 seatingchart" data-toggle="modal" data-target="#exampleModal">
                  Choose from default seating chart
            </button>
            
            <a href="{{route('seller.get_customSeatingChart')}}" class="btn btn-info btn-lg customseatingchart ">Create Custom Seating Chart</a>

            </div>
       </div>

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="sc_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    
                    <th>SeatingChart Name</th>
                    
                    <th>created_at</th>
                    <th></th>
                  </tr>
                  </thead>
                
            
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
     
      <!-- /footer -->
      </div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seating Chart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body ">
            <input type="checkbox" id="image" class="seatingchartpic">
            <img src="{{ asset('assets/seller/images/processed.jpeg')}}" alt="img" width="140" height="120">
            <input type="checkbox" id="image" class="seatingchartpic">
            <img src="{{ asset('assets/seller/images/processed11.jpeg')}}" alt="img" width="140" height="120">
            <input type="checkbox" id="image" class="seatingchartpic">
            <img src="{{ asset('assets/seller/images/processed2.jpeg')}}" alt="img" width="140" height="120">
            <input type="checkbox" id="image" class="seatingchartpic">
            <img src="{{ asset('assets/seller/images/processed2.jpeg')}}" alt="img" width="140" height="120">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">ok</button>
         </div>
      </div>
   </div>
</div>
<!-- /Modal -->
@endsection

@section('bottom_scripts')
<script>
   $(document).ready( function () {
    $('#sc_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,
            
             ajax: '{{ route('seller.seating_chart.ajax') }}',
             
             columns: [
           { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        
           { data: 'seating_chart_name', name: 'seating_chart_name' },
          
           { data: 'created_at', name: 'created_at'},
            { data: 'action', name: 'action' },
            
        ],
        order: [[1, 'desc']]      
        });
     });
  </script>
@endsection
