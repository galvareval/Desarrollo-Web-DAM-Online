<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form method="post" >
            <table>
                <tr>
                        <td>
                            Seleccionar la Producto:
                        </td>
                        <td>
                            <select id='codProducto' name='codProducto'>
                                <?php 
                                require_once ('gestionbasesdatos.php');
                                if (isset($_REQUEST['codProducto'])){

                                    escribirOpcionesSelectProducto($_REQUEST['codProducto']);
                                }
                                else {
                                    escribirOpcionesSelectProducto("");
                                } ?>
                            </select>
                        </td>
                </tr>
                <tr>
                <td colspan="2">
                    <button type="submit">Consultar los productos en las tiendas</button>
                </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_REQUEST['codProducto'])){
            mostrarTiendasConProducto($_REQUEST['codProducto']);

        }


        ?>



</html>