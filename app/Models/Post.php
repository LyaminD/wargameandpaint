<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'content',
        'user_id',
        'titre',
        'faction_id'
    ];  

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function faction()
    {
        return $this->belongsTo(Faction::class);
    }
}