<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use App\Exports\BulkExport;
use Session;
use Auth;

class Order_list extends Model
{

    use HasFactory;

    protected $table = 'order_lists';
    protected $fillable = [
        'crated_at',
    ];

    public function events()
    {
     return $this->belongsTo('App\Models\Event','event_id');
    }

    public function event()
    {
     return $this->belongsTo('App\Models\Event','event_id');
    }
    public function events_time()
    {
     return $this->belongsTo('App\Models\EventVenueSchedule','event_id','event_id');
    }
    public function buyer()
    {
     return $this->belongsTo('App\Models\Buyer','buyer_id');
    }
    public function ticket()
    {
     return $this->belongsTo('App\Models\TicketPrice','ticket_id');
    }
    public static function mytickets(){
        $user_id=Auth::user()->id;
        $tickets=Order_list::where('user_id',$user_id)->get();
        return $tickets;

    }
    public static function upcoming_ticket(){
        $user_id=Auth::user()->id;
        $tickets=Order_list::whereHas('events_time', function ($query)
            {$query->whereDate('start_date','>',date('Y-m-d'));})
            ->with('ticket','events_time','events')
            ->where('user_id',$user_id)
            ->get();
        return $tickets;
    }

public function order()
{
return $this->belongsTo('App\Models\Order','order_id');
}




}
