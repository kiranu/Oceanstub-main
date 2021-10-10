@extends('home.layouts.home_master')

@section('content')
    <style>
        .chkout {
            width: 100%;
            /* border-radius: 5px; */
            height: 83px;
            background-color: #ea983a;
        }

        .card-header {
            width: 100%;
        }

        .card-body {
            padding: 30px;
            padding-top: 10px;
        }

        .card {
            background-color: #fffad5e8;
        }

    </style>
    <style>
        .cLevelSectio {
            line-height: 1px;
        }

        .thead-dark {
            background-color: #434a47;
            color: #fff;
        }

        .tbl-mrg {
            margin: 1px auto 2px 14px;
            width: 97%;
        }

        .LayoutFullWidthCenter .modulebody {
            margin-left: 120px;
            margin-right: 120px;
        }

        .eventInfo {
            padding-bottom: 20px;
            border-bottom: 1px solid #aaa;
            margin-bottom: 20px;
            -webkit-box-shadow: 0 1px 0 0 #d1d1d1;
            box-shadow: 0 1px 0 0 #ccc;
            margin: 0 auto;
        }

        .eventInfo .eventBasicInfo {
            padding: 0 30px 0 0;
            float: left;
            width: 90%;
            box-sizing: border-box;
        }

        .eventCalendarFull {
            width: 60px;
            margin-left: 10px;
            float: left;
        }

        .eventCalendarFull>div {
            border: 1px solid #c1c1c1;
            text-align: center;
            font-size: 13px;
        }

        .ui-widget-header {
            border: 1px solid #a3a3a3;
            background: #333333 url(images/ui-bg_diagonals-thick_8_333333_40x40.png) 50% 50% repeat;
            color: #eeeeee;
            font-weight: bold;
        }

        .eventCalendarFull .year {
            font-size: 9px;
            text-align: center;
            font-weight: bold;
        }

        .eventCalendarFull div.bottom {
            border-bottom-width: 3px;
            border-top-width: 0;
        }

        .eventCalendarFull div.bottom .day {
            height: 13px;
            line-height: 30px;
            font-size: 24px;
            font-weight: bold;
        }

        .eventCalendarFull div.bottom .dayOfWeek {
            font-size: 12px;
            font-weight: bold;
        }

        .eventCalendarFull .time {
            text-align: center;
            margin: 4px 0;
        }

        .eventInfo .eventBasicInfo .eventBasicInfoInner {
            margin-left: 90px;
        }

        .eventInfo .eventBasicInfo .eventLocation {
            line-height: 30px;
            clear: both;
            min-height: 80px;
        }

        .eventInfo .eventSecInfo {
            width: 50%;
            float: right;
            text-align: right;
            max-width: 95%;
        }

        .cDropDownMenu>div:hover {
            opacity: 1;
        }

        .add-to-calendar.cDropDownMenu>div>i {
            float: none;
        }

        .ColTextHighlight,
        .ui-widget-content .ColTextHighlight {
            color: #1287c0;
        }

        .addeventatc {
            float: right;
            position: absolute;
            right: 0px;
            top: 20px;
            z-index: 1;
        }

        .ui-widget-content a {
            color: #222222;
        }

        .Module td,
        .Module th {
            padding-left: 10px;
            padding-right: 11px;
            padding-top: 11px;
            padding-bottom: 10px;
            text-align: center;
        }

        table.cGALevels th,
        table.cGALevels td {
            text-align: left;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('assets/seller/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/seller/seatingchart/sales-preview-seating-chart.css') }} ">

    <div class="content-wrapper">
        <div class="card ">
            <div class=" chkout">
                <h3 style="margin-left: 139px;font-size: 41px;" class="card-title mt-0">PAYMENT SUCCES</h3>
            </div>
        </div>
        <!-- Main content -->
        <div class="col-md-9" style="margin: 5px 131px auto;">
            <div class="card">
                <section class="content">
                    <div class="container-fluid pt-10">
                        <div class="row">
                            <div class="col-md-6" style="display: inline-block;width:50%;">
                                <!-- Default box -->
                                <div class="card">
                                    <div class="eventCalendarFull" aria-label="Saturday, May 22, 2021 8:00:00 PM"
                                        style="display: inline-block;">

                                        <div class="bottom" aria-hidden="true">

                                        </div>
                                        <p class="time" aria-hidden="true">
                                    </div>
                                    <div class="eventBasicInfoInner"
                                        style="display: inline-block;margin: -13px 2px 5px 46px;">
                                        <h1 class="eventName" style="font-size: 20px;"><a href="" class="showMoreInfo"
                                                data-toggle="modal" data-target="#exampleModalCentertable">name<br><span
                                                    class="farsiText">name2</span></a></h1>
                                        <br>
                                        <div class="row">

                                            <br>
                                        </div>
                                        <div class="row eventLocation">
                                            <a href="javascript:void(0)" rel="nofollow" title="Unspecified address"><i
                                                    class="fa fa-map-marker" aria-hidden="true"></i>
                                                <i class="fa  fa-15x fa-hover"></i>&nbsp;&nbsp;

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->


                            </div>



                            <!-- table -->
                            <!-- seating chart here box -->
                            {{-- @php
                             $order_idd = Session::get('order_idd');
                             $cartitem = Session::get('cartitems');
                                // dd($cartitem);
                            @endphp --}}
                        @foreach ($cartitem as $cart )

                            @isset($cart['sc']->sc_assigned_data)
                            </div>

                            <div class="row" style="margin-top: 20px;margin-bottom: 20px">
                                <div class="col-12 pb-20">

                                    <div class="card">
                                        <form style="display: none" method="post" class="updatekonvajson">
                                            @csrf
                                            <textarea style="display:none"
                                            id="sketchpaddata" name="sc_data">{{ $cart['sc']->sc_assigned_data }}</textarea>
                                            <input value="{{ $cart->sc_id }}" name="sc_id" class="sc-id">
                                        </form>
                                        <div class="card-body pb-0" style="background: #ddd">
                                        <input value="{{ $cart->sc_id }}" name="sc_id" class="sc-id">
                                        <input value="{{ $cart->idorclass }}" name="idorclass" class="idorclasscs">
                                        <input value="{{ $cart->idorclassval }}" name="idorclassval" class="idorclassval">
                                        @isset($cart->gaselectedseats)
                                        <input value="{{ $cart->gaselectedseats }}" name="gaselectedseats" class="gaselectedseats">

                                        @endisset

                                            <div id="playground"></div>
                                            <div class="individual-seat-details-for-table-with-seats tooltips">
                                                <p class="rowname-tooltip mt-0 mb-0"></p>
                                                <p class="seatno mt-0 mb-0"></p>
                                                <p class="avaliability mt-0 mb-0">cc</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- end seating chart -->
                            <div id="ticketdetailsbigpopup" title="Select Ticket">
                                <form id="seatsubdetails" >
                                    @csrf
                                    {{-- <input value="{{ $event->id }}" name="event_id" hidden> --}}
                                    @isset($cart['sc']->id)
                                        <input value="{{ $cart['sc']->id }}" name="sc_id" hidden>
                                    @endisset

                                    <label for="Sectionname">Section</label>
                                    : <input type="text" readonly class="ind-sec-name b-0" name="sectionname"><br>
                                    <label for="rowname" class="rowride">Row : </label>
                                    <input type="text" readonly class="ind-row-name b-0 rowride" name="rowname"><br
                                        class="rowride">
                                    <label for="seatname" class="seathide">Seat :</label>
                                    <input type="text" readonly class="ind-sec-seat-no b-0 seathide" name="seatno"><br
                                        class="seathide">
                                    <label for="price">Price : </label>
                                    <input type="text" readonly class="ind-sec-seat-price b-0" name="price"><br>
                                    <input type="hidden" readonly class="ticketid" name="ticketid">
                                    <input type="hidden" readonly class="idorclass" name="idorclass">
                                    <input type="hidden" readonly class="idorclassifo" name="idorclassval">
                                    <div class="variablepricecontainer">
                                    </div>
                                    <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                                        <div class="ui-dialog-buttonset">
                                            <button type="button" class="ui-button ui-corner-all ui-widget seatadd">Add</button>
                                            <button type="button"
                                                class="ui-button ui-corner-all ui-widget dailog-cancel">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="ticketdetails" title="Confirmation">
                                <p class="innermessage">Ticket added to your shopping cart.</p>
                                <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                                    <div class="ui-dialog-buttonset">
                                        <a href="{{ route('cart') }}"
                                            class="ui-button ui-corner-all ui-widget dailog-cancel">Proceed to checkout </a>
                                        <button type="button"
                                            class="ui-button ui-corner-all ui-widget dailog-cancel">Close</button>
                                    </div>
                                </div>
                            </div>
                        @endisset
                    @endforeach

                        <!-- tabele card -->
                    </div>
            </div>
            </section>
        </div>
        <br>
        <br>
    </div>
    </div>



@endsection
@section('custom_script')
    <script type="text/javascript">
        function updatejson() {
            var formdata = $(".updatekonvajson").serialize();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            // alert(formdata);
            $.ajax({
                type: "POST",
                url: "{{ route('update.sc') }}",
                data:formdata,
                processData: false,
                dataType: 'json',
                success: function(data) {
                },
            });
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script src="https://unpkg.com/konva@7.0.3/konva.min.js"></script>
    <script src="{{ asset('assets/seller/seatingchart/seatingchart-sale-updation.js') }} "></script>
 
@endsection
