<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Http\Controllers\Controller;

class ApiSeriesController extends Controller 
{
    public function index()
    {
        return Series::all();
    }
}