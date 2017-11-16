<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 15/11/2017
 * Time: 03:19 PM
 */
require_once "../../controllers/controller.php";
require_once "../../models/crudUsers.php";

class Ajax{
    public $validarUsuario;
    public function validarUsuarioAjax(){
        $datos = $this->validarUsuario;
        $respuesta = (new MvcController)->validarUsuarioController($datos);
        echo $respuesta;
    }
}
//Objecto de la Clase Ajax
if(isset($_POST["validarUsuario"])){
    $user = new Ajax();
    $user->validarUsuario = $_POST["validarUsuario"];
    $user->validarUsuarioAjax();
}
