<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header('Location: login.html');
        die(); 
    }

    $destino = "ale_donatto@yahoo.com.mx";
    $nombre= $_POST["con_nombre"];
    $correo= $_POST["con_correo"];
    $mensaje= $_POST["con_mensaje"];

  $contenido="NOMBRE: ".$nombre ."\nCORREO: ".$correo."\nMENSAJE: ".$mensaje;

    mail($destino,"DUDAS Y ACLARACIONES", $contenido);
    header("Location: sesion_user.php");
?>