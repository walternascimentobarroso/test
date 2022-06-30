<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BlacklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blacklists')->insert(
            [
                'domain' => 'mail.com',
                'description' => 'Domain in blacklist', 
                'active' => 1
            ],
        );
    }
}
