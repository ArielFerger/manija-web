const usuario = document.getElementById("usuario");
const password = document.getElementById("password");
const captcha = document.getElementById("captcha");
const btnIngresar = document.getElementById("btnIngresar");

function validarFormulario(){
    
    const usuarioCompleto = usuario.value.trim() !== "";
    const passwordCompleta = password.value.trim() !== "";
    const captchaCompleto = captcha.value.trim() !== "";

    btnIngresar.disabled = !(usuarioCompleto && passwordCompleta && captchaCompleto);
}

usuario.addEventListener("input", validarFormulario);
password.addEventListener("input", validarFormulario);
captcha.addEventListener("input", validarFormulario);

validarFormulario();
