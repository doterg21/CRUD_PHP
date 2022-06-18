<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Inicia sesion</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <!--Formulario-->
    <div class="d-flex justify-content-center">
        <div class="card col-md-5 p-3 mt-5">
            <div class="mb-10">
                <div class="p-3">
                    <form method="POST" class="row g-3" action="sing.php">
                        <div class="text-center">
                            <h1>ADMINISTRADOR</h1>
                        </div>
                        <div class=" col-12 text-center ">
                            <label for="nombre">Usuario</label>
                            <input type="text" class="form-control" name="usuario">
                        </div>
                        <div class=" col-12 text-center ">
                            <label for="apellido">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena">

                            <div class="d-grid gap-2 d-md-block mt-3 mb-4">
                                <div class="text-center d-grid gap-2 col-6 mx-auto">
                                    <button value="ingresar" name="ingresar" type="submit" class="btn btn-success">Ingresar</button>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-block mt-3 mb-4">
                                <div class="text-center d-grid gap-2 col-4 mx-auto">
                                    <a class="btn btn-dark" href="index.php" role="button">Volver</a>
                                </div>
                            </div>
                    </form>

                    </form>
                    <?php
                    //Validacion
                    include("conexion.php");
                    if (isset($_POST['ingresar'])) {
                        if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
                            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Faltan campos por llenar 
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        } else if ($_POST['usuario'] === "admin" && $_POST['contrasena'] === "admin") {
                            //inicio de sesion"
                            session_start();
                            $_SESSION["autenticado"] = "SI";
                            header("Location: Vista_Administrador.php");

                            if ($_SESSION["autenticado"] <> "SI") {
                                header("Location: sing.php?errorusuario=si");
                            }
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Los datos ingresados no coinciden
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>