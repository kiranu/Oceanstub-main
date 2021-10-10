<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleAnalytic extends Model
{
    use HasFactory;
    protected $table = 'google_analytics';
    protected $fillable =['analytics_id',
                           'ad_conversion_id',
                           'ad_conversion_label',
                           ];
}
