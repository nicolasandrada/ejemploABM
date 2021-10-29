<?php
//incluyo el archivo de conexion
include "conexion.php";

//guardo en variables lo que me llega del formulario_registro
$us = $_REQUEST["usuario"];
$co = $_REQUEST["contra"];


//guardo en una variable la consulta SQL
$sql = "SELECT * FROM users WHERE user_name = '$us' AND pass ='$co'";

/*ejecuto la consulta guardada en la variable anterior 
    y guardo el resultado en la variable "resultado"
*/
$resultado = $con->query($sql);

//verifico si resultado tiene algun dato
if($resultado){ 
    //si es que SI, verifica si hay por lo menos un usuario con ese nombre y contraseña
    if($resultado->num_rows>0){
        //si es que SI, se genera una sesion con el id del usuario y lo redirige a ver todos los productos.
        $fila= $resultado->fetch_assoc();
        
        session_start();
        $_SESSION["usuario"] =  $fila["id"];
        header("location: productos.php");
    } else{
        echo "El usuario y/o la contraseña son invalidos";
    }
} else {
    //si es que NO, le informa el error que hubo
    echo $con->error;
}

?>