<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index(Request $request) 
    {
        $series = [
            'Punisher',
            'Lost',
            'GOT'
        ];

        return view('series.index')->with('series', $series);
    }
}
