<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable =['event_type',
                         'event_category',
                         'event_package',
                         'must_buy',
                         'event_name',
                         'discount',
                        'promo_code',
                        'promo_type',
                        'effective_date',
                        'effective_time',
                        'expire_date',
                        'expire_time',
                        'timezone',
                        'event_count',
                        'min_pur_amt',
                        'max_pur_amt',
                        'min_ticket_price',
                        'max_ticket_price',
                        'min_no_ticket',
                        'max_no_ticket',
                        'max_no_usage',
                        
                        ];
}
