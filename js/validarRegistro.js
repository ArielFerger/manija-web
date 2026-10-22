const registroForm = document.getElementById("registroForm");
const usuarioRegistro = document.getElementById("usuarioRegistro");
const passwordRegistro = document.getElementById("passwordRegistro");
const confirmarPassword = document.getElementById("confirmarPassword");
const mensajeRegistro = document.getElementById("mensajeRegistro");

function validarRegistro(){
    let mensaje = "";
    if(!/^[a-zA-Z0-9_.-]{3,50}$/.test(usuarioRegistro.value.trim())){
        mensaje = "Revisá el nombre de usuario.";
    }else if(Array.from(passwordRegistro.value).length<8){
        mensaje = "La contraseña debe tener al menos 8 caracteres.";
    }else if(new TextEncoder().encode(passwordRegistro.value).length>72){
        mensaje = "La contraseña es demasiado larga. Probá una más corta.";
    }else if(passwordRegistro.value !== confirmarPassword.value){
        mensaje = "Las contraseñas no coinciden.";
    }
    mensajeRegistro.textContent = mensaje;
    return mensaje === "";
}

registroForm.addEventListener("submit", function(event){
    if(!validarRegistro()){
        event.preventDefault();
    }
});
registroForm.addEventListener("input", function(){
    mensajeRegistro.textContent = "";
});
