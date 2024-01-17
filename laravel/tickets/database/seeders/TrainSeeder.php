<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trains')->insert([
            [
                'name' => 'Tren1',
                'passengers' => 80,
                'year' => 2010,
                'train_type_id' => 1
            ],
            [
                'name' => 'Tren2',
                'passengers' => 75,
                'year' => 2011,
                'train_type_id' => 2
            ],
            [
                'name' => 'Tren3',
                'passengers' => 83,
                'year' => 2012,
                'train_type_id' => 3
            ]
        ]);
    }
}
