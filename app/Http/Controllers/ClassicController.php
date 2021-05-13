<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassicColor;

class ClassicController extends Controller
{
    public function index()
    {
        $classic_colors = ClassicColor::all();
        return $classic_colors;
    }
}
