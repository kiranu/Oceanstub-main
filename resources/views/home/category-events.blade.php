@extends('home.layouts.home_master')

@section('content')
        <div class="container  searchsection">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 searchcontainer">
                    <div role="search">
                        <h2>Search All Events</h2>
                        <form action="#" method="POST">
                        @csrf
                        <input type="hidden" name="category" id="subcategory_id" value="{{$id}}" >
                        <input type="text" role="searchbox" name="search" placeholder="Search event name, artist, venue, address" aria-describedby="cSearchError" aria-label="Search event name, artist, venue, address" value="{{$search}}" class="buyticketsubsearch"
                        id="cSearch">
                        <button  type="submit" class="nsBtn large primary cSearch">SEARCH</button>
                        </form>
                        @if($search)
                        <h2 id="searchresultfor" class="pt-0">Search results for: {{$search}}</h2>

                        @endif
                    </div>
                </div>
            </div>
            <div class="row pt-50 pb-50">
                <div class="col-md-3">
                    <span>Order by:</span>
                    <select class="js-example-disabled-results ticketsearchdropdown" id="sort_event">
                        <option value="date">Date</option>
                        <option value="event_asc">Name (A-Z)</option>
                        <option value="event_desc">Name (Z-A)</option>
                        <option value="venu_asc">Venue (A-Z)</option>
                        <option value="venu_desc">Venue (Z-A)</option>
                    </select>
                </div>
                <div class="col-md-2 col-md-offset-6">
                    <input class="buyticketsubsearch" type="text" name="" id="search_event" placeholder="Search name, venue, city, artist">
                </div>
            </div>
            <div id="search_result">
                @include('home.search_result')
            </div>
        </div>
      @endsection
@section('custom_script')


<script>
$(document).ready(function(){

    $('.buyticketsubsearch').keyup(function(){
    var search = $(this).val();
    var filter = $('#sort_event').val();
    var id = $('#subcategory_id').val();
    $(".buyticketsubsearch").val(search);

    search_data(search,filter,id);
 });

  $('#sort_event').change(function(){
    var filter = $(this).val();
    var search = $('.buyticketsubsearch').val();
    var id = $('#subcategory_id').val();

    search_data(search,filter,id);
 });


    function search_data(search,filter,id)
    {
    $("#searchresultfor").html(`Search results for:`+search);
        $.ajax({

            url:"{{route('category_event_search')}}",
            method:"POST",
        data:{_token: '{!! csrf_token() !!}', search:search,filter:filter,id:id},


        success:function(events)
        {
          $('#search_result').html(events.view);
        }
        });

    }





 $(document).on('click', '.page-link', function(event){
    event.preventDefault();
    var search = $('.buyticketsubsearch').val();
    var filter = $('#sort_event').val();
    var id = $('#subcategory_id').val();

    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page,filter,search,id);
 });

 function fetch_data(page,filter,search,id)
 {
       {{-- alert(search);
        alert(filter); --}}
  $.ajax({
      url:"{{ route('category_event_search') }}",
      method:"POST",
      data:{_token: '{!! csrf_token() !!}', page:page,search:search,filter:filter,id:id},
      success:function(events)
      {
       $('#search_result').html(events.view);
      }
    });
 }
});
</script>
      @endsection
