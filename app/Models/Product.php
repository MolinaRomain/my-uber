<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

/*     public function panier()
    {
        return $this->belongsToMany(Panier::class);
    } */

    public function article(){
        return $this->belongsToMany(Cart::class)->using(ProductCart::class);
    }
}
