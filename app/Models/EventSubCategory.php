<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSubCategory extends Model
{
use HasFactory;
protected $table = 'event_sub_cat';

protected $fillable = ['sub'];
/*public function category()
  {
  return $this->belongsTo('App\Models\EventCategory');
  }*/
}
