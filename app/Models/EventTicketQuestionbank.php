<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTicketQuestionbank extends Model
{
    use HasFactory;
         protected $table = 'event_ticket_questionbanks';
    protected $fillable =['qus_per_ticket',];
}
