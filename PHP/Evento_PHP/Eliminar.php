<?php
    include("conexion.php");
    $id = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM persona WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
    header('Location:Vista_Administrador.php');
?>