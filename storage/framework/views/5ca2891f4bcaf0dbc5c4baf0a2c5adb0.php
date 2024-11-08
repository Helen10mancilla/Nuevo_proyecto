<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'La Gran Cosecha'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/cliente.css')); ?>">
</head>
<body>
    <header>
        <h1>La Gran Cosecha</h1>
        <nav>
            <ul>
                <li><a href="#" id="inicioBtn">Inicio</a></li>
                <li><a href="#" id="categoriasBtn">Categorías</a></li>
                <li><a href="#" id="carritoBtn">Carrito (<span id="carritoCantidad">0</span>)</a></li>
            </ul>
        </nav>
    </header>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <script src="<?php echo e(asset('js/cliente.js')); ?>?v=<?php echo e(time()); ?>" defer></script>

</body>
</html>
<?php /**PATH C:\Users\User}\OneDrive\Escritorio\vacio\Pintegrador\resources\views/vista_cliente.blade.php ENDPATH**/ ?>