<h1>Hospital Veterinário</h1>
<p>Absolutamente cinema</p>



@auth

    @if(auth()->user()->role === 'admin')
        <a href="#">"Se você está vendo este link é porque você é um admin"</a>
    @else
        <a href="#">"Se você está vendo este link é porque você é um usuário"</a>

    @endif


    <br>
    <a href="/logout">Logout</a>

@endauth
