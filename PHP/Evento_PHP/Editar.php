<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Editar registro</title>
</head>

<body>
    <?php
    include("conexion.php");
    $id = $_GET['id'];

    $sentencia = $bd->prepare("SELECT * FROM persona WHERE id = ?;");
    $sentencia->execute([$id]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
    ?>

    <!--Formulario-->
    <div class="d-flex justify-content-center">
        <div class="col-md-5 p-3" style="width:100%">
            <div class="mb-10">
                <div class="p-5">
                    <form method="POST" class="row g-3" action="edi.php">
                        <div class="text-center">
                            <h1>Editar registro</h1>
                        </div>
                        <div class="mb-5 col-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                             value="<?php echo $persona->nombre ?>">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido"
                            value="<?php echo $persona->apellido ?>">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="cedula">Cedula</label>
                            <input type="number" class="form-control" name="cedula"
                            value="<?php echo $persona->cedula ?>">
                        </div>
                        <div class="mb-5 col-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"
                            value="<?php echo $persona->email ?>">
                        </div>

                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="sexo">
                                <option selected><?php echo $persona->sexo ?></option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="fecha">
                                <option selected><?php echo $persona->fecha ?></option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                            </select>
                        </div>
                        <div class="mb-5 col-4">
                            <select class="form-select" aria-label="Default select example" name="hora">
                                <option selected><?php echo $persona->hora ?></option>
                                <option value="8 AM">8 AM</option>
                                <option value="2 PM">2 PM</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $persona->id ?>">
                        <div class="d-grid gap-2 d-md-block">
                            <div class="text-center d-grid gap-2 col-12 mx-auto">
                                <button value="editar" name="editar" type="submit" class="btn btn-secondary">Editar</button>
                            </div>
                        </div>
                        <div class="d-grid gap-2 ">
                            <div class="text-center d-grid gap-2 col-12 mx-auto">
                                <a class="btn btn-dark" href="Vista_Administrador.php" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<!--JavaScript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>