<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert(
            array(
                array(
                    'nom_produit' => 'pizza fromage',

                ),
                array(
                    'nom_produit' => 'pizza chorizo',
                ),
                array(
                    'nom_produit' => 'pizza Royale',
                )
            )
        );
    }
}
