<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Round;

class ScoreboardController extends Controller
{
    public function all()
    {
        $rounds = Round::whereHas('games', function ($query) {
            $query->whereNotNull('home_score')
                ->whereNotNull('guest_score');
        })
            ->with('games', 'games.home', 'games.guest')
            ->get();

        return response()->json([
            'success' => true,
            'rounds' => $rounds,
        ]);
    }
}
