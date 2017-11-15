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
            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuario"])
            && preg_match('/^[a-zA-Z0-9]*$/', $_POST["password"])
            && preg_match('/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $_POST["email"])){
                $encriptar = crypt($_POST["password"], '$2a$07$vA56XAP1LFV0KoALTbzPbui8j3uW6bcXwAKTs0Mc6gwOxjb.SaUSS');
                $datosController = array("usuario" => $_POST["usuario"],"password" => $encriptar,"email" => $_POST["email"]);
                $respuesta = (new Datos)->registroUsuarioModel($datosController, "usuarios");
                if($respuesta == "Success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");
                }
            }
        }
    }

    #Ingreso de Usuarios
    public function ingresoUsuarioController(){
        if (isset($_POST["usuarioLogin"])) {
            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioLogin"])
            && preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordLogin"])){
                $encriptar = crypt($_POST["passwordLogin"], '$2a$07$vA56XAP1LFV0KoALTbzPbui8j3uW6bcXwAKTs0Mc6gwOxjb.SaUSS');
                $datosController = array("usuario" => $_POST["usuarioLogin"], "password" => $encriptar);
                $respuesta = (new Datos)->ingresoUsuarioModel($datosController, "usuarios");
                //var_dump($respuesta);
                session_start();
                $_SESSION["validar"] = true;
                if ($respuesta["usuario"] == $_POST["usuarioLogin"] && $respuesta["password"] == $encriptar) {
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=fallo");
                }
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
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
        }
    }

    #Editar Usuario
    public function editarUsuarioController(){
        $datosController = $_GET["id"];
        //echo $datosController;
        $respuesta =  (new Datos)->editarUsuarioModel($datosController, "Usuarios");
        echo $respuesta = '
            <input type="hidden" name="idEditar" value="'.$datosController.'" required>
            <input type="text" name="usuarioEditar" value="'.$respuesta["usuario"].'" required>
            <input type="email" name="emailEditar" value="'.$respuesta["email"].'" required>
            <input type="text" name="passwordEditar" value="'.$respuesta["password"].'" required>
            <input type="submit" value="Actualizar">';
    }

    #Actualizar Usuario
    public function actualizarUsuarioController(){
        if (isset($_POST["usuarioEditar"])) {
            if(preg_match('/^[a-zA-Z0-9]*$/', $_POST["usuarioEditar"])
            && preg_match('/^[a-zA-Z0-9]*$/', $_POST["passwordEditar"])
            && preg_match('/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $_POST["emailEditar"])){
                $encriptar = crypt($_POST["passwordEditar"], '$2a$07$vA56XAP1LFV0KoALTbzPbui8j3uW6bcXwAKTs0Mc6gwOxjb.SaUSS');
                $datosController = array(
                    "id" => $_POST["idEditar"],
                    "usuario" => $_POST["usuarioEditar"],
                    "password" => $encriptar,
                    "email" => $_POST["emailEditar"]);
                $respuesta = (new Datos)->actualizarusuarioModel($datosController, "usuarios");
                if ($respuesta == "success") {
                    header("location: index.php?action=cambio");
                }else{
                    echo "Error";
                }
            }
        }
    }

    #Eliminar Usuario
    public function eliminarUsuarioController(){
        if(isset($_GET["idBorrar"])){
            $datosController = $_GET["idBorrar"];
            $respuesta = (new Datos)->eliminarUsuarioModel($datosController, "usuarios");
            if($respuesta == "success"){
                header("location:index.php?action=usuarios");
            }else{
                echo "Error";
            }
        }
    }
}


?>