@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
    
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
      <div class="content-wrapper" >

   <div class="card card-primary">
        <div class="card-header">
                <h3 class="card-title">Check Out</h3>
              </div>
</div>


    <!-- Main content -->
    <div class="col-md-9" style="margin:0 auto;">
       
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;SHOPPING CART</h3>
                                </div>
                                <div class="card-body">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>EVENT</th>
                                                    <th>SECTION</th>
                                                    <th>ROW</th>
                                                    <th>PRICE</th>
                                                    <th>SEATS</th>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cart_total=0;
                                                $cart_total_ticket = 0;

                                                 ?>
                                                @foreach($tickets as $ticket)
                                                <tr>
                                                    
                                                    <td>{{$event_data->first_title}}&nbsp;{{$event_data->second_title}}-{{date(" M-d",strtotime($event_data->sch_venue->start_date))}} <br>{{date("h:i A",strtotime($event_data->sch_venue->start_time))}}</td>
                                                    <td>{{$ticket->section}}</td>
                                                    <td>{{$ticket->row}}</td>
                                                    <td>${{$ticket->price}}</td>
                                                    <td>{{$ticket->no_of_seats}} Seats ,{{$ticket->seats}}</td>
                                                    <?php
                                                   
                                                    
                                                   $count=$ticket->no_of_seats;
                                                    $total=$count*$ticket->price;
                                                    $cart_total=$cart_total+$total;
                                                    $cart_total_ticket=$cart_total_ticket+$count;

                                                    
                                                    ?>
                                                    <td>${{$total}}</td>
                                                    <td> 
                                                        <button data-id="{{$ticket->id}}" style="background:#800000;color: #fff;text-decoration: none;" class="btn-sm btn-dark ticketDelete" >Delete</button>
                                                    </td>
                                                </tr>
                                           @endforeach
                                            </tbody>
                                        </table>
                                        <hr style="border-top: 1px solid #dec5c5;">
                                    
                                        <span style="float:right;"> {{$cart_total_ticket}} Tickets - ${{$cart_total}}</span>
                                        <br><br>
                                        <div class="row1" style="text-align:right;">
                                            
                                           <!--  <a href="#" style="background:#333;color: #fff;
                                                margin-right:;"class="btn btn-dark" >Shop Other Events</a>
-->
                                               <!--  <a href="checkout.html" style="background:#FF9E2F;color: #fff;
                                                margin-right:;"class="btn btn-dark" >Proceed </a> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        
    </div>



        </div>
      <br>
      <br>
     
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script type="text/javascript">
   $(document).ready(function () 
   {
     $('.ticketDelete').click(function(){
       var result = confirm('Are you sure want to remove the Tickets?');
       if(result)
      {
      var id =$(this).attr("data-id"); 
            
       
       $.ajax({
               type: 'GET',
               url: "{{route('seller.manage_event.delete_buy_ticket')}}",
               data: 'id='+id,
   
               success: function (data)
               {
                alert("Deleted..");
                location.reload();
                 /*$( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );*/
               }
               , error: function (data) 
               {
                   console.log("error");
                   console.log(data);
               },
           });
   }
   
          });
   
   
   });
</script>
@endsection