<x-layout title="Séries"></x-layout>
    <a href="series/criar">Adicionar</a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
</body>
</html>