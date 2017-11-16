<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
    <link rel="stylesheet" href="views/assets/css/style.css">
    <script src="views/assets/js/jquery3.2.1.min.js"></script>
</head>
<body>
<?php include "modules/navegacion.php"; ?>
<section>
<?php
    $mvc = new MvcController();
    $mvc -> enlacesPaginasController();
 ?>
</section>
<script src="views/assets/js/validarFormulario.js"></script>
</body>
</html>