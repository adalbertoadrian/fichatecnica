<?php function mensaje($status,$tabla) { ?>
      <div class="msgbox">
        <?php if($status == "valido") { ?>
          <span class="mensaje <?php echo $status ?>"><span class="icon-check"></span>Registro ingresado con éxito en la tabla <?php echo $tabla; ?></span>
        <?php } else if($status == "error") { ?>
          <span class="mensaje <?php echo $status ?>"><span class="icon-cross"></span>Error al ingresar registro en la tabla <?php echo $tabla; ?></span>
         <?php } ?>
      </div>
<?php }
  function registrartecnicos($hccConect,$region,$valor1,$valor2,$observaciontecnicos){
    $hccQuery = "INSERT INTO tecnicos (region, tecnicospropetario, tecnicoslibre, observaciones) VALUES ('$region','$valor1','$valor2','$observaciontecnicos')";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','tecnicos');
    } else {
      mensaje('valido','tecnicos');
    }
 }

  function updatetecnicos($hccConect,$region,$valor1,$valor2,$observaciontecnicos){
    $hccQuery = "UPDATE tecnicos SET tecnicospropetario = '$valor1', tecnicoslibre = '$valor2', observaciones = '$observaciontecnicos' WHERE region = '".$region."'";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','tecnicos');
    } else {
      mensaje('valido','tecnicos');
    }
  }

  function registrarservicios($hccConect,$region,$inputldap,$selectldap,$inputdns,$selectdns,$inputdhcp,$selectdhcp,$inputcorreo,$selectcorreo,$inputproxy,$selectproxy,$inputrepositorio,$selectrepositorio,$observacionservicios){
    $hccQuery = "INSERT INTO servicios(region, nombres_ldap, estados_ldap, nombres_dns, estados_dns, nombres_dhcp, estados_dhcp, nombres_correo, estados_correo, nombres_proxy, estados_proxy, nombres_repositorio, estados_repositorio, observaciones) VALUES ('$region','$inputldap','$selectldap','$inputdns','$selectdns','$inputdhcp','$selectdhcp','$inputcorreo','$selectcorreo','$inputproxy','$selectproxy','$inputrepositorio','$selectrepositorio','$observacionservicios')";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','servicios');
    } else {
      mensaje('valido','servicios');
    }
  }

  function updateservicios($hccConect,$region,$inputldap,$selectldap,$inputdns,$selectdns,$inputdhcp,$selectdhcp,$inputcorreo,$selectcorreo,$inputproxy,$selectproxy,$inputrepositorio,$selectrepositorio,$observacionservicios){
    $hccQuery = "UPDATE servicios SET nombres_ldap = '$inputldap', nombres_dns = '$inputdns', nombres_dhcp = '$inputdhcp', nombres_correo = '$inputcorreo', nombres_proxy = '$inputproxy', nombres_repositorio = '$inputrepositorio', estados_ldap = '$selectldap', estados_dns = '$selectdns', estados_dhcp = '$selectdhcp', estados_correo = '$selectcorreo', estados_proxy = '$selectproxy', estados_repositorio = '$selectrepositorio', observaciones = '$observacionservicios' WHERE region = '".$region."'";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','servicios');
    } else {
      mensaje('valido','servicios');
    }
  }

  function registrarsubred($hccConect,$region,$valor1,$valor2,$observacionsubred){
    $hccQuery = "INSERT INTO subredes (region, subredes, estados, observaciones) VALUES ('$region','$valor1','$valor2','$observacionsubred')";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','subredes');
    } else {
      mensaje('valido','subredes');
    }
 }

  function updatesubred($hccConect,$region,$valor1,$valor2,$observacionsubred){
    $hccQuery = "UPDATE subredes SET subredes = '$valor1', estados = '$valor2', observaciones = '$observacionsubred' WHERE region = '".$region."'";
    $hccInsert = @pg_query($hccConect,$hccQuery);
    if (!$hccInsert) {
      mensaje('error','subredes');
    } else {
      mensaje('valido','subredes');
    }
  }

  $region = $_COOKIE["region"];
  $inputldap = $_COOKIE["inputldap"];
  $inputdns = $_COOKIE["inputdns"];
  $inputdhcp = $_COOKIE["inputdhcp"];
  $inputcorreo = $_COOKIE["inputcorreo"];
  $inputproxy = $_COOKIE["inputproxy"];
  $inputrepositorio = $_COOKIE["inputrepositorio"];
  $inputsubred = $_COOKIE["inputsubred"];
  $selectldap = $_COOKIE["selectldap"];
  $selectdns = $_COOKIE["selectdns"];
  $selectdhcp = $_COOKIE["selectdhcp"];
  $selectcorreo = $_COOKIE["selectcorreo"];
  $selectproxy = $_COOKIE["selectproxy"];
  $selectrepositorio = $_COOKIE["selectrepositorio"];
  $selectsubred = $_COOKIE["selectsubred"];
  $observacionservicios = $_COOKIE["observacionservicios"];
  $observaciontecnicos = $_COOKIE["observaciontecnicos"];
  $observacionsubred = $_COOKIE["observacionsubred"];
  $tecnicospropetario = $_COOKIE["tecnicospropetario"];
  $tecnicoslibre = $_COOKIE["tecnicoslibre"];

  unset($_COOKIE["region"]);
  unset($_COOKIE["inputldap"]);
  unset($_COOKIE["inputdns"]);
  unset($_COOKIE["inputdhcp"]);
  unset($_COOKIE["inputcorreo"]);
  unset($_COOKIE["inputproxy"]);
  unset($_COOKIE["inputrepositorio"]);
  unset($_COOKIE["inputsubred"]);
  unset($_COOKIE["selectldap"]);
  unset($_COOKIE["selectdns"]);
  unset($_COOKIE["selectdhcp"]);
  unset($_COOKIE["selectcorreo"]);
  unset($_COOKIE["selectproxy"]);
  unset($_COOKIE["selectrepositorio"]);
  unset($_COOKIE["selectsubred"]);
  unset($_COOKIE["observacionservicios"]);
  unset($_COOKIE["observaciontecnicos"]);
  unset($_COOKIE["observacionsubred"]);
  unset($_COOKIE["tecnicospropetario"]);
  unset($_COOKIE["tecnicoslibre"]);

  if ($region == "Central") {
    $region = "1";
  } elseif ($region == "Guayana") {
    $region = "2";
  } elseif ($region == "Los Andes") {
    $region = "3";
  } elseif ($region == "Los Llanos") {
    $region = "4";
  } elseif ($region =="Occidental") {
    $region = "5";
  } elseif ($region == "Oriental") {
    $region = "6";
  }

    include("../funciones/conecta.php");
    pg_set_client_encoding($hccConect, "UTF8");
    //Ingresar Tecnicos
    $hccQuery = "SELECT region FROM tecnicos WHERE region = '$region'";
    $hccGet = @pg_query($hccConect,$hccQuery);
    if(pg_num_rows($hccGet)!=0) {
      updatetecnicos($hccConect,$region,$tecnicospropetario,$tecnicoslibre,$observaciontecnicos);
    } else {
      registrartecnicos($hccConect,$region,$tecnicospropetario,$tecnicoslibre,$observaciontecnicos);
    }
    //Ingresar Servicios
    $hccQuery = "SELECT region FROM servicios WHERE region = '$region'";
    $hccGet = @pg_query($hccConect,$hccQuery);
    if(pg_num_rows($hccGet)!=0) {
      updateservicios($hccConect,$region,$inputldap,$selectldap,$inputdns,$selectdns,$inputdhcp,$selectdhcp,$inputcorreo,$selectcorreo,$inputproxy,$selectproxy,$inputrepositorio,$selectrepositorio,$observacionservicios);
    } else {
      registrarservicios($hccConect,$region,$inputldap,$selectldap,$inputdns,$selectdns,$inputdhcp,$selectdhcp,$inputcorreo,$selectcorreo,$inputproxy,$selectproxy,$inputrepositorio,$selectrepositorio,$observacionservicios);
    }
    //Ingresar Subredes
    $hccQuery = "SELECT region FROM subredes WHERE region = '$region'";
    $hccGet = @pg_query($hccConect,$hccQuery);
    if(pg_num_rows($hccGet)!=0) {
      updatesubred($hccConect,$region,$inputsubred,$selectsubred,$observacionsubred);
    } else {
      registrarsubred($hccConect,$region,$inputsubred,$selectsubred,$observacionsubred);
    }
?>
<html>
  <button class="botonvolver" onclick="loadpage('ingresarficha.php')">Volver</button>
</html>
