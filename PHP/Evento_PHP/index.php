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
                <header>LOGIN</header>
                <form method="POST" action="login_usuario.php">
                    <div class="field input-field">
                        <input type="text" class="form-control" name="Email" placeholder="Usuario">
                    </div>
                    <div class="field input-field">
                        <input type="password" class="form-control" name="Clave" placeholder="Contraseña">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Recuperar Contraseña</a>
                    </div>
                    <div class="field button-field">
                        <button value="ingresar" name="ingresar" type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Deseas registrarte? <a href="#" class="link signup-link">Registrarse</a></span>
                </div>
            </div>
            <div class="line"></div>
            <div class="media-options">
                <a href="index.php" class="field google">
                    <span>Regresar</span>
                </a>
            </div>
        </div>
        <!-- Signup Form -->
        <div class="form signup">
            <div class="form-content">
                <header>REGISTRARSE</header>
                <form method="POST" action="index.php">
                    <div class="field input-field">
                        <input type="text" placeholder="Usuario" class="input" name="Email">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Crear Contraseña" class="password" name="Clave">
                    </div>
                    <div class="field button-field">
                        <button value="ingresar" name="ingresar" type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Si Estoy Registrado? <a href="#" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>
    </section>

    <?php
    //Validaciones
    include("conexion.php");
    if (isset($_POST['ingresar'])) {
        if (
            empty($_POST['Email']) || empty($_POST['Clave'])
        ) {
            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                            Faltan campos por llenar >:v
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
        } else {
            $email = $_POST["Email"];
            $clave = $_POST["Clave"];

            $sql = ("SELECT Email FROM usuarios WHERE Email = $email");
            $query = $bd->prepare($sql);
            $query->execute();

            if ($query->fetchColumn() > 0) {
                echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                    Esta persona ya se encuentra registrada :'c
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
            } else {
                $sentencia = $bd->prepare("INSERT INTO usuarios(Email,Clave) VALUES(?,?);");
                $resultado = $sentencia->execute([
                    $email, $clave
                ]);
                echo "<div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                                        Te has registrado correctamente 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
            }
        }
    }
    ?>
</body>
<!--JavaScript--->
<script src="js/script_login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>