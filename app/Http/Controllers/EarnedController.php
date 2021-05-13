<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EarnedColor;

class EarnedController extends Controller
{
    public function index()
    {
        $earned_colors = EarnedColor::all();
        return $earned_colors;
    }
}
