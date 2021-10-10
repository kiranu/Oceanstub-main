@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
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
            <div class="card-header"style="background-color: #007bff;">
              <h3 class="card-title">New Price Level</h3>
            </div>
            @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- /.card-header -->
 <!-- form start----------------------------------------------------------------------------------- -->
             <br>
        <!--    <form action="/seller/new_price_level" method="POST">
            @csrf -->
            <form id="price-level-form">
             <div class="row1"style="padding-left:30px;">
                <span for="cSectionName1">Name:</span><br>
                <input type="text" id="name" name="name" maxlength="50">
              

                <p class="hint priceLevelView"style="font-size:14px;">Ex: Student Tickets, Senior Tickets, Early bird, ...</p>
            </div>
            <div class="row2"style="padding-left:30px;">
                <span for="cDescription">Description:</span><br>
                <input type="text" id="Description" name="description" class="wide" maxlength="300"><br>
                <p class="hint sectionView"style="font-size:14px;">Optional - Ex: Free valet parking</p>
            </div>
            <div class="row2"style="padding-left:30px;">
                <span for="cSellPrice1">Face Price: $ </span><br>

                <input type="number" 
                step="0.01" 
                id="face-price"
                 name="face_price" 
                 class="small cFacePrice error" 
                 maxlength="10" 
                 data-validation-required="1" 
                 data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" 
                 data-validation-number="float" 
                 data-validation-number-min="0" 
                 min="0" 
                 aria-describedby="cValMsg991180 "
                 aria-invalid="true">

                <span class="errorMsg" id="cValMsg991180"></span>
                <p class="hint"style="font-size:14px;">Tickets face price (Ex: 55.00)</p>
            </div>
            <div class="row2"style="padding-left:30px;">
                <span for="cServiceCharge1">Service Charge:</span><br>
                <select id="ServiceChargeType" name="prefix_sc" class="cServiceChargeType" style="width:60px;">

                    <option value="$">$</option>
                    <option value="%">%</option>
                </select>
        <input type="number" step="0.01" id="ServiceCharge" name="service_charge" class="small cServiceCharge valid" maxlength="10" data-validation-required="1" data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" 

        value="" data-validation-number="float" data-validation-number-min="0" 

        min="0" aria-describedby="cValMsg117078 ">


            <span class="errorMsg" id="cValMsg117078"></span>
                <a href="javascript:void(0)" class="cCostCalculator">Cost Calculator</a>
                <p class="hint"style="font-size:14px;">Amount you want to collect for this type of ticket as service charge.<br>
            The service charge that you charge the buyer, is not related to the percentage that Ticketor charges you. You can charge as much or as less as you want.</p>
            </div>
            
            <div class="row2 cCapacityRow sectionView"style="padding-left:30px;">
                <span for="cCapacity">Capacity:</span><br>

               <input type="number" id="Capacity"  name="capacity" class="small cCapacity error" maxlength="5" data-validation-required="1" data-validation-regex="^\d{1,5}$" value="" data-validation-number="int" data-validation-number-min="0" min="0" max="99999" aria-describedby="cValMsg994874 " aria-invalid="true">

               <span class="errorMsg" id="cValMsg994874"></span>
                <p class="hint"style="font-size:14px;">Maximum number of tickets to sell at this price.</p>
            </div><br>
            
            <h2 style="color:#007bff;padding-left: 30px;" class="ColTextHighlight">Additional details: (Optional)<hr></h2>
            <div class="row2"style="padding-left:30px;">
                <span for="cSortOrder1">Sort Order:</span><br>

                <select id="SortOrder" name="sort_order" style="width:60px;">
                    <option ></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option></select>
                <p class="hint"style="font-size:14px;">Determines the order in which prices are shown on the sales page. Smaller orders show first. If sort orders are the same, then they get sorted by price.</p>
            </div>
            <div class="row2"style="padding-left:30px;">
                <span for="cPricePassword">Password:</span><br>

                <input type="password" id="PricePassword" name="price_password" maxlength="50">
                <p class="hint"style="font-size:14px;">If you want this price to only be available to certain people, you can protect it with a password. Multiple passwords can be separated by comma.</p>
            </div>
            
            <div class="row2 cHideWizard"style="padding-left:30px;">
                <span for="cBuyPrice1">Buy Price:</span><br>

                <select id="BuyPrice1Type"  name="prefix_bp" class="cBuyPriceType" style="width:60px;">
                  
                    <option value="$">$</option>
                    <option  value="%">%</option>
                </select>

                <input type="number" step="0.01" id="BuyPrice1" name="buy_price" class="small cBuyPrice valid" maxlength="10" min="" data-validation-required="1" data-validation-regex="^[0-9]*(\.[0-9]{1,2})?$" data-validation-custom="priceValidation" value="" data-validation-number="float" data-validation-number-min="0" min="0" aria-describedby="cValMsg985565 ">

                <span class="errorMsg" id="cValMsg985565"></span>
            
                <p class="hint"style="font-size:14px;">If you are re-selling tickets on behalf of somebody else, enter your purchase price</p>
            </div>
            

            <div class="row2"style="padding-left:30px;">
                <span for="cStart1">Start sale at:</span><br>

                <select id="Start" name="start_sale" class="medium">
                    <option ></option>
                    <option value="0">When the event sale starts</option>
                    <option value="1">Exactly at:</option>
                </select>

               <!--  <input type="text" id="cStart1Date" class="cDatePicker cStartDate hasDatepicker" value="22-03-2021" style="display: none;">
                <input type="text" id="cStart1Time" class="cTimePicker cStartDate hasTimepicker" value="11:30 AM" maxlength="10" style="display: none;"> -->
            </div>
            <br>
            <div class="row2"style="padding-left:30px;">
                <span for="cEnd1">End sale at:</span><br>
                <select id="End" name="end_sale" class="medium">
                    <option > </option>
                    <option value="0">When the event sale ends</option>
                    <option value="1">Exactly at:</option>
                </select>

              <!--   <input type="text" id="cEnd1Date" class="cDatePicker cEndDate hasDatepicker" value="24-03-2021" style="display: none;">
                <input type="text" id="cEnd1Time" class="cTimePicker cEndDate hasTimepicker" value="09:30 AM" maxlength="10" style="display: none;"> -->
            </div>
            <br>

            <div class="row"style="padding-left:40px;">
                <span>By default, users can purchase any number of tickets. Use section below to limit that. You can set minimum, maximum and increments. You can use this feature to create group tickets or to force buyers to purchase in pairs or triples.</span>
            </div>
            <br>

            <div class="row2"style="padding-left:30px;">
                <span for="cMin" style="width:270px;">Minimum ticket per transaction:</span><br>

                <input type="number" id="Min" name="min_trans" class="small cMin valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="" min="1" max="99" aria-describedby="cValMsg456194 ">

                <span class="errorMsg" id="cValMsg456194"></span>
                <p class="hint"style="font-size:14px;">Minimum number of tickets allowed to be purchased at this price (default = 1)</p>
            </div>
            <div class="row2"style="padding-left:30px;">
                <span for="cMax" style="width:270px;">Maximum ticket per transaction:</span><br>

                <input type="number" id="Max" name="max_trans" class="small cMax valid" maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="" min="1" max="99" aria-describedby="cValMsg791711 ">

                <span class="errorMsg" id="cValMsg791711"></span>
                <p class="hint"style="font-size:14px;">Maximum number of tickets allowed to be purchased at this price per transaction<br>
         Not enforced for administrators and sales agents.</p>
            </div>


            <div class="row2"style="padding-left:30px;">
                <span for="cIncrement" style="width:270px;">Tickets available in increments of:</span><br>

                <input type="number"
                 id="Increment" 
                 name="increment" 
                 class="small cIncrement valid" 
                 maxlength="2" data-validation-required="1" data-validation-number="Int" data-validation-number-max="99" data-validation-number-min="1" value="" min="1" max="99" aria-describedby="cValMsg143756 ">

                <span class="errorMsg" id="cValMsg143756"></span>
                <p class="hint"style="font-size:14px;">Example: if minimum is set to 4, maximum is set to 10 and increment is set to 2, then buyer can purchase 4, 6, 8 or 10 tickets</p>
            </div>
        </div>
        <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"style="padding-left:780px ;">
            <div class="ui-dialog-buttonset">
                <button type="submit" class="btn btn-secondary">Add Price Level</button> 
                <br>
                 <button type="button" class="btn btn-secondary">Cancel</button>
             </div>
         </div>
         <br>
     </div>

