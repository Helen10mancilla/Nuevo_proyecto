let productos = [];
let categorias = [];
let ventas = [];
let proveedores = [];
let compras = [];

// Función para alternar entre las secciones del panel
function toggleSection(sectionId) {
    document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
    document.getElementById(sectionId).style.display = 'block';
}

// Función para alternar la visibilidad del formulario
function toggleForm(formId) {
    const form = document.getElementById(formId);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

// Guardar un producto
function guardarProducto() {
    const nombreProducto = document.getElementById('nombreProducto').value;
    const categoriaProducto = document.getElementById('categoriaProducto').value;
    const precioProducto = document.getElementById('precioProducto').value;

    if (nombreProducto && categoriaProducto && precioProducto) {
        productos.push({ nombre: nombreProducto, categoria: categoriaProducto, precio: precioProducto });
        alert('Producto agregado con éxito');
        limpiarFormulario(['nombreProducto', 'categoriaProducto', 'precioProducto']);
        verTodos('productos');
    } else {
        alert('Por favor completa todos los campos.');
    }
}

// Guardar una categoría
function guardarCategoria() {
    const nombreCategoria = document.getElementById('nombreCategoria').value;
    if (nombreCategoria) {
        categorias.push(nombreCategoria);
        actualizarSelectCategorias();
        alert('Categoría agregada con éxito');
        verTodos('categorias');
        document.getElementById('nombreCategoria').value = '';
    } else {
        alert('Por favor ingresa un nombre de categoría.');
    }
}

// Actualizar los selects de categorías en productos y compras
function actualizarSelectCategorias() {
    const selects = [document.getElementById('categoriaProducto'), document.getElementById('categoriaCompra')];
    
    selects.forEach(select => {
        select.innerHTML = '<option value="">Selecciona una categoría</option>';
        categorias.forEach(categoria => {
            const option = document.createElement('option');
            option.value = categoria;
            option.textContent = categoria;
            select.appendChild(option);
        });
    });
}

// Registrar una venta
function registrarVenta() {
    const nombreCliente = document.getElementById('nombreCliente').value;
    const productoVenta = document.getElementById('productoVenta').value;
    const cantidadVenta = document.getElementById('cantidadVenta').value;
    const totalVenta = document.getElementById('totalVenta').value;

    if (nombreCliente && productoVenta && cantidadVenta && totalVenta) {
        ventas.push({ cliente: nombreCliente, producto: productoVenta, cantidad: cantidadVenta, total: totalVenta });
        alert('Venta registrada con éxito');
        limpiarFormulario(['nombreCliente', 'productoVenta', 'cantidadVenta', 'precioVenta', 'totalVenta']);
        verTodos('ventas');
    } else {
        alert('Por favor completa todos los campos.');
    }
}

// Calcular el total de la venta
function calcularTotal() {
    const cantidad = document.getElementById('cantidadVenta').value;
    const precio = document.getElementById('precioVenta').value;
    const total = cantidad * precio;
    document.getElementById('totalVenta').value = total.toFixed(2);
}

// Guardar un proveedor
function guardarProveedor() {
    const nombreProveedor = document.getElementById('nombreProveedor').value;
    if (nombreProveedor) {
        proveedores.push(nombreProveedor);
        alert('Proveedor agregado con éxito');
        verTodos('proveedores');
        document.getElementById('nombreProveedor').value = '';
    } else {
        alert('Por favor ingresa un nombre de proveedor.');
    }
}

// Registrar una compra
function registrarCompra() {
    const productoCompra = document.getElementById('productoCompra').value;
    const categoriaCompra = document.getElementById('categoriaCompra').value;
    const cantidadCompra = document.getElementById('cantidadCompra').value;
    const totalCompra = document.getElementById('totalCompra').value;

    if (productoCompra && categoriaCompra && cantidadCompra && totalCompra) {
        compras.push({ producto: productoCompra, categoria: categoriaCompra, cantidad: cantidadCompra, total: totalCompra });
        alert('Compra registrada con éxito');
        limpiarFormulario(['productoCompra', 'categoriaCompra', 'cantidadCompra', 'precioCompra', 'totalCompra']);
        verTodos('compras');
    } else {
        alert('Por favor completa todos los campos.');
    }
}

// Calcular el total de la compra
function calcularTotalCompra() {
    const cantidad = document.getElementById('cantidadCompra').value;
    const precio = document.getElementById('precioCompra').value;
    const total = cantidad * precio;
    document.getElementById('totalCompra').value = total.toFixed(2);
}

// Función para mostrar todas las entradas (productos, categorías, ventas, proveedores, compras)
function verTodos(tipo) {
    let lista = '';
    switch (tipo) {
        case 'productos':
            lista = productos.length > 0 
                ? productos.map(p => `<p>Producto: ${p.nombre}, Categoría: ${p.categoria}, Precio: $${p.precio}</p>`).join('') 
                : '<p>No hay productos registrados.</p>';
            document.getElementById('listaProductos').innerHTML = lista;
            break;
        case 'categorias':
            lista = categorias.length > 0 
                ? categorias.map(c => `<p>Categoría: ${c}</p>`).join('') 
                : '<p>No hay categorías registradas.</p>';
            document.getElementById('listaCategorias').innerHTML = lista;
            break;
        case 'ventas':
            lista = ventas.length > 0 
                ? ventas.map(v => `<p>Cliente: ${v.cliente}, Producto: ${v.producto}, Cantidad: ${v.cantidad}, Total: $${v.total}</p>`).join('') 
                : '<p>No hay ventas registradas.</p>';
            document.getElementById('listaVentas').innerHTML = lista;
            break;
        case 'proveedores':
            lista = proveedores.length > 0 
                ? proveedores.map(p => `<p>Proveedor: ${p}</p>`).join('') 
                : '<p>No hay proveedores registrados.</p>';
            document.getElementById('listaProveedores').innerHTML = lista;
            break;
        case 'compras':
            lista = compras.length > 0 
                ? compras.map(c => `<p>Producto: ${c.producto}, Categoría: ${c.categoria}, Cantidad: ${c.cantidad}, Total: $${c.total}</p>`).join('') 
                : '<p>No hay compras registradas.</p>';
            document.getElementById('listaCompras').innerHTML = lista;
            break;
        default:
            alert('Sección no encontrada');
    }
}

// Función para limpiar campos de un formulario
function limpiarFormulario(campos) {
    campos.forEach(id => document.getElementById(id).value = '');
}

// Inicialización
document.addEventListener('DOMContentLoaded', function () {
    toggleSection('productos');
    actualizarSelectCategorias();
});
