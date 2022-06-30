<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(
            [
                ['description' => 'Email'],
                ['description' => 'Password']
            ]
        );
    }
}
