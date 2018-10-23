<?php
    session_start();
    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');

    $user = $_SESSION['userid'];
    $number = $_GET['numero_solicitud'];
    $estado = $_GET['Estado_solicitud'];


    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

    $query = "UPDATE id5812118_system_help_desk.solicitudes SET Estado_solicitud = 'En proceso' WHERE numero_solicitud = $number;";

    if($estado == "Realizada"){
        mysqli_close($conection);
        $alert1 = '<script type="text/javascript">
                    alert("La solicitud a sido realizada anteriormente no puede cambiarla");
	                window.location.href="sesion_user.php";
                  </script>';
        echo $alert1;
    }else{
        $execute_query = mysqli_query($conection, $query);
        if(!$execute_query){
            echo "Error al Actualizar";
        }else{
            mysqli_close($conection);
            $alert = '<script type="text/javascript">
                        alert("Confirmado");
                        window.location.href="sesion_user.php";
                      </script>';
            echo $alert;
        }
    }
?>