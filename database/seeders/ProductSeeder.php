<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            array(
                array(
                    'product_name' => 'pizza fromage',

                ),
                array(
                    'product_name' => 'pizza chorizo',
                ),
                array(
                    'product_name' => 'pizza Royale',
                )
            )
        );
    }
}
