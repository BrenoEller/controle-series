<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repository\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
    }

    public function index(Request $request) 
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create() 
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) 
    {
        $serie = $this->repository->add($request);
        
        return to_route('series.index')->with('mensagem.sucesso', "Série criada com sucesso!");
    }

    public function destroy(Request $request) 
    {
        Series::destroy($request->serie);

        return to_route('series.index')->with('mensagem.sucesso', 'Série removida com sucesso!');
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(SeriesFormRequest $request, Series $series)
    {
        $series->fill($request->all());
        $series->save();

        return redirect()->route('series.index')->with('mensagem.sucesso', 'Série atualizada com sucesso!');
    }
}
