<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all()->toArray();
        return $teams;
    }

    public function show($id)
    {
        $team = Team::find($id);
        return response()->json($team);
    }
}
