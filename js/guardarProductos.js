function obtenerProductos() {
    try {
        const datos = localStorage.getItem("productos");
        const productos = datos ? JSON.parse(datos) : [];

        return Array.isArray(productos) ? productos : [];
    } catch (error) {
        localStorage.removeItem("productos");
        return [];
    }
}

function guardarProducto() {
    const nombre = nombreProducto.value.trim();
    const precio = Number(precioProducto.value);
    const descripcion = descripcionProducto.value.trim();

    const producto = {
        nombre: nombre,
        precio: precio,
        descripcion: descripcion
    };

    const productos = obtenerProductos();

    productos.push(producto);

    localStorage.setItem("productos", JSON.stringify(productos));

    productoForm.reset();

    mensajeProducto.innerHTML =
        '<div class="alert alert-success">Producto guardado correctamente.</div>';

    validarProducto();
    mostrarProductos();
}