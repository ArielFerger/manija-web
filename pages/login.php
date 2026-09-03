<<<<<<< HEAD
<?php echo" 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
"
?> 
=======
<?php include("../php/includesBasics/header.php"); ?>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-4">

            <div class="card shadow">

                <div class="card-body">

                    <h2 class="text-center mb-4">Iniciar sesión</h2>

                    <?php if (isset($_GET["error"])): ?>

                        <?php if ($_GET["error"] === "campos"): ?>

                            <div class="alert alert-warning" role="alert">
                                Debe completar todos los campos.
                            </div>

                        <?php elseif ($_GET["error"] === "credenciales"): ?>

                            <div class="alert alert-danger" role="alert">
                                Usuario o contraseña incorrectos.
                            </div>

                        <?php endif; ?>

                    <?php endif; ?>


                    <form
                        id="loginForm"
                        action="../php/includesBasics/procesoLogin.php"
                        method="POST"
                    >

                        <div class="mb-3">

                            <label for="usuario" class="form-label">Usuario</label>

                            <input
                                type="text"
                                class="form-control"
                                id="usuario"
                                name="usuario"
                                placeholder="Ingrese su usuario"
                                autocomplete="username"
                            >

                        </div>


                        <div class="mb-3">

                            <label for="password" class="form-label">Contraseña</label>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Ingrese su contraseña"
                                autocomplete="current-password"
                            >

                        </div>


                        <div class="d-grid">

                            <button
                                type="submit"
                                id="btnIngresar"
                                class="btn btn-primary"
                                disabled
                            >Ingresar</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="../js/validacionesForm.js"></script>

<?php include("../php/includesBasics/footer.php"); ?>
>>>>>>> 35ffa5b65b35205ce0120ae76bd9bc6b47e1f9c7
