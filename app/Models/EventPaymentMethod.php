<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'event_payment_methods';
    protected $fillable =['paypal_id','ifsc','account_no','branch','holder_name',];

public function event()
  {
  return $this->belongsTo('App\Models\Event');
  }
}
