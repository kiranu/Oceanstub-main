<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Package_List extends Model
{
    use HasFactory;

    public function events()
    {
    return $this->hasOne('App\Models\Event','id','event_id');
    }
    public function event()
  {
   return $this->belongsTo('App\Models\Event','event_id');
  }
    public function users()
    {
    return $this->belongsTo('App\Models\Users','user_id');
    }
}
