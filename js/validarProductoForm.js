const productoForm = document.getElementById("productoForm");
const nombreProducto = document.getElementById("nombreProducto");
const precioProducto = document.getElementById("precioProducto");
const descripcionProducto = document.getElementById("descripcionProducto");
const mensajeProducto = document.getElementById("mensajeProducto");

function validarProducto() {
    const nombre = nombreProducto.value.trim();
    const precio = Number(precioProducto.value);
    const descripcion = descripcionProducto.value.trim();

    if (nombre === "" || descripcion === "") {
        mensajeProducto.innerHTML =
            '<div class="alert alert-warning">Complete todos los campos.</div>';
        return false;
    }

    if (isNaN(precio) || precio <= 0) {
        mensajeProducto.innerHTML =
            '<div class="alert alert-warning">El precio debe ser un número positivo.</div>';
        return false;
    }

    mensajeProducto.innerHTML = "";
    return true;
}

productoForm.addEventListener("submit", function (event) {
    event.preventDefault();

    if (validarProducto()) {
        guardarProducto();
    }
});

nombreProducto.addEventListener("input", validarProducto);
precioProducto.addEventListener("input", validarProducto);
descripcionProducto.addEventListener("input", validarProducto);