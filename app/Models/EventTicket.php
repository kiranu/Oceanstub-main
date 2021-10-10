<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TicketPrice;

class EventTicket extends Model
{
    use HasFactory;
    protected $primarykey='id';
    protected $table = 'event_tickets';
    protected $fillable =['tax','note','color',];



 public function ticket_price()
    {
      return $this->hasMany(TicketPrice::class);
    }
     public function event()
    {
      return $this->belongsTo('App\Models\Event');
    }
    

}
