<x-layout title="Nova série"></x-layout>
<form action="{{ route('series.store') }}" method="post">
    @csrf
    <div class="p-5 col-md-6">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome">
        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </div>
</form>