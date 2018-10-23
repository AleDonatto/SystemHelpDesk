<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("Location: login.html");
		die();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN SHD</title>
    <link rel="stylesheet" href="css/style_user_1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="cuerpo">
    <header>
      <div class="contenido-header">
          <div class="izquierda">
             <a href="#"><img class="logo" src="img/logo.png" alt=""></a>
          </div>
          <div class="derecha">
             <nav class="encabezado">
                 <ul>
                     <li><img src="img/user.jpg" alt="" class="icono_user"></li>
                     <li><p class="saludo">ADMIN</p></li>
                     <li><p><?php echo date("Y-m-d"); ?></p></li>
                     <li><a href="#"><p>SESSSION ROOT</p></a></li>
                     <li><a href="salir_sesion.php"><p>CERRAR SESION</p></a></li>
                 </ul>
             </nav>
          </div>
      </div>
   </header>
   <br>
   <br>
   <br>
   <div class="menu">
      <button  onclick="tabla1()">Solicitudes</button>
      <button  onclick="tabla2()">Usuarios</button>
   </div>
   
   <div class="container" id="solicitudes" style="display : block">
       <table class="tabla">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Nombre del solicitante</th>
                   <th>Departamento destino</th>
                   <th>Descripcion</th>
                   <th>Fecha de Solicitud</th>
                   <th>Estado de Solicitud</th>
                   <th>Opciones</th>
               </tr>
                   <?php
                      define('HOST','localhost');
                      define('ENGINE','id5812118_system_help_desk');
                      define('USER','id5812118_root');
                      define('PASWORD','abcde');
                      $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

                      $sql_cons = "SELECT * FROM id5812118_system_help_desk.solicitudes;";
                      $cons = mysqli_query($conection, $sql_cons);
                   
                      while($result = mysqli_fetch_array($cons)){
                          echo '<tr>';
                          echo '<td>'.$result['numero_solicitud']."\n".'</td>';
                          echo '<td>'.$result['Nombre_usuario']."\n".'</td>';
                          echo '<td>'.$result['departamento']."\n".'</td>';
                          echo '<td>'.$result['descripcion_peticion']."\n".'</td>';
                          echo '<td>'.$result['fecha_solicitud']."\n".'</td>';
                          echo '<td>'.$result['Estado_solicitud']."\n".'</td>';
                          echo '<td>'.'<a href="eliminar.php?numero_solicitud='.$result['numero_solicitud'].'">Eliminar</a>'."\n".'</td>';
                          echo '</tr>';
                      }
                      mysqli_close($conection);
                   ?>
           </thead>
       </table>
       <br>
       <br>
       <br>
   </div>
   
   <div class="container" id="usuarios" style="display: none">
        <table class="tabla">
           <thead>
               <tr>
                   <th>Clave</th>
                   <th>Nombre del usuario</th>
                   <th>Apellidos</th>
                   <th>Correo</th>
                   <th>Contraseña</th>
                   <th>Departamento</th>
                   <th>Fecha de registro</th>
                   <th>Estilo predeterminado</th>
                   <th>Opciones</th>
               </tr>
                   <?php
                      $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

                      $sql_cons = "SELECT * FROM id5812118_system_help_desk.usuario;";
                      $cons = mysqli_query($conection, $sql_cons);
                   
                      while($result = mysqli_fetch_array($cons)){
                          echo '<tr>';
                          echo '<td>'.$result['clave']."\n".'</td>';
                          echo '<td>'.$result['nombre']."\n".'</td>';
                          echo '<td>'.$result['lastname']."\n".'</td>';
                          echo '<td>'.$result['correo']."\n".'</td>';
                          echo '<td>'.$result['contraseña']."\n".'</td>';
                          echo '<td>'.$result['nombre_dep']."\n".'</td>';
                          echo '<td>'.$result['fecha_registro']."\n".'</td>';
                          echo '<td>'.$result['estilo_user']."\n".'</td>';
                          echo '<td>'.'<a href="eliminar.php?numero_solicitud='.$result['clave'].'">Eliminar</a>'."\n".'</td>';
                          echo '</tr>';
                      }
                      mysqli_close($conection);
                   ?>
           </thead>
       </table>
   </div>
     
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