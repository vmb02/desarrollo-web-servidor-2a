<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                'first_name' => 'Christian',
                'last_name' => 'Bale',
                'date_of_birth' => '1985-07-01'
            ],
            [
                'first_name' => 'Joaquin',
                'last_name' => 'Phoenix',
                'date_of_birth' => '1983-12-11'
            ]
        ]);
    }
}
