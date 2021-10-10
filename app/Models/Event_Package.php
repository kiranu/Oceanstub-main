<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Package extends Model
{
    use HasFactory;
    public function event_list()
    {
     return $this->hasMany('App\Models\Event_Package_List','package_id');
    }
}
