<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventSubCategory;
class EventCategory extends Model
{
    use HasFactory;
    protected $table = 'event_cat';
    protected $fillable = ['cat'];

    public function sub_category()
    {
     return $this->hasMany(EventSubCategory::class);
    }
}
