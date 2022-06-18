<?php 
    if(isset($_POST['cerrar'])){
        session_start();
        session_destroy();
        header("Location:http://localhost/Ejercicios/Evento_PHP/sing.php");
    }
?>