<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventTicket;

class TicketPrice extends Model
{
    use HasFactory;
    protected $table = 'ticket_prices';
    protected $primarykey='id';
    protected $fillable =['name',
                        'sold',
                        'description',
                        'face_price',
                        'service_charge',
                        'capacity',
                        'sort_order',
                        'price_password',
                        'buy_price',
                        'min_trans',
                        'max_trans',
                        'available_inc',
                        'start_sale_date',
                        'start_sale_time',
                        'end_sale_date',
                        'end_sale_date',
                    ];

 public function event_ticket()
    {
    return $this->belongsTo(EventTicket::class);
    }             
}
