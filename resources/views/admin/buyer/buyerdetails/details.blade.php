<div class="card-body">
<div class="tab-content" id="custom-tabs-one-tabContent">
<div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding-left: 10px;">
    <br>
    <h3 class="devider ColTextHighlight" style="color: #007bff" ;=""><i class="fa fa-info-circle fa-15x "></i>&nbsp;&nbsp;buyer Details
    </h3>
    <hr>
    <div class="block" style="padding-left:10px;">
        <p><span class="ColTextHighlight" style="color: #007bff">Buyer Name: </span>{{$buyer['buyer']->first_name}} {{$buyer['buyer']->last_name}} </p>
        <p><span class="ColTextHighlight" style="color: #007bff">Buyer Email: </span> {{$buyer->email}}</p>
        {{-- <p><span class="ColTextHighlight" style="color: #007bff">buyer Email: </span> Email</p> --}}
    </div>
    <br>
    {{-- <span class="cNewPlan">
    <h3 class="devider ColTextHighlight" style="color: #007bff">Venue and Time</h3>
    <hr>
    <p><span class="ColTextHighlight" style="color: #007bff">Location: </span> lo</p>
    <p><span class="ColTextHighlight" style="color: #007bff">Start Date: </span>j --}}
    {{-- {{$event['sch_venue']->start_date->format('d-m-Y')." on ".$event['sch_venue']->start_time->format('h:i:sa')}} --}}
    </p>
</div>
</div>
</div>
