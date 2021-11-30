<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function shipper(){
        return $this->belongsTo(Shipper::class);
    }

}
