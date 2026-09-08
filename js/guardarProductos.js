function guardarProducto() {
    const nombre = nombreProducto.value.trim();
    const precio = Number(precioProducto.value);
    const descripcion = descripcionProducto.value.trim();

    const producto = {
        nombre: nombre,
        precio: precio,
        descripcion: descripcion
    };

    let productos = JSON.parse(localStorage.getItem("productos")) || [];

    productos.push(producto);

    localStorage.setItem("productos", JSON.stringify(productos));

    productoForm.reset();

    mensajeProducto.innerHTML =
        '<div class="alert alert-success">Producto guardado correctamente.</div>';

    mostrarProductos();
}