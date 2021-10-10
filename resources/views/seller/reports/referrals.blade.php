@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
  @media all and (max-width:720px) {
    .button-refresh {
      font-size: 12px;
      margin-left: 75px !important;
    }

    .bottom-nodata {
      font-size: 12px;
      padding-left: 59px !important;
    }

    .bottom-bold {

      font-size: 12px;
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
          <h3 class="card-title">Sales</h3>
        </div><br>

        <div id="content" class="floatleft" role="main" tabindex="-1">

          <div class="Module" role="region" aria-labelledby="cMH345684">

            <div class="modulebody ui-widget-content ui-corner-bottom" style="padding-left: 0px;">
              <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 20px;
                        border: 1px solid black;
                        width: 95%;
                        margin: 0 auto;
                        padding-top: 25px;
                        border-radius: 20px;
                        padding-bottom: 25px;
                        min-height: 156px;">
                <div class="filterrow">

                  <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight" style="color: #007bff;font-weight:bold">Filters:</span><br>

                  <form method="GET" action="{{route('seller.get_referrals')}}">
                    <div class="card-body">
                      <?php
                      $today =  Carbon\Carbon::now();
                      $ago =  Carbon\Carbon::now()->subDays(90);

                      ?>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">From :</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="from" value="{{date('Y-m-d', strtotime($ago))}}" name="FromDate">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">To :</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" id="to" value="{{date('Y-m-d', strtotime($today))}}" name="ToDate">
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Referrer Code :</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="refferel" name="refferel" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Type :</label>
                        <div class="col-sm-9">
                          <select class="form-control" name="Type">
                            <option value="0">All</option>
                            <option value="1">Sale</option>
                            <option value="3">Return</option>
                            <option value="1">Payment</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <!--     <div class="form-group row">
                                      <label for="inputPassword3" class="col-sm-2 col-form-label">Type :</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                      </div>
                                    </div> -->
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Event :</label>
                        <div class="col-sm-9">
                          <select id="event_id" class="form-control" name="Event" value="">
                            <!-- <option value="0">All</option> -->
                            @foreach($events as $event)
                            <option value="{{$event->id}}">{{$event->first_title}}
                              @isset($event->second_title){{$event->second_title}}@endisset
                              ({{date("jS F, Y", strtotime($event->sch_venue->start_date))}} &nbsp; {{date("h:i a", strtotime($event->sch_venue->start_time))}})</option>
                            @endforeach

                          </select>
                        </div>
                      </div>
                      <br>



                      <input type="submit" value="Refresh" class="btn btn-secondary button-refresh" style="margin-left:320px;">

                    </div>
                </div>
                </form>
              </div> <br>
              <br><br>
              @isset($reffer)
              <table id="refferel_table" class="table ticketstatus " cellspacing="0" rules="rows" border="1" style="border-collapse: collapse;">

                <thead class="thead-dark ">
                  <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Referrer Code</th>
                    <th scope="col">Event</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>

                  </tr>
                </thead>
                <tbody>

                  @foreach($reffer as $data)
                  <tr style="font-weight: bold;">
                    <td>{{$data->id}}</td>
                    <td>{{$data->order->referrer_code}}</td>
                    <td>{{$data->event->first_title}} ({{date("jS F, Y", strtotime($data->event->sch_venue->start_date))}})</td>
                    <td>
                      @if($data->order->status == "1")

                      <p>sale</p>
                      @elseif($data->order->status == "3")
                      <p>Return</p>
                      @endif
                    </td>
                    <td> {{date('Y-m-d, H:i a', strtotime($data->order->updated_at))}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              @endisset
            </div>


            <br>


            <br>
            <br>&nbsp;<br>
          </div>

        </div>







        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
      </div>
      <!-- footer -->
      @include('layouts.seller_footer')
      <!-- /footer -->
    </div>
    @endsection
    @section('bottom_scripts')

    @endsection