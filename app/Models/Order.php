<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function order_list()
    {
     return $this->hasMany('App\Models\Order_list','order_id');
    }

    public function buyer()
    {
     return $this->belongsTo('App\Models\Buyer','buyer_id');
    }
    public static function order_items(){

        $orderitems=Order::with(['order_list'])->where('user_id',Auth::user()->id)->get();
        return $orderitems;
    }
    public static function order_delete($order_id){
        $order=Order::where('id',$order_id)->delete();
        $orderlist=Order_list::where('order_id',$order_id)->delete();
        return true;
    }


   
}
