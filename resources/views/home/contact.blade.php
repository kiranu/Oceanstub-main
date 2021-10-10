@extends('home.layouts.home_master')

@section('content')
        <div class="modulebody contactTicketor formContainer clearfix">
            <div class="startHere wraped" style="display: block;">
                <div class="row">
                    <div class="col-md-6">
                        <a  href="{{route('seller_registration')}}" class="btn btn-warning btn-lg"  style="margin-right:43px;letter-spacing:2px;margin:15px;float: right;">
                        <i class="far fa-calendar-alt"></i> Sign Up Here - Try it for free
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModalCenter2" style="    letter-spacing: 2px; margin: 15px;float: left;">
                        <i class="fa fa-phone "></i> Call Me Now
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="    margin-top: 145px;">
                        <div class="modal-header" style="    border-bottom: 2px solid #F89421;">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 22px;     margin-left: 193px;">Schedule a Demo </h5>
                            </button>
                        </div>
                        <div class="modal-body" style="margin-top: 2%;
                            margin-bottom: 14%; margin-left: 8%;">
                            <div class="form-group" style="margin-top: %;">
                                <label for="exampleInputEmail1"> Name :  </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address :</Address> </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number : </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date :</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#exampleModalCenter2" style=" width: 170px;margin: 0 auto;">
                            Schedule a Demo
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="    margin-top: 145px;">
                        <div class="modal-header" style="    border-bottom: 2px solid #F89421;">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 22px;     margin-left: 193px;">Call Me Now </h5>
                            </button>
                        </div>
                        <div class="modal-body" style="margin-top: 2%;
                            margin-bottom: 14%; margin-left: 8%;">
                            <div class="form-group" style="margin-top: %;">
                                <label for="exampleInputEmail1">Country :  </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number :</Address> </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I receive text on this number.</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name : </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email :</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                Which one best describes you? </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Purpose of the call :</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" style="width: 80%;">
                            </div>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter2" style="width: 100px ;margin: auto;">
                            call me
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contactEmail" style="margin-left: 13%;">

                <h3>Contact by Email</h3>
                <p>We really care about our customers and we will return every message ASAP. If you have any questions or concerns about Ticketor, please fill the form and click <b>'Send Email'</b> or email us at: <a href="">Sales@Ticketor.com</a> </p>
                 @if(Session::has('success'))
           <p class="alert alert-success alert-dismissible">{{ Session::get('success') }}</p>
            @endif
                <form action="{{route('contact_form_submit')}}" method="post">
                @csrf
                <div class="form-group" style="margin-top: 4%;">
                    <label for="exampleInputEmail1">Your Name :  </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="" style="width: 60%;" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address :</Address> </label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="" style="width: 60%;" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number : </label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="" name="phone" style="width: 60%;">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject :</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="subject" placeholder="" style="width: 60%;">
                </div>
                <div class="row clearfix">
                    <label for="cBody">Message:</label>
                    <textarea id="cBody" rows="8" required="required" name="message" aria-required="true" data-validation-required="1" class="form-control"></textarea>
                </div>
                <div class="row">
                    <button type="submit" style="margin-top:10px;" id="cSendRequest" class="btn btn-warning">
                        <div class="spinner"></div>
                        Send Email
                    </button>
                </div>
                </form>
            </div>
            <div class="contactPhone">
                <h3>Phone / Fax:</h3>
                <div style="line-height:150%;" class="highlightTextColor"><i class="fa fa-exclamation-triangle fa15"></i> Only for event organizers and site owners!<br>Agents cannot help with purchasing tickets or specific event information.<br> </div>
                <br>
                <h2 class="phone" style="font-size: 14px;">US &amp; Canada: <a href="">(+1) 800-467-7179</a></h2>
                <br>
                <h2 class="phone" style="font-size: 14px;">United Kingdom: <a href="">(+44) 20-3808-5136</a></h2>
                <br>
                <h2 class="phone" style="font-size: 14px;">Australia: <a href="">(+61) 2-8607-8462</a></h2>
                <br>
                <h2 class="phone" style="font-size: 14px;">International: <a href="">(+1) 213-537-2527 (Call &amp; Text)</a></h2>
                <br>
                <p>Headquarter: Los Angeles, CA, US</p>
            </div>
        </div>
        <br>
      @endsection
