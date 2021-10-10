@extends('home.layouts.home_master')

@section('content')
        <style>
            .sign_up1{
            width: 100%;
            height: auto;
            padding: 12px;
            border: 1px solid #e89923;
            margin-top: 40px;
            margin-bottom: 40px;}
        </style>
        <div class="container">
            <div class="sign_up1">
                <div class="SignUpmodule">
                    <div class="modulebody ui-widget-content1 ui-corner-bottom">


                        <div class="formContainer clearfix" style="background-color:#fffad5e8">
                            <div class="clearfix" style="    margin-left: 50px; ">
                                <h2 style="font-size:22px">Sign Up To Sell Tickets: <span style="font-size:15px;"> (Step 1 of 2)</span></h2>
                            </div>
                            <p  style="margin-left: 50px;    margin-bottom: 50px;"><br><br>The sign up is for the users who want to sell tickets. If you want to buy tickets, click <a href="" aria-label="Click here if you want to buy tickets">here</a></p>
                            <h3 style="margin-left: 4%;     font-size: 20px;">Your Information</h3>

                                <form method="POST" action="{{route('seller_registrion_save')}}">
                                    @csrf

                            <div class="clearfix">
                                @if($errors->all())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="formCol clearfix" style="margin-left: 8%;">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="" value="{{old('email')}}" style="width: 60%;">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="" style="width: 60%;">
                                        <p id="cPasswordDesc2" class="hint" style="font-size: 12px;">Choose a strong password. Minimum 5 characters</p>
                                    </div>


                                    <div class="form-group" >
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" placeholder="" name="password_confirmation" style="width: 60%;">
                                            <p id="cPasswordDesc2" class="hint" style="font-size: 12px;">Confirm Passwordpassword. Minimum 5 characters</p>
                                        </div>
                                            @php
                                               use App\Models\Country;
                                                $codes=Country::country_code();
                                        @endphp
                                        <div class="form-group" >
                                            <label>Country:</label>
                                            <select class="form-control select2" style="width: 60%;" name="country_code">
                                                @foreach ($codes as $code )
                                                <option data-countryCode="{{$code->iso3}}" value="{{$code->phonecode}}">{{$code->nicename}} (+{{$code->phonecode}})</option>
                                                @endforeach
                                          </select>
                                        </div>
                                 
                                </div>
                                <div class="formCol clearfix">

                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Business Name</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1" value="{{old('business_name')}}" name="business_name" placeholder="" style="width: 60%;">
                                    </div>

                                   
                                    <div class="row cSelectV2" >
                                           <div class="form-group">
                                        <label for="exampleInputPassword1">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleInputPassword1" placeholder="" value="{{old('first_name')}}" style="width: 60%;">
                                        <p id="cPasswordDesc2" class="hint" style="font-size: 12px;">not shown to visitors</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="exampleInputPassword1" placeholder="" value="{{old('last_name')}}" style="width: 60%;">
                                        <p id="cPasswordDesc2" class="hint" style="font-size: 12px;">not shown to visitors</p>
                                    </div>
                                     <div class="form-group " >
                                        <label for="exampleInputPassword1">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobile" maxlength="10" id="exampleInputPassword1" placeholder="" value="{{old('mobile')}}" style="width: 60%;">
                                        <p id="cPasswordDesc2" class="hint" style="font-size: 12px;">not shown to visitors</p>
                                    </div>
                                    
                                    
                                    </div>
                              
                                </div>
                            </div>
                            {{-- <h3 style="margin-left: 4%; margin-top: 2%; font-size: 20px;">About You</h3>
                            <div class="form-group" style="margin-left: 8%;">
                                <label>Which one best describes you?</label>
                                <select class="form-control select2" style="width: 30%;">
                                    <option value=""></option>
                                    <option value="Venue manager or owner">Venue manager or owner</option>
                                    <option value="Professional event organizer with several events">Professional event organizer with several events</option>
                                    <option value="Organizing events occasionally">Organizing events occasionally</option>
                                    <option value="Organizing a one-time event">Organizing a one-time event</option>
                                    <option value="School or university">School or university</option>
                                    <option value="Performing art institute">Performing art institute / class</option>
                                    <option value="Conference / training">Conference / training</option>
                                    <option value="Charity or non-profit">Charity or non-profit</option>
                                    <option value="Festival planner">Festival planner</option>
                                    <option value="Tour or activity">Tour or activity</option>
                                    <option value="Amusement park, museum">Amusement park, museum, ...</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="clearfix" style="margin-left: 8%;">
                                <div class="form-group">
                                    <label>EXPECTED ANNUAL SALES VALUE?</label>
                                    <select class="form-control select2" style="width: 30%;">
                                        <option value=""></option>
                                        <option value="less than 10,000">less than 10,000</option>
                                        <option value="10,000 to 100,000">10,000 to 100,000</option>
                                        <option value="100,000 to 1,000,000">100,000 to 1,000,000</option>
                                        <option value="Over 1,000,000">Over 1,000,000</option>
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <h3 style="margin-left: 4%;margin-top: 2%;     font-size: 20px;">URL (Address)</h3>
                            <div class="clearfix">
                                <div class="row" style="margin-left: 8%;">
                                    <p id="cFolderNameDesc1">Choose an easy-to-remember and announce address, which represents your business, to sell your tickets on. All your events will get listed at this address.</p>
                                </div> --}}
                                {{-- <div class="optionContainer1"style="margin-left: 8%;">
                                    <div class="row cFolderName domain ">
                                        <label for="cFolderName" class="moreIndent" style="display:inline;">https://www.Oceanstub.com /</label>
                                        <input type="text" name="url" value="{{old('url')}}" id="cFolderName" maxlength="60" data-validation-custom="domainValidation" placeholder="YourBusinessName" required="required" aria-required="true" style="margin-bottom:15px;margin-top:10px;    width: 30%;" aria-label="" aria-describedby="cValMsg255865 cFolderNameDesc1 cFolderNameDesc2,cFolderNameDesc3" class="error" aria-invalid="true">
                                        <span id="cFolderNameDesc2" style="font-size: 12px;">&nbsp;&nbsp;&nbsp; * One word only</span>
                                    </div>
                                    <div class="row domain1" style="margin-left: 1%;">
                                        <p class="hint" id="cFolderNameDesc3">* You can move it to your own domain or sub-domain later (requires Premium plan)</p>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            <div class="row agreement" id="agreementLabel" style="margin-left: 8%;">
                                <p><label class="cCheckboxV2 error"><input aria-labelledby="agreementLabel" name="agree" type="checkbox" data-validation-required="1" required="required" aria-required="true" aria-describedby="cValMsg922420 " class="error" aria-invalid="true"> I admit that I am over 18 year old</label> and I have read, understood, and agree to <a href="" target="_blank">Ticketor's Terms of Service</a>, <a href="" target="_blank">Oceanstub Privacy Policy</a> and <a href="" target="_blank">Oceanstub Cookies Policy</a>.  </p>
                            </div>
                            <div class="buttons clearfix">
                                <button type="submit" class="btn btn-warning" style=" margin-left: ;">  I Agree to Terms & Continue <i style='font-size:12px' class='fas'>&#xf101;</i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       @endsection
