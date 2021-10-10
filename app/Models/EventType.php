<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $table = 'event_types';
    protected $fillable =['online','streaming','embed_code','allow_reentry','on_demand','seating_type','event_type','event_genre',];


     public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }
}
