<x-layout title="Editar série">
    <x-series.form :action="route('series.update', $series->id)" :nome="$series->nome"></x-series.form>
</x-layout>