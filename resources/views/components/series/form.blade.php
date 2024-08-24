<form action="{{ $action }}" method="post">
    @csrf

    @isset($nome)
        @method('PUT')
    @endisset
    
    <div class="p-5 col-md-6">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" @isset($nome)value="{{ $nome }}"@endisset>
        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </div>
</form>