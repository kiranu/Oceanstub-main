<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatingChart extends Model
{
    use HasFactory;
    protected $table = 'seating_charts';
    protected $fillable =['seating_chart_name','seating_chart_data'];
}
