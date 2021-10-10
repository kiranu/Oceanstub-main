<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Session;

class TicketInvoice extends Model
{
    use HasFactory;
    protected $table = 'ticket_invoices';
    protected $fillable =['name',
                           'email',
                           'password',
                           'action',
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

	public function event()
    {
    return $this->belongsTo('App\Models\Event','event_id');
    }
	public function seller()
    {
     return $this->belongsTo('App\Models\Seller','seller_id');
    }
	public function buyer()
    {
     return $this->belongsTo('App\Models\Buyer','buyer_id');
    }
	public function ticket()
    {
     return $this->belongsTo('App\Models\TicketPrice','ticket_id');
    }
}
