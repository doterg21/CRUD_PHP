<?php
include("conexion.php");

$filename = "Registros.xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=" . $filename);

$sentencia = $bd->query("SELECT * FROM persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
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
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>