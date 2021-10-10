<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerPayment extends Model
{
    use HasFactory;
    public function buyer()
    {
     return $this->belongsTo('App\Models\Buyer','buyer_id');
    }
    public function order()
    {
     return $this->belongsTo('App\Models\Order','order_id');
    }
}
