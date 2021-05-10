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
                "poste" => "avant",
                "created_at" => now(),
            ],
            [
                "poste" => "central",
                "created_at" => now(),
            ],
            [
                "poste" => "arriere",
                "created_at" => now(),
            ],
            [
                "poste" => "remplace",
                "created_at" => now(),
            ],
        ]);
    }
}
