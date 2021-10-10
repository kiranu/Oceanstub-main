
                      <table id="tickets_table" class="table table-bordered table-striped" style="width: 100%!important;">
                        <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>Event name</th>
                          <th>Ticket Details</th>
                          <th>Booked Time</th>
                        </tr>
                        </thead>


                      </table>

@section('bottom_scripts')
  <script>
   $(document).ready( function () {
    $('#tickets_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,

             ajax: '{{ route('admin.buyertickets.ajax',['id'=>$buyer['buyer']->id]) }}',


             columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex' },
           {data: 'eventdetails', name: 'Event'},
           {data: 'ticket', name: 'Ticket'},
           {data:'bookedtime', name: 'bookedtime' },
        ],

        order: [[1, 'desc']]

        });
     });
  </script>
@endsection
