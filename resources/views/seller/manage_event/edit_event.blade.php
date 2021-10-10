@extends('layouts.seller_app')
 @section('title','OCEANSTUB')

  @section('top_scripts')
   @endsection @section('style')

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
}.fromat_time_div{
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
@endsection @section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.seller_navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.seller_sidebar')
        <!-- /Main Sidebar Container -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
           
            <!-- Main content -->
            <div class="card card-info">
                <div class="card-header" style="background-color: #007bff;">
                    <h3 class="card-title">Add Events</h3>
                </div>
               
                <!-- /.card-header -->
                <!-- form start -->
                <!-- /.row -->
                <div class="row">
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
                                        <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pictures & Video</a>
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
                                </ul>
                            </div>
                            <div class="card-body fullbody">
                                <div class="tab-content" id="custom-tabs-one-tabContent" class="imformation1">
                                    @include('seller.manage_event.edit_events.information')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    @include('seller.manage_event.edit_events.returns_policy')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel2" aria-labelledby="custom-tabs-one-messages-tab">
                                    @include('seller.manage_event.edit_events.picture_video')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                    @include('seller.manage_event.edit_events.ticket')
                                </div>
                                <div class="tab-pane fade" id="tabs-one-detail-tabcustomhref" role="tabpanel" aria-labelledby="tabs-one-detail-tabcustomhreftab" style="padding-left: 0px;">
                                    @include('seller.manage_event.edit_events.details')
                                </div>
                                <div class="tab-pane fade payment" id="custom-tabs-one-Payment-tabhhref" role="tabpanel" aria-labelledby="custom-tabs-one-Payment-tab" style="padding-left: 20px;">
                                    @include('seller.manage_event.edit_events.payment')
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-promote-tabhhref" role="tabpanel" aria-labelledby="custom-tabs-one-promote-tabh" style="padding-left: 20px;">
                                    @include('seller.manage_event.edit_events.promote')
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
                        
                           
                        @isset($event_data->event_types->online){{($event_data->event_types->online == "on" ? 'showHide(true);' : '')}}@endisset
                      
                        function showHide(checked)
                         {
                             
                            if (checked == true)
                             {
                                $(".cOnlineOptions").fadeIn();
                             }
                            else{ 
                                $(".cOnlineOptions").fadeOut();
                                $(".cInPersonOptions").fadeOut();
                              }
                            if (checked == false) {
                                $(".cInPersonOptions").fadeIn();
                            }
                        }

                         
                          @isset($event_data->event_types->streaming)
        {{$event_data->event_types->streaming == 'true' ? 'showHidetwo(true);' : ''}}@endisset
                        function showHidetwo(checked) {
                            if (checked == true) $(".cStreamOptions").fadeIn();
                            else $(".cStreamOptions").fadeOut();
                        }
            @isset($event_data->event_types->streaming)
          {{$event_data->event_types->streaming == 'false' ? 'hide(false)' : ''}}@endisset
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
               
                   



                       


                    @isset($event_data->event_policies)
                    {{($event_data->event_policies->return_policy == "0" ? 'getval(0)' : '')}}
                     @endisset
                     @isset($event_data->event_policies)
                     {{($event_data->event_policies->return_policy == "1" ? 'getval(1)' : '')}} 
                     @endisset
                           function getval(sel) {
                            if (sel == "1") {
                                $(".cReturn").fadeIn();
                            } else {
                                $(".cReturn").fadeOut();
                            }
                        }


</script>

<script>
@isset($event_data->event_details)
{{($event_data->event_details->check_group == "true" ? 'showusers(true)' : '')}}
@endisset
function showusers(checked) 
{
if (checked == true) 
    {
    $(".cLimitToGroupContainer").fadeOut();
    }
else{
 $(".cLimitToGroupContainer").fadeOut();
}
}
</script>
<script>
@isset($event_data->event_details)
{{($event_data->event_details->check_password == "true" ? 'showPassword(true)' : '')}}
@endisset
function showPassword(checked) {
if (checked == true) 
    {
    $(".cHasPasswordContainer").fadeIn();
    }
else {
    $(".cHasPasswordContainer").fadeOut();
}
}
</script>
<script>
@isset($event_data->event_details) 
{{($event_data->event_details->check_limit == "true" ? 'showlimit(true)' : '')}}
@endisset
function showlimit(checked) {
if (checked == true)
{
$(".block").fadeIn();
}
else{
$(".block").fadeOut();
}
}
</script>
<script>
@isset($event_data->event_ticket->cap)
{{($event_data->event_ticket->cap == "yes" ? 'checkboxcapa(true)' : '') }}
@endisset
function checkboxcapa(checked) {
if (checked == true) 
    {
        $(".showHidecapacity").fadeIn();
}
else {
    $(".showHidecapacity").fadeOut();
}
}

</script>
<script >
    
</script>
<script>
    @isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "0" ? 'getcategory(0)' : '')}}@endisset
@isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "1" ? 'getcategory(1)' : '')}}@endisset
@isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "2" ? 'getcategory(2)' : '')}}@endisset
@isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "3" ? 'getcategory(3)' : '')}}@endisset
@isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "4" ? 'getcategory(4)' : '')}}@endisset
@isset($event_data->event_policies)
{{($event_data->event_policies->exchange_upgrade == "5" ? 'getcategory(5)' : '')}}@endisset

function getcategory(sel)
 {
    if (sel == "3") 
    {
        $(".cateExchange").fadeIn();
    }
     else 
     {
        $(".cateExchange").fadeOut();
    }
    if (sel != "0")
     {
        $(".cExchange").fadeIn();
    } 
    else{
        $(".cExchange").fadeOut();
    }
}
</script>






                    <script type="text/javascript">
                        $(document).ready(function () {


                               

         var value = $("#summernote").attr('value');
      $('#summernote').summernote('code',value);
    

  


                             var value = $("#summernote1").attr('value');
                            $('#summernote1').summernote('code',value);
                        });
                    </script>
                          

<script> 
@isset($event_data->event_details) 
{{($event_data->event_details->remining_ticket == "1" ? 'getnumber(1)' : '')}} @endisset
@isset($event_data->event_details)
{{($event_data->event_details->remining_ticket == "2" ? 'getnumber(2)' : '')}} @endisset
@isset($event_data->event_details)
{{($event_data->event_details->remining_ticket == "3" ? 'getnumber(3)' : '')}} @endisset

    function getnumber(sel) 
    {

        if (sel == "3") 
        {
        $("#Remainingtic").fadeIn();
        } 
        else 
        {
        $("#Remainingtic").fadeOut();
        }
    }

</script>

                    <!-- Categories-->

                    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>
                    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
                    <script>
                        $("#tokenfieldcat").tokenfield({
                            
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

                   
<script>
$(document).ready(function () {
    $("#basic_info").submit(function (stay) {
        stay.preventDefault();
        var formdata = $(this).serialize();
        $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
        $.ajax({
            type: "POST",
            url: "{{route('seller.manage_event.edit_information')}}",
            data: formdata,
            processData:false,
            dataType:'json',
          // contentType:false,
            beforeSend:function(){
            $(document).find('span.error-text').text('');
            },
            success: function (data) {
            if (data.status == 0) {
              $.each(data.error,function(prefix,val)
                {
                  $('span.'+prefix+'_error').text(val[0]);
                });
             
            }
            else{
              alert(data.msg);
            // $('.nav-tabs a[href="#custom-tabs-one-profile"]').tab("show");
               // window.location.reload();

            }
                
            },
           
        });
        
    });
});
</script>
<!-- policy form -->
<script>
    $(document).ready(function () {
        $("#policy_form").submit(function (stay) {
            stay.preventDefault();
            var formdata = $(this).serialize();
            $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
            $.ajax({
                type: "POST",
                url: "{{route('seller.manage_event.edit_policy')}}",
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

            }
            else{
              alert(data.msg);
              // $('.nav-tabs a[href="#custom-tabs-one-messages"]').tab("show");
              
            }
          },
               
            });
            
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
            url: "{{route('seller.manage_event.edit_flyer')}}",
            data: formData,
            cache: false,
            processData:false,
            dataType:'json',
          contentType:false,

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

            }
            else{
            alert(data.msg);
            // $('.nav-tabs a[href="#custom-tabs-one-settings"]').tab("show");
            }
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
url: "{{route('seller.manage_event.edit_ticket')}}",
data: formdata,
 cache: false,
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

}
else{
alert(data.msg);
// $('.nav-tabs a[href="#tabs-one-detail-tabcustomhref"]').tab("show");
}
},

});
});
});
</script>
<!-- end ticket -->
<!-- details -->
<script>
    $(document).ready(function () {
        $("#details-form").submit(function (stay) {
            stay.preventDefault();
            var formdata = $(this).serialize();
            $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
            $.ajax({
                type: "POST",
                url: "{{route('seller.manage_event.edit_detailes')}}",
                data: formdata,
                                cache: false,
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

                }
                else{
                alert(data.msg);
                // $('.nav-tabs a[href="#tabs-one-detail-tabcustomhref"]').tab("show");
                }
              },
            });
        });
    });
</script>
<!-- end details -->


<!-- price level -->
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
                                       $('#Minper').val(data.data.min_trans);
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
<!-- end price level -->


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
function clear_form_elements(class_name) {


  jQuery("#"+class_name).find(':input').each(function() {
    switch(this.type) {
        case 'password':
        case 'text':
        case 'textarea':
        case 'file':
        case 'select-one':
        case 'select-multiple':
        case 'multiple':
        case 'date':
        case 'time':
        case 'number':
        case 'tel':
        case 'email':
            jQuery(this).val('');
            break;
        case 'checkbox':
        case 'radio':
            this.checked = false;
            break;
    }
  });

if(class_name == "flyer-form")
{
$('#video_id').val(''); 
$('#fb').attr('checked',false); 
$('#yt').attr('checked',false); 
('#flyer-form').trigger("reset");
}
if(class_name == "details-form")
{

('#details-form').trigger("reset");
}
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
        url: "{{route('seller.manage_event.edit_payment_method')}}",
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
 @endsection
        
