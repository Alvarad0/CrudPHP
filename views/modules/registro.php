<h1>REGISTRO DE USUARIO</h1>
<form method="post"><!-- onsubmit="return validarRegistro()" -->
    <label for="UsuarioRegistro">Usuario</label>
	<input type="text" placeholder="Maximo 6 Caracteres" maxlength="6" name="usuario" id="userRegistro" required onchange="return validarRegistro()">
    <label for="PasswordRegistro">Contraseña</label>
    <input type="password" placeholder="Escribir numero(s) y letras Mayusculas" name="password" id="pwRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required onchange="return validarRegistro()">
    <label for="">Correo Electronico</label>
    <input type="email" placeholder="ejemplo@domain.xyz" name="email" id="eRegistro" required>
	<input type="submit" value="Enviar" id="btnEnviar">
</form>
<?php
$registro = new MvcController();
$registro->registroUsuariosController();

if (isset($_GET["action"])){
    if($_GET["action"] == "ok"){
        echo "Registro Exitoso";
    }
}
?>