@extends('layouts.seller_app')

@section('title','OCEANSTUB')
 @section('top_scripts')

  @endsection
   @section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/seller/dist/css/addevent.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/tokenfield-typeahead.min.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
    .select2-selection__rendered {
margin-top:-8px !important;
}
</style>
<link rel="stylesheet" href="{{ asset('assets/seller/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<style >
.priceVariationTR{    
display: table-row;
vertical-align: inherit;
border-color: inherit;
}

.cPriceVariationTrColor {
display: inline-block;
width: 15px;
height: 15px;
border-radius: 15px;
margin-right: 10px;
margin-top: 2px;
vertical-align: top;
}

.dot_tr{
border-bottom: 1px dotted;
}.pricetype_td{
margin: -20px 0px -6px 21px;}
.fa-hover{
margin-right: 10px;
transition: transform .2s ease 0s;
opacity: .7;

}.bottom-bor{

    border-right: 1px solid;
    border-left: 1px solid;
    border-top: 1px solid;
    border-bottom: 2px dotted;
    border-bottom-color: #0056b3;
}.ad_varition{
   border-top: 1px solid;
  border-left: 1px solid;
    border-right: 1px solid;
    border-bottom: 1px solid;
}
 .fromat_time_div{
    background-color: white;
    display: inline-flex;
    border: 1px solid #ccc;
    color: #555;
  }
  
  .fromat_time{
    border: none;
    color: #555;
    text-align: center;
    width: 60px;
    height: 37px;
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
                <div class="card-header" style="background-color: #007bff;">
                    <h3 class="card-title">Add Events</h3>
                </div>
                
                <!-- /.card-header -->
                <!-- form start -->
                <!-- /.row -->
                <div class="row">
                    <style>
                      .alert-danger{margin: 3px 354px;}
                      .alert-success{margin: 3px 354px;}
                </style>
                    @include('flash-message')
                    <div class="col-12 col-sm-12">
                        <div class="card card-gray-dark card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Delivery & Returns</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-messages-tab"data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pictures & Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tabs-one-settings-tabcustom" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Tickets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tabs-one-detail-tabcustom" data-toggle="pill" href="#tabs-one-detail-tabcustomhref" role="tab" aria-controls="tabs-one-detail-tabcustomhreftab" aria-selected="false">
                                            Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-Payment-tab" data-toggle="pill" href="#custom-tabs-one-Payment-tabhhref" role="tab" aria-controls="custom-tabs-one-Payment-tab" aria-selected="false">
                                            Payment Method
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-promote-tab" data-toggle="pill" href="#custom-tabs-one-promote-tabhhref" role="tab" aria-controls="custom-tabs-one-promote-tab" aria-selected="true">Promote</a>
                                    </li>
                                    @isset($event_data)
                                    @if($event_data->publish == 0)
                                     <li class="nav-item">
                                        <div style="                                                    width: 143px;
                                                    height: 33px;
                                                    margin: -12px 2px 0px 64px;">
                                        <form action="{{route('seller.event.publish')}}" method="post" id="FormPublish">
                                            @csrf
                                        <input type="hidden" name="Publish" id="Pub" value="1">
                                   
                                        </form>
                                       
                                       <input class="btn btn-block btn-success btn-sm " type="button" value="Publish" id="SubPub">
                                       </div>
                                    </li>
                                    @endif
                                    @endisset
                                </ul>

                            </div>

                            <div class="card-body fullbody">
                                <div class="tab-content" id="custom-tabs-one-tabContent" class="imformation1">
                                    @include('seller.manage_event.events.information')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    @include('seller.manage_event.events.returns_policy')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel2" aria-labelledby="custom-tabs-one-messages-tab">
                                    @include('seller.manage_event.events.picture_video')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                    @include('seller.manage_event.events.ticket')
                                </div>
                                <div class="tab-pane fade" id="tabs-one-detail-tabcustomhref" role="tabpanel" aria-labelledby="tabs-one-detail-tabcustomhreftab" style="padding-left: 0px;">
                                    @include('seller.manage_event.events.details')
                                </div>
                                <div class="tab-pane fade payment" id="custom-tabs-one-Payment-tabhhref" role="tabpanel" aria-labelledby="custom-tabs-one-Payment-tab" style="padding-left: 20px;">
                                    @include('seller.manage_event.events.payment')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-promote-tabhhref" role="tabpanel" aria-labelledby="custom-tabs-one-promote-tabh" style="padding-left: 20px;">
                                    @include('seller.manage_event.events.promote')
                                </div>
                            </div>
                        </div>
                        <!-- footer -->
                        @include('layouts.seller_footer')
                        <!-- /footer -->
                    </div>
                    @endsection 
                    @section('bottom_scripts')
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                    <script>
                        function startsale(sel){
                            if(sel.value=="1"){
                               
                                $(".startsaledatepicker").fadeIn();
                            } else {
                                $(".startsaledatepicker").fadeOut();
                            }
                               
                            }
                            function Endsale(sel){
                                if(sel.value=="1"){
                               
                               $(".endsaledatepicker").fadeIn();
                           } else {
                               $(".endsaledatepicker").fadeOut();
                           }
                            }
                        
                    
                        function eventstartat(sel) {
                            if (sel.value == "1") {
                                $(".cIsStartDateRelative0").fadeOut();
                                $(".cIsStartDateRelative1").fadeIn();
                            } else if (sel.value == "0") {
                                $(".cIsStartDateRelative0").fadeIn();
                                $(".cIsStartDateRelative1").fadeOut();
                            }
                        }

                        function eventendat(sel) {
                            if (sel.value == "1") {
                                $(".cIsEndDateRelative1").fadeIn();
                                $(".cIsEndDateRelative0").fadeOut();
                                $(".cIsEndDateRelative23").fadeOut();
                                $(".cIsEndDateRelative12").fadeIn();
                            } else if (sel.value == "0") {
                                $(".cIsEndDateRelative0").fadeIn();
                                $(".cIsEndDateRelative1").fadeOut();
                            } else if (sel.value == "2") {
                                $(".cIsEndDateRelative12").fadeOut();
                                $(".cIsEndDateRelative23").fadeIn();
                                $(".cIsEndDateRelative0").fadeOut();
                                $(".cIsEndDateRelative1").fadeIn();
                            }
                        }
                        function showHide(checked) {
                            if (checked == true) $(".cOnlineOptions").fadeIn();
                            else $(".cOnlineOptions").fadeOut();
                            $(".cInPersonOptions").fadeOut();

                            if (checked == false) {
                                $(".cInPersonOptions").fadeIn();
                            }
                        }

                        function showHidetwo(checked) {
                            if (checked == true) $(".cStreamOptions").fadeIn();
                            else $(".cStreamOptions").fadeOut();
                        }
                        function hide(checked) {
                            $(".cStreamOptions").fadeOut();
                        }

                        function selectfrom(checked) {
                            if (checked == true) $(".cVenueSelectionContenttwo").fadeIn();
                            else $(".cVenueSelectionContenttwo").fadeOut();
                            $(".cVenueSelectionContent").fadeOut();
                        }

                        function searchhide(checked) {
                            if (checked == true)
                                //   $(".cVenueSelectionContent").fadeIn();
                                $(".cVenueSelectionContenttwo").fadeOut();
                            else $(".cVenueSelectionContent").fadeOut();
                            $(".cVenueSelectionContent").fadeIn();
                        }
                        function showusers(checked) {
                            if (checked == true) $(".cLimitToGroupContainer").fadeIn();
                            else $(".cLimitToGroupContainer").fadeOut();
                        }
                        function showPassword(checked) {
                            if (checked == true) $(".cHasPasswordContainer").fadeIn();
                            else $(".cHasPasswordContainer").fadeOut();
                        }
                        function showlimit(checked) {
                            if (checked == true) $(".block").fadeIn();
                            else $(".block").fadeOut();
                        }
                        function checkboxcapa(checked) {
                            if (checked == true) $(".showHidecapacity").fadeIn();
                            else $(".showHidecapacity").fadeOut();
                        }
                        function getval(sel) {
                            if (sel.value == "1") {
                                $(".cReturn").fadeIn();
                            } else {
                                $(".cReturn").fadeOut();
                            }
                        }

                        function getcategory(sel) {
                            if (sel.value == "3") {
                                $(".cateExchange").fadeIn();
                            } else {
                                $(".cateExchange").fadeOut();
                            }
                            if (sel.value != "0") {
                                $(".cExchange").fadeIn();
                            } else $(".cExchange").fadeOut();
                        }
                    </script>


<script>
function getnumber(sel) {
if (sel == "3") {
    $("#Remainingtic").fadeIn();
} else {
    $("#Remainingtic").fadeOut();
}
}

</script>


                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#summernote").summernote();
                            $("#summernote1").summernote();
                        });
                    </script>

                    <!-- Categories-->

                    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>
                    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    <script>
        $("#tokenfield").tokenfield({
            autocomplete: {
                source: [],
               

   
   
                delay: 100,
            },
            showAutocompleteOnFocus: true,
        });
    </script>
    <script>
        $("#tokenfieldsub").tokenfield({
            autocomplete: {
                source: [],
                delay: 100,
            },
            showAutocompleteOnFocus: true,
        });
    </script>

                    <script>
                        $(document).ready(function () {
                            $(".js-example-basic-multiple").select2();
                        });
                    </script>
                    <script>
                        $(document).ready(function () {
                            $(".js-example-basic-multiple-mer").select2();
                        });
                    </script>

                    <script>
                        $(document).ready(function () {
                            $(".js-example-basic-multiple-venue").select2();
                        });
                    </script>

                    <script>
                        $(document).ready(function () {
                            //       $('input:checkbox').each(function(){
                            //   if($(this).prop('checked')== true) {
                            //     $(this).next('input').val('test');
                            //     $(this).next('input').show();
                            //   } else  {
                            //     $(this).next('input').hide();
                            //   }
                            // });

                            $("#ctl02_cLimitToGroup123").on("click", function () {
                                console.log("dfs");
                                if ($("#ctl02_cLimitToGroup123").prop("checked") == true) {
                                    console.log("123");

                                    // $('.cHideShowNextRow').next('#ctl02_cHasPassword').val('test');
                                    $("#ctl02_cHasPassword123").show();
                                    // $(this).next('input').show();
                                } else {
                                    // $(this).next('').hide();
                                }
                            });
                        });
                    </script>

                    <!-- basic info form script -->
                    <script>
                        $(document).ready(function () {
                            $("#basic_info").submit(function (stay) {
                                var formdata = $(this).serialize();
                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.manage_event.information')}}",
                                    data: formdata,
                                    success: function (data) {
                                       
                                         
                                        sessionStorage.setItem("nextitem",true);
                                        location.reload();
                                        
                                        swal("Saved!", "success");
                                    
                                        
                                            
                                            // $('.nav-tabs a[href="#custom-tabs-one-profile"]').tab("show");
                                        //}
                                    },
                                    errors: function (e) {
                                        alert(e);
                                    },
                                });
                                stay.preventDefault();
                            });
                        });
                    </script>
                    <!-- end basic form script -->
                    <!-- policy form -->
                    <script>
                        $(document).ready(function () {
                            $("#policy_form").submit(function (stay) {
                                var formdata = $(this).serialize();
                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.manage_event.policy')}}",
                                    data: formdata,
                                    success: function (data) {
                                        $('.nav-tabs a[href="#custom-tabs-one-messages"]').tab("show");

                                        // $('.last_insert_id').val(data.last_insert_id);
                                    },
                                });
                                stay.preventDefault();
                            });
                        });
                    </script>
                    <!-- end policy form -->

                    <!-- picture&video -->
                    <script>
                        $(document).ready(function () {
                            $("#flyer-form").submit(function (stay) {
                                stay.preventDefault();
                                var formData = new FormData(this);

                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });

                                $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.manage_event.flyer')}}",
                                    data: formData,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    success: function (data) {
                                        console.log("success");
                                        console.log(data);

                                        $('.nav-tabs a[href="#custom-tabs-one-settings"]').tab("show");
                                    },
                                    error: function (data) {
                                        console.log("error");
                                        console.log(data);
                                    },
                                });
                            });
                        });
                    </script>
                    <!-- end picture &video -->

                    <!-- ticket -->
                    <script>
                        $(document).ready(function () {
                            $("#ticket-form").submit(function (stay) {
                                stay.preventDefault();
                                var formdata = $(this).serialize();
                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.manage_event.ticket')}}",
                                    data: formdata,
                                    success: function (data) {
                                        console.log("success");
                                        console.log(data);

                                        $('.nav-tabs a[href="#tabs-one-detail-tabcustomhref"]').tab("show");
                                    },
                                    error: function (data) {
                                        console.log("error");
                                        console.log(data);
                                    },
                                });
                            });
                        });
                    </script>
                    <!-- end ticket -->

                    <!-- modal--------- -->

                    <script>
                        $(document).ready(function () 
                        {
                            $('#add_price_level').click(function(){
                                 $('#add_price_leve_model').modal('show'); 

            $('#price-level-form').trigger("reset");
            $("#TitlePcice").text("Add New Price level");
            $('#sub').val("Save");
             $("#Startsale.select").val(0);
              $("#saleEnd.select").val(0);
              $(".startsaledatepicker").css("display","none");
              $(".endsaledatepicker").css("display","none");
                                 
                                 
                            });

                            $('.add_var_price_level').click(function(){

                            $('#price-level-form').trigger("reset");
                            $("#Startsale.select").val(0);
                            $("#saleEnd.select").val(0);
                            $(".startsaledatepicker").css("display","none");
                            $(".endsaledatepicker").css("display","none");

                            $('#add_price_leve_model').modal('show'); 
                            $('#price-level-form').trigger("reset");
                            $('#parent_id').val($(this).attr("data-id"));
                            $('#sub').val("Save");
                            $("#TitlePcice").text("New Price Variation");
                        $('#descHint').text("Optional - Ex: Must show student ID");
                            $('#SectionColor').css("display",'none');

                            });



                            $("#price-level-form").submit(function (stay) 
                            {
                                stay.preventDefault();
                                var formdata = $(this).serialize();
                                var value = $("#sub").attr('value');

                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                               if(value == "Save")
                               {
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.ticket.price')}}",
                                    data: formdata,
                                   processData:false,
                                    dataType:'json',
                                     
                                      beforeSend:function(){
                                      $(document).find('span.error-text').text('');
                                      },
                                      success: function(data)
                                      {
                                        
                                        if (data.status == 0)
                                         {
                                           
                                           $.each(data.error,function(prefix,val)
                                            {

                                            $('span.'+prefix+'_error').text(val[0]);
                                            });

                                        }else{
                                          alert(data.msg);
                                          $('.modal').modal('hide');
                                           $( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );
                                              
                                 $('#price-level-form').trigger("reset");
                                 


                                           /* $('#price-level-form')[0].reset();

                                            document.getElementById("price-level-form").reset();*/

                                            $("#Startsale.select").val(0);
                                            $("#saleEnd.select").val(0);
                                            $(".startsaledatepicker").css("display","none");
                                            $(".endsaledatepicker").css("display","none");
                                        }
                                      },
                                   
                                });
                            }

                            else{
                                 $.ajax({
                                    type: "POST",
                                    url: "{{route('seller.ticket.postedit_price')}}",
                                    data: formdata,
                                     processData:false,
                                    dataType:'json',
                                     
                                      beforeSend:function(){
                                      $(document).find('span.error-text').text('');
                                      },
                                      success: function(data)
                                      {
                                        
                                        if (data.status == 0)
                                         {
                                           
                                           $.each(data.error,function(prefix,val)
                                            {

                                            $('span.'+prefix+'_error').text(val[0]);
                                            });

                                        }else{
                                          alert(data.msg);
                                          $('.modal').modal('hide');
                                           $( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );
                                            $('#price-level-form')[0].reset();
                                            document.getElementById("price-level-form").reset();
                                            $("#Startsale.select").val(0);
                                            $("#saleEnd.select").val(0);
                                            $(".startsaledatepicker").css("display","none");
                                            $(".endsaledatepicker").css("display","none");
                                        }
                                      },
                                });
                             }
                        });
                    });
                    </script>

                    <script type="text/javascript">
                        function priceEdit(id)
                        {
                            $.ajax({
                                    type: 'GET',
                                    url: "{{route('ticket.getedit_price')}}",
                                    data: 'id='+id,

                                    success: function (data)
                                    {

                                       $('#add_price_leve_model').modal('show');
                                       $('#PricePassword').attr("hidden", true);
                                       $('#hintsPassword').attr("hidden", true);
                                       $("#TitlePcice").text("Update Price level");
                                      
                                       if(data.data.parent_id != null)
                                       {
                                         $('#SectionColor').css("display",'none');

                 $("#TitlePcice").text("Update Price Variation");
                 $('#descHint').text("Optional - Ex: Must show student ID");

                                       }
                                     
                                       
                                       $('#sub').val("Save Changes");
                                       $('#id').val(data.data.id);
                                       $("#EventId").val(data.data.event_id);
                                       $('#ticket_id').val(data.data.event_ticket_id);
                                       $('#name').val(data.data.name);
                                       $('#Description').val(data.data.description);
                                       $('#Increment').val(data.data.available_inc);
                                       $('#BuyPrice1').val(data.data.buy_price);
                                       $('#Capacity').val(data.data.capacity);
                                       $('#EndDateView').val(data.data.end_sale_date);
                                       $('#EndTimeView').val(data.data.end_sale_time);
                                       $('#face-price').val(data.data.face_price);
                                       $('#Maxper').val(data.data.max_trans);
                                       $('#Minper').val(data.data.min_trans)
                                       $('#ServiceCharge').val(data.data.service_charge);
                                       $('#SortOrder').val(data.data.sort_order);

                                       
                                       $("#seatcolor").val(data.data.color).change();
                                
                                $('#Startsale option[value=1]').attr('selected','selected');

                                       $(".startsaledatepicker").fadeIn();

                                        $('#saleEnd option[value=1]').attr('selected','selected');

                                       $(".endsaledatepicker").fadeIn();
                                       $('#saleStartDate').val(data.data.start_sale_date);
                                       $('#saleStartTime').val(data.data.start_sale_time);
                                    }, error: function (data) 
                                    {
                                        console.log("error");
                                        console.log(data);
                                    },
                                });
                        }
                    </script>

                    <script type="text/javascript">

                        $(document).ready(function () 
                        {
                          $('.varpriceDelete').click(function(){
                            var result = confirm('Are you sure want to remove the Price Level?');
                            if(result)
                           {
                           var id =$(this).attr("data-id"); 
                                 
                            
                            $.ajax({
                                    type: 'GET',
                                    url: "{{route('ticket.delete_price')}}",
                                    data: 'id='+id,

                                    success: function (data)
                                    {
                                     alert("Deleted..");
                                    /* location.reload();*/
                                      $( "#PriceTableA" ).load(window.location.href + " #PriceTableA" );
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

                    <!-- add quesation per ticket -->

                    <script>
                        $(document).ready(function () {
                            $("#subInvoiceQuestion").on("click", function () {
                                // $('#QuestionPickerInvoice').submit();

                                var str = $("#QusPerInvoice").val();

                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                                $.ajax({
                                    type: "POST",
                                    url:"{{route('seller.add_question_invoice')}}",
                                    data: "str=" + str,

                                    success: function (data) {
                                        $("#QusPerInvoice").val("");
                                    },
                                });
                            });

                            $("#Question").on("click", function () {
                                // $('#QuestionPickerTicket').submit();

                                var str = $("#QusPerTicket").val();

                                $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
                                $.ajax({
                                    type: "POST",
                                    url:"{{route('seller.add_question_ticket')}}",
                                    data: "str=" + str,

                                    success: function (data) {
                                        $("#QusPerTicket").val("");
                                        console.log("success");
                                    },
                                });
                            });
                        });
                    </script>


<!-- venue create -->
<script>
$(document).ready(function () {    
    $("#create-venue-form").submit(function (stay) {
        stay.preventDefault();
        var formdata = $(this).serialize();

        var newvenuename = $(".venue-name-add").val();
        $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });

        $.ajax({
        type: "POST",
        url: "{{route('seller.create_venue')}}",
        data: formdata,
        processData:false,
        dataType:'json',
          // contentType:false,
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            if (data.status == 0) {
              $.each(data.error,function(prefix,val)
                {
                  $('span.'+prefix+'_error').text(val[0]);
                });

            }else{
              $('#venue_list').append($("<option></option>").attr("value", newvenuename).attr("selected", "selected").text(newvenuename));
            newvenuename = '';
            $(".modal").modal("hide");
              
            }



          },
        });
    });
});      
</script>
<!-- /venue create -->

<script>
$(document).ready(function () {

                   function filePreview(input) {
                   
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        var reader2 = new FileReader();

                        reader.onload = function (e) 
                        {
                       
                        $('#FlyerPreview').attr('src',e.target.result);
                        $('#innerFlyerPreview').attr('src',e.target.result);
                          
                        };
                        reader.readAsDataURL(input.files[0]);

                        
                        
                    }
                }
                $('#flyer').change(function () {
                    filePreview(this);
                });
               
        });
 </script>
  <!---
    Tab issue fix
  --> 
<script type="text/javascript">
$(".add_event_next_button").click(function(e){
    var selected = $("#custom-tabs-one-tab li a.active");
    $("#custom-tabs-one-tab li a").removeClass("active");
    selected.parent().next().find('a').addClass("active");
});
$(".add_event_prev_button").click(function(e){
    var selected = $("#custom-tabs-one-tab li a.active");
    $("#custom-tabs-one-tab li a").removeClass("active");
    selected.parent().prev().find('a').addClass("active");
});
function filePreviewsecond(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var reader2 = new FileReader();
        reader.onload = function (e) 
        {               
            $('#picturesecondpicturesimg').attr('src',e.target.result);
            $('#picturesecondpicturesimg').css("display",'block');
            $('#picturesecondpicturesimg').css("width",'200');
        };
        reader.readAsDataURL(input.files[0]);                      
    }
}
$('#picturesecondpictures').change(function () {
    filePreviewsecond(this);
});
function updateYoutubevideo()
{
let url=$("#video_id").val();
    //let url=$("#video_id").val();
    // var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    // var match = url.match(regExp);
    // console.log(match);
    // if(match[7] != null) {
        $('#youtube_div_id').empty();
        $('#youtube_div_id').append(`<iframe width="100%" height="315" src="https://www.youtube.com/embed/`+url+`" allow='autoplay'> </iframe>`);  
    // }
    // else {
    //     $('#youtube_div_id').empty();
    // }
    url = '';
}
function updateFacebookvideo()
{
    var url=$("#video_id").val();
    // let url=$("#video_id").val();
    // var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    // var match = url.match(regExp);
    // console.log(match);
    // if(match[7] != null) {
        //10153231379946729
        $('#youtube_div_id').empty();
        // $('#youtube_div_id').append('<div id="fb-root"></div>');
        var string = '<div id="fb-root"></div>';
        string+= '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ml_IN/sdk.js#xfbml=1&version=v11.0" nonce="sz4xMfBf">';
        //string+= '<"/"script>';
        newstring = '<div class="fb-video" data-href="https://www.facebook.com/facebook/videos/'+url+'/" data-width="500" data-show-text="false"></div>';
        $('#youtube_div_id').append(string);
        $('#youtube_div_id').append(newstring);
}
$("#video_id").blur(function(){
    var url=$("#video_id").val();
    var youtubeorfacebook = $("input[name='media_link']:checked").val();
    if( youtubeorfacebook=="yt") {
        if(url.trim()!= '') {
            updateYoutubevideo();
        }
    }
    else if( youtubeorfacebook=="fb") {
        if(url.trim()!= '') {
            updateFacebookvideo();
        }
    }
});
$("#video_id").change(function(){
    var youtubeorfacebook = $("input[name='media_link']:checked").val();
    var url=$("#video_id").val();
    if( youtubeorfacebook=="yt") {
        if(url.trim()!= '') {
            updateYoutubevideo();
        }
    }
    else if( youtubeorfacebook=="fb") {
        if(url.trim()!= '') {
            updateFacebookvideo();
        }
    }
});
$("input[name='media_link']").change(function(){
    $("#video_id").val("");
    $('#youtube_div_id').empty();
})
</script>               

       
       <script>
$(document).ready(function(){
checknexttab();
  var $optgroups = $('#subcategory > optgroup');
  
  $("#category").on("change",function(){
    var selectedVal = this.value;
    
    $('#subcategory').html($optgroups.filter('[label="'+selectedVal+'"]'));
 });  
});
function checknexttab() {
    setTimeout(function(){
        var nexttab = sessionStorage.getItem("nextitem");
        if(nexttab != ''  && nexttab != undefined) {
            $(".nav-tabs .nav-item .nav-link").removeClass("active");
            $("#custom-tabs-one-home").removeClass("show");
            $("#custom-tabs-one-home").removeClass("active");
            $("#custom-tabs-one-profile").addClass("show");
            $("#custom-tabs-one-profile").addClass("active");
            $("#custom-tabs-one-profile-tab").addClass("active");
            $("#custom-tabs-one-profile-tab").attr("aria-selected",true);
            sessionStorage.removeItem("nextitem");
             window.scrollTo(0, 0);
        }
     }, 1000);

}
       </script>   


<script>
$(document).ready(function () 
{
 $("#payment_method").submit(function (stay) {

    var formdata = $(this).serialize();
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
    $.ajax({
        type: "POST",
        url: "{{route('seller.manage_event.payment_method')}}",
        data: formdata,
        processData:false,
        dataType:'json',
          // contentType:false,
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            if (data.status == 0) {
              $.each(data.error,function(prefix,val)
                {
                  $('span.'+prefix+'_error').text(val[0]);
                });

            }else{
              alert(data.msg); 
            }

          },
         errors: function (e) {
            alert(e);
           },
    });
    stay.preventDefault();
    
});


});



</script>
 <!-- color pcker -->
           <script>

$('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
           </script>    

<script>

const myForm = $("#FormPublish");
$("#SubPub").click(function(stay){
myForm.submit();   
});
</script>


@endsection
    
