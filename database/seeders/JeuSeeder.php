<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JeuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jeux')->insert([
            'nom'=>'Age Of Sigmar',
        ]);
        DB::table('jeux')->insert([
         'nom'=>'Warhammer 40 000',
     ]);
    }
}