<?php
//incluyo el archivo de conexion
include "conexion.php";

//guardo en variables lo que me llega del formulario_registro
$us = $_REQUEST["usuario"];
$co = $_REQUEST["contra"];
$fn = $_REQUEST["fecha_nac"];

//guardo en una variable la consulta SQL (que buscar si existe un usuario con ese nombre)
$sql = "SELECT * FROM users WHERE user_name ='$us'";

/*ejecuto la consulta guardada en la variable anterior 
    y guardo el resultado en la variable "resultado"
*/
$resultado = $con->query($sql);

//verifico si resultado tiene algun dato
if($resultado){ 
    //si es que SI, verifica si hay por lo menos un usuario con ese nombre
    if($resultado->num_rows>0){
        echo "El usuario $us ya existe";
    } else{
        //guardo en una variable la consulta SQL (que inserta los datos)
        $sql = "INSERT INTO users (user_name, pass, birth_date) VALUES ('$us','$co','$fn')";

        /*ejecuto la consulta guardada en la variable anterior 
            y guardo el resultado en la variable "resultado"
        */
        $resultado = $con->query($sql);

        //verifico si resultado tiene algun dato
        if($resultado){ 
            //si es que SI, lo lleva al formulario_login
            header("location: formulario_login.html");
        } else {
            //si es que NO, le informa el error que hubo
            echo $con->error;
        }
    }

} else {
    //si es que NO, le informa el error que hubo
    echo $con->error;
}

?>