// Pagina de administracion
//? Crear 2 secciones:  Productos y Configuracion

//incluir el header y el footer

//poner seccion de productos

//incluir el formulario de crear producto y la tabla de productos guardados en localstorage

//? LOL

//poner aparte una seccion de configuracion

//boton de cambiar de fondo de blanco a negro

//select de cambiar la fuente del texto 

<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}
?>

<?php include("../php/includesBasics/header.php"); ?>

<!-- aca hay q clavar el codigo de administracion

<?php include("../php/includesBasics/footer.php"); ?>