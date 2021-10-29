<?php
//incluyo el archivo de conexion
include "conexion.php";

//guardo en una variable la consulta SQL
$sql = "SELECT * FROM products";

/*ejecuto la consulta guardada en la variable anterior 
    y guardo el resultado en la variable "resultado"
*/
$resultado = $con->query($sql);

//verifico si resultado tiene algun dato
if($resultado){ 
    //si es que SI, imprime todos los productos encontrados
    echo "<a href='formulario_productos.html'>Agregar Producto</a>";
    echo "<table border='1'>";
    while($fila = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$fila["name"]."</td>";
        echo "<td>".$fila["description"]."</td>";
        echo "<td>".$fila["price"]."</td>";
        echo "<td>".$fila["stock"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    //si es que NO, le informa el error que hubo
    echo $con->error;
}

?>