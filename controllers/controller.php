<?php

class MvcController
{
    #LLAMADA A LA PLANTILLA
    public function pagina()
    {
        include "views/template.php";
    }

    #ENLACES
    public function enlacesPaginasController()
    {
        if (isset($_GET['action'])) {
            $enlaces = $_GET['action'];
        } else {
            $enlaces = "index";
        }
        $respuesta = (new Paginas)->enlacesPaginasModel($enlaces);
        include $respuesta;
    }

    #Registro de Usuarios
    public function registroUsuariosController(){
        if(isset($_POST["usuario"])){
            $datosController = array("usuario" => $_POST["usuario"],"password" => $_POST["password"],"email" => $_POST["email"]);
            $respuesta = (new Datos)->registroUsuarioModel($datosController, "usuarios");
            echo $respuesta;
        }
    }
}


?>