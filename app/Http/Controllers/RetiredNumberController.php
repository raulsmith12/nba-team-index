<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RetiredNumber;

class RetiredNumberController extends Controller
{
    public function index()
    {
        $retired_numbers = RetiredNumber::all();
        return $retired_numbers;
    }
}
