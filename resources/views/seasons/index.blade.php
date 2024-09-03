<x-layout title="Séries">
    
    <div class="p-5 col-md-12">
        <ul class="list-group mt-1">
            @foreach ($seasons as $season)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Temporada {{ $season->number }}
                    <span class="badge bg-secondary">
                        {{ $season->episodes->count()}}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>