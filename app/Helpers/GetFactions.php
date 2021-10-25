<?php

use App\Models\Faction;


function GetFactions()
{
    $factions = Faction::all();
    return $factions;
}
