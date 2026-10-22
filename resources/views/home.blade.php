<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
</head>
<body>
    <header style="background-color: #f3f4f6; padding: 15px; margin-bottom: 20px;">
        <nav>
            
            @if(session()->has('token'))
                <span style="margin-right: 15px; font-weight: bold;">Hola, {{ session('name') }}</span>
                
                
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
             
                <a href="{{ route('login') }}" style="margin-right: 10px;">Iniciar sesión</a>
                <a href="#">Crear cuenta</a>
            @endif
        </nav>
    </header>

    <main>
        <h1>Bienvenido a la página principal</h1>
        <p>Esta es la vista "home" que Laravel estaba buscando.</p>
    </main>
</body>
</html>