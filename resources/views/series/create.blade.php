<x-layout title="Nova série"></x-layout>
<form action="/series/salvar" method="post">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">
    <button type="submit">Adicionar</button>
</form>