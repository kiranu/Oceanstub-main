@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
            @media all and (max-width:720px) {
              .refresh-print-export{
                font-size: 0px;
  padding-left: 14px!important;
              }
              .bottom-nodata{
                font-size: 12px;
    padding-left: 70px!important;
              }
              .bottom-bold{
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
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">Sold Tickets</h3>
            </div><br>
            <div id="content" class="floatleft" role="main" tabindex="-1">
                    
                <div class="Module" role="region" aria-labelledby="cMH345684">
                  
                    <div class="modulebody ui-widget-content ui-corner-bottom"style="padding-left: 0px;">
                        <div id="filters ui-widget-content  ui-corner-all" class="filters ui-widget-content  ui-corner-all" style="padding-left: 20px;
                        border: 1px solid black;
                        width: 95%;
                        margin: 0 auto;
                        padding-top: 25px;
                        border-radius: 20px;
                        padding-bottom: 25px;
                        min-height: 156px;">
                            <div class="filterrow">
                                <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight"style="color: #007bff; font-weight:bold">Filters:</span>
                            </div><br>
                            <div class="card-body">

                              

                              <form method="GET" action="{{route('seller.get_sold_tickets')}}">
                                
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Event :</label>
                              <div class="col-sm-9">
                              <select class="form-control" name="Event" value="">
                              <!-- <option value="0" >All</option > -->
                              @foreach($events as $event)                                                    
                              <option value="{{$event->id}}">{{$event->first_title}}
                                @isset($event->second_title){{$event->second_title}}@endisset
                              ({{date("jS F, Y", strtotime($event->sch_venue->start_date))}} &nbsp; {{date("h:i a", strtotime($event->sch_venue->start_time))}})</option>
                              @endforeach

                              </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Type :</label>
                              <div class="col-sm-9">
                                <select class="form-control" name="Type">
                                  <option value="0">All</option>
                                  <option value="1">Sale</option>
                                 <option value="3">Return</option>
                                </select>
                              </div>
                            </div>
                            <br>
                            <br>
                             <?php
                                $today =  Carbon\Carbon::now();
                                 $ago =  Carbon\Carbon::now()->subDays(90);
                                
                                ?>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">From :</label>
                              <div class="col-sm-9">
                                <input type="date" class="form-control" 
                                value="{{date('Y-m-d', strtotime($ago))}}"  name="FromDate">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">To :</label>
                              <div class="col-sm-9">
                                <input type="date" class="form-control" 
                                value="{{date('Y-m-d', strtotime($today))}}" name="ToDate">
                              </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Email :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="Email">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password :</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="Password">
                              </div>
                            </div>
                            <br>
                  
                               
                        
                            <div class="filterrow refresh-print-export"style="padding-left: 250px;">
                                <input type="submit"  value="Refresh" id="Refresh" class="btn btn-secondary">


 <a href="" target="_blank" onclick="generatePDF()" style="text-decoration: none;"
        class="btn btn-secondary">Print</a>

                                <!-- <input type="button"  value="Export" id="Export" class="btn btn-secondary"style="margin-left:10px"> -->
            
                            </div>
                            </form>
                            </div>
                        </div>
                        <br>    
                         @isset($sold)
                        <div class="card" id="SoldInvoice">
                          
                  
                       
<table class="table ticketstatus  " style="padding-left: 20px;" >
  <thead class="thead-dark ">
    <tr >
      
        <th >Invoice</th>
        <th >Action</th>
        <th >Date</th>
        <th >Event</th>
        <th >Ticket</th>
        <th >Price</th>
        <th >Name</th>
     <!--    <th >Email</th>
        <th >Password</th> -->
       
    </tr>

     </thead>

      <tbody >
       
        @foreach($sold as $data)

    <tr >
      
        <td>{{$data->id}}</td>
        <td>
          @if($data->order->status == "1")

            <p>sale</p>
            @elseif($data->order->status == "3")
            <p>Return</p>
            @endif
        </td>
        <td>
          
          {{date('Y-m-d H:i a', strtotime($data->order->updated_at))}}
        </td>
        <td >{{$data->event->first_title}} ({{date("jS F, Y", strtotime($data->event->sch_venue->start_date))}})</td>
        <td >
            
            {{$data->ticket->name}}
        </td>
        <td>
            ${{$data->ticket->face_price}}
        </td>
        <td >{{$data->buyer->first_name}}</td>
     
       
        
    </tr>
    @endforeach
 
    </tbody>
</table>


               <!--  <table cellspacing="0" rules="rows" border="0" id="ctl00_CPMain_GridView1" style="border-width:0px;border-collapse:collapse;">
                    <tbody><tr><br>
                        <td colspan="12"style="padding-left: 350px;"  class="bottom-nodata">There are no data records to display.</td>
                    </tr>
                </tbody></table> -->
 <?php
          $total_sale = 0;
          $total_return=0;
          $total=0;
          foreach($sold as $data){

            if($data->order->status == "1")
            {
            $total_sale= $total_sale+1; 
            }
             if($data->order->status == "3")
            {
            $total_return= $total_return+1; 
            }

            if($data->order->status == "3" || $data->order->status == "1")
            {
            $total= $total+1; 
            }

          }
         
          ?>

             
                    <label id="ctl00_CPMain_cTotal" class="rightalign bold bottom-bold"style="padding-left: 10px;">Total sales: {{$total_sale}}<br>Total return: {{$total_return}}<br>Total: {{$total}}</label>
                        <br>
                         @endisset
            </div>



            <br>
            
        
                        <br>&nbsp;<br>
                    </div>    
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
            const element = document.getElementById("SoldInvoice");

            var opt = {
            margin:       1,
            filename:     'OceanStubReport.pdf',
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