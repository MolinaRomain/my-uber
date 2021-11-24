<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    //use HasFactory;

/*     public function client()
    {
        return $this->belongsTo(Client::class);
    } */

    public function article(){
        return $this->belongsToMany(Article::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
