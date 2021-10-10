

  {{-- Order Tracking --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  <!-- Trigger the modal with a button -->

  <!-- Modal -->
<div class="modal fade" id="OrderModal" role="dialog">
    <div class="modal-dialog modal-xl">


        <!-- Modal content-->
        <div class="modal-content" style="width: max-content;">
            <div class="modal-header" style="background-color: #FF9E2F;">
                <h4 class="modal-title" style="color: #ffffff">ORDER DETAILS</h4>
            </div>
            <div class="modal-body" style="padding:  0px !important;">
                <div class="">
                    <article class="card">
                        <div class="card-body">
                            <h6 id="OrderId"></h6>
                            <h6 id="Paymentid"></h6>
                            {{-- <article class="card">
                                <div class="card-body row">
                                    <div class="col" id="OrderDate"></div>

                                </div>
                            </article> --}}
                            {{-- <div class="track">
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>
            </div> --}}
                            <hr>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Event Details</th>
                                            <th>Ticket Details</th>
                                            <th>Amount</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="OrderedProducts">

                                    </tbody>
                                    <tfoot>
                                    </br>
                                        <tr>
                                            <th>Total</th>
                                            <td class="product-subtotal"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

        </div>

    </div>
</div>






<script>

    $(function() {

    //..........Order deatils......................
    $(".OrderDetails").on("click", function(){
        var order_id =$(this).attr("order_id")
        //  alert(order_id)
        //  $('#OrderModal').modal('show');

        $.ajaxSetup({
            headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            }
          });
      $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url:"{{route('order_details')}}",
          type: 'post',
          data:{order_id:order_id,_token: '{!! csrf_token() !!}'},

          success: function($order)
          {
            //for success
          $('#OrderModal').modal('show');
           $('#OrderId').html('Order ID:'+$order['id']);
           $('.product-subtotal').html('$'+$order['amount']);
           $('#OrderDate').html('$'+$order['created_at']);
           $('#Paymentid').html($order['payment_method']+'-'+$order['payment_id']);
           console.log($order.order_list);
                var res='';
                $.each ($order.order_list, function (key, value) {
                res +=
                '<tr>'+

                    '<td>'+value.event.first_title +'</td>'+
                    '<td>'+value.ticket.name +'</td>'+
                    '<td> $'+value.amount +'</td>'+
                    '<td> '+value.quatity +'</td>'+
                    '<td> $'+value.total +'</td>'
               '</tr>';
                 });
               $('#OrderedProducts').html(res);

          },
          error: function(data)
          {
              console.log(data);
          }
       });
       });



      });



    </script>
