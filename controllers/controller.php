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
            if($respuesta == "Success"){
                header("location:index.php?action=ok");
            }else{
                header("location:index.php");
            }
        }
    }

    #Ingreso de Usuarios
    public function ingresoUsuarioController(){
        if (isset($_POST["usuarioLogin"])) {
            $datosController = array("usuario" => $_POST["usuarioLogin"], "password" => $_POST["passwordLogin"]);
            $respuesta = (new Datos)->ingresoUsuarioModel($datosController, "usuarios");
            //var_dump($respuesta);
            session_start();
            $_SESSION["validar"] = true;
            if ($respuesta["usuario"] == $_POST["usuarioLogin"] && $respuesta["password"] == $_POST["passwordLogin"]) {
                header("location:index.php?action=usuarios");
            }else{
                header("location:index.php?action=fallo");
            }

        }
    }

    #Vista Usuarios
    public function vistaUsuarioController(){
        $respuesta = (new Datos)->vistaUsuariosModel("usuarios");
        //var_dump($respuesta[3][1]);
        foreach ($respuesta as $row => $item) {
            echo '<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><button>Editar</button></td>
				<td><button>Borrar</button></td>
			</tr>';
        }
    }
}


?>