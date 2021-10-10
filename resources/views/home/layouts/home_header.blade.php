
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('assets/home/images/oceanstub.png')}}" class="oceanstub-logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-end align-items-center" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="{{route('home')}}">Home</a></li>
            <li class="nav-item"><a href="{{route('features')}}">Features</a></li>
            <li class="nav-item"><a href="{{route('pricing')}}">Pricing</a></li>
            <li class="nav-item"><a href="{{route('buy_tickets')}}">Buy Tickets</a></li>
            <li class="nav-item"><a href="{{route('contact')}}">contact</a></li>
        </ul>
        @if (Auth::check())
            
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="border-color: #a42e3200;background-color: #ea983a;">{{Auth::user()->name}}
            <span class="caret"></span></button>
            <ul class="dropdown-menu" style="background-color: rgb(32 32 32);">
                <li><a href="{{route('buyer_profile')}}">My Profile</a></li>
                <li><a href="{{route('orders')}}">Orders</a></li>
                <li><a href="{{route('upcoming_tickets')}}">My Tickets</a></li>
                <li><a href="{{route('buyer_logout')}}">Logout</a></li>
            </ul>
        </div>

        @else
        <a href="#" class="btn btn-warning headersingin">SIGN IN</a>
        <a href="#" class="btn btn-warning signinasbuyer">SIGN UP</a>
        @endif
        <a href="{{route('cart')}}" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
    </div>
</nav>
        

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mt-145">
            <div class="modal-header sign-modal-header-border-bottom">
                <h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">SIGN UP</h5>
            </div>
            <div class="modal-body modal-bodybt">
                <ul class="signorlooginoption">
                    <li><button type="button" class="btn btn-warning btn-lg signupasbuyershow" data-toggle="modal" data-target="#exampleModalCenter">
                        Signup as Buyer
                        </button>
                    </li>
                    <li><a href="{{route('seller_registration')}}" class="btn btn-warning btn-lg" style="margin-top: 10px">
                        Signup as seller
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
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

                    <li><a href="{{route('seller.login')}}" class="btn btn-warning btn-lg" style="margin-top: 10px">
                        Login as Seller
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginasbuyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content mt-145">
            <div class="modal-header sign-modal-header-border-bottom">
                <h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">LOGIN</h5>
                </button>
            </div>

            <div class="modal-body modal-bodybt">
            <div class="alert alert-danger" style="display:none"></div>

                <form id="BuyerloginForm">
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Email:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Password :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="password" id="recipient-name" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 s-center">
                                <button type="submit" id="BuyerloginFormSubmit" class="btn btn-warning btn-lg  ">Login as Buyer
                                </button>
                            </br>
                                <a href="{{url('forgot-password')}}"  style="margin-top: 10px">
                                    Forgot Password
                                    </a>
                            </div>
                        </div>
                    </div>
                </form>
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
                                <button type="button" class="btn btn-warning btn-lg loginasbuyersave signorlooginoptionbtn">Login as Seller
                                </button>
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
                <form  id="BuyerRegister">
                    
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Email</label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Password :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="password" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Confirm Password :</label>
                            </div>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="password_confirmation" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Mobile No:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="recipient-name" name="mobile" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 s-center">
                                <button  type="submit" class="btn btn-warning btn-lg" id="BuyerRegisterSubmit">SignUp as Buyer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signasseller" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  mt-145">
            <div class="modal-header sign-modal-header-border-bottom">
                <h5 class="modal-title sign-modal-header-content" id="exampleModalLongTitle">SignIn </h5>
                </button>
            </div>
            <div class="modal-body modal-bodybt">
                <form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-1 s-right">
                                <label for="recipient-name" class="col-form-label">Email id:</label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="recipient-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12 s-center">
                                <button type="button" class="btn btn-warning btn-lg " signorlooginoptionbtn>Signup as Seller
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<script>
$(document).ready(function(){
    $("#BuyerRegister").on("submit",function (event) {

       event.preventDefault();
       var formData = new FormData(this);
       $("#BuyerRegisterSubmit").html('Saving..')
     $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $.ajax({

      
       url: "{{route('buyer_registration')}}",
       type: 'POST',
       data: formData,
       processData: false,
       contentType: false,
       success: function(result)
       {

        if(result.errors)
            {
                  $("#BuyerRegisterSubmit").html('SignUp as Buyer');

            	jQuery('.alert-danger').html('');
            	jQuery.each(result.errors, function(key, value){
            		jQuery('.alert-danger').show();
            		jQuery('.alert-danger').append('<li>'+value+'</li>');
            	});
            }
            else
            {
            	jQuery('.alert-danger').hide();
                 //  alert(result)
                 $('#BuyerRegister').trigger("reset");
                 $('#signupasbuyer').modal('hide');
                 Swal.fire(  'Good job!',  'Registered Succesfully',  'success')
                //  setTimeout(function() {
                //     }, 2000);
                //     location.reload();

            }


       },
       error: function(data)
       {
           console.log(data);
       }
    });
   });

   //BUYER LOGIN ................................................................................
            $("#BuyerloginForm").on("submit",function (event) {

            event.preventDefault();
            var formData = new FormData(this);
            $("#BuyerloginFormSubmit").html('Logging in...')
            // console.log(formData);
            // alert(formData);

            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
            $.ajax({

            
            url: "{{route('buyer_login')}}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(result)
            {

            if(result.errors)
                {
                    $("#BuyerloginFormSubmit").html('Login as Buyer');

                    jQuery('.alert-danger').html('');
                    jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    jQuery('.alert-danger').hide();
                    //  alert(result)
                    $('#BuyerloginForm').trigger("reset");
                    $('#loginasbuyer').modal('hide');
                    // Swal.fire(  'Good job!',  'Login Succesfully',  'success')

                        location.reload();

                }


            },
            error: function(data)
            {
                console.log(data);
            }
            });
            });
});

</script>
