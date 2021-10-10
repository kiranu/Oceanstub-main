
                      <table id="events_table" class="table table-bordered table-striped" style="width: 100%!important;">
                        <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>Event Id</th>
                          <th>Event</th>
                          <th>Hosted By</th>
                          <th>Venue</th>
                          {{-- <th>Start On</th>
                          <th>End Date</th> --}}
                        </tr>
                        </thead>


                      </table>

@section('bottom_scripts')
  <script>
   $(document).ready( function () {
    $('#events_table').DataTable({
           processing: true,
            serverSide: true,
            searching: true,

             ajax: '{{ route('admin.sellerevents.ajax',['id'=>$seller['seller']->id]) }}',


             columns: [
           {data: 'DT_RowIndex', name: 'DT_RowIndex' },
           {data: 'id', name: 'id' },
           {data: 'first_title', name: 'Event'},
            {data: 'hosted_by', name: 'hosted_by'},
           {{-- {data: 'venue', name: 'venue' }, --}}
           {data:'start_on', name: 'Start On' },
           {{-- {data: 'action', name: 'Action'} --}}
        ],

        order: [[1, 'desc']]

        });
     });
  </script>
@endsection
