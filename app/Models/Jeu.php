<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'image',
       
    ];

    protected $table = 'jeux';

    public function factions()
    {
        return $this->hasMany(Faction::class);
    }
}
