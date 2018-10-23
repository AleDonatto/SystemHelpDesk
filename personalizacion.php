<?php
    session_start();

    if(!isset($_SESSION['userid'])){
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
    <link rel="stylesheet" href="css/personalizacion.css">
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
                     <li><a href="mis_datos.php"><p>MIS DATOS</p></a></li>
                     <li><a href="#"><p>PERSONALIZAR SITIO</p></a></li>
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
    <div class="container">
        <h4 class="text-center saludo">Usted puede Personalizar su sitio. Seleccione el que diseño sea de su agrado</h4>
    </div>
    <div class="container">
        <h3>Diseño: Default</h3>
        <p>Descripcion: <br> Este desiño biene por default cuando se registra en SHD, el equpo de SHD brinda la posobilidad de poser cambiar este diseño por uno de los que se describen aqui.</p>
        <p>Tipo de letra: <br> Size: 10pt <br> Font family: Serif </p>
        <p>Combinacion de colores: <br> Escala de Grises.</p>
        <img src="img/predeterminado1.JPG" alt="" class="ejemplo-style"> <br><br>
    </div><br>
    <div class="container">
        <h3>Diseño: Blue Skye</h3>
        <p>Tipo letra: <br>Font: Arial, Helvetica, sans-serif <br> Size: 15pt</p>
        <p>Combinacion de colores: <br>Escala de azules</p>
        <img src="img/personalizado2.JPG" alt="" class="ejemplo-style"><br>
    </div><br>
    <div class="container">
        <h3>Diseño: SHD-Dark</h3>
        <p>Tipo de letra: <br> Size: 10pt <br> Font family: Serif </p>
        <p>Combinacion de colores: <br> Escala de Naranja y Azules.</p>
        <img src="img/personalizado3.JPG" alt="" class="ejemplo-style">
        <br>
    </div>
    <br>
    <div class="form-control estilo_seleccion">
        <form action="guardar_style.php" method="post">
            <div class="form-group">
                <label for="seleccionar">Selccione Estilo:</label>
                <select name="seleccionar" id="" class="form-control">
                    <option value="1">Default</option>
                    <option value="2">Blue Skyes</option>
                    <option value="3">SHD Dark</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-lg btn-block">Seleccionar</button>
        </form>
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
</body>
</html>