<?php
include("../funciones/autenticado.php");
include("../componentes/header.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../estilos/css/estilos.css">
    <link rel="stylesheet" href="../estilos/css/fuentes.css">
    <script src="http://fichatecnica.corpoelec.com.ve/estilos/js/librerias/jquery.min.js"></script>
    <script src="http://fichatecnica.corpoelec.com.ve/estilos/js/librerias/jquery-ui.js"></script>
    <script src="http://fichatecnica.corpoelec.com.ve/estilos/js/main.js"></script>
    <script src="http://fichatecnica.corpoelec.com.ve/estilos/js/ingresarficha.js"></script>

    <title>Sistema de Ficha Técnica</title>
  </head>
  <body class="principal">
    <div class="seccion-menu">
      <ul class="menu">
        <li class="item icon-home" onclick="ajaxclear()"></li>
        <?php if($_SESSION["nivel"] == "1") { ?> <li class="item ingresar-ficha" onclick="loadpage('ingresarficha.php')">Ingresar Ficha</li> <?php } ?>
        <?php if($_SESSION["nivel"] == "1") { ?> <li class="item modificar-ficha" onclick="loadpage('modificarficha.php')">Modificar Ficha</li> <?php } ?>
        <li class="item menu-regiones">Consultar Región
          <ul class="lista-regiones">
            <li onclick="loadpage('consultaregion.php?reg=1')" class="region">Central</li>
            <li onclick="loadpage('consultaregion.php?reg=2')" class="region">Guayana</li>
            <li onclick="loadpage('consultaregion.php?reg=3')" class="region">Los Andes</li>
            <li onclick="loadpage('consultaregion.php?reg=4')" class="region">Los Llanos</li>
            <li onclick="loadpage('consultaregion.php?reg=5')" class="region">Occidental</li>
            <li onclick="loadpage('consultaregion.php?reg=6')" class="region">Oriental</li>
          </ul>
        </li>
      </ul>
    </div>
    <div id="contenedor"></div>
  </body>
</html>
