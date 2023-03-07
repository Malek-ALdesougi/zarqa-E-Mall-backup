<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'price',
        'quantity',
        'image',
        'tag',
        'description'
    ];


    public function stores()
    {
        return $this->belongsTo(Store::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }
}
