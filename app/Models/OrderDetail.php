<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'cart_id'
    ];

    
    public function Product(){
        return $this->belongsTo(product::class);
    }

    public function carts(){
        return $this->belongsTo(Cart::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
