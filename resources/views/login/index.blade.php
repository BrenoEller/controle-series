<x-layout title="Login">
    <h1>Login</h1>
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password" class="form-control-label">password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3" type="submit">Entrar</button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Registrar</a>
    </form>
</x-layout>