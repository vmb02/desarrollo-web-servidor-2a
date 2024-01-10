<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platos')->insert([
            [
                'nombre' => 'Rabo de toro',
                'precio' => 14.36,
                'tipo' => 'Ración'
            ],
            [
                'nombre' => 'Rosada frita',
                'precio' => 12-87,
                'tipo' => 'Ración'
            ]
        ]);
    }
}
