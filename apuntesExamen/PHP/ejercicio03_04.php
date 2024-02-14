<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ejercicio 3.5 Listado ordenado de usuarios</title>
    </head>
    <body>
        <ol>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?orden=asc"; ?>">Orden ascendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?orden=desc"; ?>">Orden descendente<a/></li>
        </ol>
        <?php
            require_once ('./gestionbasesdatos.php');
            $orden="asc";
            if (isset($_REQUEST['orden'])){
                $orden = $_REQUEST['orden'];
            }

            mostrarDatosUsuarios($orden);

        ?>
    </body>










</html>









