<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Session;
class EventReferrals extends Model
{
    use HasFactory;
    protected $table = 'event_referrals';
    protected $fillable =['type',
                           'referrer_code',
                           'ticket_id',
                           'event_id'];

    public function scopeStartsBetween(Builder $query, $from,$to):Builder
    {  
    return $query->whereBetween('created_at', [$from.' 00:00:00',$to.' 23:59:59']);
    }

    public function scopeId(Builder $query, $id):Builder
    {  
        if($id == 0)
            {
            return $query->where('seller_id',Session::get('seller_id'));
            }else{
    return $query->where('event_id', $id);
        }
    }
}
