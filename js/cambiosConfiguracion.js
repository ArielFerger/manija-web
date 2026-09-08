document.addEventListener("DOMContentLoaded", function () {

    const modoOscuro = document.getElementById("modoOscuro");
    const fuente = document.getElementById("fuente");

    const configuracion =
        JSON.parse(localStorage.getItem("configuracion")) || {};

    if (configuracion.modoOscuro) {
        modoOscuro.checked = true;
    }

    if (configuracion.fuente) {
        fuente.value = configuracion.fuente;
    }

    aplicarConfiguracion();

    modoOscuro.addEventListener("change", function () {
        aplicarConfiguracion();
        guardarConfiguracion();
    });

    fuente.addEventListener("change", function () {
        aplicarConfiguracion();
        guardarConfiguracion();
    });

    function guardarConfiguracion() {
        const configuracion = {
            modoOscuro: modoOscuro.checked,
            fuente: fuente.value
        };

        localStorage.setItem(
            "configuracion",
            JSON.stringify(configuracion)
        );
    }

    function aplicarConfiguracion() {
        if (modoOscuro.checked) {
            document.body.classList.add("bg-dark", "text-white");
        } else {
            document.body.classList.remove("bg-dark", "text-white");
        }

        document.body.style.fontFamily = fuente.value;
    }
});