@extends('home.layouts.home_master')

@section('content')

        <div class="text-box" style="background-image: url('assets/home/images/concert-3387324_1920.jpg');">
            <div class="text-box-inner">
                <h1>Make Your Dream Come True</h1>
                <h3>Meet your favorite artists, sport teams and parties</h3>
                <div class="boxcontainer">
                    <table class="elementscontainer">
                    <form action="{{route('event_search')}}" method="POST">
                        @csrf
                        <tr>

                            <td>

                                <input type="text" name="search" placeholder="search"class="search" required>
                            </td>
                            <td>
                            {{-- <button type="submit" class="material-icons" ><i class="ion-ios-search-strong"></i></button> --}}
                                <button type="submit" >
                              <i class="fa fa-search" aria-hidden="true"></i>
                                    {{-- <svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffff">
                                        <path d="M0 0h24v24H0V0z" fill="none"/>
                                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                    </svg> --}}
                                    </i>
                                </button>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
        @if(count($todayevents))
        <section class="section-todays-schedule sectionspecificborder">
            <div class="container">
                <div class="row">
                    <div class="section-header scheduleanddate">
                        <h2 class="f-22">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="16" viewBox="0 0 6 20" fill="none">
                                <rect width="6" height="20" fill="#FF6600"/>
                            </svg>
                            TODAY'S SCHEDULE
                        </h2>
                        <span class="todays-date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" fill="fff">
                                <path d="M17 2H15V1C15 0.734784 14.8946 0.48043 14.7071 0.292893C14.5196 0.105357 14.2652 0 14 0C13.7348 0 13.4804 0.105357 13.2929 0.292893C13.1054 0.48043 13 0.734784 13 1V2H7V1C7 0.734784 6.89464 0.48043 6.70711 0.292893C6.51957 0.105357 6.26522 0 6 0C5.73478 0 5.48043 0.105357 5.29289 0.292893C5.10536 0.48043 5 0.734784 5 1V2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V17C0 17.7956 0.316071 18.5587 0.87868 19.1213C1.44129 19.6839 2.20435 20 3 20H17C17.7956 20 18.5587 19.6839 19.1213 19.1213C19.6839 18.5587 20 17.7956 20 17V5C20 4.20435 19.6839 3.44129 19.1213 2.87868C18.5587 2.31607 17.7956 2 17 2V2ZM18 17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18H3C2.73478 18 2.48043 17.8946 2.29289 17.7071C2.10536 17.5196 2 17.2652 2 17V10H18V17ZM18 8H2V5C2 4.73478 2.10536 4.48043 2.29289 4.29289C2.48043 4.10536 2.73478 4 3 4H5V5C5 5.26522 5.10536 5.51957 5.29289 5.70711C5.48043 5.89464 5.73478 6 6 6C6.26522 6 6.51957 5.89464 6.70711 5.70711C6.89464 5.51957 7 5.26522 7 5V4H13V5C13 5.26522 13.1054 5.51957 13.2929 5.70711C13.4804 5.89464 13.7348 6 14 6C14.2652 6 14.5196 5.89464 14.7071 5.70711C14.8946 5.51957 15 5.26522 15 5V4H17C17.2652 4 17.5196 4.10536 17.7071 4.29289C17.8946 4.48043 18 4.73478 18 5V8Z" fill="#FF6600"/>
                            </svg>
                            </i>
                            <strong>{{date('d')}}</strong>
                            {{date('F Y')}}
                        </span>
                    </div>
                    <div class="section-content section-content-marker">
                        <ul class="clearfix mls-0">
                        @php
                            $i=1;
                        @endphp
                        @foreach ($todayevents as $event)
                            @if($i==1)
                            <li class=" event-1 mls-0 firstbefore"> <span class="event-time"> {{$event->start_time->format('h:i')}} <strong>{{$event->start_time->format('A')}}</strong> </span> <strong class="event-name">{{$event['event']->first_title}}</strong> <a href="{{route('find_ticket', ['id'=>$event->id])}}" button type="button" class="btn btn-warning tickets-get">Get Ticket</button></a></li>

                            @else
                            <li class=" event-{{$i}} "> <span class="event-time"> {{$event->start_time->format('h:i')}} <strong>{{$event->start_time->format('A')}}</strong> </span> <strong class="event-name">{{$event['event']->first_title}}</strong> <a href="{{route('find_ticket', ['id'=>$event->id])}}" button type="button" class="btn btn-warning tickets-get">Get Ticket</button></a></li>

                            @endif
                           @php
                               $i++;
                           @endphp
                        @endforeach
                      </ul>
                        <div class="homepagefirstsectionborder">
                           @php
                            $i=1;
                        @endphp
                        @foreach ($todayevents as $event)
                            @if($i==1)
                            <span class="bordercircle mls-0"></span>
                            @else
                            <span class="bordercircle"></span>
                             @endif
                              @php
                               $i++;
                           @endphp
                        @endforeach

                            <div class="fulleventxt"><b>Full Event</b> schedules</div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </section>
        @endif
        <section class="section-upcoming-events">
            <div class="container">
                <div class="row">
                    <div class="section-header">
                        <h2 >
                            <svg class="upcomingevents" xmlns="http://www.w3.org/2000/svg" width="5" height="16" viewBox="0 0 6 20" fill="none">
                                <rect width="6" height="23" fill="#FF6600"/>
                            </svg>
                            UPCOMING EVENTS
                        </h2>
                    </div>
                    <div class="index-calender">
                        <div class="boxcontainer">
                            <table class="elementscontainer">
                                <tr>
                                    <td>
                                        <input type="text" placeholder="Search with Date"class="search" >
                                    </td>
                                    <td>
                                        <a href="#">
                                             <input type="date" id="date_event_search">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="section-content">
                        <div id="upcoming_events">
                          @include('home.index_sub.upcomming-events')
                        </div>
                </div>
                </div>
            </div>
        </section>
        <a href="" class="see-all-upcoming-events">See All Upcoming Events</a>
        </div>
        <br>

        <section class="section-event-category">
            <div class="container">
                <div class="row sectionbt">
                    <div class="section-header">
                        <h2>
                            <svg class="upcomingevents" xmlns="http://www.w3.org/2000/svg" width="5" height="16" viewBox="0 0 6 20" fill="none">
                                <rect width="6" height="23" fill="#FF6600"/>
                            </svg>
                            EVENTS BY CATEGORIES
                        </h2>
                    </div>
                    <div class="section-content">
                        <ul class="row clearfix">
                            <div id="category_list" >

                             @include('home.index_sub.category')

                             </div>

                        </ul>
                    </div>
                    {{-- <div class="new-item-pagination">
                        <nav aria-label="Page navigation" class="pull-left events-page-no" style="    margin-left: 40%;">
                            <div class="pagination-wrapper pagination-wrapper-news">
                                <ul class="pagination ">
                                    <li>
                                        <span aria-current="page" class="page-numbers current">1</span>
                                    </li>
                                    <li>
                                        <a class="page-numbers" href="">2</a>
                                    </li>
                                    <li>
                                        <a class="page-numbers" href="">3</a>
                                    </li>
                                    <li>
                                        <span class="page-numbers dots">…</span>
                                    </li>
                                    <li><a class="page-numbers" href="">6</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div> --}}

                </div>
            </div>
        </section>
        <section class="container countcontainer">
            <div class="row section-stats" style="background-image: url('assets/home/images/drummer-171120_1920.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="section-content">
                            <ul class="row clearfix">
                                <li class="col-sm-4">
                                    <span class="count">598</span>
                                    <hr>
                                    <p>Events Organized</p>
                                </li>
                                <li class="col-sm-4">
                                    <span class="count">16663</span>
                                    <hr>
                                    <p>Active Users</p>
                                </li>
                                <li class="col-sm-4">
                                    <span class="count">13668</span>
                                    <hr>
                                    <p>Tickets Sold</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            </div>
        </div>
        {{-- <section class="section-call-to-action">
            <div class="container">
                <div class="row">
                    <div class="section-content">
                        <ul class="row clearfix">
                            <li class="col-sm-12 col-md-9" style=" list-style: none;">
                                <h3>Share experiences with your friends</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</p>
                            </li>
                            <li class="col-sm-12 col-md-3" style=" list-style: none;"> <a href="/register/" class="action-btn">LEARN MORE</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
        <section id="section-latest" class="section-latest">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 ">
                        <div class="latest-news">
                            <div class="section-header">
                                <h2>
                                    <svg class="upcomingevents" xmlns="http://www.w3.org/2000/svg" width="5" height="16" viewBox="0 0 6 20" fill="none">
                                        <rect width="6" height="23" fill="#FF6600"/>
                                    </svg>
                                    Latest News
                                </h2>
                            </div>
                            <div class="section-content">
                                <ul class="clearfix">
                                    <li class="row news-item">
                                        <div class="col-sm-5 news-item-img">
                                            <div class="date"> <a href="">
                                                <span class="day">02</span>
                                                <span class="month">June</span>
                                                <span class="year">2017</span>
                                                </a>
                                            </div>
                                            <a href=""> <img width="1400" height="933" src="{{url('assets/home/images/holi-2416686_1920.jpg')}}" class="img-responsive wp-post-image" alt="" loading="lazy" srcset="{{url('assets/home/images/holi-2416686_1920.jpg')}}" sizes="(max-width: 1400px) 100vw, 1400px"> </a>
                                        </div>
                                        <div class="col-sm-7 news-item-info">
                                            <h3>
                                                <a href="">Southeast Asia Weekend Festival 2021/2022</a>
                                            </h3>
                                            <span class="meta-data">June 2, 2017 | By Alex Maslov</span>
                                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesenlup.</p>
                                        </div>
                                    </li>
                                    <li class="row news-item">
                                        <div class="col-sm-5 news-item-img">
                                            <div class="date"> <a href="">
                                                <span class="day">02</span>
                                                <span class="month">June</span>
                                                <span class="year">2017</span>
                                                </a>
                                            </div>
                                            <a href=""> <img width="1400" height="933" src="{{url('assets/home/images/classical-music-1838390_1920.jpg')}}" class="img-responsive wp-post-image" alt="{{url('assets/home/images/classical-music-1838390_1920.jpg')}}" loading="lazy" srcset="" sizes="(max-width: 1400px) 100vw, 1400px">
                                            </a>
                                        </div>
                                        <div class="col-sm-7 news-item-info">
                                            <h3><a href="">Entrepreneurial Think Thank: Shifting the Education Paradigm</a></h3>
                                            <span class="meta-data">June 2, 2017 | By Alex Maslov</span>
                                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesenlup.</p>
                                        </div>
                                    </li>
                                    <li class="row news-item">
                                        <div class="col-sm-5 news-item-img">
                                            <div class="date"> <a href="">
                                                <span class="day">02</span>
                                                <span class="month">June</span>
                                                <span class="year">2017</span>
                                                </a>
                                            </div>
                                            <a href=""> <img width="1400" height="875" src="{{url('assets/home/images/basketball-95607_1920.jpg')}}" class="img-responsive wp-post-image" alt="" loading="lazy" srcset="{{url('assets/home/images/basketball-95607_1920.jpg')}}" sizes="(max-width: 1400px) 100vw, 1400px">
                                            </a>
                                        </div>
                                        <div class="col-sm-7 news-item-info">
                                            <h3><a href="">Nike Urban Running Chalenge with Kobe 2016</a></h3>
                                            <span class="meta-data">June 2, 2017 | By Alex Maslov</span>
                                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesenlup.</p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="new-item-pagination">
                                    <nav aria-label="Page navigation" class="pull-left">
                                        <div class="pagination-wrapper pagination-wrapper-news">
                                            <ul class="pagination">
                                                <li>
                                                    <span aria-current="page" class="page-numbers current">1</span>
                                                </li>
                                                <li>
                                                    <a class="page-numbers" href="">2</a>
                                                </li>
                                                <li>
                                                    <a class="page-numbers" href="">3</a>
                                                </li>
                                                <li>
                                                    <span class="page-numbers dots">…</span>
                                                </li>
                                                <li><a class="page-numbers" href="">6</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="section-newsletter">
            <div class="container">
                <div class="section-content">
                    <h2>Stay Up to date With Your Favorite Events!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh <br> euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    <div class="mc4wp-form-fields">
                        <div class="newsletter-form clearfix">
                            <input type="text" name="EMAIL" value="" placeholder="Your E-mail address">
                            <button type="submit" class="button bnt-theme">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){

 $(document).on('click', '.page-link', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
 });

 function fetch_data(page)
 {
  var _token = $("input[name=_token]").val();
  $.ajax({
      url:"{{ route('category.pagination.fetch') }}",
      method:"POST",
      data:{_token: '{!! csrf_token() !!}', page:page},
      success:function(categorys)
      {
       $('#category_list').html(categorys);
      }
    });
 }



 $(document).on('change', '#date_event_search', function(event){
    event.preventDefault();
    var date = $(this).val();

    upcomming_events(date);
 });

 function upcomming_events(date)
 {
        // alert(date);
  $.ajax({
      url:"{{ route('event_date_search') }}",
      method:"POST",
      data:{_token: '{!! csrf_token() !!}', date:date},
      success:function(events)
      {
       $('#upcoming_events').html(events.view);
      }
    });
 }
});
</script>
