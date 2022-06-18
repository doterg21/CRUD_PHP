<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Consulta</title>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <!--Formulario-->
    <section id="Formulario" class="container col-6">
        <h2 style="text-align:center"> CONSULTAR REGISTRO</h2><br>
        <form class="row g-3" action="Consultar.php" method="POST" name="from" id="Formulario">
            <div class="col-12">
                <div class="col-4">
                    <input type="number" class="form-control" id="busqueda" name="busqueda" placeholder="Ingrese El Documento" required>
                </div>
            </div>
            <div class="d-grid gap-3 col-2 ">
                <button type="submit" class="btn btn-outline-success" name="consultar" id="consultar">Consultar</button>
            </div>
        </form>
    </section>

    <?php //Consultar registro
    if (isset($_POST['consultar'])) {
        $existe = 0;
        $busqueda = $_POST['busqueda'];
        if ($busqueda == "") {
        } else {
            $sql = ("SELECT * FROM persona WHERE cedula = $busqueda");
            $query = $bd->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $result) {
                echo "<div class='d-flex justify-content-center'>
                            <div class='card col-md-8 mt-5'>
                                <div class='mb-10'>
                                    <div class='p-2'>
                                        <table class='table'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>ID</th>
                                                    <th scope='col'>Nombre</th>
                                                    <th scope='col'>Apellido</th>
                                                    <th scope='col'>Cedula</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Sexo</th>
                                                    <th scope='col'>Fecha</th>
                                                    <th scope='col'>Hora</th>
                                                    <th scope='col'>Registro</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>" . $result->id . "</td>
                                                    <td>" . $result->nombre . "</td>
                                                    <td>" . $result->apellido . "</td>
                                                    <td>" . $result->cedula . "</td>
                                                    <td>" . $result->email . "</td>
                                                    <td>" . $result->sexo . "</td>
                                                    <td>" . $result->fecha . "</td>
                                                    <td>" . $result->hora . "</td>
                                                    <td>" . $result->fecha_registro . "</td>
                                                    <td> <button value='enviar' name='cancelar' type='delete' class='btn btn-outline-danger'>Cancelar</button></td>
                                                </tr>
                                            </tbody>  
                                            <br>
                                            <div class='col-12 g-3 row'>
                                                <div class='alert alert-success d-flex align-items-center' role='alert'>
                                                    <svg class='bi flex-shrink-0 me-30' width='30' height='16' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                                    <div>
                                                    <strong>Alerta!</strong> El Documento Ingresado Existe.
                                                    </div>
                                                </div>
                                            </div>  
                                        </table>
                                    </div>
                                </div>
                            </div>    
                        </div>                                                                       
                    ";
                $existe++;
            }
            if ($existe == 0) {
                echo "<br>
                <div class='col-12 g-3 row'>
                    <div class='alert alert-danger d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-30' width='30' height='25' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        <div>
                        <strong>Alerta!</strong> El Documento Ingresado No Existe.
                        </div>
                    </div>
                </div>
                ";
            }
        }
    } ?>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>