<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 0; $i < 11; $i++) {

            $randName = Str::random(10);
            $randMail = Str::random(4);
            $randPass = Str::random(6) . rand(100, 200) . '!!!';

            DB::table('users')->insert([
                'prenom' => $randName,
                'nom' => $randName,
                'pseudo' => $randName,
                'email' => $randMail . '@' . $randMail . '.fr',
                'imageprofil' => 'avatar.jpg',
                'password' => $randPass,
            ]);
        }

        DB::table('users')->insert([
            'prenom' => 'TEST',
            'nom' => 'TEST',
            'pseudo' => 'TEST',
            'email' => 'test@test.fr',
            'imageprofil' => 'avatar.jpg',
            'password' => 'Azerty123!',
        ]);

        DB::table('users')->insert([
            'prenom' => 'Yamms',
            'nom' => 'Yamms',
            'pseudo' => 'Yamms',
            'email' => 'Lyamin.diafat@sfr.fr',
            'imageprofil' => 'avatar.jpg',
            'password' => 'Azerty123!',
            'role_id' => 2,
        ]);
    }
}
