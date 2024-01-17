<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cancions')->insert([
            [
                'titulo_cancion' => 'Ave María',
                'duracion' => 140,
                'genero_cancion' => 'Pop',
                'artista_id' => 1
            ],
            [
                'titulo_cancion' => 'Lady Madrid',
                'duracion' => 185,
                'genero_cancion' => 'Pop',
                'artista_id' => 2
            ]
        ]);
    }
}
