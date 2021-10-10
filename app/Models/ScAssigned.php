<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScAssigned extends Model
{
    use HasFactory;
     protected $table = 'sc_assigneds';
    protected $fillable =['section',
                          'section_name',
                          'pricelevel_id',
                          'capacity',
                           ];
}
