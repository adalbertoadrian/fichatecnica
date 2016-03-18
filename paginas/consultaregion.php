<?php
  $region = $_GET["reg"];
  if ($region == "1") {
    $titulo = "Central";
  } elseif ($region == "2") {
    $titulo = "Guayana";
  } elseif ($region == "3") {
    $titulo = "Los Andes";
  } elseif ($region == "4") {
    $titulo = "Los Llanos";
  } elseif ($region =="5") {
    $titulo = "Occidental";
  } elseif ($region == "6") {
    $titulo = "Oriental";
  }
?>

<div class="consulta-region">
  <h1>Ficha Técnica Region <?php echo $titulo; ?></h1>
  <div class="servicios">
    <h2>Información de Servicios Tecnologicos</h2>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-row">
          <div class="tabla-celda">
            <span>ldad</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
          <div class="tabla-celda">
            <span>dns</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
          <div class="tabla-celda">
            <span>dhcp</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
          <div class="tabla-celda">
            <span>correo</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
          <div class="tabla-celda">
            <span>proxy</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
          <div class="tabla-celda">
            <span>repositorio</span>
          </div>
          <div class="tabla-celda">
            <span>Estado</span>
          </div>
        </div>
      </div>
      <div class="tabla-body">
        <div class="tabla-row">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM servicios WHERE region = '".$region."'";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) {
            $ldap = array();
            $ldap = explode(",", utf8_encode($campo->nombres_ldap));
            $estadosldap = array();
            $estadosldap = explode(",", utf8_encode($campo->estados_ldap));
            $dns = array();
            $dns = explode(",", utf8_encode($campo->nombres_dns));
            $estadosdns = array();
            $estadosdns = explode(",", utf8_encode($campo->estados_dns));
            $dhcp = array();
            $dhcp = explode(",", utf8_encode($campo->nombres_dhcp));
            $estadosdhcp = array();
            $estadosdhcp = explode(",", utf8_encode($campo->estados_dhcp));
            $correo = array();
            $correo = explode(",", utf8_encode($campo->nombres_correo));
            $estadoscorreo = array();
            $estadoscorreo = explode(",", utf8_encode($campo->estados_correo));
            $proxy = array();
            $proxy = explode(",", utf8_encode($campo->nombres_proxy));
            $estadosproxy = array();
            $estadosproxy = explode(",", utf8_encode($campo->estados_proxy));
            $repositorio = array();
            $repositorio = explode(",", utf8_encode($campo->nombres_repositorio));
            $estadosrepositorio = array();
            $estadosrepositorio = explode(",", utf8_encode($campo->estados_repositorio));
            echo "<div class='tabla-celda'>";
            for($i=0;isset($ldap[$i]);$i++) {
              echo "<span>".$ldap[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadosldap[$i]);$i++) {
              echo "<span>".$estadosldap[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($dns[$i]);$i++) {
              echo "<span>".$dns[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadosdns[$i]);$i++) {
              echo "<span>".$estadosdns[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($dhcp[$i]);$i++) {
              echo "<span>".$dhcp[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadosdhcp[$i]);$i++) {
              echo "<span>".$estadosdhcp[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($correo[$i]);$i++) {
              echo "<span>".$correo[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadoscorreo[$i]);$i++) {
              echo "<span>".$estadoscorreo[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($proxy[$i]);$i++) {
              echo "<span>".$proxy[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadosproxy[$i]);$i++) {
              echo "<span>".$estadosproxy[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($repositorio[$i]);$i++) {
              echo "<span>".$repositorio[$i]."</span>";
            }
            echo "</div>";
            echo "<div class='tabla-celda'>";
            for($i=0;isset($estadosrepositorio[$i]);$i++) {
              echo "<span>".$estadosrepositorio[$i]."</span>";
            }
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-row">
          <div class="tabla-celda">
            <span>Observaciones</span>
          </div>
        </div>
      </div>
      <div class="tabla-body">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM servicios WHERE region = '".$region."'";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) { ?>
            <div class="tabla-row">
              <div class="tabla-celda">
                <span><?php echo utf8_encode($campo->observaciones); ?></span>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="tecnicos">
    <h2>Información de Tecnicos</h2>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-row">
          <div class="tabla-celda">
            <span>Tecnicos</span>
          </div>
          <div class="tabla-celda">
            <span>Tecnicos Software Libre</span>
          </div>
        </div>
      </div>
      <div class="tabla-body">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM tecnicos WHERE region = ".$region."";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) { ?>
            <div class="tabla-row">
              <div class="tabla-celda">
                <span><?php echo utf8_encode($campo->tecnicospropetario); ?></span>
              </div>
              <div class="tabla-celda">
                <span><?php echo utf8_encode($campo->tecnicoslibre); ?></span>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-row">
          <div class="tabla-celda">
            <span>Observaciones</span>
          </div>
        </div>
      </div>
      <div class="tabla-body">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM tecnicos WHERE region = ".$region."";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) { ?>
            <div class="tabla-row">
              <div class="tabla-celda">
                <span><?php echo utf8_encode($campo->observaciones); ?></span>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="subred">
    <h2>Información de Subred</h2>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-celda">
          <span>Subred</span>
        </div>
        <div class="tabla-celda">
          <span>Estado</span>
        </div>
      </div>
      <div class="tabla-body">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM subredes WHERE region = ".$region."";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) {
            $subredes = array();
            $subredes = explode(",", $campo->subredes);
            $subredesestados = array();
            $subredesestados = explode(",", $campo->estados);
            for($i=0;isset($subredes[$i]);$i++) { ?>
              <div class="tabla-row">
                <div class="tabla-celda">
                  <span><?php echo utf8_encode($subredes[$i]); ?></span>
                </div>
                <div class="tabla-celda">
                  <span><?php echo utf8_encode($subredesestados[$i]); ?></span>
                </div>
              </div>
        <?php } } ?>
      </div>
    </div>
    <div class="tabla">
      <div class="tabla-header">
        <div class="tabla-row">
          <div class="tabla-celda">
            <span>Observaciones</span>
          </div>
        </div>
      </div>
      <div class="tabla-body">
        <?php
          include("../funciones/conecta.php");
          $hccQuery = "SELECT * FROM subredes WHERE region = ".$region."";
          $hccGet = @pg_query($hccConect,$hccQuery);
          while($campo = @pg_fetch_object($hccGet)) { ?>
            <div class="tabla-row">
              <div class="tabla-celda">
                <span><?php echo utf8_encode($campo->observaciones); ?></span>
              </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
