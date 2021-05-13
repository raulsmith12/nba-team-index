<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherName;

class OtherNameController extends Controller
{
    public function index()
    {
        $other_names = OtherName::all();
        return $other_names;
    }
}
