<?php
    session_start();
    $ID = $_SESSION['userid'];
    $NombreAct = $_POST['nombre'];
    $ApellidosAct = $_POST['apellidos'];
    $EmailAct = $_POST['correo'];
    $DepartamentoAct = $_POST['departamento'];

	$_SESSION['username'] = $NombreAct;
	$_SESSION['userlastname'] = $ApellidosAct;
	$_SESSION['correo'] = $EmailAct;
	$_SESSION['dep'] = $DepartamentoAct;

    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');

    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);
    $query = "UPDATE id5812118_system_help_desk.usuario SET nombre = '$NombreAct', lastname = '$ApellidosAct', correo = '$EmailAct', nombre_dep = '$DepartamentoAct' where clave = '$ID';";

    $instruccion = mysqli_query($conection, $query);

    if(!$instruccion){
        echo "Error al Actualizar el usuario";
    }else{
        
    mysqli_close($conection);
    }
?>
<script type="text/javascript">
	alert("Datos Actualizados Correctamente.");
	window.location.href='mis_datos.php';
</script>