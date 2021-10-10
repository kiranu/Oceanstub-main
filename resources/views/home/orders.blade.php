@extends('home.layouts.home_master')

@section('content')
            <style>
                .chkout{
                width: 100%;
                /* border-radius: 5px; */
                height: 83px;
                background-color: #ea983a;
                }.card-header{
                width: 100%;}
                .card-body{
                padding: 30px;
                padding-top:10px;}
                .card{
                background-color:#fffad5e8;}
            </style>
            <div class="content-wrapper" >
                <div class="card ">
                    <div class=" chkout">
                        <h3 style="margin-left: 139px;font-size: 41px;" class="card-title mt-0">Orders</h3>
                    </div>
                </div>
                <!-- Main content -->
                <div class="col-md-9" style="margin: 5px 131px auto;">
                    <div class="card">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Default box -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title"><i class="fas fa-shipping-fast"></i>&nbsp;&nbsp;MY ORDERS</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        @if(Session::has('danger_message'))
                                                        <p class="alert alert-danger">{{ Session::get('danger_message') }}</p>
                                                        @endif
                                                        <thead>
                                                            <tr>
                                                                <th>ORDER ID</th>
                                                                <th>AMOUNT</th>
                                                                <th>PAYMENT METHOD</th>
                                                                <th>DELIVERY METHOD</th>
                                                                <th>STATUS</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($orderitems as $order )

                                                            <tr>
                                                                <td>{{$order->id}} </td>
                                                                <td>{{$order->amount}}</td>
                                                                <td>{{$order->payment_method}}</td>
                                                                <td>{{$order->delivery_method}}  </td>
                                                                <td>
                                                                    @if($order->status==2)
                                                                        Pending
                                                                    @elseif($order->status==1)
                                                                        Confirmed
                                                                    @elseif($order->status==0)
                                                                        Cancelled

                                                                    @else
                                                                        Failed
                                                                    @endif
                                                                </td>
                                                                <td> <a href="#" style="background:#800000;color: #fff;text-decoration: none;" order_id="{{$order->id}}" class="btn-sm btn-dark OrderDetails" >View</a></td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                    <hr style="border-top: 1px solid #dec5c5;">
                                                    <span style="float:right;">

                                                    <br><br>
                                                    <div class="row1" style="text-align:right;">
                                                        {{-- <a href="{{route('checkout')}}" style="background:#FF9E2F;color: #fff;
                                                            margin-right:;"class="btn btn-dark" >Proceed to Checkout</a> --}}
                                                        <a href="{{route('buy_tickets')}}" style="background:#333;color: #fff;
                                                            margin-right:;"class="btn btn-dark" >Shop Other Events</a>
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
            </div>
            <br>
            <br>
        </div>
      @endsection
@include('home.orderview')
