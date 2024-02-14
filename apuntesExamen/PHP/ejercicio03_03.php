<?php
require_once("./gestionbasesdatos.php");
$login="";
$nombre="";
$password="";
$userID="";
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
       <h1>Consultar los datos</h1>
        <form method="method">
            <table>
                <tr>
                        <td>
                            Selecciona usuario:
                        </td>
                        <td> <select name="userID" id="userID">
                            <?php
                                if (isset($_REQUEST['userID'])){
                                    $userID = $_REQUEST['userID'];
                                    $datos = obtenerDatosUsuarios($userID);
                                    $nombre = $datos['Nombre'];
                                    $login = $datos['Login'];
                                    $password = $datos['Password'];
                                }
                                escribirOpcionesSelect($userID);
                            ?>
                            </select>
                        </td>
                </tr>
                <?php
                        if (isset($_REQUEST['userID'])){
                            echo "<tr><td>Login del usuario:</td><td><input type=\"text\" name=\"login\" id=\"login\" value=\"$login\"/></td></tr>";
                            echo "<tr><td>Password del usuario:</td><td><input type=\"text\" name=\"password\" id=\"password\" value=\"$password\"/></td></tr>";
                        }
                ?>
            <tr>
                <td colspan="2">
                    <button type=\"submit\">Mostrar datos</button>
                    <button type="reset">Limpiar</button>
                </td>
            </tr>
            </table>
            
        </form>