<?php
include("../funciones/autenticado.php");
$region = $_GET["reg"];
if ($region == "Central") {
  $idregion = "1";
} elseif ($region == "Guayana") {
  $idregion = "2";
} elseif ($region == "Los Andes") {
  $idregion = "3";
} elseif ($region == "Los Llanos") {
  $idregion = "4";
} elseif ($region =="Occidental") {
  $idregion = "5";
} elseif ($region == "Oriental") {
  $idregion = "6";
}
?>
<div class="cuerpo">
  <h1>Ficha Técnica Region <?php echo $region; ?></h1>
  <div class="servidores">
    <h2>Solo Información servidores Linux</h2>
    <div class="tabla">
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Ldap</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('ldap','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body ldap">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadorldap = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $ldap = array();
                $ldap = explode(",", utf8_encode($campo->nombres_ldap));
                $ldapestados = array();
                $ldapestados = explode(",", utf8_encode($campo->estados_ldap));
                for($i=0;isset($ldap[$i]);$i++) { ?>
                <div id="ldap<?php $contadorldap++; echo $contadorldap; ?>" class="body-row">
                  <div class="body-cell"><input class="inputldap" placeholder="Servidor" type="text" value="<?php echo utf8_encode($ldap[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadosldap<?php echo $contadorldap; ?>" class="selectldap" onclick="primerclick('ldap')">
                      <option <?php if ($ldapestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($ldapestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($ldapestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($ldapestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($ldapestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($ldapestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($ldapestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($ldapestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($ldapestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($ldapestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($ldapestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($ldapestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($ldapestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($ldapestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($ldapestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($ldapestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($ldapestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($ldapestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($ldapestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($ldapestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($ldapestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($ldapestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($ldapestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($ldapestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('ldap<?php echo $contadorldap; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputldap" id="inputldap0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadosldap0" class="selectldap" onclick="primerclick('ldap')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>DNS</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('dns','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body dns">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadordns = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $dns = array();
                $dns = explode(",", utf8_encode($campo->nombres_dns));
                $dnsestados = array();
                $dnsestados = explode(",", utf8_encode($campo->estados_dns));
                for($i=0;isset($dns[$i]);$i++) { ?>
                <div id="dns<?php $contadordns++; echo $contadordns; ?>" class="body-row">
                  <div class="body-cell"><input class="inputdns" id="inputdns0" placeholder="Servidor" type="text" value="<?php echo utf8_encode($dns[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadosdns<?php echo $contadordns; ?>" class="selectdns" onclick="primerclick('dns')">
                      <option <?php if ($dnsestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($dnsestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($dnsestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($dnsestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($dnsestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($dnsestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($dnsestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($dnsestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($dnsestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($dnsestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($dnsestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($dnsestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($dnsestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($dnsestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($dnsestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($dnsestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($dnsestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($dnsestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($dnsestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($dnsestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($dnsestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($dnsestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($dnsestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($dnsestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('dns<?php echo $contadordns; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputdns" id="inputdns0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadosdns0" class="selectdns" onclick="primerclick('dns')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>DHCP</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('dhcp','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body dhcp">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadordhcp = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $dhcp = array();
                $dhcp = explode(",", utf8_encode($campo->nombres_dhcp));
                $dhcpestados = array();
                $dhcpestados = explode(",", utf8_encode($campo->estados_dhcp));
                for($i=0;isset($dhcp[$i]);$i++) { ?>
                <div id="dhcp<?php $contadordhcp++; echo $contadordhcp; ?>" class="body-row">
                  <div class="body-cell"><input class="inputdhcp" id="inputdhcp0" placeholder="Servidor" type="text" value="<?php echo utf8_encode($dhcp[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadosdhcp<?php echo $contadordhcp; ?>" class="selectdhcp" onclick="primerclick('dhcp')">
                      <option <?php if ($dhcpestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($dhcpestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($dhcpestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($dhcpestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($dhcpestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($dhcpestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($dhcpestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($dhcpestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($dhcpestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($dhcpestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($dhcpestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($dhcpestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($dhcpestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($dhcpestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($dhcpestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($dhcpestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($dhcpestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($dhcpestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($dhcpestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($dhcpestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($dhcpestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($dhcpestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($dhcpestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($dhcpestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('dhcp<?php echo $contadordhcp; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputdhcp" id="inputdhcp0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadosdhcp0" class="selectdhcp" onclick="primerclick('dhcp')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Correo</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('correo','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body correo">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadorcorreo = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $correo = array();
                $correo = explode(",", utf8_encode($campo->nombres_correo));
                $correoestados = array();
                $correoestados = explode(",", utf8_encode($campo->estados_correo));
                for($i=0;isset($correo[$i]);$i++) { ?>
                <div id="correo<?php $contadorcorreo++; echo $contadorcorreo; ?>" class="body-row">
                  <div class="body-cell"><input class="inputcorreo" id="inputcorreo0" placeholder="Servidor" type="text" value="<?php echo utf8_encode($correo[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadoscorreo<?php echo $contadorcorreo; ?>" class="selectcorreo" onclick="primerclick('correo')">
                      <option <?php if ($correoestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($correoestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($correoestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($correoestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($correoestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($correoestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($correoestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($correoestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($correoestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($correoestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($correoestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($correoestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($correoestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($correoestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($correoestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($correoestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($correoestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($correoestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($correoestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($correoestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($correoestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($correoestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($correoestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($correoestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('correo<?php echo $contadorcorreo; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputcorreo" id="inputcorreo0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadoscorreo0" class="selectcorreo" onclick="primerclick('correo')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Proxy</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('proxy','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body proxy">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadorproxy = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $proxy = array();
                $proxy = explode(",", utf8_encode($campo->nombres_proxy));
                $proxyestados = array();
                $proxyestados = explode(",", utf8_encode($campo->estados_proxy));
                for($i=0;isset($proxy[$i]);$i++) { ?>
                <div id="proxy<?php $contadorproxy++; echo $contadorproxy; ?>" class="body-row">
                  <div class="body-cell"><input class="inputproxy" id="inputproxy0" placeholder="Servidor" type="text" value="<?php echo utf8_encode($proxy[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadosproxy<?php echo $contadorproxy; ?>" class="selectproxy" onclick="primerclick('proxy')">
                      <option <?php if ($proxyestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($proxyestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($proxyestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($proxyestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($proxyestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($proxyestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($proxyestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($proxyestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($proxyestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($proxyestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($proxyestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($proxyestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($proxyestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($proxyestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($proxyestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($proxyestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($proxyestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($proxyestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($proxyestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($proxyestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($proxyestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($proxyestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($proxyestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($proxyestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('proxy<?php echo $contadorproxy; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputproxy" id="inputproxy0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadosproxy0" class="selectproxy" onclick="primerclick('proxy')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Repositorio</span></div>
            <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('repositorio','Servidor')"></span></div>
          </div>
          <div class="title">
            <div class="title-cell title-name"><span>Nombre</span></div>
            <div class="title-cell title-name"><span>Estado</span></div>
          </div>
          <div class="body repositorio">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              $contadorrepositorio = 0;
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) {
                $repositorio = array();
                $repositorio = explode(",", utf8_encode($campo->nombres_repositorio));
                $repositorioestados = array();
                $repositorioestados = explode(",", utf8_encode($campo->estados_repositorio));
                for($i=0;isset($repositorio[$i]);$i++) { ?>
                <div id="repositorio<?php $contadorrepositorio++; echo $contadorrepositorio; ?>" class="body-row">
                  <div class="body-cell"><input class="inputrepositorio" id="inputrepositorio0" placeholder="Servidor" type="text" value="<?php echo utf8_encode($repositorio[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadosrepositorio<?php echo $contadorrepositorio; ?>" class="selectrepositorio" onclick="primerclick('repositorio')">
                      <option <?php if ($repositorioestados[$i] == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if ($repositorioestados[$i] == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if ($repositorioestados[$i] == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if ($repositorioestados[$i] == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if ($repositorioestados[$i] == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if ($repositorioestados[$i] == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if ($repositorioestados[$i] == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if ($repositorioestados[$i] == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if ($repositorioestados[$i] == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if ($repositorioestados[$i] == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if ($repositorioestados[$i] == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if ($repositorioestados[$i] == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if ($repositorioestados[$i] == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if ($repositorioestados[$i] == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if ($repositorioestados[$i] == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if ($repositorioestados[$i] == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if ($repositorioestados[$i] == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if ($repositorioestados[$i] == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if ($repositorioestados[$i] == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if ($repositorioestados[$i] == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if ($repositorioestados[$i] == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if ($repositorioestados[$i] == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if ($repositorioestados[$i] == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if ($repositorioestados[$i] == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('repositorio<?php echo $contadorrepositorio; ?>')"></span>
                  </div>
                </div>
            <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputrepositorio" id="inputrepositorio0" placeholder="Servidor" type="text"></div>
              <div class="body-cell"><select id="estadosrepositorio0" class="selectrepositorio" onclick="primerclick('repositorio')"><option>Seleccione una Opción</option></select></div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Obervaciones</span></div>
          </div>
          <div class="body">
            <div class="body-row">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM servicios WHERE region = '".$idregion."'";
              $hccGet = @pg_query($hccConect,$hccQuery);
              if(pg_num_rows($hccGet)!=0) {
                while($campo = @pg_fetch_object($hccGet)) { ?>
                  <div class="body-cell"><textarea id="obsserv" cols="50" rows="5" placeholder="Ingrese sus Observaciones"><?php echo utf8_encode($campo->observaciones); ?></textarea></div>
                <?php } } else { ?>
                  <div class="body-cell"><textarea id="obsserv" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
                <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tecnicos">
    <h2>Información de Técnicos</h2>
    <div class="tabla">
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
              <div class="title-cell principal"><span>Técnicos</span></div>
              <div class="title-cell"></div>
          </div>
          <div class="title">
              <div class="title-cell title-name"><span>N° de Técnicos</span></div>
              <div class="title-cell title-name"><span>Téc. en Software Libre</span></div>
          </div>
          <div class="body">
            <div class="body-row">
            <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM tecnicos WHERE region = ".$idregion."";
              $hccGet = @pg_query($hccConect,$hccQuery);
              if(pg_num_rows($hccGet)!=0) {
              while($campo = @pg_fetch_object($hccGet)) { ?>
                <div class="body-cell"><input id="tecnicospropetario" placeholder="N° de Técnicos" type="text" onkeypress="return solonumero(event)" value="<?php echo utf8_encode($campo->tecnicospropetario); ?>"></div>
                <div class="body-cell"><input id="tecnicoslibre" placeholder="N° Téc. en Software Libre" type="text" onkeypress="return solonumero(event)" value="<?php echo utf8_encode($campo->tecnicoslibre); ?>"></div>
              <?php } } else { ?>
                <div class="body-cell"><input id="tecnicospropetario" placeholder="N° de Técnicos" type="text" onkeypress="return solonumero(event)"></div>
                <div class="body-cell"><input id="tecnicoslibre" placeholder="N° Téc. en Software Libre" type="text" onkeypress="return solonumero(event)"></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
        <div class="form-iten">
          <div class="subtabla">
            <div class="title">
              <div class="title-cell principal"><span>Obervaciones</span></div>
            </div>
            <div class="body">
              <div class="body-row">
              <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM tecnicos WHERE region = ".$idregion."";
              $hccGet = @pg_query($hccConect,$hccQuery);
              if(pg_num_rows($hccGet)!=0) {
                while($campo = @pg_fetch_object($hccGet)) { ?>
                  <div class="body-cell"><textarea id="obstec" cols="50" rows="5" placeholder="Ingrese sus Observaciones"><?php echo utf8_encode($campo->observaciones); ?></textarea></div>
                <?php } } else { ?>
                  <div class="body-cell"><textarea id="obstec" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="redes">
    <h2>Información de Subredes</h2>
    <div class="tabla">
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
              <div class="title-cell principal"><span>Subredes</span></div>
              <div class="title-cell"><span class="icon-circle-with-plus" onclick="asignarvariables('subred', 'Subred')"></span></div>
          </div>
          <div class="title">
              <div class="title-cell title-name"><span>Subred</span></div>
              <div class="title-cell title-name"><span>Ubicación</span></div>
          </div>
          <div class="body subred">
          <?php
            include("../funciones/conecta.php");
            $hccQuery = "SELECT * FROM subredes WHERE region = ".$idregion."";
            $hccGet = @pg_query($hccConect,$hccQuery);
            $contadorsubred = 0;
            if(pg_num_rows($hccGet)!=0) {
            while($campo = @pg_fetch_object($hccGet)) {
              $subredes = array();
              $subredes = explode(",", $campo->subredes);
              $subredesestados = array();
              $subredesestados = explode(",", $campo->estados);
              for($i=0;isset($subredes[$i]);$i++) { ?>
                <div id="subred<?php $contadorsubred++; echo $contadorsubred; ?>" class="body-row">
                  <div class="body-cell"><input class="inputsubred" placeholder="Subred" type="text" value="<?php echo utf8_encode($subredes[$i]); ?>"></div>
                  <div class="body-cell">
                    <select id="estadossubred<?php echo $contadorsubred; ?>" class="selectsubred" onclick="primerclick('subred')">
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Amazonas") { ?> selected <?php } ?> value="Amazonas">Amazonas</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Anzoátegui") { ?> selected <?php } ?> value="Anzoátegui">Anzoátegui</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Apure") { ?> selected <?php } ?> value="Apure">Apure</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Aragua") { ?> selected <?php } ?> value="Aragua">Aragua</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Barinas") { ?> selected <?php } ?> value="Barinas">Barinas</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Bolívar") { ?> selected <?php } ?> value="Bolívar">Bolívar</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Carabobo") { ?> selected <?php } ?> value="Carabobo">Carabobo</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Cojedes") { ?> selected <?php } ?> value="Cojedes">Cojedes</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Delta Amacuro") { ?> selected <?php } ?> value="Delta Amacuro">Delta Amacuro</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Distrito Capital") { ?> selected <?php } ?> value="Distrito Capital">Distrito Capital</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Falcón") { ?> selected <?php } ?> value="Falcón">Falcón</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Guárico") { ?> selected <?php } ?> value="Guárico">Guárico</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Lara") { ?> selected <?php } ?> value="Lara">Lara</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Mérida") { ?> selected <?php } ?> value="Mérida">Mérida</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Miranda") { ?> selected <?php } ?> value="Miranda">Miranda</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Monagas") { ?> selected <?php } ?> value="Monagas">Monagas</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Nueva Esparta") { ?> selected <?php } ?> value="Nueva Esparta">Nueva Esparta</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Portuguesa") { ?> selected <?php } ?> value="Portuguesa">Portuguesa</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Sucre") { ?> selected <?php } ?> value="Sucre">Sucre</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Táchira") { ?> selected <?php } ?> value="Táchira">Táchira</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Trujillo") { ?> selected <?php } ?> value="Trujillo">Trujillo</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Vargas") { ?> selected <?php } ?> value="Vargas">Vargas</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Yaracuy") { ?> selected <?php } ?> value="Yaracuy">Yaracuy</option>
                      <option <?php if (utf8_encode($subredesestados[$i]) == "Zulia") { ?> selected <?php } ?> value="Zulia">Zulia</option>
                    </select>
                    <span class="icon-circle-with-minus" onclick="quitarcampo('subred<?php echo $contadorsubred; ?>')"></span>
                  </div>
                </div>
          <?php } } } else { ?>
            <div class="body-row">
              <div class="body-cell"><input class="inputsubred" placeholder="Subred" type="text"></div>
              <div class="body-cell"><select id="estadossubred0" class="selectsubred" onclick="primerclick('subred')"><option>Seleccione una Opción</option></select></div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
      <div class="form-iten">
        <div class="subtabla">
          <div class="title">
            <div class="title-cell principal"><span>Obervaciones</span></div>
          </div>
          <div class="body">
            <div class="body-row">
              <?php
              include("../funciones/conecta.php");
              $hccQuery = "SELECT * FROM subredes WHERE region = ".$idregion."";
              $hccGet = @pg_query($hccConect,$hccQuery);
              if(pg_num_rows($hccGet)!=0) {
                while($campo = @pg_fetch_object($hccGet)) { ?>
                  <div class="body-cell"><textarea id="obsredes" cols="50" rows="5" placeholder="Ingrese sus Observaciones"><?php echo utf8_encode($campo->observaciones); ?></textarea></div>
                <?php } } else { ?>
                  <div class="body-cell"><textarea id="obsredes" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
                <?php } ?>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="botones">
    <button class="guardar" onclick="guardarficha()">Guardar</button>
    <button class="resetear" onclick="loadpage('ingresarficha.php')">Resetear</button>
  </div>
  <input id="contadorldap" type="hidden" value="<?php echo $contadorldap; ?>">
  <input id="contadordns" type="hidden" value="<?php echo $contadordns; ?>">
  <input id="contadordhcp" type="hidden" value="<?php echo $contadordhcp; ?>">
  <input id="contadorcorreo" type="hidden" value="<?php echo $contadorcorreo; ?>">
  <input id="contadorproxy" type="hidden" value="<?php echo $contadorproxy; ?>">
  <input id="contadorrepositorio" type="hidden" value="<?php echo $contadorrepositorio; ?>">
  <input id="contadorsubred" type="hidden" value="<?php echo $contadorsubred; ?>">
</div>
