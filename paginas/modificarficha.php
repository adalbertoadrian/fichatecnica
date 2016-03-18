<!DOCTYPE html>
<html lang="es">
  <div class="ingresarficha">
    <h1>Formulario de Modificación de Ficha Técnica</h1>
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
                <div class="body-cell"><select id="regiones" class="regiones" onclick="primerclick('regiones')" onchange="loadregion('mostrarficha.php',this.value)"><option value="0">Seleccione una Opción</option></select></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="contenedorficha"></div>
  </div>
</html>
