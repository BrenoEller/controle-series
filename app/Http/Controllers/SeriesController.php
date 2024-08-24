<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    
    public function index(Request $request) 
    {
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create() 
    {
        
        return view('series.create');
    }

    public function store(Request $request) 
    {
        Serie::create($request->all());
        
        return to_route('series.index')->with('mensagem.sucesso', "Série criada com sucesso!");
    }

    public function destroy(Request $request) 
    {
        Serie::destroy($request->serie);

        return to_route('series.index')->with('mensagem.sucesso', 'Série removida com sucesso!');
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Request $request, Serie $series)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', 'Série atualizada com sucesso!');
    }
}
