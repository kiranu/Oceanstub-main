<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    use HasFactory;
      protected $table = 'event_files';
    protected $fillable =['flyer_name','flyer_path','picture_name','picture_path','video_id','social_media'];

    public function event()
  {
   return $this->belongsTo('App\Models\Event');
  }
}
