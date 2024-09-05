<x-layout title="Episódios">
    <form method="post">
        @csrf
        <div class="p-5 col-md-12">
        <h1>Episódios</h1>
            <ul class="list-group mt-1">
                @foreach ($episodes as $episode)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Episódio {{ $episode->number }}
                        <input type="checkbox" 
                         name="episodes[]"
                         value="{{ $episode->id }}"
                         @if ($episode->watched) checked @endif>
                    </li>
                @endforeach
            </ul>
    
            <button class="btn btn-primary mt-3">Salvar</button>
        </div>
    </form> 
</x-layout>