</form>

     <div tabindex="-1" role="dialog" class="ui-dialog ui-corner-all ui-widget ui-widget-content ui-front ui-draggable ui-resizable" aria-describedby="costCalculator" style="display: none; position: absolute;" aria-labelledby="ui-id-29">
        <div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle">
            <span id="ui-id-29" class="ui-dialog-title">Cost Calculator:</span>
            <button type="button" class="ui-button ui-corner-all ui-widget ui-button-icon-only ui-dialog-titlebar-close" title="Close">
                <span class="ui-button-icon ui-icon ui-icon-closethick"></span>
                <span class="ui-button-icon-space"> </span>Close</button>
            </div>

            <div id="costCalculator" class="ui-dialog-content ui-widget-content">
    <h3>Cost Calculator:</h3>
    <div class="row2"style="padding-left:30px;">
        <span >Ticket Face Price: $
            <input type="number" step="0.01" id="cFacePrice" value="10.00" maxlength="7" data-validation-required="1" data-validation-number="float" data-validation-number-min="0" data-validation-avoid-success-tick="1">
        </span>
    </div>
    <br>
  </div>




      </div>
         <!-- footer -->
      <!--    @include('layouts.seller_footer') -->
      <!-- /footer -->
      </div>
@endsection
@section('bottom_scripts')
<script>
     $(document).ready(function(){
      $("#price-level-form").submit(function(stay){
         stay.preventDefault(); 
           var formdata = $(this).serialize();
            $.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                         type: 'POST',
                         url:'/seller/new_price_level',
                         data: formdata,    
                        success: function (data)
                        {
                           console.log("success");
                           console.log(data);
                           top.location.href="/seller/add_event";
                           $('.nav-tabs a[href="#custom-tabs-one-settings"]').tab('show');
                         
                        },
                        error: function(data){
                            console.log("error");
                            console.log(data);
                        }
                      
                    });           
            
      });
     
  });
</script>
@endsection