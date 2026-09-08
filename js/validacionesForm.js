const usuario = document.getElementById("usuario");
const password = document.getElementById("password");
const btnIngresar = document.getElementById("btnIngresar");

function validarFormulario(){
    
    const usuarioCompleto = usuario.value.trim() !== "";
    const passwordCompleta = password.value.trim() !== "";

    btnIngresar.disabled = !(usuarioCompleto && passwordCompleta);
}

usuario.addEventListener("input", validarFormulario);
password.addEventListener("input", validarFormulario);

validarFormulario();