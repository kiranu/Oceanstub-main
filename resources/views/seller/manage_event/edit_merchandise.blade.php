@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')

<style>
.note-editor {
margin-left: 5px;
width: 90%;
}

hr{
border-top-color: gray;

}
.modal-header {
display: block;
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
            <div class="card-header"  style="background-color: #007bff;">
              <h3 class="card-title">Update Merchandise</h3>
            </div>

   <div class="p-6 bg-white border-b border-gray-200">
                <div class="px-3">
                @if ($errors->any())
                  <div class="px-4 py-2 bg-red-500">
                    <ul class="list-disc">
                    @foreach ($errors->all() as $error)
                      <li class="text-gray-900" style="width: 32%;
                      background: #df8d8d;
                      list-style: none;">{{ $error }}</li>
                    @endforeach
                    </ul>
                  </div>
                @endif
                </div>
              </div>


<div class="modulebody ui-widget-content ui-corner-bottom" style="padding-left: 30px;">


<form action="{{Route('seller.post_edit_merchandise')}}"  method="POST" enctype="multipart/form-data">
    @csrf
    
  
 <input type="hidden" name="id" value="{{$mer->id}}">
            <input type="hidden" id="cID" value="0">
            <input type="hidden" id="cPageId" value="0">
            <input type="hidden" id="cParentId" value="0">

            <div class="row2">
              <span class="" for="cType">Type:</span><br>

                <select id="cType" name="type" >

     <option {{$mer->type =='0'? 'selected':''}}  value="0" >Category</option>
     <option {{$mer->type =='1'? 'selected':''}}  value="1" >Merchandise or Service</option>
   
       <option {{ $mer->type == '2' ? 'selected' : '' }}  value="2" >Gift Card</option>
      

                    
                </select>
         
            </div><br>
    
            <div class="row2">
              <span class="editLabel" for="cName">Name:</span><br>
                <input type="text" name="name"  value="{{old('name', $mer->name)}}" id="cName" class="editText" style="width: 290px;" autocomplete="off" maxlength="200" required="required" data-validation-required="1" value="" data-validation-avoid-success-tick="1">
                
            </div><br>
            <div class="row2" style="">
              <span class="editLabel" for="cCode">Code:</span><br>

                <input type="text" id="cCode" name="code" value="{{old('code', $mer->code)}}" class="editText" style="width: 290px;"   >
                <br>
                
                <p class="hint"style="font-size:14px;">Barcode or the code of the merchandise.</p>
            </div>
            <div class="row2">
              <span class="editLabel" for="cMetaTag">Keywords:</span><br>
                <input type="text" name="keyword" id="cMetaTag" class="editText" style="width: 290px;"value="{{old('keyword', $mer->keyword)}}">
               
            </div><br>
            <div class="row2">
                <span class="cCheckboxV2">
                    <input type="checkbox" name="active" id="cEnabled" {{ $mer->active == "on" ? 'checked' : '' }} >
                    <span class="checkmark"></span>Active</span>
                <br>
                <span class="cCheckboxV2">
                    <input type="checkbox" name="featured" id="cFeatured" {{ $mer->featured == "on" ? 'checked' : '' }}>
                    <span class="checkmark"></span>Featured</span>
                <br>
                <span class="cCheckboxV2">
                    <input type="checkbox" name="soldout" id="cSoldOut" {{ $mer->sold_out == "on" ? 'checked' : '' }}>
                    <span class="checkmark"></span>Sold Out</span>
            </div><br>

            <div class="row2" >
              <span class="editLabel productOnly" for="cPrice" style="">Price:</span><br>

                <input type="number" name="price"  id="cPrice" class="editText price" style="width: 150px;" value="{{old('price', $mer->price)}}"">

                <!-- <span class="editLabel giftCardOnly" for="cPrice" style="display: none;">Gift card value:</span> -->

            </div><br>

            <div class="row2" style="">
              <span class="editLabel" for="cSalesPrice">Sale Price:</span><br>
                <input type="number" name="sale_price"  id="cSalesPrice" class="editText price" style="width: 150px;" value="{{old('sale_price', $mer->sale_price)}}">
                
               
                <p class="hint productOnly" style="font-size:14px;">If the item is on sale, enter the sale price.</p>
            </div>
            <div class="rows2">
              <span class="editLabel" for="cSortOrder">Sort Order:</span><br>
                <input type="number" name="sortorder" id="cSortOrder" class="editText price" style="width: 150px;" value="{{old('sortorder', $mer->sortorder)}}">
            
                <p class="hint"style="font-size:14px;">Items with higher sort order show first in the store</p>
            </div>
            <div class="row2" >
              <span for="cTax" class="editLabel">Tax %:</span><br>
                <input type="number" name="tax" id="cTax" class="editText price" style="width: 150px;" value="{{old('tax', $mer->tax)}}">
               
            </div><br>
            
            <div class="row2" style="display:none">
              <span for="cTax" class="editLabel">Event Organizer:
                :</span><br>
                <select id="cEventOrg" name="event_orginizer" class="editText" style="width:290px;">

                    <option {{ $mer->type == '$organizer_name->id' ? 'selected' : '' }} value="{{$organizer_name->id}}">{{$organizer_name->name}}</option>
                </select>
          
                <p class="hint"style="font-size:14px;">Will receive emails on sales and will have access to the sales reports</p>

               <!--  <p class="hint giftCardOnly" style="display: none;">If you set the event organizer to a user who is also an admin, the gift card can be used to purchase any event or merchandise on the site. However, if the event organizer is not ad admin, then the gift card can only be used for the events and merchandise for the same organizer. In this case make sure that it is clear in the gift card description that this gift card can only be used for certain events and merchandise.</p> -->

              </div>
         


            <div class="row2" id="cPrdDescriptionLabel"style="margin-left:10px">
              <span class="editLabel" > Description:</span><br>
             
            <textarea id="summernote"  name="description" 

            value="{!! $mer->description !!}">
              
            </textarea>
            </div>

            </div>
<?php
if($mer->filenames !=null){
$files = explode(',',$mer->filenames);

}else{
  $files=null;

}
?>


  <div class="rows2" style="margin-left:32px;">
<span class="editLabel" for="cSortOrder">Image</span><br>



<input  type="file" class="form-control col-md-6" id="file-input"  
@php
$temp='';
@endphp

  @if( $files!=null)
  @foreach($files as $info)
  @php $temp=$temp.','.$info @endphp 
  @endforeach 
  @endif
  value="{{$temp}}"
  name="images[]"

multiple="multiple" >
<span class="text-danger">{{ $errors->first('image') }}</span>
<div id="thumb-output">

  @if($files!=null)
  @foreach($files as $info)

  <img src="{{route('seller.displayflyer',$info)}}">
  @endforeach
  @endif

</div>       
<p class="hint"style="font-size:14px;">select at a time Multiple images ..</p>
</div>


            <div class="row2" style="text-align:center;">
            
            <button type="submit" class="btn btn-success  btn-sm" >Save Changes</button>
 
            </div>
            </form>
        
</div>
<br>
<br>


      </div>
        
         @include('layouts.seller_footer')
     
      </div>
@endsection
@section('bottom_scripts')
<script type="text/javascript">
  $(document).ready(function() {

         var value = $("#summernote").attr('value');
      $('#summernote').summernote('code',value);
    

  });
</script>
<script>
 
$(document).ready(function(){
 $('#file-input').on('change', function(){ //on file input change
    if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    {
         
        var data = $(this)[0].files; //this file data
         
        $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                var fRead = new FileReader(); //new filereader
                fRead.onload = (function(file){ //trigger function on successful read
                return function(e) {
                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                    $('#thumb-output').append(img); //append image to output element
                };
                })(file);
                fRead.readAsDataURL(file); //URL representing the file's data.
            }
        });
         
    }else{
        alert("Your browser doesn't support File API!"); //if File API is absent
    }
 });
});
 
</script>

@endsection