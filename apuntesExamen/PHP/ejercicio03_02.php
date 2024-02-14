<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form method="post">

            <table>
                <tr>
                        <td>
                            Introduce el nombre:
                        </td>
                        <td>
                            <input type="text" name="nombre" id="nombre" placeholder="Introduce el nomre."/>
                        </td>
                </tr>
                <tr>
                        <td>
                            Introduce el login:
                        </td>
                        <td>
                            <input type="text" name="login" id="login" placeholder="Introduce el login."/>
                        </td>
                </tr>
                <tr>
                    <td>
                        Introduce la contraseña:
                    </td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Introduce la contraseña."/>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Darnos de alta</button>
                    <button type="reset">Limpiar</button>
                </td>
            </tr>
            </table>
        </form>
        <?php
                require('gestionbasesdatos.php');
                if (isset($_REQUEST['nombre']) && isset($_REQUEST['login']) && isset($_REQUEST['password'])){
                    $nombre = $_REQUEST['nombre'];
                    $login = $_REQUEST['login'];
                    $password = $_REQUEST['password'];
                    $disponibleLogin = comprobarLoginDisponible($login);
                    if ($disponibleLogin == true){
                        $resultado = insertarNuevoUsuarios($nombre, $login, $password);
                        if ($resultado == true)
                            echo "<p>Usuario insertado</p>";
                        else 
                            echo "<p>No se ha podido insertar el usuario</p>";
                    }
                    else {
                        echo "<p>Login repetido</p>";
                    }

                }

        ?>
</body>