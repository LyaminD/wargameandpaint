<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'image',
        'jeu_id'
    ];

    public function jeu()
    {
        return $this->belongsTo(Jeu::class);
    }
    public function posts()
    {
        return $this->hasMany(Jeu::class);
    }
}
