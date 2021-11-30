<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
            array(
                array(
                    'id' => '1',

                ),
                array(
                    'id' => '2',
                ),
                array(
                    'id' => '3',
                )
            )
        );
    }
}
