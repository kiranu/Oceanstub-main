@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
  @media all and (max-width:720px) {
    .bottom-nodata {
      font-size: 12px;
      padding-left: 80px !important;
    }
    .refresh-export {
      padding-left: 25px !important;
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
          <h3 class="card-title">Unsold Tickets</h3>
        </div><br>
        <div class="modulebody ui-widget-content ui-corner-bottom" style="padding-left: 0px;">
          <div id="filters ui-widget-content  ui-corner-all clearfix" class="filters ui-widget-content  ui-corner-all row" style="padding-left:20px;
            border: 1px solid black;
            width: 95%;
            margin: 0 auto;
            border-radius: 20px;
            padding-top: 25px;
            padding-bottom: 25px;
            min-height: 200px;">
            <div class="filterrow">
              <span id="ctl00_CPMain_Label5" class="filterLabelTitle ColTextHighlight" style="color: #007bff; font-weight:bold">Filters:</span>
            </div>
            <div class="card-body">
              <div class="form-group row" style="padding-top: 20px;">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Event :</label>
                <div class="col-sm-9">
                  <select class="form-control">
                  @foreach($events as $event)                                                    
                              <option value="{{$event->id}}">{{$event->first_title}}
                                @isset($event->second_title){{$event->second_title}}@endisset
                              ({{date("jS F, Y", strtotime($event->sch_venue->start_date))}} &nbsp; {{date("h:i a", strtotime($event->sch_venue->start_time))}})</option>
                              @endforeach

                  </select>
                </div>
              </div>
              <br>
              <!-- /.form-group -->
              <div class="filterrow3 clearfix refresh-export" style="padding-left:220px">
                <input type="submit" name="ctl00$CPMain$cRefresh2" value="Refresh" id="ctl00_CPMain_cRefresh2" class="btn btn-secondary" style="margin-right:10px">
                <input type="submit" name="ctl00$CPMain$cRefresh2" value="Export" id="ctl00_CPMain_cRefresh2" class="btn btn-secondary" >

              </div>
            </div>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-sm-12">
              <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead class="thead-dark">
                  <tr role="row">
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Section</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Row</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Seat</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Price</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Block Status</th>
                  </tr>
                  <!-- <tr>
                            <td colspan="7"style="padding-left: 330px; " class="bottom-nodata">There are no data records to display.</td>
                        </tr> -->
                </thead>
                <tbody>
                  <tr class="odd">
                    <td class="dtr-control sorting_1" tabindex="0"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  </div>
  <!-- footer -->
  @include('layouts.seller_footer')
  <!-- /footer -->
  </div>
  @endsection
  @section('bottom_scripts')
  @endsection