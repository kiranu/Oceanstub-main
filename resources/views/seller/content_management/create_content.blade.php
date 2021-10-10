

@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style type="text/css">
.note-editable{

height:249px !important;
}.btns button{

float:right;
margin: 8px;
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

   <div class="card card-info" >
            <div class="card-header" style="background-color: #007bff;">
              <h3 class="card-title">Add Content
              </h3>
            </div>
        </div>


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <form id="AddContent">

              <input type="hidden" name="id" id="id" value="@isset($content->id){{$content->id}}@endisset">
            <div class="card-header">
              <h3 class="card-title">
                Returns Policy: 
              </h3>
            </div>
            <div class="card-body">
              <textarea id="return_policy" name="ReturnPolicyContent" value="@isset($content->return_policy){!!html_entity_decode($content->return_policy)!!}@endisset">@isset($content->return_policy){!!html_entity_decode($content->return_policy)!!}@endisset</textarea>
               <span class="text-danger error-text ReturnPolicyContent_error"></span>
            </div>


            <!--privacy policy  -->
              <div class="card-header">
              <h3 class="card-title">
                Privacy Policy: 
              </h3>
            </div>
           
            
            <div class="card-body">
              <textarea id="privacy_policy" name="PrivacyPolicyContent" value="@isset($content->privacy_policy){!!html_entity_decode($content->privacy_policy)!!}@endisset">@isset($content->privacy_policy){!!html_entity_decode($content->privacy_policy)!!}@endisset
              
              </textarea>
               <span class="text-danger error-text PrivacyPolicyContent_error"></span>
            </div>

            <!-- terms of use  -->
              <div class="card-header">
              <h3 class="card-title">
                Terms Of Use: 
              </h3>
            </div>
           
            
            <div class="card-body">
              <textarea id="TermsOfUse" name="TermsOfUseContent" value="@isset($content->terms_of_use){!!html_entity_decode($content->terms_of_use)!!}@endisset">
                @isset($content->terms_of_use){!!html_entity_decode($content->terms_of_use)!!}@endisset
              
              </textarea>
               <span class="text-danger error-text TermsOfUseContent_error"></span>
            </div>
<!-- TermsOfPurchers -->
   <div class="card-header">
              <h3 class="card-title">
                Terms Of Purchase: 
              </h3>
            </div>
           
            
            <div class="card-body">
              <textarea id="TermsOfPurchers" name="TermsOfPurchersContent" value="@isset($content->terms_of_purchase){!!html_entity_decode($content->terms_of_purchase)!!}@endisset">
                @isset($content->terms_of_purchase){!!html_entity_decode($content->terms_of_purchase)!!}@endisset
              
              </textarea>
               <span class="text-danger error-text TermsOfPurchersContent_error"></span>
            </div>
            <!-- About us -->
               <div class="card-header">
              <h3 class="card-title">
                About Us: 
              </h3>
            </div>
           
            
            <div class="card-body">
              <textarea id="AboutUs" name="AboutUsContent" value="@isset($content->about_us){!!html_entity_decode($content->about_us)!!}@endisset">
                @isset($content->about_us){!!html_entity_decode($content->about_us)!!}@endisset
              
              </textarea>
               <span class="text-danger error-text AboutUsContent_error"></span>
            </div>

            <div class="card-footer btns">
              <button type="submit" class="col-md-1 btn btn-block bg-gradient-success btn-sm">Save</button>
              
              
            </div>
           </form>
           <br>
           <br>
          </div>
        </div>
        <!-- /.col-->
      </div>
    
    </section>
      
      </div>
         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')

<script>
  $(function () {
    // Summernote
    $('#return_policy').summernote(
      {
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]

    });
    $('#privacy_policy').summernote(
      {
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]

    });  
    $('#TermsOfUse').summernote(
      {
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]

    }); 
    $('#TermsOfPurchers').summernote(
      {
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]

    });
     $('#AboutUs').summernote(
      {
      toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]

    });
   
  })
</script>

<script>
$(document).ready( function () {
$("#AddContent").submit(function(stay){
    stay.preventDefault();
 /*   var value = $("#submit").attr('value');*/
 var id = $("#id").val();

     var formdata = $(this).serialize();

     
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    if(id != '' && id != undefined )
    {
   
    $.ajax({
          type: 'POST',
          url: "{{route('seller.content_management.update_content')}}",
          data: formdata,
          processData:false,
          dataType:'json',
          success: function(data)
          {
           
              alert(data.msg);
             
          }, 
    });
  }
else{
 $.ajax({
          type: 'POST',
          url: "{{route('seller.content_management.store_content')}}",
          data: formdata,
          processData:false,
          dataType:'json',
          success: function(data)
          {
           
              alert(data.msg);
             
          }, 
    });


}

   });
});
</script>
@endsection