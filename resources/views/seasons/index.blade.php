<x-layout title="Temporada">

    @isset($mensagemSucesso)
        <div class="alert-success alert">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="p-5 col-md-12">
        
        <ul class="list-group mt-1">
            @foreach ($seasons as $season)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('episodes.index', $season->id) }}">Temporada {{ $season->number }}</a>
                    <span class="badge bg-secondary">
                        {{ $season->episodes->filter(fn ($episode) => $episode->watched)->count() }} / {{ $season->episodes->count()}}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>