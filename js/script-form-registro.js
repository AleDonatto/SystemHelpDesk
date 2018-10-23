function validar_form() {
    var nombre = document.getElementById("nombre").value;
    //var nombre = document.formulario.nombre.value;
    var apellido = document.getElementById("apellido").value;
    var correo = document.getElementById("correo").value;
    var contras = document.getElementById("contraseña").value;
    //var depart = document.getElementById("departamento");



    if (!nombre || !apellido || !correo || !contras) {
        alert("Debe Llenar los cambos");
        var nombre = document.getElementById("nombre").focus();
        return false;
    } else {
        return true;
        //window.location.href = 'iniciar_sesion.php';
    }
}

function estilo_predeterminado(){
    if(document.createStyleSheet) {
      document.createStyleSheet('css/stilo_predeterminado1.css');
    }
    else {
          var styles = "@import url(' css/stilo_predeterminado1.css ');";
          var newSS=document.createElement('link');
          newSS.rel='stylesheet';
          newSS.href='data:text/css,'+escape(styles);
          document.getElementsByTagName("head")[0].appendChild(newSS);
    }
}

