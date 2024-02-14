<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ejercicio 3.5 Listado ordenado de usuarios</title>
    </head>
    <body>
        <ol>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=codProd&orden=asc"; ?>">Codigo de producto ==> Orden ascendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=codProd&orden=desc"; ?>">Codigo de producto ==> Orden descendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=nombre&orden=asc"; ?>">Nombre de producto ==> Orden ascendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=nombre&orden=desc"; ?>">Nombre de producto ==> Orden descendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=cantidad&orden=asc"; ?>">Cantidad de producto ==> Orden ascendente<a/></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?campo=cantidad&orden=desc"; ?>">Cantidad de producto ==> Orden descendente<a/></li>
            </ol>
        <?php
            require_once ('./gestionbasesdatos.php');
            $orden="asc";
            if (isset($_REQUEST['orden'])){
                $orden = $_REQUEST['orden'];
            }
            $campo="codProd";
            if (isset($_REQUEST['campo'])){
                $campo = $_REQUEST['campo'];
            }
            
            mostrarDatosProductos($campo, $orden);

        ?>
    </body>










</html>









