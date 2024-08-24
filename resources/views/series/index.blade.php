<x-layout title="Séries">
    <div class="p-5 col-md-6">
        <h1>Séries</h1>

        @isset($mensagemSucesso)
            <div class="alert-success alert">
                {{ $mensagemSucesso }}
            </div>
        @endisset
        
        <a href="series/criar" class="btn btn-primary mt-2">Adicionar</a>
        <ul class="list-group mt-1">
            @foreach ($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $serie->nome }}
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">E</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>