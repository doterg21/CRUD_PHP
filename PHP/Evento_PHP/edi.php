<?php

    include("conexion.php");
    //Actualizar
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sentencia = $bd->prepare("UPDATE persona SET nombre=?,apellido=?,cedula=?,email=?,sexo=?,fecha=?,hora=? WHERE id = ?;");
    $resultado = $sentencia->execute([$nombre,$apellido,$cedula,$email,$sexo,$fecha,$hora,$id]);

    header('Location:Vista_Administrador.php');

?>    
