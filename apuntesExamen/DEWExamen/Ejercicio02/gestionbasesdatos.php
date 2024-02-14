
<?php


function conectarBD(){
    $servidor="10.16.0.109";
    $db="dwes";
    $usuario="dwes";
    $password="abc123.";
    $conexion = new mysqli($servidor,  $usuario, $password, $db) or die ('Error en la conexión');
    return $conexion;
}   

function escribirOpcionesSelectTienda($opcion){
    $conexion = conectarBD();
    $consulta = "select cod AS codTienda, nombre AS Nombre from tienda;";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()){
            if ($fila['codTienda'] !== $opcion) {
                echo "<option value=".$fila['codTienda'].">".$fila['Nombre']."</option>";    
            }
            else {
                echo "<option value=".$fila['codTienda']." selected>".$fila['Nombre']."</option>";    
            }
        }
    }

}


function escribirOpcionesSelectProducto($opcion){
    $conexion = conectarBD();
    $consulta = "select cod AS codProducto, nombre_corto AS Nombre from producto;";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()){
            if ($fila['codProducto'] !== $opcion) {
                echo "<option value=".$fila['codProducto'].">".$fila['Nombre']."</option>";    
            }
            else {
                echo "<option value=".$fila['codProducto']." selected>".$fila['Nombre']."</option>";    
            }
        }
    }

}

function mostrarArticulosTienda($codTienda){
    $conexion = conectarBD();
    $consulta = "select P.nombre_corto AS nombreProducto, S.unidades AS cantidad, P.PVP AS precio 
    from stock S, producto P where S.tienda = ".$codTienda." and S.producto = P.cod";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        echo "<table border=1>";
        echo "<tr><th>Nombre de Producto</th><th>Existencias</th><th>Precio unidad</th></tr>";    
        while ($fila = $resultado->fetch_assoc()){
            echo "<tr><td>".$fila['nombreProducto']."</td><td>".$fila['cantidad']."</td><td>".$fila['precio']."</td></tr>";    
        }
        echo "</table>";
    }

}


function mostrarTiendasConProducto($codProducto){
    $conexion = conectarBD();
    $consulta = "select T.nombre AS nombreTienda, S.unidades AS cantidad
      from stock S, tienda T where T.cod = S.tienda and S.producto = '".$codProducto."'";;
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        echo "<table border=1>";
        echo "<tr><th>Nombre de Producto</th><th>Existencias</th></tr>";    
        while ($fila = $resultado->fetch_assoc()){
            echo "<tr><td>".$fila['nombreTienda']."</td><td>".$fila['cantidad']."</td></tr>";    
        }
        echo "</table>";
    }
}

function mostrarDatosProductos($campo, $orden){
    $conexion = conectarBD();
    $consulta = "select P.cod AS codProd, P.nombre_corto AS nombre, sum(unidades) AS cantidad
        from producto P, stock S where P.cod = S.producto 
        group by codProd
        order by " . $campo . " " . $orden . " ";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        echo "<table border=1>";
        echo "<tr><th>Codigo Producto</th><th>Nombre producto</th><th>Cantidad</th></tr>";    
        while ($fila = $resultado->fetch_assoc()){
            echo "<tr><td>".$fila['codProd']."</td><td>".$fila['nombre']."</td><td>".$fila['cantidad']."</td></tr>";    
        }
        echo "</table>";
    }



};

?>