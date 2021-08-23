<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factions')->insert([
            'nom'=>'Adepta Soritas',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Adeptus Custodes',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Astra Militarum',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Craftworld',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Drukhari',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Culte Genestealer',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Harlequin',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Chevalier Impérial',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Nécron',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Ork',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Space Marine',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Chaos',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Tau',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Tyranid',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Ynnari',
            'jeu_id' => 2
        ]);
        DB::table('factions')->insert([
            'nom'=>'Beast Of Chaos',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'City Of Sigmar',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Daughters of Khaine',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Flesh Eater Courts',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Fire Slayer',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Gloomspite',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Idoneth',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Kharadron',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Lumineth',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Nighthaunt',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Ogor',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Oruk',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Ossiarch',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Seraphon',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Skaven',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Slave To Darkness',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Sons Of Behemat',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Soulblight',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Stormcast Eternal',
            'jeu_id' => 1
        ]);
        DB::table('factions')->insert([
            'nom'=>'Sylvaneth',
            'jeu_id' => 1
        ]);
    }
}