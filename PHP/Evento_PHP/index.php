<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style_Registro.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Registro</title>

</head>

<body>
    <?php
    include("conexion.php");
    ?>
    <!--Formulario-->
    <section id="Formulario" class="container col-6">

        <nav class="navbar navbar-light">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Consultar.php">Consultar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Ingreso_Administrador.php">Administrador</a>
                </li>
            </ul>
        </nav>

        <h2 style="text-align:center"> FORMULARIO DE REGISTRO A EVENTO </h2>
        <form method="POST" class="row g-3" action="index.php">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-danger" name="borrar" id="borrar">Borrar</button>
            </div>
            <div class="col-6">
                <label for="nombre" class="form-label"> Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Primer Nombre">
            </div>
            <div class="col-6">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" placeholder="Primer Apellido">
            </div>
            <div class=" col-4">
                <label for="cedula" class="form-label"> N. Documento</label>
                <input type="number" class="form-control" name="cedula" placeholder="Ingrese Documento">
            </div>
            <div class=" col-7">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Ingrese Su Correo ">
            </div>
            <div class="col-4">
                <label for="inputState" class="form-label">Sexo</label>
                <select class="form-select" aria-label="Default select example" name="sexo">
                    <option selected value="Femenino">Femenino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
            <div class=" col-4">
                <label for="inputState" class="form-label">Dias Disponibles</label>
                <select class="form-select" aria-label="Default select example" name="fecha">
                    <option selected value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miercoles">Miercoles</option>
                </select>
            </div>
            <div class=" col-4">
                <label for="inputState" class="form-label">Horarios Disponibles</label>
                <select class="form-select" aria-label="Default select example" name="hora">
                    <option selected value="8 AM">8 AM</option>
                    <option value="2 PM">2 PM</option>
                </select>
                <input type="hidden" value="<?php echo date("Y-m-d\TH-i"); ?>" name="fecha_registro">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button value="enviar" name="enviar" type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>

        <h5 class="text-center">CONTADOR DE AFOROS</h5>
        <div class='d-flex justify-content-center '>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>DISPONIBILIDAD 08:00 AM</th>
                        <th>DISPONIBILIDAD 02:00 PM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align:center">
                        <td><?php echo $o - $contadorO; ?></td>
                        <td><?php echo $d - $contadorD; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    //Validaciones
    include("conexion.php");
    if (isset($_POST['enviar'])) {
        if (
            empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula'])
            || empty($_POST['email']) || empty($_POST['sexo']) || empty($_POST['fecha'])
            || empty($_POST['hora'])
        ) {

            echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                            Faltan campos por llenar >:v
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
        } else {
            if ($o - $contadorO > 0 || $d - $contadorD > 0) {
                //Guardar en la base de datos
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $cedula = $_POST["cedula"];
                $email = $_POST["email"];
                $sexo = $_POST["sexo"];
                $fecha = $_POST["fecha"];
                $hora = $_POST["hora"];
                $fecha_registro = $_POST['fecha_registro'];

                if ($o - $contadorO <= 0 && $hora === "8 AM") {
                    echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Ya no te puedes registrar para las ocho :'c
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                } else if ($d - $contadorD <= 0 && $hora === "2 PM") {
                    echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                Ya no te puedes registrar para las dos :'c
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                } else {

                    $sql = ("SELECT cedula FROM persona WHERE cedula = $cedula");
                    $query = $bd->prepare($sql);
                    $query->execute();

                    if ($query->fetchColumn() > 0) {
                        echo "<div class='alert alert-danger alert-dismissible fade show fixed-top' role='alert'>
                                    Esta persona ya se encuentra registrada :'c
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>";
                    } else {
                        $sentencia = $bd->prepare("INSERT INTO persona(nombre,apellido,cedula,
                                        email,sexo,fecha,hora,fecha_registro) VALUES(?,?,?,?,?,?,?,?);");
                        $resultado = $sentencia->execute([
                            $nombre, $apellido, $cedula, $email, $sexo,
                            $fecha, $hora, $fecha_registro
                        ]);
                        echo "<div class='alert alert-success alert-dismissible fade show fixed-top' role='alert'>
                                        Te has registrado correctamente 
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>";
                    }
                }
            }
        }
    }
    ?>
    <script src="js/script_Registro.js"></script>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>