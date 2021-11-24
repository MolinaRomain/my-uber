<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    //Un Client = un panier
    public function panier()
    {
        return $this->hasOne(Panier::class);
    }
}
