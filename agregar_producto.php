<?php
//incluyo el archivo de conexion
include "conexion.php";

//guardo en variables lo que me llega del formulario_registro
$us = $_REQUEST["usuario"];
$co = $_REQUEST["contra"];
$fn = $_REQUEST["fecha_nac"];


//guardo en una variable la consulta SQL (que inserta los datos)
$sql = "INSERT INTO products (id_user, name, description, price, stock) VALUES ('$us','$co','$fn')";

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
    

?>