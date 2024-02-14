<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form method="post">

            <table>
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
                    <button type="submit">Identificarnos</button>
                    <button type="reset">Limpiar</button>
                </td>
            </tr>
            </table>
        </form>
        <?php
                require('gestionbasesdatos.php');
                if (isset($_REQUEST['login']) && isset($_REQUEST['password'])){
                    $login = $_REQUEST['login'];
                    $password = $_REQUEST['password'];
                    $identificacion = identificarUsuario($login, $password);
                    if ($identificacion == true){
                        echo "<div>Identificación correcta.</div>";
                    }
                    else {
                        echo "<div>Identificación incorrecta.</div>";
                    }

                }

        ?>



</html>