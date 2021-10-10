<div id="paymentProcessor" aria-labelledby="ui-id-29" role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="false" style="">
   
    <div class="row cWizStep8 cEventAddPaymentProcessor" style="margin-left: 10px;display:hidden;">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        
    </div>

     <form id="payment_method">
        <input type="hidden" name="id" id="id" @isset($event_data->event_payment)
        value="{{$event_data->event_payment->event_id}}"@endisset>
    <div class="card-body" style="width:100% !important">

      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="BankTransfer" @isset($event_data->event_payment->account_no)
            {{($event_data->event_payment->account_no != null ? 'checked' : '')}}@endisset>
        <label class="form-check-label">Bank Transfer</label>
      </div>


      <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label">Account holder Name</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="AccountHolderName" name="AccountHolderName"
           @isset($event_data->event_payment)
        value="{{$event_data->event_payment->holder_name}}"@endisset
          >
        </div>
      </div>
      <span class="text-danger error-text AccountHolderName_error"></span>

      <div class="form-group row">
        <label for="branch" class="col-sm-4 col-form-label">Account holding branch</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="AccountHoldingBranch" name="AccountHoldingBranch"
          @isset($event_data->event_payment)
        value="{{$event_data->event_payment->branch}}"@endisset>
        </div>
      </div>
      <span class="text-danger error-text AccountHoldingBranch_error"></span>
      <div class="form-group row">
        <label for="ac" class="col-sm-4 col-form-label">Account number</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="AccountNumber" name="AccountNumber"
          @isset($event_data->event_payment)
        value="{{$event_data->event_payment->account_no}}"@endisset>
        </div>
      </div>
      <span class="text-danger error-text AccountNumber_error"></span>

      <div class="form-group row">
        <label for="re_ac" class="col-sm-4 col-form-label">Re-enter account number</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="ReAccountNumber" name="Re-enterAccountNumber"
          @isset($event_data->event_payment)
        value="{{$event_data->event_payment->account_no}}"@endisset>
        </div>
      </div>
      <span class="text-danger error-text Re-enterAccountNumber_error"></span>

      <div class="form-group row">
        <label for="ifsc" class="col-sm-4 col-form-label">IFSC</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="IFSC" name="IFSC"
          @isset($event_data->event_payment)
        value="{{$event_data->event_payment->ifsc}}"@endisset>
        </div>
      </div>
      <span class="text-danger error-text IFSC_error"></span>

      <br>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="PayPal" @isset($event_data->event_payment->account_no)
            {{($event_data->event_payment->paypal_id != null ? 'checked' : '')}}@endisset>
        <label class="form-check-label">PayPal</label>
      </div>
      <div class="form-group row">
        <label for="paypal" class="col-sm-4 col-form-label">PayPal ID</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="PayPalId" name="PayPalId"
          @isset($event_data->event_payment)
        value="{{$event_data->event_payment->paypal_id}}"@endisset>
        </div>
      </div>
      <span class="text-danger error-text PayPalId_error"></span>

    </div>
    <div class="row step1-step3" style="padding-left:220px;">


      


<div class="row2" style="text-align:center;">
               <a data-toggle="pill" href="#custom-tabs-one-profile" class="btn btn-secondary prvbtn add_event_prev_button" style="width:221px;margin-left:20px;margin-top:10px;"><i class="fa-angle-double-left fa fa-15x"></i>&nbsp;&nbsp; <span>Step 5 Details</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a data-toggle="pill" href="#custom-tabs-one-settings" class="btn btn-secondary nxtbtn add_event_next_button" style="margin-top: 10px; width:218px"><span>Step 7 Promote</span> &nbsp;&nbsp;<i class="fa-angle-double-right fa fa-15x"></i></a>
              <br>
              <br>
              <button type="submit" class="btn btn-success  btn-sm svbtn" style="width: 120px;">Save Changes</button>

<a class="dltbtn btn btn-success  btn-sm" onclick="clear_form_elements('flyer-form');"   style="margin-left: 5px;">Delete</a>

            </div>


    </div>
  </form>
</div>
<br>
<br>
<br>