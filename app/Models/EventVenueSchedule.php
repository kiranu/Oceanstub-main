<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVenueSchedule extends Model
{
    use HasFactory;
        protected $table = 'event_venue_schedules';
    protected $fillable =['venue_list','start_date','start_time','days','hours','minuts','show_time','show_date'];
    protected $dates = ['created_at', 'updated_at', 'start_date','start_time'];
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
    public function venue()
    {
        return $this->belongsTo('App\Models\Venue','venue_list');
    }
}
