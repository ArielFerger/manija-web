<?php

session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit;
}

include("../php/includesBasics/header.php"); ?>

<div class="container mt-5 text-center">
    <h1># q onda estas en manija web</h1>
    
    <p>Has ingresado correctamente</p>
</div>

<?php include("../php/includesBasics/footer.php"); ?>