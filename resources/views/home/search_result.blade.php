<div class="row">
    @foreach ($events as $event)
    <div class="col-md-3">
        <div class="ticket-card-container ticket-col-md">
            @isset($event['event_files']->flyer_path)
            <a href="#" class="imglink mnc">
                <img title="Evolution" src="{{url($event['event_files']->flyer_path)}}">
                </a>
            @endisset

            <div class="ticket-icon mnc">
                <a href="#">
                <i class="mfp-image fa fa-ticket "></i>
                </a>
            </div>
            <div class="ticket-card-second-section">
                <div class="ticket-calendar">
                    <div class="calendar-header">
                        <span class="month">{{$event['sch_venue']->start_date->format('F')}}</span>
                        <span class="Year"> {{$event['sch_venue']->start_date->format('Y')}}</span>
                    </div>
                    <div class="bottom">
                        <p class="day">{{$event['sch_venue']->start_date->format('d')}}</p>
                        <p class="dayOfWeek">{{$event['sch_venue']->start_date->format('D')}}</p>
                    </div>
                    <p class="time">{{$event['sch_venue']->start_time->format('h:i A')}}</p>
                </div>
                <div class="event-info">
                    <h4>{{$event->first_title}}</h4>
                    <p>
                        <i class="fa fa-map-marker"></i>
                        <span class="cEventLocaltion">&nbsp;&nbsp;_@_<span>{{$event['sch_venue']->venue->name}}</span></span>
                    </p>
                </div>
            </div>
            <a href="{{route('find_ticket', ['id'=>$event->id])}}" class="ticket-button">
            Tickets
            </a>
        </div>
    </div>
    @endforeach
</div>
<div class="custompagination">
{!! $events->links() !!}
</div>
