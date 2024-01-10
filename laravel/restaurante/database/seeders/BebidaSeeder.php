<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BebidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bebidas')->insert([
            [
                'nombre' => 'Nestea',
                'precio' => 1.50,
                'tipo' => 'Lata'
            ],
            [
                'nombre' => '1906',
                'precio' => 3.75,
                'tipo' => 'Botellín'
            ]
        ]);
    }
}
