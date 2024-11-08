<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenidos a La Gran Cosecha</title>
    <!-- Enlaza el CSS usando la función asset() -->
    <link rel="stylesheet" href="{{ asset('css/lagrancosecha.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-content">
            <h1>Bienvenidos a La Gran Cosecha</h1>
            <p>Aquí podrás comprar y vender tus productos a precios accesibles.</p>
            <div class="buttons-container">
                <!-- Enlaza a las rutas de login y registro -->
                <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
               
            </div>
        </div>
    </div>
</body>
</html>
