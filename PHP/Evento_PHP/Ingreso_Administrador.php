<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style_Login.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Inicia sesion</title>
</head>

<body>
    
    <!--Formulario-->
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>ADMINISTRADOR</header>
                <form method="POST" action="Ingreso_Administrador.php">
                    <div class="field input-field">
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="field input-field">
                        <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Recuperar Contraseña</a>
                    </div>
                    <div class="field button-field">
                        <button value="ingresar" name="ingresar" type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </form>
                
            </div>
            <div class="line"></div>
            <div class="media-options">
                <a href="index.php" class="field google">                   
                    <span>Regresar</span>
                </a>
            </div>
        </div>

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
                    header("Location: Ingreso_Administrador.php?errorusuario=si");
                }
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                        Los datos ingresados no Existen
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
            }
        }
        ?>
    </section>

</body>
<!--JavaScript--->
<script src="js/script_login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>