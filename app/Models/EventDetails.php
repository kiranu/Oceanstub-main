<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use HasFactory;
    protected $table = 'event_details';
    protected $fillable =['remining_ticket','remining_no','tax_service','price_level','mark_as','ticket_btn_text','event_descriptions','purchase_notes','check_group','check_password','check_limit','group_name','ticket_passworsd','limit','organizer_id','eventshown_id','merchshown_id','categories',];

  public function event()
  {
  return $this->belongsTo('App\Models\Event');
  }
}
