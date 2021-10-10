@extends('home.layouts.home_master')

@section('content')
		<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content mt-145">
					<div class="modal-header sign-modal-header-border-bottom">
						<h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">LOGIN </h5>
						</button>
					</div>
					<div class="modal-body modal-bodybt">
						<ul class="signorlooginoption">
							<li><button type="button" class="btn btn-warning btn-lg loginasbuyerpopupshow">
								Login as Buyer
								</button>
							</li>
							<li><a href="{{route('seller.login')}}" type="button" class="btn btn-warning btn-lg loginassellershow signorlooginoptionbtn">
								Login as Seller
                            </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="loginasseller" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content mt-145">
					<div class="modal-header sign-modal-header-border-bottom">
						<h5 class="modal-title  sign-modal-header-content" id="exampleModalLongTitle">LOGIN </h5>
					</div>
					<div class="modal-body modal-bodybt">
						<form>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-md-offset-1 s-right">
										<label for="recipient-name" class="col-form-label">Email id:</label>
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" id="recipient-name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 s-center">
										<a type="button" href="{{route('seller.login')}}" class="btn btn-warning btn-lg loginasbuyersave signorlooginoptionbtn">Login as Seller
                                        </a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="signupasbuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content mt-145">
					<div class="modal-header sign-modal-header-border-bottom">
						<h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">Signup as buyer</h5>
						</button>
					</div>
					<div class="modal-body modal-bodybt">
						<form>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-md-offset-1 s-right">
										<label for="recipient-name" class="col-form-label">Phone Number:</label>
									</div>
									<div class="col-md-6">
										<input type="number" class="form-control" id="recipient-name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-md-offset-1 s-right">
										<label for="recipient-name" class="col-form-label">Password :</label>
									</div>
									<div class="col-md-6">
										<input type="Password" class="form-control" id="recipient-name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-md-offset-1 s-right">
										<label for="recipient-name" class="col-form-label">OTP Number :</label>
									</div>
									<div class="col-md-6">
										<input type="text" class="form-control" id="recipient-name">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12 s-center">
										<button type="button" class="btn btn-warning btn-lg signasbuyersave signorlooginoptionbtn">SignUp as Buyer
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="loginasbuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content mt-145">
                    <div class="modal-header sign-modal-header-border-bottom">
                        <h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">LOGIN </h5>
                        </button>
                    </div>
                    <div class="modal-body modal-bodybt">
                        <form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1 s-right">
                                        <label for="recipient-name" class="col-form-label">Email:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1 s-right">
                                        <label for="recipient-name" class="col-form-label">Password :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="Password" class="form-control" id="recipient-name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 s-center">
                                        <button type="button" class="btn btn-warning btn-lg loginasbuyersave signorlooginoptionbtn">Login as Buyer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<section class="content-features container plancontainerspecificborder mt-25 mb-25">
			<div class="featuresModule">
				<div class="modulebody ui-widget-content1 ui-corner-bottom">
					<div class="formContainer clearfix plans-specic-background mt-20 mb-20 pl-25">
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12" style="margin: 0 auto;">
                                        <!-- Default box -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Pricing <a href="#" aria-label="Select country and language" class="selectedCountry"> (INR)</a>
                                                    <a style="float:right;" href="javascript:void(0)" class="helpMeChooseBtn">Help Me Choose The Plan</a>
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:34%"></th>
                                                            @foreach ($plans as $plan )

                                                            <th style="width:33%">
                                                                <div class="header" style="margin-bottom: 45px;">
                                                                    {{-- <p class="bestValue">No Monthly Fee</p> --}}
                                                                    <h4 class="txt-algn">{{$plan->name}}</h4>
                                                                    <span style="margin-left: 120px;" class="txt-algn price">₹{{$plan->price}}</span>
                                                                    <span  class="txt-algn perMonth">For {{$plan->validity}}Days</span>
                                                                    <div style="margin-left: 95px;" class="txt-algn oldPrice"></div>
                                                                </div>
                                                            </th>
                                                            @endforeach
                                                            {{-- <th style="width:33%">
                                                                <div class="header">
                                                                    <p class="bestValue">Most Popular</p>
                                                                    <h4 class="txt-algn">Premium</h4>
                                                                    <span style="margin-left:145px;" class="cPayAnnual">
                                                                    <span class="price">₹1,000.00</span>
                                                                    </span>
                                                                    <span style="margin-left:111px;" class="cPayMonthly" style="display: none;">
                                                                    <span class="price">₹1,200.00</span>
                                                                    </span>
                                                                    <span class="perMonth">/month</span>
                                                                    <div style="margin-left:100px;" class="cPricePayAnnualContainer">
                                                                        <label class="cCheckboxV2"><input type="checkbox" checked="checked" class="cPricePayAnnual"><span class="checkmark"></span>Pay Annually</label>
                                                                    </div>
                                                                </div>
                                                            </th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($details as $detail )

                                                        <tr>
                                                            <td class="txt-algn">{{$detail->name}}</td>
                                                            <td class="txt-algn">{{$detail->Basic}}</td>
                                                            <td class="txt-algn">{{$detail->Premium}}</td>
                                                        </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <div class="paymentNotes" style="padding-top:20px; line-height:170%;padding-left: 20px;">
                                                    <h4 class="important">Notes:</h4>
                                                    <h4 class="important">Lorem Ipsum Term Contract - You can cancel your account at any time</h4>
                                                    <h4 class="important">Lorem Ipsumbetween plans at any time</h4>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'</p>
                                                </div>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
					<!-- <div class="row ">
						<label>Plan:</label>
						<select id="cPlan" class="editText">
							<option value="6" data-flatfee="0" data-ratio="2.5" data-oldsetup="99" data-setup="0" data-oldmonthly="1000" data-monthly="1000" selected="selected">Premium Plan - Full featured website</option>
							<option value="3" data-flatfee="5" data-ratio="2.5" data-oldsetup="6000" data-setup="1000" data-oldmonthly="1200" data-monthly="1200" selected="selected">Premium Plan - Full featured website</option>
							<option value="5" data-flatfee="10" data-ratio="2.9" data-oldsetup="0" data-setup="0" data-oldmonthly="0" data-monthly="0">Standard Plan - Includes all necessary features to sell tickets online</option>
						</select>
					</div> -->
					<div class="">

						<div class="paymentNotes oc">
							<h3 class="important importantspecial notes">Notes:</h3>
							<h4 class="important noTrial1">Monthly Statements:</h4>
							<p class="noTrial1">You will be billed for your sales percentage and any potential monthly fees. Your credit card on file or your PayPal account will be used to auto-pay your statements.</p>
							<p class="noTrial1">Your statements will be available online. We do not offer paper statements and bills should be auto-paid using the credit card on file.</p>
							<p>If you select a plan or add-on feature with a monthly fee, the monthly fee will be recurring until you cancel or change the plan.</p>
							<h4 class="important">Account Termination (no long term contract):</h4>
							<p>You can cancel your account or change your plan online at any time.</p>
							<p>Please note that all setup fees, pre-paid monthly fees and packages are non-refundable.</p>
							<h4 class="important">Trial Purpose:</h4>
							<p>For trial purpose, use the Standard plan. The plan has no monthly fee and you won't get charged unless you start selling tickets.</p>
							<p>You can upgrade to the Premium plan at any time.</p>
							<p>If you make sales for test purpose, void the invoice afterward so you won't get charged.</p>
						</div>

						<!--
						<div style="display:none;">
							<h3 class="noTrial">Payment Method</h3>
							<div class="row noTrial">
								<label for="cCardType">Card Type:</label>
								<select id="cCardType">
									<option value="visa" selected="selected">Visa</option>
									<option value="mastercard">Master Card</option>
									<option value="amex">American Express</option>
									<option value="discover">Discover</option>
								</select>
								<img height="20" src="/images/VisaMCAmexDiscover.jpg" alt="" class="creditCardImg">
							</div>
							<div class="row noTrial">
								<label for="cCardHolderName">Your Name on The Card:</label>
								<input type="text" id="cCardHolderName" maxlength="60" data-validation-required="1">
							</div>
							<div class="row noTrial">
								<label for="cCCNo">Card Number:</label>
								<input type="text" id="cCCNo" maxlength="16" data-validation-required="1" data-validation-regex="\d{15,16}" data-validation-custom="validateCardNumber" autocomplete="off" data-validation-number="UInt" data-validation-number-min="0">
								<p class="hint">digits only</p>
							</div>
							<div class="row noTrial">
								<label for="cSecurityCode">Security Code:</label>
								<input type="text" id="cSecurityCode" maxlength="4" data-validation-required="1" data-validation-regex="\d{3,4}" autocomplete="off">
								<div class="expandableHint ">
									<h2>Card Validation Number</h2>
									<img height="60" alt="3 or 4 digit schematic on back of credit card after base card #" src="/images/creditcard_187x87.jpg" width="130" style="float:left;">
									<p>The card validation number is printed on back of your Visa or MasterCard in the signature area or the front of American Express. (it is the last 3 or 4 digits AFTER the credit card number).</p>
									<br><br>
								</div>
								<p class="hint">3 digits on the back of Visa/MasterCard or 4 digits on the front of American Express</p>
							</div>
							<div class="row noTrial">
								<label for="cExpMonth">Expiration Date:</label>
								<select id="cExpMonth">
									<option value="1" selected="selected">01 Jan</option>
									<option value="2">02 Feb</option>
									<option value="3">03 Mar</option>
									<option value="4">04 Apr</option>
									<option value="5">05 May</option>
									<option value="6">06 Jun</option>
									<option value="7">07 Jul</option>
									<option value="8">08 Aug</option>
									<option value="9">09 Sep</option>
									<option value="10">10 Oct</option>
									<option value="11">11 Nov</option>
									<option value="12">12 Dec</option>
								</select>
								<select id="cExpYear" data-validation-custom="validateExpiry">
									<option value="2021" selected="selected">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
									<option value="2031">2031</option>
									<option value="2032">2032</option>
									<option value="2033">2033</option>
									<option value="2034">2034</option>
									<option value="2035">2035</option>
								</select>
							</div>
							<div class="row noTrial">
								<label for="cZip">Billing zip/postal code:
									<span class="tooltip" title="Will be used for validation and fraud protection."><i class="fa fa-question-circle"></i></span>
								</label>
								<input type="text" id="cZip" maxlength="20" data-type="zip" data-validation-required="1">

							</div>
							<div class="row noTrial">
								<label><input type="checkbox" disabled="disabled" checked="checked">Use this credit card as auto-payment method for future invoices.
									<span class="tooltip" title="To use Ticketor you need to have a credit card on file for auto-payment. Your future bills will be paid automatically using the credit card on file."><i class="fa fa-question-circle"></i></span>
							</label>


						</div>
					</div>
					-->
						<div class="row agreement mls-50">
							<p class="f-size15">By clicking the "I Agree to Terms &amp; Finish" button bellow, I admit that I am over 18 year old and I have read, understood, and agree to <a href="" target="_blank">Oceanstub Terms of Service</a>, <a href="" target="_blank">oceanstub Privacy Policy</a> and <a href="" target="_blank">Oceanstub Cookies Policy</a>.  <span class=" noTrial"><br>I also authorize Ticketor to use this credit card for the total amount due today and future bills. </span> </p>
						</div>
						<div class="row">
							<p> </p>
						</div>
						<div class="buttons clearfix">
							<span> &nbsp;</span>
							<span class="cTotalDue fw-50">$<span class="planspecialcolor">0.00</span></span>
							<label for="cZip">Total due now:  &nbsp;</label>
						</div>
							<div class="buttons clearfix">
								<a>
									<a type="button" href="{{route('seller.login')}}" class="btn btn-warning planagree ">  I Agree to Terms & Continue <i  class='fas f-size12'>&#xf101;</i></a>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endsection
