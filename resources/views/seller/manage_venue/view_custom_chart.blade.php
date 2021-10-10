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
      <link rel="stylesheet" href="{{ asset('assets/seller/seatingchart/view-seating-chart.css') }} ">
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper">
      <form id="seating_chart_form">
        @isset($sc)
          <textarea id="sketchpaddata" value="{{$sc->seating_chart_data}}" name="SeatingChartData" style="display:none"; rows="5" cols="5"></textarea>
          <div onmousedown="return false" id="playground"></div>
          <input style="width: 24%;margin: 6px 2px 2px 6px;" type="text" placeholder="Seating chart name" value="{{$sc->seating_chart_name}}" class="chartname form-control" name="SeatingChartName" readonly>
          @endisset

          <span class="text-danger error-text SeatingChartName_error"></span>
            <div class="form-check" style="top:49px;position:absolute;margin-left:13px;">
         <input class="form-check-input" type="radio" name="publish" value="0" disabled='disabled'>
        <label class="form-check-label">Public</label>
          </div>

            <div class="form-check" style="top:49px;position:absolute;margin-left:97px;">
         <input class="form-check-input" type="radio" name="publish" value="1" checked="" disabled='disabled'>
        <label class="form-check-label">Private</label>
          </div>
          <a href="{{route('seller.edit_seatingchart',$sc->id)}}" class="btn btn-primary seatingchartedit seatingchartSvebtn">Edit</a>

          

           <a onclick="return confirm('Are you sure want to remove the SeatingChart?')" href="{{route('seller.delete_seatingchart',$sc->id)}}"class="btn btn-danger seatingchartdelete seatingchartSvebtn">Delete</a>

          <span class="text-danger error-text SeatingChartData_error"></span>
       </form>
      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
"></script>
<script src="https://unpkg.com/konva@7.0.3/konva.min.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src="{{ asset('assets/seller/seatingchart/view-seating-chart.js') }} "></script>
@endsection