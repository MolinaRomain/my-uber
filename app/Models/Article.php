<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    use HasFactory;

/*     public function panier()
    {
        return $this->belongsToMany(Panier::class);
    } */

    public function article(){
        return $this->belongsToMany(Panier::class)->using(ArticlePanier::class);
    }
}
