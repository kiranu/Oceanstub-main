<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Venue extends Model
{
    use HasFactory;
    protected $table = 'venues';
     protected $fillable = ['name',
							'seat_chart',
							'region',
							'street',
							'city',
							'state',
							'zip_code',
							'country',
							'time_zone'];


}
