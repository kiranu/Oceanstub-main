<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPolicy extends Model
{
    use HasFactory;
    protected $table = 'event_policies';
    protected $fillable =['return_policy',
                         'exchange_upgrade',
                          'rp_upto_hours',
                          'cc_deduction',
                          'sc_deduction',
                          'eu_upto_hours',
                          'eu_category',];

public function event()
  {
   return $this->belongsTo('App\Models\Event');
  }
}
