<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScTicket extends Model
{
    use HasFactory;
    
    protected $table = 'sc_tickets';
    protected $fillable =['sc_assigned_data'];
}
