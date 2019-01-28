<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'number',
        'name',
        'created_at',
        'updated_at',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
