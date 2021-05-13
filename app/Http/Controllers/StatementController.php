<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatementColor;

class StatementController extends Controller
{
    public function index()
    {
        $statement_colors = StatementColor::all();
        return $statement_colors;
    }
}
