<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form method="post" action="" >
            <table>
                <tr>
                        <td>
                            Seleccionar la tienda:
                        </td>
                        <td>
                            <select id='codTienda' name='codTienda'>
                                <?php 
                                require_once ('gestionbasesdatos.php');
                                if (isset($_REQUEST['codTienda'])){
                                    escribirOpcionesSelectTienda($_REQUEST['codTienda']);
                                }
                                else {
                                    escribirOpcionesSelectTienda("");
                                } ?>
                            </select>
                        </td>
                </tr>
                <tr>
                <td colspan="2">
                    <button type="submit">Consultar Stock de tienda</button>
                </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_REQUEST['codTienda'])){
            mostrarArticulosTienda($_REQUEST['codTienda']);

        }


        ?>



</html>