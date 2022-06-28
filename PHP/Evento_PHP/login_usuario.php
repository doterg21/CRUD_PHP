<?php

$email = $_POST['Email'];
$password = $_POST['Clave'];

session_start();
$_SESSION['Email'] = $email;

/* Se define un objeto vacio para los datos del usuario */

$conexion = mysqli_connect("localhost", "root", "", "crud");

$query = "SELECT * FROM usuarios WHERE Email = '$email' AND Clave = '$password'";
$result = mysqli_query($conexion, $query);

$rows = mysqli_num_rows($result);

$getUserByEmailQuery = "SELECT * FROM usuarios WHERE Email = '$email'";
$getUserByEmail = mysqli_query($conexion, $getUserByEmailQuery);

$_SESSION['usuarios'] = mysqli_fetch_assoc($getUserByEmail);

if ($rows > 0) {
    header("Location: Formulario_Registro.php");
} else {    
    header("Location: index.php");
}

mysqli_close($conexion);
