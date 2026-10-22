const productoForm = document.getElementById("productoForm");
if(productoForm){
    const nombre = document.getElementById("nombreProducto");
    const precio = document.getElementById("precioProducto");
    const descripcion = document.getElementById("descripcionProducto");
    const mensaje = document.getElementById("mensajeProducto");
    const boton = document.getElementById("btnGuardarProducto");

    function validarProducto(){
        const valido = nombre.value.trim() !== "" && descripcion.value.trim() !== "" && /^\d{1,8}(\.\d{1,2})?$/.test(precio.value);
        boton.disabled = !valido;
        return valido;
    }

    productoForm.addEventListener("input", validarProducto);
    productoForm.addEventListener("submit", function(event){
        if(!validarProducto()){
            event.preventDefault();
            mensaje.textContent = "Revisá los campos antes de guardar.";
        }
    });
    validarProducto();
}

document.addEventListener("submit", function(event){
    if(event.target.matches(".formEliminar") && !confirm("¿Querés eliminar este producto?")){
        event.preventDefault();
    }
});
