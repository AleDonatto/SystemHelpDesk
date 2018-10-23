<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.html');
        die();
    }
    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');
    //primer formulario
    $nombre = $_POST['nombre'];
    $depar = $_POST['departamento'];
    $descrip = $_POST['descripcion'];
    $user = $_SESSION['userid'];
    $date = date('Y-m-d');

    //segundo formulario
    /*$nombre2 = $_POST['con_nombre'];
    $correo = $_POST['con_correo'];
    $mensaje = $_POST['con_mensaje'];*/  

    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);
    if(!$conection){
        echo mysqli_connect_error;
        die('Connect Error: ' .mysqli_connect_error);
    }
    $comand = "INSERT INTO id5812118_system_help_desk.solicitudes() VALUES(null,'$nombre','$depar','$user','$descrip','$date','Pendiente');";
        
    $query = mysqli_query($conection, $comand);
    if(!$query){
        echo "Error al insertar datos";
    }
    else{
        mysqli_close($conection);
        header("Location: sesion_user.php ");        
    }
?>