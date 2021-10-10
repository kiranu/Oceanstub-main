

  {{-- Order Tracking --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>



  <!-- Trigger the modal with a button -->

  <!-- Modal -->
<div class="modal fade" id="TicketModal" role="dialog">
    <div class="modal-dialog modal-xl">


        <!-- Modal content-->
        <div class="modal-content" style="width: max-content;">
            <div class="modal-header" style="background-color: #FF9E2F;">
                <h4 class="modal-title" style="color: #ffffff">TICKET</h4>
            </div>
            <div class="modal-body" style="padding:  0px !important;">
                <div class="">
                    <article class="card">
                        <div  class="card-body">


{{-- Ticket goes here --}}

                            @include('home.ticketpreview')


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
    $(".ticketview").on("click", function(){
        var ticket_id =$(this).attr("ticketId")

        $("#qrcode canvas").remove();
        $("#qrcode img").remove();

             var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: "https://www.oceanstub.com/inspect/ticket-order-id/"+ticket_id,
                    width: 90,
                    height: 90,
                    margin: 10,
                    colorDark : "#000000",
                    colorLight : "#037FDD",
                    correctLevel : QRCode.CorrectLevel.H
                });

      $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url:"{{route('ticket_details')}}",
          type: 'post',
          data:{ticket_id:ticket_id,_token: '{!! csrf_token() !!}'},

          success: function($ticket)
          {
            //for success
          $('#TicketModal').modal('show');
          var date=new Date($ticket.events_time.start_date);
          var day = date.getDay();
            $('#month').html(day);
            Date.shortMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            Date.DayNames = ['Sunday', 'Monday', 'Tuesday', 'Wendsday', 'Thursday', 'Friday', 'Saturday'];

            var shortMonth = Date.shortMonths[date.getMonth()];
            $('#start_date').html(shortMonth);
            $('#event_tittle').html($ticket.event.first_title);
            var start_date=new Date($ticket.events_time.start_date);
            var end_date=new Date($ticket.events_time.end_date);

            $('#start_to_end_date').html(start_date.getDate()+" "+Date.shortMonths[start_date.getMonth()]+" "+start_date.getFullYear()+"("+Date.DayNames[start_date.getDay()]+") to "+end_date.getDate()+" "+Date.shortMonths[end_date.getMonth()]+" "+end_date.getFullYear()+"("+Date.DayNames[end_date.getDay()]+")");
            var start_time=new Date($ticket.events_time.start_time);
            var end_time=new Date($ticket.events_time.end_time);
            $('#start_to_end_time').html(start_time.toLocaleTimeString()+" to "+ end_time.toLocaleTimeString());
            $('#venue').html($ticket.events_time.venue.name);
            $('#price').html();

          },
          error: function(data)
          {
              console.log(data);
          }
       });
       });



      });



    </script>
    <script>
        function generatePDF(){
            const element = document.getElementById("TicketHolder");

            var opt = {
            margin:       1,
            filename:     'OceanStub.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
            };
            html2pdf()
            .from(element)
            .set(opt)
            .save();
        }

    </script>
