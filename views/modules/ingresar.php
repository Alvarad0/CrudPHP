<h1>INGRESAR</h1>
	<form method="post" action="">
		<input type="text" placeholder="Usuario" name="usuarioLogin" required>
		<input type="password" placeholder="Contraseña" name="passwordLogin" required>
		<input type="submit" value="Enviar">
	</form>
<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();

if (isset($_GET["action"])) {
    if ($_GET["action"] == "fallo") {
        echo "Usuario ó Contraseña Incorrectos";
    }
    exit();
}
?>