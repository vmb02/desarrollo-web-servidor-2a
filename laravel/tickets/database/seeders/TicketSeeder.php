<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'date' => Carbon::create('2024', '01', '17'),
                'price' => 1.60,
                'train_id' => 1,
                'ticket_type_id' => 1
            ],
            [
                'date' => Carbon::create('2024', '01', '18'),
                'price' => 1.35,
                'train_id' => 2,
                'ticket_type_id' => 2
            ],
            [
                'date' => Carbon::create('2024', '01', '19'),
                'price' => 1.75,
                'train_id' => 3,
                'ticket_type_id' => 3
            ]
        ]);
    }
}
