<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricPlayer;

class HistoricPlayerController extends Controller
{
    public function index()
    {
        $historic_players = HistoricPlayer::all();
        return $historic_players;
    }
}
