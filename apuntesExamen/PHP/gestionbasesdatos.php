
<?php


function conectarBD(){
    $servidor="localhost";
    $db="examen00";
    $usuario="alumno00";
    $password="A1b2c3d4.";
    $conexion = new mysqli($servidor,  $usuario, $password, $db) or die ('Error en la conexión');
    return $conexion;
}   


function identificarUsuario($login, $password) {
    $conexion = conectarBD();
    $consulta = "select count(*) as identificacion from usuarios where login = '$login' and password = '$password'";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    $resul = $resultado->fetch_array();
    if ($resul['identificacion']==0)
        $return = false;
    else
        $return = true;
    $conexion->close();
    return $return;
}

function comprobarLoginDisponible($login){
    $conexion = conectarBD();
    $consulta = "select count(*) as disponible from usuarios where login = '$login'";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    $resul = $resultado->fetch_array();
    if ($resul['disponible']==0)
        $return = true;
    else
        $return = false;
    $conexion->close();
    return $return;
}



function insertarNuevoUsuarios ($nombre, $login, $password){
    if (comprobarLoginDisponible($login) == true){
        $conexion = conectarBD();
        $consulta = "insert into usuarios (nombre, login, password) values 
                    ('$nombre', '$login', '$password')";
        $resultado = $conexion->query($consulta) or die ('Error ' . $consulta);
        $conexion->commit();
        return true;
    } else
        {
            return false;
        }


}
    

function escribirOpcionesSelect($userID){
    $conexion = conectarBD();
    $consulta = "select userID as userID, nombre AS Nombre from usuarios";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()){
            if ($fila['userID'] !== $userID) {
                echo "<option value=".$fila['userID'].">".$fila['Nombre']."</option>";    
            }
            else {
                echo "<option value=".$fila['userID']." selected>".$fila['Nombre']."</option>";    
            }
        }
    }
}


function obtenerDatosUsuarios($userID){
    $conexion = conectarBD();
    $consulta = "select userID as userID, nombre AS Nombre, login AS Login, password AS Password from usuarios where userID='$userID'";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows == 1){
        while ($fila = $resultado->fetch_assoc()){
            $return = $fila;
        }
    return $return;
}
}
function mostrarDatosUsuarios($orden){
    $conexion = conectarBD();
    $consulta = "select nombre AS Nombre, login AS login from usuarios order by nombre $orden";
    $resultado = $conexion->query($consulta) or die ('Error. ' . $consulta);
    if ($resultado->num_rows > 0){
        echo "<table border=1>";
        echo "<tr><th>Nombre</th><th>Login</th></tr>";    
        while ($fila = $resultado->fetch_assoc()){
            echo "<tr><td>".$fila['Nombre']."</td><td>".$fila['login']."</td></tr>";    
        }
        echo "</table>";
    }
  
     
    


}
          


?>