@extends('layouts.plantilla')  <!-- Extiende la plantilla base -->

@section('contenido')  <!-- Comienza la sección de contenido -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="{{ asset('css/estructura.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>Panel de Control</h2>
        <div class="admin-profile">
            <img src="{{ asset('img/admin.jpg') }}" alt="Admin" class="admin-avatar">
            <p>Administrador</p>
        </div>

        <ul>
            <li onclick="toggleSection('productos')">Productos</li>
            <li onclick="toggleSection('categorias')">Categorías</li>
            <li onclick="toggleSection('ventas')">Ventas</li>
            <li onclick="toggleSection('proveedores')">Proveedores</li>
            <li onclick="toggleSection('compras')">Compras</li>
        </ul>
    </div>

    <div class="content">
        <!-- Sección de productos -->
        <div id="productos" class="section">
            <h3>Productos</h3>
            <button onclick="toggleForm('agregarProducto')">Agregar Producto</button>
            <button onclick="verTodos('productos')">Ver Todos los Productos</button>
            <div id="agregarProducto" class="form-container" style="display: none;">
                <h4>Agregar Producto</h4>
                <form>
                    @csrf <!-- Token de seguridad -->
                    <label for="nombreProducto">Nombre del Producto:</label>
                    <input type="text" id="nombreProducto" name="nombreProducto" required>

                    <label for="categoriaProducto">Categoría:</label>
                    <select id="categoriaProducto" name="categoriaProducto">
                        <option value="">Selecciona una categoría</option>
                    </select>

                    <label for="precioProducto">Precio:</label>
                    <input type="number" id="precioProducto" name="precioProducto" required>

                    <button type="button" onclick="guardarProducto()">Guardar Producto</button>
                </form>
            </div>
            <div id="listaProductos"></div>
        </div>

        <!-- Sección de categorías -->
        <div id="categorias" class="section" style="display: none;">
            <h3>Categorías</h3>
            <button onclick="toggleForm('agregarCategoria')">Agregar Categoría</button>
            <button onclick="verTodos('categorias')">Ver Todas las Categorías</button>
            <div id="agregarCategoria" class="form-container" style="display: none;">
                <h4>Agregar Categoría</h4>
                <form>
                    @csrf
                    <label for="nombreCategoria">Nombre de la Categoría:</label>
                    <input type="text" id="nombreCategoria" name="nombreCategoria" required>

                    <button type="button" onclick="guardarCategoria()">Guardar Categoría</button>
                </form>
            </div>
            <div id="listaCategorias"></div>
        </div>

        <!-- Sección de ventas -->
        <div id="ventas" class="section" style="display: none;">
            <h3>Ventas</h3>
            <button onclick="toggleForm('agregarVenta')">Registrar Venta</button>
            <button onclick="verTodos('ventas')">Ver Todas las Ventas</button>
            <div id="agregarVenta" class="form-container" style="display: none;">
                <h4>Registrar Venta</h4>
                <form id="formVenta">
                    @csrf
                    <label for="nombreCliente">Nombre del Cliente:</label>
                    <input type="text" id="nombreCliente" name="nombreCliente" required>

                    <label for="productoVenta">Producto:</label>
                    <input type="text" id="productoVenta" name="productoVenta" required>

                    <label for="cantidadVenta">Cantidad:</label>
                    <input type="number" id="cantidadVenta" name="cantidadVenta" required>

                    <label for="precioVenta">Precio Unitario:</label>
                    <input type="number" id="precioVenta" name="precioVenta" required>

                    <label for="totalVenta">Total:</label>
                    <input type="text" id="totalVenta" name="totalVenta" readonly>

                    <button type="button" onclick="calcularTotal()">Calcular Total</button>
                    <button type="button" onclick="registrarVenta()">Registrar Venta</button>
                </form>
            </div>
            <div id="listaVentas"></div>
        </div>

        <!-- Sección de proveedores -->
        <div id="proveedores" class="section" style="display: none;">
            <h3>Proveedores</h3>
            <button onclick="toggleForm('agregarProveedor')">Agregar Proveedor</button>
            <button onclick="verTodos('proveedores')">Ver Todos los Proveedores</button>
            <div id="agregarProveedor" class="form-container" style="display: none;">
                <h4>Agregar Proveedor</h4>
                <form>
                    @csrf
                    <label for="nombreProveedor">Nombre del Proveedor:</label>
                    <input type="text" id="nombreProveedor" name="nombreProveedor" required>

                    <label for="contactoProveedor">Contacto:</label>
                    <input type="text" id="contactoProveedor" name="contactoProveedor" required>

                    <button type="button" onclick="guardarProveedor()">Guardar Proveedor</button>
                </form>
            </div>
            <div id="listaProveedores"></div>
        </div>

        <!-- Sección de compras -->
        <div id="compras" class="section" style="display: none;">
            <h3>Compras</h3>
            <button onclick="toggleForm('agregarCompra')">Registrar Compra</button>
            <button onclick="verTodos('compras')">Ver Todas las Compras</button>
            <div id="agregarCompra" class="form-container" style="display: none;">
                <h4>Registrar Compra</h4>
                <form>
                    @csrf
                    <label for="productoCompra">Producto:</label>
                    <input type="text" id="productoCompra" name="productoCompra" required>

                    <label for="cantidadCompra">Cantidad:</label>
                    <input type="number" id="cantidadCompra" name="cantidadCompra" required>

                    <label for="proveedorCompra">Proveedor:</label>
                    <input type="text" id="proveedorCompra" name="proveedorCompra" required>

                    <button type="button" onclick="guardarCompra()">Guardar Compra</button>
                </form>
            </div>
            <div id="listaCompras"></div>
        </div>
    </div>

    <script src="{{ asset('js/ventas.js') }}"></script>
</body>
@endsection
