<x-layout title="Séries"></x-layout>
<div class="p-5 col-md-6">
    <h1>Séries</h1>
    <a href="series/criar" class="btn btn-primary mt-2">Adicionar</a>
    <ul class="list-group mt-1">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</div>