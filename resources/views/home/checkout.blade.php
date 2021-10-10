@extends('home.layouts.home_master')

@section('content')
    <style>
        .chkout {
            width: 100%;
            /* border-radius: 5px; */
            height: 83px;
            background-color: #ea983a;
        }

        .card-header {
            width: 100%;
        }

        .card-body {
            padding: 30px;
            padding-top: 10px;
        }

        .card {
            background-color: #fffad5e8;
        }

    </style>
    <div class="content-wrapper">
        {{-- <div class="card ">
                <div class=" chkout">
                    <h3 style="margin-left: 139px;font-size: 41px;" class="card-title mt-0">Check Out</h3>
                </div>
            </div> --}}
        <!-- Main content -->
        <div class="col-md-9" style="margin: 5px 131px auto;">
            <div class="card">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                @php
                                    use App\Models\Cart;
                                    $count = Cart::cartcount();
                                    $total = Cart::carttotal();
                                    $cartitems = Cart::cartitems();
                                    $service_charge = Cart::service_charge();
                                    $face_price = Cart::face_price();
                                    $tax = Cart::tax();
                                   
                                @endphp
                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fa fa-shopping-cart"
                                                aria-hidden="true"></i>&nbsp;&nbsp;SHOPPING CART</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>EVENT</th>
                                                        <th>SECTION</th>
                                                        <th>ROW</th>
                                                        <th>PRICE</th>
                                                        <th>SEATS</th>
                                                        <th>TOTAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cartitems as $ticket)
                                                        @if (isset($ticket->sc_id))
                                                            <tr>
                                                                <td>{{ $ticket['events']->first_title }}
                                                                    <br>{{ $ticket['events_time']->start_date->format('j M') }}-{{ $ticket['events_time']->start_time->format('h:i A') }}
                                                                </td>
                                                                <td>{{ $ticket->section }}</td>
                                                                <td>{{ $ticket->row }}</td>

                                                                <td>{{ $ticket->amount }}</td>
                                                                <td>{{ $ticket->quatity }}
                                                                    Seats<br>({{ $ticket->ticket_nos }}) </td>
                                                                <td>{{ $ticket->total }}
                                                                </td>

                                                            </tr>

                                                        @else



                                                            <tr>
                                                                <td>{{ $ticket['events']->first_title }}
                                                                    <br>{{ $ticket['events_time']->start_date->format('j M') }}-{{ $ticket['events_time']->start_time->format('h:i A') }}
                                                                </td>
                                                                <td>{{ $ticket['ticket_price']->name }}</td>
                                                                <td>Not Specified</td>
                                                                @php
                                                                    $price = $ticket['ticket_price']->face_price + $ticket['ticket_price']->service_charge;
                                                                @endphp
                                                                <td>{{ $ticket['ticket_price']->prefix_bp }}{{ $price }}
                                                                </td>
                                                                <td>{{ $ticket->quatity }} Seats </td>
                                                                <td>{{ $ticket['ticket_price']->prefix_bp }}{{ $ticket->quatity * $price }}
                                                                </td>

                                                            </tr>

                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- /.card-footer-->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </section>
                <form action="{{ route('create_order') }}" method="post">
                    @csrf
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Default box -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i>&nbsp;&nbsp;DELIVERY METHOD</h3>
                                        </div>
                                        <div class="card-body" style="display:block;">
                                            <h6><strong>ocean - Friday June 25, 2021 at 08:00 PM</strong></h6>
                                            <div class="form-check" style="display:inline-block;">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    id="flexRadioDefault1" value="Direct">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Direct(<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Only visible to
                                                    sales agents)
                                                </label>
                                            </div>
                                            <div style="display:inline-block;">
                                                <p><strong>No Charge</strong></p>
                                            </div>
                                            <br>
                                            <span class="deliveryComment">Face to face sales. Print the tickets right away
                                                and hand them out</span>
                                            <br>
                                            <div class="form-check" style="display:inline-block;">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    id="flexRadioDefault2" value="e-Ticket as Email" required>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    e-Ticket as Email (Print or show on your phone)
                                                </label>
                                            </div>
                                            <div style="display:inline-block;">
                                                <p><strong>No Charge</strong></p>
                                            </div>
                                            <br>
                                            <span class="deliveryComment">Show on your phone or print your tickets. You can
                                                print right away or later from the confirmation email</span>
                                            <br>
                                            <div class="form-check" style="display:inline-block;">
                                                <input class="form-check-input" type="radio" name="delivery_method"
                                                    id="flexRadioDefault2" value="Venue pickup">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Will-Call (Venue pickup)
                                                </label>
                                            </div>
                                            <div style="display:inline-block;">
                                                <p><strong>No Charge</strong></p>
                                            </div>
                                            <br>
                                            <span class="deliveryComment">Pickup at the venue before the event - You must
                                                present your credit card or ID</span>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Default box -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="fa fa-credit-card"
                                                    aria-hidden="true"></i>&nbsp;&nbsp;PAYMENT METHOD</h3>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            {{-- <div class="form-check" >
                    <input class="form-check-input" type="radio" name="payment_method" value="card" id="NLSUBY" required >
                    <label class="form-check-label" >
                    Pay By Credit Card
                    </label>
                    </div> --}}
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    value="paypal" id="NLSUBY">
                                                <label class="form-check-label">
                                                    Pay By PayPal or Credit Card
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <!-- /.card-footer-->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Default box -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;PRICE
                                            </h3>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6" style="display: inline-block;">
                                                    <div class="form-check">
                                                        <label class="form-check-label">Promotion Code</label>
                                                        <input class="form-check-input" type="text" name="promotion_code">
                                                        <input class="form-check-input" value="Apply" type="button" name="">
                                                    </div>
                                                    <br>

                                                </div>
                                                <div class="col-md-6" style="display: inline-block;">
                                                    <div class="form-check">
                                                        <label class="form-check-label">Face
                                                            Price:${{ $face_price }}</label>
                                                        <br>
                                                        <label class="form-check-label">Service
                                                            Charge:${{ $service_charge }}</label>
                                                        <br>

                                                        <label class="form-check-label">Total
                                                            Price:${{ $total }}(including Service Charge)</label>
                                                        <br>
                                                        <label class="form-check-label">Tax:${{ $tax }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <!-- /.card-footer-->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </section>
            </div>
        </div>
        <div class="col-md-5" style="margin: 6px 144px auto;display: inline-block;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">&nbsp;&nbsp;BILLING INFORMATION</h3>
                </div>
                <div class="card-body billinginformationform">
                    <div class="form-check">
                        <label class="form-check-label">First Name</label>
                        <input class="form-check-input" type="text" name="first_name">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Last Name</label>
                        <input class="form-check-input" type="text" name="last_name">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Billing Country</label>
                        <input class="form-check-input" type="text" name="billing_country">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Billing Address</label>
                        <input class="form-check-input" type="text" name="billing_address">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Adddress Line 2</label>
                        <input class="form-check-input" type="text" name="address2">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">City</label>
                        <input class="form-check-input" type="text" name="city">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">State</label>
                        <input class="form-check-input" type="text" name="state">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Zip Code</label>
                        <input class="form-check-input" type="text" name="zip">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">Phone</label>
                        <input class="form-check-input" type="text" name="phone">
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer-->
            </div>
        </div>
        {{-- <div class="col-md-4" style="margin: 6px -169px auto;display:inline-block;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">&nbsp;&nbsp;CREDIT CARD INFORMATION</h3>
                        </div>
                        <div class="card-body billinginformationform">
                            <div class="form-check" >
                                <label class="form-check-label">Name on card</label>
                                <input class="form-check-input" type="text">
                            </div>
                            <div class="form-check" >
                                <label class="form-check-label">Card information:</label>
                                <input class="form-check-input" type="text" placeholder="MM/YY CVC">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div> --}}
        <div class="col-md-10" style="width: 70%;margin: 3px -2px 10px 160px;display:block;">
            <div class="custom-control custom-checkbox">
                <input style="position: relative;
                                    top: -18px;" class="custom-control-input" type="checkbox" id="customCheckbox2"
                    required>
                <label style="width: 90%;" for="customCheckbox2" class="custom-control-label">I am over 18 years old and
                    have read, fully understood and agreed to the <a href="#" target="_blank"
                        style="text-decoration:underline;">terms of purchase</a>,
                    <a target="_blank" style="text-decoration:underline;" href="#">return policy</a>as well as <a
                        target="_blank" style="text-decoration:underline;" href="#">terms of use</a>and the <a
                        target="_blank" style="text-decoration:underline;" href="#">privacy and cookie policy</a>
                </label>
            </div>
            <button style="width: 17%;float: right;" type="submit" class="btn btn-block btn-success">Buy Item</button>
        </div>
    </div>
    </form>

    <br>
    <br>
    </div>
@endsection
