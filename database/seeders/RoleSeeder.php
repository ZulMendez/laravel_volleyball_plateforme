<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "poste" => "Avant",
                "created_at" => now(),
            ],
            [
                "poste" => "Central",
                "created_at" => now(),
            ],
            [
                "poste" => "Arriere",
                "created_at" => now(),
            ],
            [
                "poste" => "Remplacant",
                "created_at" => now(),
            ],
        ]);
    }
}
