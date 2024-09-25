<x-layout title="Nova série">
    <form action=" {{ route('series.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="row mb-3">
            <div class="p-5 col-md-6">
                <label for="nome">Nome:</label>
                <input autofocus type="text" class="form-control" id="nome" name="nome" value="{{ old('name') }}">
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
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" accept="image/gif, image/jpeg, image/png" name="cover" class="control form-control">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
</x-layout>