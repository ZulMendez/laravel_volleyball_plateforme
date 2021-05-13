<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipes')->insert([
            [
                "nom" => 'Molengeek',
                "ville" => 'Bruxelles',
                "pays" => 'Belgique',
                "max" => 6,
                "AT" => 1,
                "CT" => 0,
                "DC" => 1,
                "RP" => 0,
                "continent_id" => 1,
                "created_at" => now(),
            ],
            [
                "nom" => 'Ecole19', 
                "ville" => 'Berlin',
                "pays" => 'Allemagne',
                "max" => 6,
                "AT" => 1,
                "CT" => 1,
                "DC" => 0,
                "RP" => 1,
                'continent_id' => 2,
                "created_at" => now(),
            ],
            [
                "nom" => 'BeCode', 
                "ville" => 'Tokyo',
                "pays" => 'Japon',
                "max" => 6,
                "AT" => 1,
                "CT" => 0,
                "DC" => 0,
                "RP" => 0,
                'continent_id' => 3,
                "created_at" => now(),
            ],
            [
                "nom" => 'Codecademy', 
                "ville" => 'California',
                "pays" => 'USA',
                "max" => 6,
                "AT" => 0,
                "CT" => 0,
                "DC" => 2,
                "RP" => 0,
                'continent_id' => 4,
                "created_at" => now(),
            ],
        ]);
    }
}
