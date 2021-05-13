<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentPlayer;

class CurrentPlayerController extends Controller
{
    public function index()
    {
        $current_players = CurrentPlayer::all();
        return $current_players;
    }
}
