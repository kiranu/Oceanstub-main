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
                        <h3 style="margin-left: 139px;font-size: 41px;" class="card-title mt-0">{{$heading}}</h3>
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
                                                <h3 class="card-title"><i class="fa fa-ticket" aria-hidden="true"></i>&nbsp;&nbsp;<a style="background:#800000;color: #fff;text-decoration: none;" class="btn-sm btn-dark"  href="{{route('upcoming_tickets')}}">UPCOMING TICKETS</a> &nbsp;&nbsp;<a style="background:#800000;color: #fff;text-decoration: none;"  class="btn-sm btn-dark"   href="{{route('tickets')}}">ALL TICKETS</a>  </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        @if(Session::has('danger_message'))
                                                        <p class="alert alert-danger">{{ Session::get('danger_message') }}</p>
                                                        @endif

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
                                                            @foreach ($tickets as $ticket )

                                                            <tr>
                                                                <td>{{$ticket['events']->first_title}} <br>{{$ticket['events_time']->start_date->format('j M')}}-{{$ticket['events_time']->start_time->format('h:i A')}}</td>
                                                                <td>{{$ticket['ticket']->name}}</td>
                                                                <td>Not Specified</td>
                                                                @php
                                                                    $price=$ticket['ticket']->face_price+$ticket['ticket']->service_charge;
                                                                @endphp
                                                                <td>{{$ticket['ticket']->prefix_bp}}{{$price}}</td>
                                                                <td>{{$ticket->quatity}} Seats </td>
                                                                <td>{{$ticket['ticket']->prefix_bp}}{{$ticket->quatity*$price}}</td>
        <td> <a href="#" style="background:#0c7e3f;color: #fff;text-decoration: none;" ticketId="{{$ticket->id}}" class="btn-sm btn-dark ticketview" >View</a></td>
                                                            </tr>
                                                            @endforeach


                                                    </tbody>

                                                    </table>

                                                    <hr style="border-top: 1px solid #dec5c5;">
                                                    <span style="float:right;">


                                                    <br><br>
                                                    <div class="row1" style="text-align:right;">

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

      @include('home.ticketview')
