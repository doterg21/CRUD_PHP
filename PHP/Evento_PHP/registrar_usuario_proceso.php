<?php

/* ? Validaciones */

if ( empty($_POST["Email"]) || empty($_POST["Clave"]) || empty($_POST["Confirmar_clave"])   ) {
    header("Location: index.php?message=error1");
    exit;
}
if (
    $_POST["Clave"] != $_POST["Confirmar_clave"]
) {
    header("Location: index.php?message=error2");
    exit;
}

include "conexion.php";
/* Email validator */
$emailExist = $bd->prepare("SELECT * FROM usuarios WHERE Email = ?");
$emailResult = $emailExist->execute([$_POST["Email"]]);
$email = $emailExist->fetchAll(PDO::FETCH_OBJ);

if ($emailResult === true) {
    if (count($email) > 0) {
        /* Email error */
        header("Location: index.php?message=error3");
        exit;
    } else {
        /* Register */
        $email = $_POST["Email"];
        $password = $_POST["Clave"];

        $query = $bd->prepare("INSERT INTO usuarios ( Email, Clave) VALUES (?, ?);");
        $result = $query->execute([$email, $password]);

        if ($result === true) {
            header("Location: index.php?message=success");
        } else {
            header("Location: index.php?message=errorRegistro");
            exit;
        }
    }
}
