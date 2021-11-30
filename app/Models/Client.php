<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'address', 'phone',
    ];
    //Un Client = un panier
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
