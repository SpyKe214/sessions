<header>
    <nav>
        
        @if(session()->has('token'))
            <span>Hola, {{ session('name') }}</span>
            
          
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        @else
            <a href="{{ route('login') }}">Iniciar sesión</a>
            <a href="/register">Crear cuenta</a>
        @endif
    </nav>
</header>