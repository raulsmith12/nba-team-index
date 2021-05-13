<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityColor;

class CityController extends Controller
{
    public function index()
    {
        $city_colors = CityColor::all();
        return $city_colors;
    }
}
