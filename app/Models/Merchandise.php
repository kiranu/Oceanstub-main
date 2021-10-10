<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Session;

class Merchandise extends Model
{
    use HasFactory;
    protected $table = 'merchandises';
    protected $fillable =['tax','type','name','keyword','sold_out','active','featured','price'
    ,'sale_price','sortorder','event_orgainizer','description','filenames'];

 
  
 
    

   

    public function scopeId(Builder $query, $id):Builder
    {  
        if($id == 0)
            {
            return $query->where('seller_id',Session::get('seller_id'));
            }else{
    return $query->where('event_orgainizer', $id);
        }
    }
     public function scopeName(Builder $query, $name):Builder
    {  
        
    return $query->where('name', $name);
        
    }
}
