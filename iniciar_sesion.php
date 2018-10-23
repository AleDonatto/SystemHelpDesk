<?php
    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');

    $Nombre = $_POST["nombre"];
    $AP = $_POST["apellidos"];
    $CORREO = $_POST["email"];
    $CONTRA = $_POST["contra"];
    $DEPART = $_REQUEST["dep"];
    $fecha = date('Y-m-d');

    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);
    //$sql_count = "SELECT COUNT(clave) FROM system_help_desk.usuario;";
    $sql_count = "SELECT * FROM id5812118_system_help_desk.usuario";

    if(!$conection){
        echo "Error de Conexion";
        echo mysqli_connect_error;
        die('Connect Error: ' .mysqli_connect_error);
    }

    $result = mysqli_query($conection, $sql_count);

    $row = $result->num_rows;
    $row_1 = $row + 1;

    $clave = "user".$row_1;
    $sql_query = "INSERT INTO id5812118_system_help_desk.usuario() VALUES('$clave','$Nombre','$AP','$CORREO', '$CONTRA', '$DEPART',$fecha,'css/style_user_1.css')";
    
    $execute_query = mysqli_query($conection, $sql_query);
    
    if(!$execute_query){
        echo "Error al insertar datos";
    }
    else{
        mysqli_close($conection);
        header("Location: registro_exito.html ");
    }    
?>