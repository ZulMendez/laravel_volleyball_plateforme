<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert([
            [
                "continent" => "Europe",
                "created_at" => now(),
            ],
            [
                "continent" => "Asie",
                "created_at" => now(),
            ],
            [
                "continent" => "Afrique",
                "created_at" => now(),
            ],
            [
                "continent" => "Amerique",
                "created_at" => now(),
            ],
        ]);
    }
}
