<?php
	session_start();
	if(!isset($_SESSION['userid'])){
		header("Location: login.html");
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SHD</title>
    <link rel="stylesheet" href="<?php echo $_SESSION['estilo'];?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="cuerpo">
    <header>
        <div class="contenido-header">
            <div class="izquierda">
                <a href="sesion_user.php"><img class="logo" src="img/logo.png" alt=""></a>
            </div>
            <div class="derecha">
                <nav class="encabezado">
                    <ul>
                        <li><img src="img/user.jpg" alt="" class="icono_user"></li>
                        <li><p class="saludo"><?php echo $_SESSION['username']; ?></p></li>
                        <li><a href="#"><p>MIS DATOS</p></a></li>
                        <li><a href="personalizacion.php"><p>PERSONALIZAR SITIO</p></a></li>
                        <li><a href="salir_sesion.php"><p>CERRAR SESION</p></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <h4 class="text-center">Sus datos estan seguros con SHD</h4>
    <div class="container">
       <div class="form-control">
           <form action="actualizar.php" method="post">
               <div class="form-group">
                   <label for="uid">Clave de registro Unico</label>
                   <input type="text" name="uid" class="form-control" aria-describedby="idclave" value="<?php echo $_SESSION['userid']; ?>" disabled>
                   <small id="idclave" class="form-text text-muted">La clave de registro unico no es modificable.</small>
               </div>
               <div class="row">
                   <div class="col-md-6 form-group">
                       <label for="nombre">Nombre:</label>
                       <input type="text" name="nombre" class="form-control" value="<?php echo $_SESSION['username']; ?>" required>
                   </div>
                   <div class="col-md-6 form-group">
                       <label for="apellidos">Apellidos:</label>
                       <input type="text" name="apellidos" class="form-control" value="<?php echo $_SESSION['userlastname']; ?>" required>
                   </div>
               </div>
               <div class="form-group">
                   <label for="correo">Correo:</label>
                   <input type="text" class="form-control" name="correo" value="<?php echo $_SESSION['correo'] ?>" required>
               </div>
               <div class="form-group">
                   <label for="departamneto">Departamento:</label>
                   <select name="departamento" id="" class="form-control">
                       <option value="<?php echo $_SESSION['dep']; ?>"><?php echo $_SESSION['dep']; ?></option>
                       <option value="Sistemas">Sistemas</option>
                       <option value="Mantenimiento">Mantenimiento</option>
                       <option value="Limpieza">Limpieza</option>
                   </select>
               </div>
               <button type="submit" class="btn btn-dark">Actualizar Datos</button>
           </form>
       </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <footer>
        <div class="contenido-footer">
            <div class="footer-links">
                <a href="" class="links">CONTACTAR</a>
                <a href="" class="links">POLITICAS DE PRIVACIDAD</a>
                <a href="" class="links">CONDICIONES DE SERVICIO</a>
                <a href="" class="links">ACERCA DE LOS CREADORES</a>
            </div>
        </div>
    </footer>
    <script src="js/sesion-user.js"></script>
    <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>