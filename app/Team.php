<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id',
        'name',
        'image',
        'created_at',
        'updated_at',
    ];

    public function gamesAsHome()
    {
        return $this->hasMany(Game::class, 'home_id');
    }

    public function gamesAsGuest()
    {
        return $this->hasMany(Game::class, 'guest_id');
    }
}
