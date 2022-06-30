<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert(
            [
                'rule' => '/([a-zA-Z])\1{2,}/',
                'description' => 'letters in loop', 
                'type_id' => 1,
                'active' => 1
            ],
        );
    }
}
