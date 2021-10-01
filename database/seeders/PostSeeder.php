<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->insert([
            'id'=>'1',
            'content'=>'Voici un nouveau post pour tester',
            'titre'=>'Voici un nouveau titre',
            'faction_id'=>'1',
            'user_id'=>'1',
        ]);

        DB::table('posts')->insert([
            'id'=>'2',
            'content'=>'Voici encore un nouveau post pour tester',
            'titre'=>'Voici encore un nouveau titre',
            'faction_id'=>'1',
            'user_id'=>'1',
        ]);

        DB::table('posts')->insert([
            'id'=>'3',
            'content'=>'Voici encore et encore un nouveau post pour tester',
            'titre'=>'Voici encore et encore un nouveau titre',
            'faction_id'=>'2',
            'user_id'=>'1',
        ]);

        DB::table('posts')->insert([
            'id'=>'4',
            'content'=>'Voici toujours un nouveau post pour tester',
            'titre'=>'Voici toujours un nouveau titre',
            'faction_id'=>'2',
            'user_id'=>'1',
        ]);
    }
}
