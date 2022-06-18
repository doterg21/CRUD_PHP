<?php
//Conexion con la base de datos
$contrasena = "";
$usuario = "root";
$nombre_bd = "crud";

try{
    $bd = new PDO(
        'mysql:host=localhost;
        dbname='.$nombre_bd,
        $usuario,
        $contrasena,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch(Exception $e){
    echo "Problema con la conexion: ".$e->getMessage();
}



//Contadores:
$o=100;//Para las 8AM
$d=100;//para las 2PM

$contadorO = current($bd->query("SELECT COUNT(id) FROM persona WHERE hora = '8 AM'")->fetch());
$contadorD= current($bd->query("SELECT COUNT(id) FROM persona WHERE hora = '2 PM'")->fetch());

//Borrar bd cada semana
$sql = "DELETE FROM persona WHERE DATEDIFF(now(),fecha_registro) >= 7";
$sentencia = $bd->prepare($sql);  
$sentencia->execute();
?>