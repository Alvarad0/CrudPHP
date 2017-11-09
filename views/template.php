<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Template</title>
    <link rel="stylesheet" href="views/assets/css/style.css">
</head>
<body>
<?php include "modules/navegacion.php"; ?>
<section>
<?php
    $mvc = new MvcController();
    $mvc -> enlacesPaginasController();
 ?>
</section>
</body>
</html>