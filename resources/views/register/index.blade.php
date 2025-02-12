<form method="post" action="/register/index">
    @csrf
    <input type="text" name="name" placeholder="nome">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="senha">
    <button type="submit">Registrar</button>
</form>
