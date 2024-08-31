<x-layout title="Nova série">
    <form action=" {{ route('series.store') }}" method="post">
        @csrf
        
        <div class="row mb-3">
            <div class="p-5 col-md-6">
                <label for="nome">Nome:</label>
                <input autofocus type="text" class="form-control" id="nome" name="nome" value="{{ old('name') }}">
                <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
            </div>
            <div class="p-5 col-md-3">
                <label for="seasonsQty">N de temporadas:</label>
                <input type="text" class="form-control" id="seasonsQty" name="seasonsQty" value="{{ old('seasonsQty') }}">
            </div>
            <div class="p-5 col-md-3">
                <label for="episodesQty">N de epísodios:</label>
                <input type="text" class="form-control" id="episodesQty" name="episodesQty" value="{{ old('episodesQty') }}">
            </div>
        </div>
    </form>
</x-layout>