<ul class="clearfix multiple-items">
    @foreach ($upcomingevents as $event)

    <li class="up-events1" style="width:50%;height:345px;">
        <div class="date" style="left:0px;">
            <a href="">  <span class="day"> {{$event['sch_venue']->start_date->format('d')}}</span>
            <span class="month"> {{$event['sch_venue']->start_date->format('F')}}</span>
            <span class="year"> {{$event['sch_venue']->start_date->format('Y')}}</span></a>
        </div>
        <div class="price" style="right:38px;">
            <span class="txt"><span class="woocommerce-Price-amount amount">
            <span class="woocommerce-Price-currencySymbol">$</span>87.00</span></span>
        </div>
        @if(!empty($event['event_files']->flyer_path))

        <a href="{{route('find_ticket', ['id'=>$event->id])}}">
            <img width="100%" height="auto" src="{{url($event['event_files']->flyer_path)}}" class="events-img" alt="" loading="lazy" style="border-radius: 10px;">

             </a>
             @else
                 <a href="{{route('find_ticket', ['id'=>$event->id])}}">
            <img width="100%" height="auto" src="{{asset('assets/home/images/defult_flyer.png')}}" class="events-img" alt="" loading="lazy" style="border-radius: 10px;">

             </a>

        @endif
        <div class="info">
            <p><a href=""> {{$event->first_title}}</a> <span>{{$event->second_title}}</span></p>
            <a href="{{route('find_ticket', ['id'=>$event->id])}}" class="get-ticket">Get Ticket</a>
        </div>
    </li>
    @endforeach

</ul>
