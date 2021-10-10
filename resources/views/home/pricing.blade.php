@extends('home.layouts.home_master')

@section('content')
        <br>
        <style>
            .summary1{
            width: 100%;
            height: auto;
            background-color: #fff;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom:10px ;
            padding-left: 10px;
            }
        </style>
        <style>
            .card-header {
            width:100%;
            border-radius: 5px;
            height: auto;
            background-color:#d58512;
            }.card-title{
            color:#000;
            }.card{
            box-sizing: content-box;
            width:100%;
            height: auto;
            /* padding:30px;*/
            /* padding-top: 10px;*/
            /* border: 1px solid #6e7175;*/
            color: #526066;
            background-color:#FAF9FD;
            }.txt-algn{
            text-align: center !important;}
        </style>
        <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin: 0 auto;">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">In short:</h3>
                            </div>
                            <div class="card-body card-inshort">
                                <p style="margin-left: 0px;">We are proud to offer the best rate in the industry while offering the most feature-full, flexible and reliable product with great customer support.</p>
                                <p style="margin-left: 0px;">Ticketor charges <b>2.5% + ₹0.00 (or 2.9% + ₹0.49 per ticket)</b> depending on the plan you choose.
                                </p>
                                <ul style="margin-left: 20px;">
                                    <li>The <b>Standard plan</b> charges 2.9%  + ₹0.49 (per ticket) and has <b>no setup or monthly fees. </b>It offers all the ticketing features including unlimited events and venues, seating charts, e-tickets, barcode scanning, real-time reports, your custom design and logo, and great customer support.</li>
                                    <li>The <b>Premium plan</b> charges 2.5% + ₹0.00 and has a small monthly.  This plan offers additional features such as custom URL (white-label), website builder and analytics. </li>
                                </ul>
                                <p>Unlike most ticketing platforms, there is <b>no flat charge per ticket and no hidden fees</b>.</p>
                                <p>You can transfer none or part or the entire fee to the customer by setting the service charge as you are the one who sets and keeps the service charges. You can even set the service charge to a higher amount and make extra revenue.</p>
                                <p>There is no long term contract and no cancellation fee. So you can cancel or upgrade/downgrade your plan at any time.</p>
                                <p>If you are considering Premium plan, committing to 1, 2, or 3 years, will reduce your monthly fees compared to month-to-month plan.</p>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <br>
        <div class="row">
        <div class="container-fluid">
            <section class="content" style="display:block;">
                <div class="col-md-8" style="margin: 0 auto;">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Frequently Asked Questions:</h3>
                        </div>
                        <div class="card-body card-inshort card-questions">
                            <h4 class="expandable mt-0"><b>Q:</b> You advertise: "ZERO charges to you!" and "You have full control over charges!". How does it work?
                                <a style="text-decoration: none;" class="seemorequestions show_hide" data-content="toggle-text">See More
                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </a>
                            </h4>
                            <div>
                                <div class="arrowUp questionansblock" style="display:none">
                                    <p style="margin-left: 20px">When you sell or buy tickets online, there are always 3 types of charges involved no matter what service you use:</p>
                                    <ol style="margin-left: 30px">
                                        <li>
                                            <p><b>Ticketing service:</b> A fee that is charged by the website or service you use to sell tickets.</p>
                                            <p class="hint">Ticketor charges the most competitive fee of 2.5%. You may transfer all or part of it to the buyer.</p>
                                        </li>
                                        <li>
                                            <p><b>Credit Card Processing fees:</b> A fee charged by the payment processor or PayPal to process the payment.</p>
                                            <p class="hint">Since you use your own payment processor/PayPal with Ticketor, you pay the charge directly to them. Ticketor is not involved in this fee, however you can transfer all or part of this charge to the buyer.</p>
                                        </li>
                                        <li>
                                            <p><b>Delivery charges:</b> A fee charged for delivering tickets by mail, will-call, or print at home tickets.</p>
                                            <p class="hint">Ticketor does not charge for any delivery method. However you may decide to charge your buyers.</p>
                                        </li>
                                    </ol>
                                    <p style="margin-left: 20px">Some ticketing services may charge YOU (the event planner), for the fees, while some others may advertise that it is free for you and in this case they charge the buyer for the fees.</p>
                                    <p style="margin-left: 20px">Since Ticketor, builds you the ticketing website, we leave the decision totally to you. You may decide to pay the fees by yourself, or transfer all or part of it to the buyer. You can even charge extra and make money of your ticketing service.</p>
                                    <p style="margin-left: 20px">You decide how much you want to charge the buyer for each ticket type in each event.</p>
                                </div>
                                <h4 class="expandable"><b>Q:</b> You advertise: "Not only you don't pay anything for ticketing, but also you can make money out of your ticketing service!". How does it work?</h4>
                                <div class="arrowUp questionansblock" style="display:none">
                                    <p style="margin-left: 20px">When you as an event planner sell your tickets on a 3rd party website, that website makes money by charging either you or the buyer or both. Now that you own your ticketing website, you can decide to charge the buyer, anything over your cost and this is how you make money.</p>
                                    <p style="margin-left: 20px">For example:</p>
                                    <ul style="margin-left: 30px">
                                        <li>Assume your ticket face price is: ₹10.00</li>
                                        <li>Your Ticketor cost is: (2.5%): 10 * 2.5% = ₹0.25</li>
                                        <li>
                                            If your merchant processing fee is: 3.0%: 10 * 3.0% = ₹0.30
                                            <p><sub>* Your merchant fee may vary but is usually in the same range. Contact your service provider for the accurate rate.</sub></p>
                                        </li>
                                        <li>You total cost is: ₹.025 + ₹0.30 = <b>₹0.55</b></li>
                                    </ul>
                                    <p style="margin-left: 20px">So if you charge the buyer a service-charge of ₹0.55, you break even. But most ticketing services charge much more, why not you? Ticketor allows you to charge as much or as less as you want. If you decide to charge ₹1.50 for each ticket, <b>you will make ₹0.95 on each ticket sold. </b> </p>
                                </div>
                                <h4 class="expandable"><b>Q:</b> When and how does Ticketor charge me?</h4>
                                <div class="arrowUp questionansblock" style="display:none">
                                    </a>
                                    <p>Monthly fees (if any) will be billed on a monthly basis. Transaction fees are due when a sale happens, however depending on your payment processor it may get collected later. If your payment processor supports "Application fees", the Ticketor fee will be deducted from each sale. If not, Ticketor will bill you either on a monthly basis or when your balance exceeds certain amount. </p>
                                </div>
                                <div class="arrowUp questionansblock" style="display:none">
                                    <p style="margin-left: 20px">While most ticketing websites charge much higher fees for selling tickets, Ticketor offers the most competitive price by allowing you to build your own website. It leaves you lots of room to charge extra and make money.</p>
                                </div>
                                <h4 class="expandable"><b>Q:</b> What happens if I want to switch between plans or add/remove features?</h4>
                                <div class="arrowUp questionansblock" style="display:none">
                                    <p style="margin-left: 20px">You can switch between plans or add/remove features at any time, and at no extra cost.</p>
                                </div>
                                <h4 class="expandable"><b>Q:</b> What if I want to cancel my account?</h4>
                                <div class="arrowUp questionansblock" style="display:none">
                                    <p style="margin-left: 20px">You can cancel at any time. There is no cancellation fee and no long-term contract.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
            </section>
            {{-- <section class="content" style="display:block;">
            <div class="col-md-4" style="margin: 0 auto;">
            <!-- Default box -->
            <div class="card costcalculator-container">
            <div class="card-header">
            <h3 class="card-title">Cost Calculator:</h3>
            </div>
            <div class="card-body">
            <div class="row" style="margin-left: 20px">
            <label class="valid" >Ticket Face Price: ₹
            <input  class="form-control" type="number" step="0.01" id="FacePrice" value="10.00"  >
            </label>
            </div>
            <div class="row" style="margin-left: 20px">
            <label>Ticketor Fee
            <select class="form-control" style="padding:3px;">
            <option selected="selected" value="2.50">2.5%</option>
            <option value="2.90">2.9%</option>
            </select>
            </label>
            </div>
            <div class="row" style="margin-left: 20px">
            <label>Ticketor's Flat Fee / Ticket
            <select class="form-control" style="padding:3px;">
            <option selected="selected" value="0">0.00</option>
            <option value="0.250">0.25</option>
            <option value="0.490">0.49</option>
            </select>
            </label>
            </div>
            <div class="row" style="margin-left: 20px">
            <p><label>My payment processor charges: %
            <input type="number" min="0" step="0.01" class="form-control" value="2.9">
            </label>
            <span style="display:none;">+ ₹
            <input type="text" class="form-control" value="0.00" maxlength="5"></span>
            </p>
            </div>
            <span aria-live="polite" aria-relevant="text" style="margin-left: 20px">
            <p style="margin-left: 20px">Total Fees: ₹<b class="cTotalFee">0.62</b> (Ticketor + Payment Processor)</p>
            <br>
            <p  style="margin-left: 20px"><b>Set the service-charge to ₹<span class="cTotalFee">0.62</span>, to transfer all charges to the buyer,  </b></p>
            <p  style="margin-left: 20px">or anything over, to make profit. </p>
            </span>
            </div>
            </div>
            <!-- /.card -->
            </div>
            </section> --}}
            </div>
        </div>
        <br>
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
       @endsection
