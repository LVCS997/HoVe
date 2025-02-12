<form method="post" action="/login/index">
    @csrf

    <!-- Campo de Email -->
    <div>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <!-- Campo de Senha -->
    <div>
        <input type="password" name="password" placeholder="Senha">
        @error('password')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <!-- Botão de Envio -->
    <button type="submit">Entrar</button>
</form>
