<?php
/**
 * Created by PhpStorm.
 * User: Developer
 * Date: 09/11/2017
 * Time: 02:37 PM
 */
class Conexion{
    public function conectar()
    {
        $link = new PDO("mysql:host=localhost;dbname=bd_users", "root", "");
        //var_dump($link); Comprueba la conectividad
        return $link;
    }
}
/*$a = new Conexion();
$a->conectar();*/

