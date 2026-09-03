//todo: Desarrollar validaciones para el formulario de login

//? traer del documento los elementos del formulario 

//? crear funcion de validacion para el formulario de login

//? usar funcion en los campos de ingreso: input user y input password

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