<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //use HasFactory;

/*     public function client()
    {
        return $this->belongsTo(Client::class);
    } */

    public function article(){
        return $this->belongsToMany(Product::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
