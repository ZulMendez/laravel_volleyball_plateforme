<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
            [
                "img" => "pomme.jpg",
                "created_at" => now(),
            ],
        ]);
    }
}
