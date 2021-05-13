<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IconColor;

class IconController extends Controller
{
    public function index()
    {
        $icon_colors = IconColor::all();
        return $icon_colors;
    }
}
