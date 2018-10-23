<?php
    session_start();
    //$aux == null || $aux =='' 
    //error_reporting(0);
    if(!isset($_SESSION['username'])){
        header('Location: login.html');
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
             <a href="#"><img class="logo" src="img/logo.png" alt=""></a>
          </div>
          <div class="derecha">
             <nav class="encabezado">
                 <ul>
                     <li><img src="img/user.jpg" alt="" class="icono_user"></li>
                     <li><p class="saludo"><?php echo $_SESSION['username']; ?></p></li>
                     <li><a href="mis_datos.php"><p>MIS DATOS</p></a></li>
                     <li><a href="personalizacion.php"><p>PERSONALIZAR SITIO</p></a></li>
                     <li><a href="salir_sesion.php"><p>CERRAR SESION</p></a></li>
                 </ul>
             </nav>
          </div>
      </div>
   </header>
   <br><br><br><br>
   <h2 class="saludo">BIENVENIDO A SHD</h2>
   
   <div class="menu">
      <button id="solicitudes" onclick="formulario_1()">Solicitudes</button>
      <button id="crear" onclick="formulario_2()">Crear Solicitud</button>
      <button id="losmios" onclick="formulario_4()">Mis Solicitudes</button>
      <button id="contactar" onclick="formulario_3()">Contacto</button>
   </div>
   <br>
   <!-- solicitudes para mi -->
   <div id="form_1" style="display: block">
      <h2 class="saludo">Reportes de incidencias para su depatamento</h2>
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

                      $tipo = $_SESSION['dep'];

                      $sql_cons = "SELECT * FROM id5812118_system_help_desk.solicitudes WHERE departamento = '$tipo';";
                      $cons = mysqli_query($conection, $sql_cons);
                   
                      while($result = mysqli_fetch_array($cons)){
                          echo '<tr>';
                          echo '<td>'.$result['numero_solicitud']."\n".'</td>';
                          echo '<td>'.$result['Nombre_usuario']."\n".'</td>';
                          echo '<td>'.$result['departamento']."\n".'</td>';
                          echo '<td>'.$result['descripcion_peticion']."\n".'</td>';
                          echo '<td>'.$result['fecha_solicitud']."\n".'</td>';
                          echo '<td>'.$result['Estado_solicitud']."\n".'</td>';
                          echo '<td>'.'<a href="proceso.php?numero_solicitud='.$result['numero_solicitud'].'&Estado_solicitud='.$result['Estado_solicitud'].'">En Proceso</a>'."\n".'</td>';
                          echo '<td>'.'<a href="confirmar.php?numero_solicitud='.$result['numero_solicitud'].'&Estado_solicitud='.$result['Estado_solicitud'].'">Confirmar</a>'."\n".'</td>';
                          echo '</tr>';
                      }
                      mysqli_close($conection);
                   ?>
           </thead>
       </table>
   </div>
   <!-- formulario de solicitud -->
   <div id="form_2" class="form-control" style="display: none">
      <h2 class="saludo">Puedes hacer reporte de un incidencia.</h2><br>
       <form action="enviar_solicitud.php" method="post">
           <div class="form-group">
               <label for="nombre">Nombre:</label>
               <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
           </div>
           <div class="form-group">
               <label for="departamento">Despartamento Destino:</label>
               <select name="departamento" id="departamento" class="form-control">
                    <option value="Limpieza">Limpieza</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Sistemas">Sistemas</option>
                    <option value="Electromecanica">Electromecanica</option>
                    <option value="Bioquimica">Bioquimica</option>
                    <option value="Administracion">Administracion</option>
                    <option value="Contador Publico">Contador Publico</option>
               </select>
           </div>
           <div class="form-group">
               <label for="descripcion">Mensaje: </label>
               <textarea class="form-control" name="descripcion" rows="3" id="descripcion" required></textarea>
           </div>
           <button type="submit" class="btn btn-dark">Enviar</button>
       </form>
   </div>
   <!-- formulario de contacto con administradores -->
   <div id="form_3" class="form-control" style="display: none">
      <h2 class="saludo">Tienen alguna duda o necesitas una aclaracion.</h2>
      <h2 class="saludo">Contacta con nosotros uno de los asistentes de SHD te contestara.</h2>
       <form action="mensaje_administradores.php" method="post" onsubmit="return validar_form3()">
           <div class="form-group">    
               <label for="con_nombre">Nombre: </label>
               <input type="text" class="form-control" placeholder="Nombre" name="con_nombre" id="con_nombre" required>
           </div>
           <div class="form-group">
               <label for="con_correo">Correo: </label>
               <input type="email" name="con_correo" id="con_correo" placeholder="example@example.com" class="form-control" required>
           </div>
           <div class="form-group">
               <label for="con_mensaje">Mensaje: </label>
               <textarea name="con_mensaje" id="con_mensaje" rows="3" class="form-control" required></textarea>
           </div>
           <button type="submit" class="btn btn-dark">Enviar</button>
       </form>
   </div>
   <!-- solicitudes hecgas por mi -->
   <div id="form_4" style="display: none">
      <h2 class="saludo">Reportes de incidencias hechas por ti.</h2>
       <table class="tabla">
           <thead>
               <tr>
                   <th>#</th>
                   <th>Nombre del usuario</th>
                   <th>Departamento</th>
                   <th>Descripcion</th>
                   <th>Fecha de Solicitud</th>
                   <th>Estado de Solicitud</th>
                   <th>Opciones</th>
               </tr>
           </thead>
           <tbody>
                 <?php
                    $conection = mysqli_connect(HOST,USER,PASWORD,ENGINE);

                    $usuario = $_SESSION['userid'];

                    $sql_cons = "SELECT * FROM id5812118_system_help_desk.solicitudes WHERE usuario = '$usuario';";
                    $cons = mysqli_query($conection, $sql_cons);
                    //$cons = mysqli_query($conection, $sql_cons);
                   
                      while($resultado = mysqli_fetch_array($cons)){
                          echo '<tr>';
                          echo '<td>'.$resultado['numero_solicitud']."\n".'</td>';
                          echo '<td>'.$resultado['Nombre_usuario']."\n".'</td>';
                          echo '<td>'.$resultado['departamento']."\n".'</td>';
                          echo '<td>'.$resultado['descripcion_peticion']."\n".'</th>';
                          echo '<td>'.$resultado['fecha_solicitud']."\n".'</td>';
                          echo '<td>'.$resultado['Estado_solicitud']."\n".'</td>';
                          echo "<td>"."<a href='eliminar.php?numero_solicitud=".$resultado['numero_solicitud']."&estado=".$resultado['Estado_solicitud']."'>Eliminar</a>"."\n".'</td>';
                          echo '</tr>';
                      }
                      mysqli_close($conection);
                   ?>
           </tbody>
       </table>
   </div>
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