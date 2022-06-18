<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <!--Navbar modificar-->
    <nav>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" href="Vista_Administrador.php">Ver Lista</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cerrar.php" name="cerrar">Cerrar sesion</a>
            </li>
        </ul>
    </nav>

    <?php

    session_start();
    //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
    if ($_SESSION["autenticado"] <> "SI") {
        header("Location: sing.php");
        exit();
    } else {

        //Select en base de datos
        include_once("conexion.php");
        $sentencia = $bd->query("SELECT * FROM persona");
        $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    ?>


        <!--Data table-->
        <h1 class="text-center">Lista de registros</h1>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($persona as $dato) {
                            ?>
                                <tr>
                                    <td><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->nombre; ?></td>
                                    <td><?php echo $dato->apellido; ?></td>
                                    <td><?php echo $dato->cedula; ?></td>
                                    <td><?php echo $dato->email; ?></td>
                                    <td><?php echo $dato->sexo; ?></td>
                                    <td><?php echo $dato->fecha; ?></td>
                                    <td><?php echo $dato->hora; ?></td>
                                    <td><?php echo $dato->fecha_registro; ?></td>
                                    <td>
                                        <a href="Editar.php?id=<?php echo $dato->id; ?>"><button type="button" class="btn btn-success">Editar</button></a>
                                        <a href="Eliminar.php?id=<?php echo $dato->id; ?>"><button type="button" class="btn btn-danger">Eliminar</button></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end m-5 p-5">
            <a href="excel.php"><button class="btn btn-success me-md-2" type="button">Descargar Registros</button></a>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!--    Datatables-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
        <script>
            //Idiomas con el 1er método   
            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                    }

                });
            });
        </script>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>