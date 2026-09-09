const productoForm = document.getElementById("productoForm");
const nombreProducto = document.getElementById("nombreProducto");
const precioProducto = document.getElementById("precioProducto");
const descripcionProducto = document.getElementById("descripcionProducto");
const mensajeProducto = document.getElementById("mensajeProducto");

function validarProducto() {

    const precio = precioProducto.value.trim();

    /*
     * Nombre y descripción son opcionales.
     * El precio también puede quedar vacío.
     *
     * Solamente validamos que, si se ingresa,
     * sea un número mayor o igual a 0.
     */
    if (precio !== "") {

        const precioNumerico = Number(precio);

        if (isNaN(precioNumerico) || precioNumerico < 0) {

            mensajeProducto.innerHTML = `
                <div class="alert alert-warning">
                    El precio debe ser un número mayor o igual a 0.
                </div>
            `;

            return false;
        }
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

precioProducto.addEventListener("input", validarProducto);