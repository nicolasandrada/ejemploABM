<?php
/** Nos sirve para conectar a la base de datos
 *$con: es una variable que va guardar la conexion
 *localhost: donde se encuantra la base de datos (en este caso en la misma computadora)
 *root: el usuario que controla la base de datos.
 *"": la contraseña
 *ejemplo: nombre de la base de datos
 */
$con = new mysqli("localhost", "root", "", "ejemplo");

// Verifica si hubo algun error 
if($con->connect_error){
    die('Error de conexión: ' . $mysqli->connect_error);
}

?>