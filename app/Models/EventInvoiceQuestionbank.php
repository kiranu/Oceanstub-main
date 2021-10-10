<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInvoiceQuestionbank extends Model
{
    use HasFactory;
     protected $table = 'event_invoice_questionbanks';
    protected $fillable =['qus_per_invoice',];
}
