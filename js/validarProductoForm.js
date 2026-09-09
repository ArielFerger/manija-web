const productoForm = document.getElementById("productoForm");
const nombreProducto = document.getElementById("nombreProducto");
const precioProducto = document.getElementById("precioProducto");
const descripcionProducto = document.getElementById("descripcionProducto");
const mensajeProducto = document.getElementById("mensajeProducto");
const btnGuardarProducto = document.getElementById("btnGuardarProducto");

function obtenerEstadoPrecio() {

    const precio = precioProducto.value.trim();

    if (precio === "") {
        return { valido: false, vacio: true };
    }

    const precioNumerico = Number(precio);

    if (isNaN(precioNumerico) || precioNumerico < 0) {
        return { valido: false, vacio: false };
    }

    return { valido: true, vacio: false };
}

function validarProducto() {
    const nombreCompleto = nombreProducto.value.trim() !== "";
    const descripcionCompleta = descripcionProducto.value.trim() !== "";
    const estadoPrecio = obtenerEstadoPrecio();

    if (!estadoPrecio.vacio && !estadoPrecio.valido) {

        mensajeProducto.innerHTML = `
            <div class="alert alert-warning py-2 mb-0">
                El precio debe ser un número mayor o igual a 0.
            </div>
        `;

    } else {

        mensajeProducto.innerHTML = "";
    }

    const formularioValido =
        nombreCompleto &&
        descripcionCompleta &&
        estadoPrecio.valido;

    btnGuardarProducto.disabled = !formularioValido;

    return formularioValido;
}

productoForm.addEventListener("submit", function (event) {

    event.preventDefault();

    if (validarProducto()) {
        guardarProducto();
    }
});

[nombreProducto, precioProducto, descripcionProducto].forEach(function (campo) {
    campo.addEventListener("input", validarProducto);
});

validarProducto();
