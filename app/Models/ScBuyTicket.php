<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScBuyTicket extends Model
{
    use HasFactory;
        protected $table = 'sc_buy_tickets';
   
    protected $fillable =['section','row','seats','price'];
}
