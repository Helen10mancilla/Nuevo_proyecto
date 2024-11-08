document.addEventListener('DOMContentLoaded', function () {
    const productosCliente = document.createElement('div'); // Sección de productos para mostrar
    const listaCarrito = document.createElement('ul'); // Lista de carrito de compras
    const totalCarrito = document.createElement('div'); // Total del carrito
    const carritoCantidad = document.getElementById('carritoCantidad');

    let carrito = [];
    let total = 0;

    // Definición de productos por categoría
    const productos = {
        Verduras: [
            { nombre: 'Lechuga', precio: 2.0 },
            { nombre: 'Espinaca', precio: 1.5 },
            { nombre: 'Zanahoria', precio: 1.0 },
        ],
        Frutas: [
            { nombre: 'Manzana', precio: 0.5 },
            { nombre: 'Banana', precio: 0.5 },
            { nombre: 'Pera', precio: 0.5 },
        ],
        Tubérculos: [
            { nombre: 'Papa', precio: 3.0 },
            { nombre: 'Yuca', precio: 3.5 },
        ],
        Otros: [
            { nombre: 'Brócoli', precio: 1.3 },
            { nombre: 'Coliflor', precio: 1.1 },
            { nombre: 'Huevos', precio: 15.0 },
            { nombre: 'Carne', precio: 11.0 },
            { nombre: 'Leche', precio: 5.5 },
        ],
    };

    // Función para mostrar productos de una categoría seleccionada
    function mostrarProductosPorCategoria(categoria) {
        productosCliente.innerHTML = '';
        const productosSeleccionados = productos[categoria] || [];

        productosSeleccionados.forEach(producto => {
            const productoDiv = document.createElement('div');
            productoDiv.classList.add('producto');
            productoDiv.innerHTML = `
                <h4>${producto.nombre}</h4>
                <p>Precio: S/ ${producto.precio.toFixed(2)}</p>
                <button class="agregarCarrito" data-nombre="${producto.nombre}" data-precio="${producto.precio}">Agregar al Carrito</button>
            `;
            productosCliente.appendChild(productoDiv);
        });

        document.querySelectorAll('.agregarCarrito').forEach(boton => {
            boton.addEventListener('click', function () {
                const nombre = this.dataset.nombre;
                const precio = parseFloat(this.dataset.precio);
                agregarAlCarrito(nombre, precio);
            });
        });
    }

    // Función para agregar productos al carrito
    function agregarAlCarrito(nombre, precio) {
        carrito.push({ nombre, precio });
        total += precio;
        actualizarCarrito();
    }

    // Función para actualizar la vista del carrito
    function actualizarCarrito() {
        listaCarrito.innerHTML = ''; // Limpiar la lista del carrito
        carrito.forEach(item => {
            const itemLi = document.createElement('li');
            itemLi.textContent = `${item.nombre} - S/ ${item.precio.toFixed(2)}`;
            listaCarrito.appendChild(itemLi);
        });
        totalCarrito.textContent = `Total: S/ ${total.toFixed(2)}`;
        carritoCantidad.textContent = carrito.length; // Actualiza cantidad de productos en el carrito
    }

    // Cambiar entre secciones
    function cambiarSeccion(seccion) {
        document.querySelector('main').innerHTML = '';
        if (seccion === 'categorias') {
            mostrarCategorias();
        } else if (seccion === 'carrito') {
            document.querySelector('main').appendChild(listaCarrito);
            document.querySelector('main').appendChild(totalCarrito);
        }
    }

    // Función para mostrar la lista de categorías
    function mostrarCategorias() {
        productosCliente.innerHTML = '<h2>Categorías</h2>';
        for (const categoria in productos) {
            const botonCategoria = document.createElement('button');
            botonCategoria.textContent = categoria;
            botonCategoria.addEventListener('click', () => mostrarProductosPorCategoria(categoria));
            productosCliente.appendChild(botonCategoria);
        }
        document.querySelector('main').appendChild(productosCliente);
    }

    // Eventos para cambiar entre "Inicio", "Categorías" y "Carrito"
    document.getElementById('inicioBtn').addEventListener('click', () => {
        document.querySelector('main').innerHTML = '<h2>Bienvenido a La Gran Cosecha</h2>';
    });

    document.getElementById('categoriasBtn').addEventListener('click', () => {
        cambiarSeccion('categorias');
    });

    document.getElementById('carritoBtn').addEventListener('click', () => {
        cambiarSeccion('carrito');
    });
});
