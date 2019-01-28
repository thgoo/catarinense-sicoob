<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Game extends Model
{
    protected $fillable = [
        'game_id',
        'round_id',
        'home_id',
        'guest_id',
        'home_score',
        'guest_score',
        'home_score_penalty',
        'guest_score_penalty',
        'stadium_name',
        'match_time',
        'created_at',
        'updated_at',
    ];

    public function getMatchTimeAttribute($value)
    {
        $days = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'];
        return $days[Carbon::parse($value)->format('N') - 1] . ', ' . Carbon::parse($value)->format('d/m');
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function home()
    {
        return $this->belongsTo(Team::class, 'home_id');
    }

    public function guest()
    {
        return $this->belongsTo(Team::class, 'guest_id');
    }
}
