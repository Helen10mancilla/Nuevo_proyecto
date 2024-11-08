<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Cargar el CSS usando asset() -->
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h2>Login</h2>
            <!-- Formulario de inicio de sesión -->
            <form id="loginForm" action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?> <!-- Protección contra CSRF de Laravel -->
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>

            <!-- Selección de rol (aparecerá después de iniciar sesión) -->
            <div id="roleSelection" style="display: none;">
                <h3>Selecciona tu rol</h3>
                <label>
                    <input type="radio" name="rol" value="admin"> Administrador
                </label>
                <label>
                    <input type="radio" name="rol" value="cliente"> Cliente
                </label>
                <button id="roleSubmit">Continuar</button>
            </div>

           
        </div>
    </div>
    <!-- Enlaza el archivo JavaScript -->
    <script src="<?php echo e(asset('js/logica.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\User}\OneDrive\Escritorio\vacio\Pintegrador\resources\views/auth/login.blade.php ENDPATH**/ ?>