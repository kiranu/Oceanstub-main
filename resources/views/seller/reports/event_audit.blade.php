@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
  @media all and (max-width:720px) {
    .refresh-export-print {
      font-size: 12px;
      padding-left: 10px !important;
    }

    .bottom-nodata {
      font-size: 12px;
      padding-left: 60px !important;
    }

    .bottom-bold {
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
      <div class="card-header" style="background-color: #007bff;">
        <h3 class="card-title">Event Audit</h3>
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
                <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight" style="color: #007bff;font-weight:bold">Filters:</span>
              </div>
              <br>
              <div class="card-body">
                <form method="GET" action="{{route('seller.get_event_audit')}}">
                 
             <!--    <form id="filter_audit"> -->
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Event :</label>
                    <div class="col-sm-9">
                      <select id="event_id" class="form-control" name="Event" value="">
                        
                        @foreach($events as $event)
                        <option value="{{$event->id}}">{{$event->first_title}}
                          @isset($event->second_title){{$event->second_title}}@endisset
                          ({{date("jS F, Y", strtotime($event->sch_venue->start_date))}} &nbsp; {{date("h:i a", strtotime($event->sch_venue->start_time))}})</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                  <br>
                    <?php
                                $today =  Carbon\Carbon::now();
                                 $ago =  Carbon\Carbon::now()->subDays(90);
                                
                                ?>
                  <div class="row">
                  <div class="form-group col-6" style="display:inline-block">
                    <label for="inputPassword3" class="col-2 col-form-label" style="display:inline-block">From :</label>
                    <div class="col-8" style="display:inline-block;margin-left: 72px;">
                      <input type="date" class="form-control" 
                      value="{{date('Y-m-d', strtotime($ago))}}" id="from" id="" name="FromDate">
                    </div>
                  </div>
                  <div class="form-group col-6" style="display:inline-block">
                    <label for="inputPassword3" class="col-2 col-form-label" style="display:inline-block">To :</label>
                    <div class="col-8" style="display:inline-block">
                      <input type="date" class="form-control" id="to" 
                      value="{{date('Y-m-d', strtotime($today))}}" name="ToDate">
                    </div>
                  </div>
                  </div>

                  <br>
                  <div class="filterrow refresh-export-print" style="padding-left: 250px;">
                    <input type="submit" value="Refresh" class="btn btn-secondary refresh-export-print" style="margin-right:10px;">
                    
                   <a href="" target="_blank" onclick="generatePDF()" style="text-decoration: none;"
        class="btn btn-secondary">Print</a>

                    <!-- <input type="button" name="ctl00$CPMain$cExport" value="Export" id="ctl00_CPMain_cExport" class="btn btn-secondary refresh-export-print"> -->

                    <a class="btn btn-secondary refresh-export-print" href="{{route('export.event_audit')}}">Export</a>

                  </div>
                </form>
              </div>
            </div>

            <br><br>
            @isset($events_audit)
           

            <table id="audit_table" class="table ticketstatus " cellspacing="0" rules="rows" border="1" style="border-collapse: collapse;">

              <thead class="thead-dark ">
                <tr>
                    <!-- <th scope="col">Index</th> -->
                    <th scope="col">Invoice</th>
                    <th scope="col">Event name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Service Charge</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Discount</th>
                    <!-- <th scope="col">Ads Fee</th> -->
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Promo Code</th>
                    
                </tr>
              </thead>
              <tbody>


              @foreach($events_audit as $data)
              <tr style="font-weight: bold;">
             <td>{{$data->id}}</td>
             <td>{{$data->event->first_title}} &nbsp;@isset($data->event->second_title){{$data->event->second_title}}@endisset</td>
             <td>@if($data->order->status == "1")
                   <p>sale</p>
              @elseif($data->order->status == "2")
              <p>Pending</p>
              @elseif($data->order->status == "2")
              <p>Return</p>
              @else
              <p>cancel</p>
              @endif
             </td>
             <td>{{ date("jS F, Y", strtotime($data->order->updated_at))}}</td>
             <td>{{$data->buyer->first_name}}</td>
             <td>{{$data->ticket->face_price}}</td>
             <td>{{$data->ticket->service_charge}}</td>
             <td>{{$data->ticket->event_ticket->tax}}</td>
             <td>{{$data->order->offer_amount}}</td>
             <td>{{$data->quatity}}</td>
             <td>

<?php 
 $ticket = ($data->ticket->face_price+$data->ticket->service_charge)*($data->quatity);
 $plus_tax = $ticket+$data->ticket->event_ticket->tax;
 $total = $plus_tax-$data->order->offer_amount;
?>
{{$total}}

             </td>
             <td>{{$data->order->promo_code}}</td>
            
                </tr>
                  @endforeach
              </tbody>
            </table>
        


          </div>

        </div>
        <br>

 @endisset
        <br>&nbsp;<br>
      </div>

    </div>
    <!-- footer -->
    @include('layouts.seller_footer')
    <!-- /footer -->
  </div>
  @endsection
  @section('bottom_scripts')
 <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <script>
        function generatePDF(){


          alert("jbsdahb");
            const element = document.getElementById("audit_table");

            var opt = {
            margin:       1,
            filename:     'OceanStubAuditReport.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf()
            .from(element)
            .set(opt)
            .save();
        }

    </script>
  
  @endsection