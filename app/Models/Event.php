<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Seller;


class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable =['first_title','second_title','currency',];

    public static function my_events(){
        $user_id=Auth::user()->id;
        $seller=Seller::select('id')->where('user_id',$user_id)->first();
        $seller_id=$seller->id;
        $events=Event::where('seller_id',$seller_id)->get();
        return $events;
    }

     public function sch_venue()
    {
     return $this->hasOne('App\Models\EventVenueSchedule');
    }
      public function event_ticket()
    {
     return $this->hasOne('App\Models\EventTicket');
    }
      public function event_types()
    {
     return $this->hasOne('App\Models\EventType');
    }
      public function event_sales()
    {
     return $this->hasOne('App\Models\EventSales');
    }
      public function event_policies()
    {
     return $this->hasOne('App\Models\EventPolicy');
    }
      public function event_files()
    {
     return $this->hasOne('App\Models\EventFile');
    }
      public function event_details()
    {
     return $this->hasOne('App\Models\EventDetails');
    }
    public function seller()
    {
     return $this->belongsTo('App\Models\Seller','seller_id');
    }
    public function sc()
    {
     return $this->hasOne('App\Models\ScTicket');
    }
        public function event_payment()
    {
     return $this->hasOne('App\Models\EventPaymentMethod');
    }
    // public function event_list()
    // {
    //  return $this->belongsTo('App\Models\Event_Package_List');
    // }

}
