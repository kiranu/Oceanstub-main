@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style type="text/css">
.note-editable{

height:249px !important;
}.btns button{
display: inline-block;
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
              <h3 class="card-title">PRIVACY POLICY
              </h3>
            </div>
        </div>


    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Privacy Policy: 
              </h3>
            </div>
            <!-- /.card-header -->
            <form id="rtrn">
              
            <div class="card-body">
              <input type="hidden" name="id" value="@isset($policy->id){{$policy->id}}@endisset" id="id">
              <textarea id="summernote" name="PrivacyPolicyContent"
                @isset($policy->privacy_policy) 
       value="{!! $policy->privacy_policy !!}">
        {!! $policy->privacy_policy !!}@endisset
              </textarea>
               <span class="text-danger error-text PrivacyPolicyContent_error"></span>
            </div>
            <div class="card-footer btns">
              <button type="submit" class="col-md-1 btn btn-block bg-gradient-success btn-sm">Save</button>
              <button type="button" class="col-md-2 btn btn-block btn-outline-secondary btn-sm">Cancel Editing</button>
               
            </div>
           </form>
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
<!-- <script src="{{ asset('assets/seller/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<script>
  $(function () {
   
    $('#summernote').summernote(

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

    }

      );

  });
</script>
<script>
$(document).ready( function () {
$("#rtrn").submit(function(stay){
    stay.preventDefault();
    /*var value = $("#submit").attr('value');*/
    var id = $("#id").val();
    var formdata = $(this).serialize();
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
          type: 'POST',
          url: "{{route('seller.content_management.update_content')}}",
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
    });
   });
});
</script>

@endsection