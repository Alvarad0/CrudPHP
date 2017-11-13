<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 09/11/2017
 * Time: 02:46 PM
 */
require_once "conexion.php";
class Datos extends Conexion {
    public function registroUsuarioModel($datosModel, $tabla){
    $stmt = (new Conexion)->conectar()->prepare("INSERT INTO $tabla(usuario, password, email) VALUES(:usuario, :password, :email)");
    $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
    //var_dump($stmt);

    if($stmt->execute()){
        return "Success";
    }
    else{
        return "Error";
    }
    }

    #Ingreso Usuario
    public function ingresoUsuarioModel($datosModel, $tabla){
        $stmt = (new Conexion)->conectar()->prepare("SELECT usuario, password FROM $tabla WHERE  usuario = :usuario");
        $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    #Vista Usuarios
    public function vistaUsuariosModel($tabla){
        $stmt = (new Conexion)->conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}