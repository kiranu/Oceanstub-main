@extends('home.layouts.home_master')

@section('content')
        <div class="profile-container">
        <div class="header" style="background-image: url('//in.bmscdn.com/webin/profile/user-profile.png');">
            <div class="profile-wrapper">
                <div class="header-container">
                    <div class="desc">
                        <div class="user-details">
                            <div id="profile-image-container" class="__gravatar">
                                <div class="bottom-overlay-container">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 230 230" fill="none" style="    margin-top: 15px; margin-left: 30px;">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M156.25 83.3337C156.25 94.3844 151.86 104.982 144.046 112.796C136.232 120.61 125.634 125 114.583 125C103.532 125 92.9344 120.61 85.1204 112.796C77.3064 104.982 72.9165 94.3844 72.9165 83.3337C72.9165 72.283 77.3064 61.6849 85.1204 53.8709C92.9344 46.0569 103.532 41.667 114.583 41.667C125.634 41.667 136.232 46.0569 144.046 53.8709C151.86 61.6849 156.25 72.283 156.25 83.3337V83.3337ZM135.417 83.3337C135.417 88.859 133.222 94.158 129.315 98.0651C125.408 101.972 120.109 104.167 114.583 104.167C109.058 104.167 103.759 101.972 99.8518 98.0651C95.9448 94.158 93.7498 88.859 93.7498 83.3337C93.7498 77.8083 95.9448 72.5093 99.8518 68.6023C103.759 64.6953 109.058 62.5003 114.583 62.5003C120.109 62.5003 125.408 64.6953 129.315 68.6023C133.222 72.5093 135.417 77.8083 135.417 83.3337V83.3337Z" fill="white"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M114.583 0C51.3021 0 0 51.3021 0 114.583C0 177.865 51.3021 229.167 114.583 229.167C177.865 229.167 229.167 177.865 229.167 114.583C229.167 51.3021 177.865 0 114.583 0ZM20.8333 114.583C20.8333 136.354 28.2604 156.396 40.7083 172.312C49.4503 160.832 60.7281 151.529 73.6608 145.128C86.5934 138.728 100.831 135.404 115.26 135.417C129.503 135.403 143.562 138.641 156.364 144.883C169.166 151.125 180.375 160.208 189.135 171.437C198.161 159.6 204.238 145.783 206.863 131.131C209.489 116.479 208.588 101.412 204.234 87.1769C199.881 72.942 192.2 59.9484 181.828 49.2712C171.456 38.594 158.69 30.5402 144.587 25.7761C130.485 21.0121 115.45 19.6747 100.728 21.8747C86.0054 24.0747 72.0187 29.7489 59.9247 38.4276C47.8307 47.1064 37.9772 58.5403 31.1795 71.7833C24.3817 85.0262 20.8352 99.6976 20.8333 114.583V114.583ZM114.583 208.333C93.062 208.366 72.1903 200.962 55.5 187.375C62.218 177.758 71.1598 169.905 81.5645 164.486C91.9692 159.067 103.529 156.242 115.26 156.25C126.845 156.241 138.265 158.996 148.572 164.286C158.879 169.576 167.775 177.248 174.521 186.667C157.701 200.695 136.485 208.364 114.583 208.333V208.333Z" fill="white"/>
                                    </svg> --}}
                                    {{-- <span class="profile-name">Hi, <span id="profileNameId">{{Auth::user()->name}}</span></span>
                                    <div class="bottom-overlay">
                                        <div id="upload-image-text">Upload Photo</div>
                                    </div> --}}
                                </div>
                                {{-- <span class="icon-fb" data-role="social-icons" data-id="FB" style="display: none;">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                        <use xlink:href="/icons/common-icons.svg#icon-facebook-modal"></use>
                                    </svg>
                                </span>
                                <span class="icon-gplus" data-role="social-icons" data-id="PLUS" style="display: block;">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                        <use xlink:href="/icons/common-icons.svg#icon-googleplus-modal"></use>
                                    </svg>
                                </span>
                                <span class="icon-my" data-role="social-icons" data-id="EMAIL" style="display: none;">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                        <use xlink:href="/icons/common-icons.svg#icon-my"></use>
                                    </svg>
                                </span> --}}
                            </div>
                            {{-- <div class="text">
                                <h1 class="__name" id="uName"></h1>
                                <p class="__number" id="uMobile"></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="pr-social-links">
                    <a id="aFbLink" style="cursor: pointer;" href="javascript:" onclick="profile.fnConnectSocial('FB'); return false;">
                        <div class="auth-method icon-facebook">
                            <div class="auth-method-title _facebook">
                                <span class="icon-auth-method _facebook">
                                    <span class="icon ">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                            <use xlink:href="/icons/common-icons.svg#icon-facebook-modal"></use>
                                        </svg>
                                    </span>
                                </span>
                                FACEBOOK
                            </div>
                        </div>
                    </a>
                    <a id="aGplusLink" style="cursor: pointer; display: none;" href="javascript:" onclick="profile.fnConnectSocial('PLUS'); return false;">
                        <div class="auth-method icon-googleplus">
                            <div class="auth-method-title _gplus">
                                <span class="icon-auth-method _gplus">
                                    <span class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18 18" width="18px" height="18px" enable-background="new 0 0 100 100" xml:space="preserve">
                                            <use xlink:href="/icons/common-icons.svg#icon-googleplus-modal"></use>
                                        </svg>
                                    </span>
                                </span>
                                Sign in with Google
                            </div>
                        </div>
                    </a>
                    <!-- <a id="deact_btn" href="javascript:void(0);" class="btn _uno" onclick="BMS.Misc.modal('deactivate-account', true);">DEACTIVATE ACCOUNT</a> -->
                </div> --}}
            </div>
        </div>
        <!-- start of tabs container -->
        <div class="wrapper">
            <div class="profile-tabs">
                <div class="container">
                    <div class="qb-loader-wrapper">
                        <div class="qb-loader"></span></div>
                    </div>
                    <div class="tabs-container">
                        <ul class="tabs" id="editTabs">
                            <li id="editProfile" class="_active" >Edit Profile</li>
                        </ul>
                    </div>
                    <!-- Edit Mobile OTP section
                        <div class="fields" id="dOtpSec" data-role="tabData" style="display: none;">
                            <p class="__varify-text">You are about to change your phone number. Verify OTP to confirm</p>
                            <section class="section">
                                <div class="input-container">
                                    <input type="tel" placeholder="Mobile">
                                    <span onclick="wallet.fnEditDetails('fName');" class="edit">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                            <use xlink:href="/icons/user-profile-icons.svg#icon-edit"></use>
                                        </svg>
                                    </span>
                                </div>
                                <div class="input-container">
                                    <input id="txtOtp" type="tel" placeholder="Enter OTP" maxlength="6">
                                </div>
                                <div class="input-container" style="display: none;">
                                    <p class="__error-text" style="display: block;">Haven’t received the OTP yet? <a href="javascript:settings.fnResendOtp();">Resend</a></p>
                                </div>
                                <div style="display: none;" class="form-messages _error" id="dUpMobProfErrDiv">
                                      <p class="__text">Please enter a valid mobile number</p>
                                </div>
                                <div class="input-container verify">
                                    <a href="javascript:;" onclick="settings.fnUpdateMobile();" class="btn _cuatro">Verify</a>
                                </div>
                                <div class="input-container cancel">
                                    <a href="" class="btn">Cancel</a>
                                </div>
                            </section>
                        </div>-->
                    <div class="fields" id="edit" data-id="editProfile" data-role="tabData" style="display: block;">
                    <form action="{{route('update_buyer_profile')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <section class="section _first-details ">
                                    <div class="form-group col-md-5" style="margin-top: 4%; font-size: 12px;display: inline-block;">
                                        <label for="exampleInputEmail1">First Name</label>
                                        <input type="text" class="form-control " id="exampleInputEmail1" placeholder="" name="first_name" value="{{$buyer->first_name}}" >
                                    </div>
                                    <div class="form-group col-md-5" style="margin-top: 4%;font-size: 12px;display: inline-block;">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control " id="exampleInputEmail1" placeholder="" name="last_name" value="{{$buyer->last_name}}">
                                    </div>
                                    <br>
                                    <div class="form-group col-md-5" style="margin-top:4%;font-size: 12px;display: inline-block">
                                        <label for="exampleInputEmail1">Email Address</label>
                                        <input type="email" class="form-control " id="exampleInputEmail1" placeholder="{{Auth::user()->email}}" readonly >
                                    </div>
                                    <div class="form-group col-md-5" style="margin-top:4%;font-size:12px;display: inline-block">
                                        <label for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" class="form-control " id="exampleInputEmail1" name="phone" value="{{$buyer->phone}}" placeholder="" >
                                    </div>
                                    <div class="form-group col-md-5" style="margin-top:4%;font-size:12px;display: inline-block">
                                        <label for="exampleInputEmail1">Birthday</label>
                                        <input type="date" class="form-control " id="exampleInputEmail1" name="dob" value="{{$buyer->dob}}" placeholder="" >
                                    </div>
                                </section>
                                <br>
                                <section class="section">
                                    <div class="input-container" style="margin-top: 20px;">
                                        <h6>Gender?</h6>
                                        <div class="form-check col-md-3" style="display:inline-block;">
                                            <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" {{ $buyer->gender == "Male"? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault1"style="font-size: 12px;">
                                            Male
                                            </label>
                                        </div>
                                        <div class="form-check col-md-3" style="display:inline-block;">
                                            <input class="form-check-input" type="radio"  name="gender" value="Female" id="flexRadioDefault1" {{ $buyer->gender == "Female"? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault2"style="font-size: 12px;">
                                            Female
                                            </label>
                                        </div>

                                </div>

                                </section>
                                <br>
                                <section class="section">
                                    <div class="input-container" style="margin-top: 30px;">
                                        <h6>Married?</h6>
                                        <div class="form-check col-md-3" style="display:inline-block;">
                                            <input type="radio" name="married" id="NLSUBY" value="Yes" {{ $buyer->married == "Yes"? 'checked' : '' }} >
                                            <label for="NLSUBY">Yes</label>
                                        </div>
                                        <div class="form-check col-md-3" style="display:inline-block;">
                                            <input type="radio" name="married"  id="NLSUBN" value="No" {{ $buyer->married == "No"? 'checked' : '' }}>
                                            <label for="NLSUBN">No</label>
                                        </div>
                                    <div class="col-md-10">
                                        <section class="section _first-details ">
                                        <div class="form-group col-md-5" style="margin-top:4%;font-size:12px;display: inline-block">
                                            {{-- <label for="exampleInputEmail1">Date</label> --}}
                                            <input type="date" class="form-control " id="exampleInputEmail1" name="marriage_date" value="{{$buyer->marriage_date}}" placeholder="" >
                                        <span class="_left">It’s my anniversary!</span>

                                        </div>
                                    </div>
                                    </section>
                                    <br>

                                    </div>
                                </section>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <br><br>
                        <section id="address-section" class="section">
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-md-2 col-form-label">Address Line 1</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="" name="address" value="{{$buyer->address}}"  >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label f class="col-md-2 col-form-label">Address </label>
                                <div class="col-md-3" style="display:block;">
                                    <input  type="text" class="form-control" id="" name="street_name" placeholder="Street Name" value="{{$buyer->street_name}}">
                                </div>
                                <div class="col-md-3" style="display:block;">
                                    <input type="text" class="form-control" id="" name="city" placeholder="City" value="{{$buyer->city}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-3" style="display:block;">
                                    <input type="text" class="form-control" id="" name="state" placeholder="State" value="{{$buyer->state}}">
                                </div>
                                <div class="col-md-3"style="display:block;" >
                                    <input type="text" class="form-control" id="" name="pincode" placeholder="Zip Code" value="{{$buyer->pincode}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-3" style="display:block;">
                                    @php
                                    use App\Models\Country;
                                     $codes=Country::country_code();
                                    @endphp
                                    <select class="form-control select2"  name="country_id" placeholder="Country">
                                        <option>Select Country</option>
                                        @foreach ($codes as $code )
                                        <option data-countryCode="{{$code->iso3}}" value="{{$code->name}}"{{ $buyer->country_id == "$code->name"? 'selected' : '' }}>{{$code->nicename}}</option>
                                        @endforeach
                                  </select>
                                 </div>

                            </div>
                        </section>
                        <section class="section _get-alert">
                            <div class="input-container">
                                <input type="checkbox" id="chkMobAlert" name="alerts" {{ $buyer->alerts == "on"? 'checked' : '' }}>
                                <label for="chkMobAlert">
                                    <span class="__tick">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                            <use xlink:href="/icons/payments-icons.svg#icon-tick"></use>
                                        </svg>
                                    </span>
                                    Get Alerts on mobile for new movies and events.
                                </label>
                            </div>
                        </section>
                        <section class="section">
                            <div class="input-container">
                                <button type="submit" class="btn btn-success" style="font-size: 14px; width: 30%;margin: 0 auto;margin-left: 214px;" >Update</button>
                            </div>
                        </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--    <div class="privacy-policy-footer" style="font-size: 11px;margin: 16px;">
            <h5>Privacy Note</h5>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500,<a href="#">Privacy Policy</a> cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</a> </p>
            </div> -->
     @endsection
