<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSales extends Model
{
    use HasFactory;
      protected $table = 'event_sales';
    protected $fillable =[
                          'start_date',
                          'start_time',
                          'end_date',
                          'end_time',];


public function event()
  {
   return $this->belongsTo('App\Models\Event');
  }
}
