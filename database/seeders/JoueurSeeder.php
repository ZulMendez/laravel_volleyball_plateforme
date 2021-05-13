<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JoueurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joueurs')->insert([
            [
                "nom" => "Mendez",
                "prenom" => "Zulma",
                "age" => 30,
                "tel" => 486345789,
                "email" => "zumendez@gmail.com",
                "photo_id" => 1,
                "genre_id" => 1,
                "role_id" => 1,
                "equipe_id" => 1,
                "created_at" => now(),
            ],
            [
                "nom" => "Martinez",
                "prenom" => "Jose",
                "age" => 25,
                "tel" => 486348659,
                "email" => "josemart@gmail.com",
                "photo_id" => 2,
                "genre_id" => 2,
                "role_id" => 2,
                "equipe_id" => 1,
                "created_at" => now(),
            ],
            [
                "nom" => "Caliskan",
                "prenom" => "Ayhan",
                "age" => 24,
                "tel" => 489423789,
                "email" => "ayhancalisk@gmail.com",
                "genre_id" => 2,
                "role_id" => 1,
                'photo_id' => 1,
                "equipe_id" => 1,
                "created_at" => now(),
            ],
            [
                "nom" => "Abou",
                "prenom" => "Elias",
                "age" => 30,
                "tel" => 497650435,
                "email" => "eliasabou@gmail.com",
                "genre_id" => 2,
                "role_id" => 2,
                'photo_id' => 2,
                "equipe_id" => 2,
                "created_at" => now(),
            ],
            [
                "nom" => "Primo",
                "prenom" => "Nico",
                "age" => 27,
                "tel" => 495478970,
                "email" => "nicoprimo@gmail.com",
                "genre_id" => 2,
                "role_id" => 3,
                'photo_id' => 3,
                "equipe_id" => 3,
                "created_at" => now(),
            ],
            [
                "nom" => "Lionel",
                "prenom" => "Ayoub",
                "age" => 25,
                "tel" => 478956480,
                "email" => "ayoub@gmail.com",
                "genre_id" => 2,
                "role_id" => 3,
                'photo_id' => 4,
                "equipe_id" => null,
                "created_at" => now(),
            ],
            [
                "nom" => "Hazard",
                "prenom" => "Louise",
                "age" => 23,
                "tel" => 467858903,
                "email" => "louise@gmail.com",
                "genre_id" => 1,
                "role_id" => 3,
                'photo_id' => 5,
                "equipe_id" => null,
                "created_at" => now(),
            ],
            [
                "nom" => "Debruyne",
                "prenom" => "Bene",
                "age" => 22,
                "tel" => 498704527,
                "email" => "bene@gmail.com",
                "genre_id" => 2,
                "role_id" => 3,
                'photo_id' => 6,
                "equipe_id" => 3,
                "created_at" => now(),
            ],
            [
                "nom" => "Pedro",
                "prenom" => "Maxence",
                "age" => 25,
                "tel" => 485785901,
                "email" => "maxence@gmail.com",
                "genre_id" => 2,
                "role_id" => 3,
                'photo_id' => 7,
                "equipe_id" => 1,
                "created_at" => now(),
            ],
            [
                "nom" => "Aguero",
                "prenom" => "Abdellah",
                "age" => 23,
                "tel" => 475489723,
                "email" => "abdellah@gmail.com",
                "genre_id" => 1,
                "role_id" => 3,
                'photo_id' => 8,
                "equipe_id" => null,
                "created_at" => now(),
            ],
        ]);
    }
}
