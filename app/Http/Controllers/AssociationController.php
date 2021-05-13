<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssociationColor;

class AssociationController extends Controller
{
    public function index()
    {
        $association_colors = AssociationColor::all();
        return $association_colors;
    }
}
