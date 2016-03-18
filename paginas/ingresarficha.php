<?php
include("../funciones/autenticado.php");
?>
<!DOCTYPE html>
<html lang="es">
  <div class="ingresarficha">
    <h1>Formulario de Ingreso de Ficha Técnica</h1>
    <!--<form action="guardarficha.php">-->
      <div class="region">
        <div class="tabla">
          <div class="form-iten">
            <div class="subtabla">
              <div class="title">
                <div class="title-cell principal"><span>Región</span></div>
              </div>
              <div class="title">
                <div class="title-cell title-name"><span>Nombre de Región</span></div>
              </div>
              <div class="body">
                <div class="body-row">
                  <div class="body-cell"><select id="regiones" class="regiones" onclick="primerclick('regiones')"><option value="0">Seleccione una Opción</option></select></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cuerpo">
        <div class="servidores">
          <h2>Solo Información servidores Linux</h2>
          <div class="tabla">
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>Ldap</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('ldap','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body ldap">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputldap" id="inputldap0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadosldap0" class="selectldap" onchange="cambiavalor(this.value, 'ldap0')" onclick="primerclick('ldap')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadosldap0" class="selectldap" onclick="primerclick('ldap')"><option>Seleccione una Opción</option></select></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>DNS</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('dns','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body dns">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputdns" id="inputdns0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadosdns0" class="selectdns" onchange="cambiavalor(this.value, 'dns0')" onclick="primerclick('dns')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadosdns0" class="selectdns" onclick="primerclick('dns')"><option>Seleccione una Opción</option></select></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>DHCP</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('dhcp','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body dhcp">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputdhcp" id="inputdhcp0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadosdhcp0" class="selectdhcp" onchange="cambiavalor(this.value, 'dhcp0')" onclick="primerclick('dhcp')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadosdhcp0" class="selectdhcp" onchange="cambiavalor(this.value, 'dhcp0')" onclick="primerclick('dhcp')"><option>Seleccione una Opción</option></select></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>Correo</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('correo','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body correo">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputcorreo" id="inputcorreo0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadoscorreo0" class="selectcorreo" onchange="cambiavalor(this.value, 'correo0')" onclick="primerclick('correo')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadoscorreo0" class="selectcorreo" onclick="primerclick('correo')"><option>Seleccione una Opción</option></select></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>Proxy</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('proxy','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body proxy">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputproxy" id="inputproxy0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadosproxy0" class="selectproxy" onchange="cambiavalor(this.value, 'proxy0')" onclick="primerclick('proxy')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadosproxy0" class="selectproxy" onclick="primerclick('proxy')"><option>Seleccione una Opción</option></select></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-iten">
              <div class="subtabla">
                <div class="title">
                  <div class="title-cell principal"><span>Repositorio</span></div>
                  <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('repositorio','Servidor')"></span></div>
                </div>
                <div class="title">
                  <div class="title-cell title-name"><span>Nombre</span></div>
                  <div class="title-cell title-name"><span>Estado</span></div>
                </div>
                <div class="body repositorio">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputrepositorio" id="inputrepositorio0" placeholder="Servidor" type="text"></div>
                    <!--<div class="body-cell"><select id="estadosrepositorio0" class="selectrepositorio" onchange="cambiavalor(this.value, 'repositorio0')" onclick="primerclick('repositorio')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadosrepositorio0" class="selectrepositorio" onclick="primerclick('repositorio')"><option>Seleccione una Opción</option></select></div>
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
                    <div class="body-cell"><textarea id="obsserv" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
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
                    <div class="body-cell"><input id="tecnicospropetario" placeholder="N° de Técnicos" type="text" onkeypress="return solonumero(event)"></div>
                    <div class="body-cell"><input id="tecnicoslibre" placeholder="N° Téc. en Software Libre" type="text" onkeypress="return solonumero(event)"></div>
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
                      <div class="body-cell"><textarea id="obstec" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
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
                    <div class="title-cell"><span class="icon-circle-with-plus" onclick="agregacampo('subred', 'Subred')"></span></div>
                </div>
                <div class="title">
                    <div class="title-cell title-name"><span>Subred</span></div>
                    <div class="title-cell title-name"><span>Ubicación</span></div>
                </div>
                <div class="body subred">
                  <div class="body-row">
                    <div class="body-cell"><input class="inputsubred" placeholder="Subred" type="text"></div>
                    <!--<div class="body-cell"><select id="estadossubred0" class="selectsubred" onclick="primerclick('subred')"><option>Seleccione una Opción</option></select></div>-->
                    <div class="body-cell"><select id="estadossubred0" class="selectsubred" onclick="primerclick('subred')"><option>Seleccione una Opción</option></select></div>
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
                    <div class="body-cell"><textarea id="obsredes" cols="50" rows="5" placeholder="Ingrese sus Observaciones"></textarea></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="botones">
          <button class="guardar" onclick="guardarficha()">Guardar</button>
          <button class="resetear" onclick="loadpage('ingresarficha.php')">Resetear</button>
        </div>
      </div>
    <!--</form>-->
  </div>
</html>
