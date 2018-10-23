function formulario_1(){
    var formulario1 = document.getElementById('form_1');
    var formulario2 = document.getElementById('form_2');
    var formulario3 = document.getElementById('form_3');
    var formulario4 = document.getElementById('form_4');
    
    if(formulario1.style.display=='none'){
        formulario2.style.display = 'none';
        formulario1.style.display = 'block';
        formulario3.style.display = 'none';
        formulario4.style.display = 'none';
    }   
}

function formulario_2(){
    var formulario1 = document.getElementById('form_1');
    var formulario2 = document.getElementById('form_2');
    var formulario3 = document.getElementById('form_3');
    var formulario4 = document.getElementById('form_4');
    
    if(formulario2.style.display=='none'){
        formulario2.style.display = 'block';
        formulario1.style.display = 'none';
        formulario3.style.display = 'none';
        formulario4.style.display = 'none';
    }   
}

function formulario_3(){
    var formulario1 = document.getElementById('form_1');
    var formulario2 = document.getElementById('form_2');
    var formulario3 = document.getElementById('form_3');
    var formulario4 = document.getElementById('form_4');
    
    if(formulario3.style.display=='none'){
        formulario2.style.display = 'none';
        formulario1.style.display = 'none';
        formulario3.style.display = 'block';
        formulario4.style.display = 'none';
    }   
}

function formulario_4(){
    var formulario1 = document.getElementById('form_1');
    var formulario2 = document.getElementById('form_2');
    var formulario3 = document.getElementById('form_3');
    var formulario4 = document.getElementById('form_4');
    
    if(formulario4.style.display=='none'){
        formulario1.style.display = 'none';
        formulario2.style.display = 'none';
        formulario3.style.display = 'none';
        formulario4.style.display = 'block';
    }   
}

function tabla1(){
    var formulario1 = document.getElementById('solicitudes');
    var formulario2 = document.getElementById('usuarios');
    
    if(formulario1.style.display=='none'){
        formulario1.style.display = 'block';
        formulario2.style.display = 'none';
    }   
}
function tabla2(){
    var formulario1 = document.getElementById('solicitudes');
    var formulario2 = document.getElementById('usuarios');
    
    if(formulario2.style.display=='none'){
        formulario2.style.display = 'block';
        formulario1.style.display = 'none';
    }   
}

function validar_form2(){
    var txtnombre = document.getElementById('nombre');
    var txtdepartamento = document.getElementById('departamento');
    var txtmensaje = document.getElementById('descripcion');
    
    if(!txtnombre || !txtdepartamento || !txtmensaje ) {
        alert('Asegurese de llenar los campos');
        txtnombre.focus();
        return false;
    }
    else{
        return true;
    }
}

function validar_form3(){
    var txtnombrecon = document.getElementById('con_nombre');
    var txtcorreo = document.getElementById('con_correo');
    var txtmensajecon = document.getElementById('con_mensaje');
    
    if(!txtnombrecon || !txtcorreo || !txtmensajecon ) {
        alert('Asegurese de llenar los campos');
        txtnombrecon.focus();
        return false;
    }
    else{
        return true;
    }
}