<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'content',
        'image_id',
        'user_id',
        'titre',
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
    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}