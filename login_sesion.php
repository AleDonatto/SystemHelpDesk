<?php
    session_start();
    define('HOST','localhost');
    define('ENGINE','id5812118_system_help_desk');
    define('USER','id5812118_root');
    define('PASWORD','abcde');

    $txt_user = $_POST['usuario'];
    $txt_contras = $_POST['contra'];

    if($txt_user == "shd@suport.com" && $txt_contras == "ADMIN"){
    		$_SESSION['user']= "ADMIN";
            header("Location: admin.php");
            die();
    }else{
    	$conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);
    	$sql_select = "SELECT * FROM id5812118_system_help_desk.usuario WHERE correo = '$txt_user' AND contraseña = '$txt_contras'";

    	if($resul = $conection->query($sql_select)){
    		while ($row = $resul->fetch_array()) {
    			# code...
		        $ID = $row['clave'];
		        $Nombre = $row['nombre'];
		        $lastname = $row['lastname'];
		        $userok = $row['correo'];
		        $dep = $row['nombre_dep'];
		        $contraok = $row['contraseña'];
		        $estilo = $row['estilo_user'];
        	}
        	$resul -> close();
        }

    	if(isset($txt_user) && isset($txt_contras)){
    		if($txt_user == $userok && $txt_contras == $contraok){
	    		# code...
	            //$_SESSION['loggedin'] = true;
		        $_SESSION['userid'] = $ID;
		        $_SESSION['username'] = $Nombre;
		        $_SESSION['userlastname'] = $lastname;
		        $_SESSION['correo'] = $userok;
		        $_SESSION['dep'] = $dep;
		        $_SESSION['estilo'] = $estilo;
		        $_SESSION['start'] = time();
		        //$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		        //setcookie('user',$txt_user);
		        header('Location: sesion_user.php');
		    }
		    else{
		    	header('Location: login.html?error=usuario');
		    }
		}else{
		    header('Location: login.html?error=login');
		}
	}
?>