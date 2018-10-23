<?php
    session_start();
    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');

    $user = $_SESSION['userid'];
    $number = $_GET['numero_solicitud'];
    $estado = $_GET['estado'];

    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

    $query = "DELETE FROM id5812118_system_help_desk.solicitudes WHERE numero_solicitud = $number AND Estado_solicitud = 'Pendiente';";
    //echo $estado;


    if($estado == "Pendiente"){
        $execute_query = mysqli_query($conection, $query);
        mysqli_close($conection);
        $alert = '<script type="text/javascript">
                    alert("Solicitud eliminada");
	                window.location.href="sesion_user.php";
                  </script>';
        echo $alert;
    }else{
        $alert = '<script type="text/javascript">
                    alert("Solo puede eliminar solicitudes si y solo si estan pendientes");
	                window.location.href="sesion_user.php";
                  </script>';
        echo $alert;
    }
?>