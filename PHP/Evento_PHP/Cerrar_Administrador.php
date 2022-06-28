<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:Ingreso_Administrador.php");
    exit();
?>