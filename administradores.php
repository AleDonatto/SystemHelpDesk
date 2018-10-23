<?php
	$Nombre = $_POST['con_nombre'];
	$correo = $_POST['con_correo'];
	$mensaje = $_POST['con_mensaje'];

	$destino = "ale_donatto@yahoo.com.mx";
	$menAdmin = "NOMBRE: ".$Nombre ."\nCORREO: ".$correo."\nMENSAJE: ".$mensaje;

	mail($destino, "Mensaje de Usuarios de SHD", $menAdmin);

	echo '<script type="text/javascript">
                    alert("Mensaje para los adminitradores de la pagina enviado.");
	                window.location.href="sesion_user.php";
                  </script>';
?>