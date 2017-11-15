//Validación de Formulario
function validarRegistro(){
    var usuario = document.querySelector("#userRegistro").value;
    var password = document.querySelector("#pwRegistro").value;
    var email = document.querySelector("#eRegistro").value;
    var terminos = document.querySelector("#terminos").checked;
    /*console.log('usuario: ', usuario);
    console.log('password: ', password);
    console.log('email: ', email);*/
    validarUsuario(usuario);
    validarPassword(password);
}

//Validar campo de Usuario
function validarUsuario(usuario){
    if(usuario != ""){
        document.querySelector("label[for = 'UsuarioRegistro']").innerHTML = " Usuario";
        document.getElementById('btnEnviar').disabled = false;
        var caracteres = usuario.length;
        var expresion = /^[a-zA-Z0-9]*$/;
        if(caracteres > 6 ){
            document.querySelector("label[for = 'UsuarioRegistro']").innerHTML += "<br>La Usuario debe ser menor o igual a 6 caracteres";
            document.getElementById('btnEnviar').disabled=true;
        }
        if(!expresion.test(usuario)){
            document.querySelector("label[for = 'UsuarioRegistro']").innerHTML += "<br>Por favor no escriba caracteres especiales";
            document.getElementById('btnEnviar').disabled = true;
        }
    }
}

//Validar Contraseña
function validarPassword(password){
    if(password != ""){
        document.querySelector("label[for = 'PasswordRegistro']").innerHTML = " Contraseña";
        document.getElementById('btnEnviar').disabled = false;
        var caracteres = password.length;
        var expresion = /^[a-zA-Z0-9]*$/;
        if(caracteres < 6){
            document.querySelector("label[for = 'PasswordRegistro']").innerHTML += "<br>Su contraseña debe contener mas de 6 caracteres";
            document.getElementById('btnEnviar').disable  = true;
        }
        if(!expresion.test(password)){
            document.querySelector("label[for = 'PasswordRegistro']").innerHTML += "<br>Por favor no escriba caracteres especiales";
            document.getElementById('btnEnviar').disabled = true;
        }
    }
}