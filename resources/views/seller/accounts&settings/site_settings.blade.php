@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
   .note-editor {
      margin-left: 15px;
   }
   

   @media all and (max-width:720px) {
      .social-media {
         padding-left: 0px !important;
      }

      .add-social {
         padding: 10 !important;
         margin: 0 !important;

      }

      .top-heading {
         padding: 0 !important;
         font-size: 19px;
      }

      .button1 {
         font-size: 11px;
         margin-left: 0px !important;
         margin: 10px;
      }

      .button2 {
         font-size: 12px;
      }

      .google-analytics {
         padding: 10 !important;
         margin: 0 !important;
      }

      .heading-google {
         font-size: 19px;
         padding: 0px !important;
      }
   }
</style>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/seller/font-awesome-4.7.0/css/font-awesome.min.css')}}">
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
               <h3 class="card-title">Site Settings</h3>
            </div>
         </div>
         <div class="row">
            <div class="col-12 col-sm-12">
               <div class="card card-gray-dark card-tabs">
                  <div class="card-header p-0 pt-1">
                     <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <!-- <li class="nav-item">
                           <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Basic Info</a>
                        </li> -->
                        <li class="nav-item">
                           <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Ads & Promotions</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Social Media and Facebook</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="tabs-one-settings-tabcustom" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Google</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="tabs-one-detail-tabcustom" data-toggle="pill" href="#tabs-one-detail-tabcustomhref" role="tab" aria-controls="tabs-one-detail-tabcustomhreftab" aria-selected="false">Reviews</a>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-one-Payment-tab" data-toggle="pill" href="#custom-tabs-one-Payment-tabhhref" role="tab" aria-controls="custom-tabs-one-Payment-tab" aria-selected="false">Options</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="custom-tabs-one-promote-tab" data-toggle="pill" href="#custom-tabs-one-promote-tabhhref" role="tab" aria-controls="custom-tabs-one-promote-tab" aria-selected="true">Languages</a>
                        </li> -->
                        
                     </ul>
                  </div>
               </div>
            </div>
         </div>


         <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
               <!-- bacis info -->
               <!-- adds promo -->
               @include('seller.accounts&settings.site_settings.ads_and_promotion')
               <!-- socialmedia fb -->
               @include('seller.accounts&settings.site_settings.socialmedia')
               <!-- google -->
               @include('seller.accounts&settings.site_settings.google')
               <!-- reviews -->
               @include('seller.accounts&settings.site_settings.reviews')
               <!-- options -->
               <!-- langueages -->

            </div>
         </div>
      </div>
      @include('layouts.seller_footer')
   </div>
   @endsection
   @section('bottom_scripts')
   <script type="text/javascript">
      $(document).ready(function() {
         $('#summernote').summernote();
         $('#summernote1').summernote();
      });
   </script>
   <script>
$(document).ready(function () 
{
 $("#SocialMedia-Form").submit(function (stay) {
    var formdata = $(this).serialize();
    var id = $('#sm_id').val();
    
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
if(id == '')
{
    $.ajax({
        type: "POST",
        url: "{{route('seller.accounts_and_settings.site_settings.social_media')}}",
        data: formdata,
        processData:false,
        dataType:'json',
         
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            alert(data.msg); 
            location.reload();

          },
         errors: function (e) {
            alert(e);
           },
    });
   }else{
      $.ajax({
        type: "POST",
        url: "{{route('seller.accounts_and_settings.site_settings.edit_social_media')}}",
        data: formdata,
        processData:false,
        dataType:'json',
         
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            alert(data.msg); 
            location.reload();

          },
         errors: function (e) {
            alert(e);
           },
    });

   }

    stay.preventDefault(); 
});
});
</script>
<!-- google -->

  <script>
$(document).ready(function () 
{
 $("#googleform").submit(function (stay) {
    var formdata = $(this).serialize();
    var id = $('#g_id').val();
    
    $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
if(id == '')
{
    $.ajax({
        type: "POST",
        url: "{{route('seller.accounts_and_settings.site_settings.Google_Analytics')}}",
        data: formdata,
        processData:false,
        dataType:'json',
         
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            alert(data.msg); 
            location.reload();

          },
         errors: function (e) {
            alert(data.error);
           },
    });
   }else{
      $.ajax({
        type: "POST",
        url: "{{route('seller.accounts_and_settings.site_settings.edit_Google_Analytics')}}",
        data: formdata,
        processData:false,
        dataType:'json',
         
          beforeSend:function(){
          $(document).find('span.error-text').text('');
          },
          success: function(data)
          {
            alert(data.msg); 
            location.reload();

          },
         errors: function (e) {
            alert(e);
           },
    });

   }

    stay.preventDefault(); 
});
});
</script>

   @endsection