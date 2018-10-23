<?php
    session_start();
    
    $user = $_SESSION['userid'];
    if(!isset($_SESSION['userid'])){
        header('Location: login.html');
        die();
    }

    $estilo = $_POST['seleccionar'];
    //echo $estilo;
    if($estilo == 1){
        $link = 'css/style_user_1.css';
        $_SESSION['estilo'] = $link;
    }else if($estilo == 2){
        $link = 'css/style_user_2.css';
        $_SESSION['estilo'] = $link;
    }else if($estilo == 3){
        $link = 'css/style_user_3.css';
        $_SESSION['estilo'] = $link;
    }

    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');


    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

    $actualizacion = "UPDATE id5812118_system_help_desk.usuario SET estilo_user = '$link' WHERE clave = '$user';";
    $query = mysqli_query($conection,$actualizacion);

    if(!$query){
        echo "Error al actualizar el estilo";
        //echo $actualizacion;
    }
    else{
        mysqli_close($conection);
    }
?>

<script type="text/javascript">
	alert("El diseño que selecciono fue guardado exitosamente.");
	window.location.href='personalizacion.php';
</script>
