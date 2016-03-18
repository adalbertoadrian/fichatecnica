<?php
  $week_days = array ("Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado");
  $months = array ("","Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $year_now = date ("Y");
  $month_now = date ("n");
  $day_now = date ("j");
  $week_day_now = date ("w");
  $date = "<strong>" .$week_days[$week_day_now] . ", </strong>" . $day_now . " de " . $months[$month_now] . " de " . $year_now;
?>
<div class="header">
  <div class="fecha"><?php echo $date ?></div>
  <div class="salir"><a href="?salir">Salir<span class="icon-log-out"></span></a></div>
  <div class="bienvenido">Bienvenido(a): <?php echo $_SESSION['datos'] ?></div>
  <h1>Sistema de Control de Servicios Conexos</h1>
</div>
