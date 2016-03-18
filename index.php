<!DOCTYPE html>
<html class="index" lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estilos/css/estilos.css">
  <link rel="stylesheet" href="estilos/css/fuentes.css">
  <title>Ficha Técnica</title>
</head>
<body class="index">
  <div class="encabezado1">Proyecto de Independencia Tecnológica</div>
  <div class="encabezado2">Sistema de Control de Servicios Conexos</div>
  <form action="funciones/login.php" method="post">
    <div class="box">
      <div class="titulo">Ingreso al Sistema</div>
      <div class ="table">
        <div class="login">
          <label for="username">Nombre de Usuario</label>
          <input name="username" type="text" placeholder="Ingrese su Usuario">
        </div>
        <div class="password">
          <label for="password">Contraseña</label>
          <input name="password" type="password" placeholder="Ingrese su contraseña">
        </div>
        <div class="message">
          <?php
            if (isset($_GET['invalido'])) {
              echo "<span>Credenciales Invalidas</span>";
            }
            if (isset($_GET['noregistrado'])) {
              echo "<span>Usuario No Registrado</span>";
            }
        ?>
        </div>
        <div class="enter">
          <input type="submit" value="Ingresar">
        </div>
      </div>
    </div>
  </form>
</body>
</html>
