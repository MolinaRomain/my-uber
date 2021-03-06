<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    public function product()
    {
        return $this->belongsToMany(Product::class)->using(CartProduct::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
