<x-layout title="Séries"></x-layout>
    <ul>
        @foreach ($series as $serie)
            <li>{{ $serie }}</li>
        @endforeach
    </ul>
</body>
</html>