//Esta funcion se encarga del drag de los items

/*function movible() {
  $("#ordenable").sortable();
  $("#ordenable").disableSelection();
});*/

function cargarregiones(valor) {
  var option = '';
  for (var i=0;i<regiones.length;i++){
    option += '<option value="'+ regiones[i] + '">' + regiones[i] + '</option>';
  }
  $("#"+valor).append(option);
}

function cargarselects(valor) {
  var option = '';
  for (var i=0;i<estados.length;i++){
      option += '<option value="'+ estados[i] + '">' + estados[i] + '</option>';
  }
  if (valor != 'estadosldap0' && valor != 'estadosdns0' && valor != 'estadosdhcp0' && valor != 'estadoscorreo0' && valor != 'estadosproxy0' && valor != 'estadosrepositorio0' && valor != 'estadossubred0') {
    $("#"+valor).append("<option value='N/A'>Seleccione una Opción</option>");
  }
  $("#"+valor).append(option);
}

function primerclick(valor) {
  if (valor == 'regiones' && regionesclick1 == 0) {
    cargarregiones('regiones');
    regionesclick1 = 1;
  }
  if (valor == 'ldap' && ldapclick1 == 0) {
    cargarselects('estadosldap0');
    ldapclick1 = 1;
  }
  if (valor == 'dns' && dnsclick1 == 0) {
    cargarselects('estadosdns0');
    dnsclick1 = 1;
  }
  if (valor == 'dhcp' && dhcpclick1 == 0) {
    cargarselects('estadosdhcp0');
    dhcpclick1 = 1;
  }
  if (valor == 'correo' && correoclick1 == 0) {
    cargarselects('estadoscorreo0');
    correoclick1 = 1;
  }
  if (valor == 'proxy' && proxyclick1 == 0) {
    cargarselects('estadosproxy0');
    proxyclick1 = 1;
  }
  if (valor == 'repositorio' && repositorioclick1 == 0) {
    cargarselects('estadosrepositorio0');
    repositorioclick1 = 1;
  }
  if (valor == 'subred' && subredclick1 == 0) {
    cargarselects('estadossubred0');
    subredclick1 = 1;
  }
}

//Agregar campo en la pantalla de ingresar ficha
function agregacampo(valor, holder1) {
  if (valor == 'ldap') {
    idldap++;
    id = valor+idldap;
  } else if (valor == 'dns') {
    iddns++;
    id = valor+iddns;
  } else if (valor == 'dhcp') {
    iddhcp++;
    id = valor+iddhcp;
  } else if (valor == 'correo') {
    idcorreo++;
    id = valor+idcorreo;
  } else if (valor == 'proxy') {
    idproxy++;
    id = valor+idproxy;
  } else if (valor == 'repositorio') {
    idrepositorio++;
    id = valor+idrepositorio;
  } else if (valor == 'subred') {
    idsubred++;
    id = valor+idsubred;
  }
  clase = "."+valor;
  idremover = "'"+id+"'";
  //$(clase).append('<div id="'+id+'" class="body-row itemselect"><div class="body-cell"><input class="input'+valor+'"id="input'+id+'" placeholder="'+holder1+'" type="text"></div><div class="body-cell"><select id="estados'+id+'" class="estados'+id+'" onchange="cambiavalor(this.value, '+idremover+')"></select><span class="icon-circle-with-minus" onclick="quitarcampo('+idremover+')"></span></div></div>');
  $(clase).append('<div id="'+id+'" class="body-row itemselect"><div class="body-cell"><input class="input'+valor+'"id="input'+id+'" placeholder="'+holder1+'" type="text"></div><div class="body-cell"><select id="estados'+id+'" class="select'+valor+'"></select><span class="icon-circle-with-minus" onclick="quitarcampo('+idremover+')"></span></div></div>');
  var estadoid = "estados"+id;
  cargarselects(estadoid);
}

function asignarvariables(valor, holder1) {
  if (valor == 'ldap' && ldapadd1 == 0) {
    idldap = document.getElementById('contadorldap').value;;
    ldapadd1 = 1;
  }
  if (valor == 'dns' && dnsadd1 == 0) {
    iddns = document.getElementById('contadordns').value;;
    dnsadd1 = 1;
  }
  if (valor == 'dhcp' && dhcpadd1 == 0) {
    iddhcp = document.getElementById('contadordhcp').value;;
    dhcpadd1 = 1;
  }
  if (valor == 'correo' && correoadd1 == 0) {
    idcorreo = document.getElementById('contadorcorreo').value;;
    correoadd1 = 1;
  }
  if (valor == 'proxy' && proxyadd1 == 0) {
    idproxy = document.getElementById('contadorproxy').value;;
    proxyadd1 = 1;
  }
  if (valor == 'repositorio' && repositorioadd1 == 0) {
    idrepositorio = document.getElementById('contadorrepositorio').value;;
    repositorioadd1 = 1;
  }
  if (valor == 'subred' && subredadd1 == 0) {
    idsubred = document.getElementById('contadorsubred').value;;
    subredadd1 = 1;
  }
  agregacampo(valor, holder1);
}

//Quitar Campo
function quitarcampo(valor) {
  id = "#"+valor;
  $(id).remove();
}

/*function cambiavalor(valor, id){
  var estado=document.getElementById('input'+id).value;
  if(valor=="No Aplica"){
    document.getElementById('input'+id).value="No Aplica";
  } else if(estado=="No Aplica") {
    document.getElementById('input'+id).value="";
  }
  document.getElementById('input'+id).classList.remove("falta");
}*/

function guardarficha() {
  var allHTMLTags = new Array(); var inputldap = new Array; var inputdns = new Array; var inputdhcp = new Array; var inputcorreo = new Array; var inputproxy = new Array; var inputrepositorio = new Array; var inputsubred = new Array; var selectldap = new Array; var selectdns = new Array; var selectdhcp = new Array; var selectcorreo = new Array; var selectproxy = new Array; var selectrepositorio = new Array; var selectsubred = new Array;
  var contadorldap = 0; var contadordns = 0; var contadordhcp = 0; var contadorcorreo = 0; var contadorproxy = 0; var contadorrepositorio = 0; var contadorsubred = 0;
  var contadorselectldap = 0; var contadorselectdns = 0; var contadorselectdhcp = 0; var contadorselectcorreo = 0; var contadorselectproxy = 0; var contadorselectrepositorio = 0; var contadorselectsubred = 0; //var error = 0;

  var selectregiones = document.getElementById("regiones").value;
  var observacionservicios = document.getElementById("obsserv").value;
  var observaciontecnicos = document.getElementById("obstec").value;
  var observacionsubred = document.getElementById("obsredes").value;
  var tecnicospropetario = document.getElementById("tecnicospropetario").value;
  var tecnicoslibre = document.getElementById("tecnicoslibre").value;
  /*if(selectregiones.length <= 1 || observacionservicios.length <1 || observaciontecnicos.length <1 || observacionsubred.length < 1 || tecnicospropetario.length < 1 || tecnicoslibre.length < 1  ) {
    error = 1;
  }*/
  var allHTMLTags = document.getElementsByTagName("*");
  for (i=0; i<allHTMLTags.length; i++) {
    if (allHTMLTags[i].className=="inputldap") {
      inputldap[contadorldap] = allHTMLTags[i].value;
      /*if (inputldap[contadorldap].length < 1){
        document.getElementById("inputldap"+contadorldap).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorldap++;
    } else if (allHTMLTags[i].className=="inputdns") {
      inputdns[contadordns] = allHTMLTags[i].value;
      /*if (inputdns[contadordns].length < 1){
        document.getElementById("inputdns"+contadordns).classList.add("falta");
        error = 1;
        break;
      }*/
      contadordns++;
    } else if (allHTMLTags[i].className=="inputdhcp") {
      inputdhcp[contadordhcp] = allHTMLTags[i].value;
      /*if (inputdhcp[contadordhcp].length < 1){
        document.getElementById("inputdhcp"+contadordhcp).classList.add("falta");
        error = 1;
        break;
      }*/
      contadordhcp++;
    } else if (allHTMLTags[i].className=="inputcorreo") {
      inputcorreo[contadorcorreo] = allHTMLTags[i].value;
      /*if (inputcorreo[contadorcorreo].length < 1){
        document.getElementById("inputcorreo"+contadorcorreo).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorcorreo++;
    } else if (allHTMLTags[i].className=="inputproxy") {
      inputproxy[contadorproxy] = allHTMLTags[i].value;
      /*if (inputproxy[contadorproxy].length < 1){
        document.getElementById("inputproxy"+contadorproxy).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorproxy++;
    } else if (allHTMLTags[i].className=="inputrepositorio") {
      inputrepositorio[contadorrepositorio] = allHTMLTags[i].value;
      /*if (inputrepositorio[contadorrepositorio].length < 1){
        document.getElementById("inputrepositorio"+contadorrepositorio).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorrepositorio++;
    } else if (allHTMLTags[i].className=="inputsubred") {
      inputsubred[contadorsubred] = allHTMLTags[i].value;
      /*if (inputsubred[contadorsubred].length < 1){
        document.getElementById("inputsubred"+contadorsubred).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorsubred++;
    } else if (allHTMLTags[i].className=="selectldap") {
      selectldap[contadorselectldap] = allHTMLTags[i].value;
      /*if (selectldap[contadorselectldap].length > 14){
        document.getElementById("estadosldap"+contadorselectldap).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectldap++;
    } else if (allHTMLTags[i].className=="selectdns") {
      selectdns[contadorselectdns] = allHTMLTags[i].value;
      /*if (selectdns[contadorselectdns].length > 14){
        document.getElementById("estadosdns"+contadorselectdns).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectdns++;
    } else if (allHTMLTags[i].className=="selectdhcp") {
      selectdhcp[contadorselectdhcp] = allHTMLTags[i].value;
      /*if (selectdhcp[contadorselectdhcp].length > 14){
        document.getElementById("estadosdhcp"+contadorselectdhcp).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectdhcp++;
    } else if (allHTMLTags[i].className=="selectcorreo") {
      selectcorreo[contadorselectcorreo] = allHTMLTags[i].value;
      /*if (selectcorreo[contadorselectcorreo].length > 14){
        document.getElementById("estadoscorreo"+contadorselectcorreo).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectcorreo++;
    } else if (allHTMLTags[i].className=="selectproxy") {
      selectproxy[contadorselectproxy] = allHTMLTags[i].value;
      /*if (selectproxy[contadorselectproxy].length > 14){
        document.getElementById("estadosproxy"+contadorselectproxy).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectproxy++;
    } else if (allHTMLTags[i].className=="selectrepositorio") {
      selectrepositorio[contadorselectrepositorio] = allHTMLTags[i].value;
      /*if (selectrepositorio[contadorselectrepositorio].length > 14){
        document.getElementById("estadosrepositorio"+contadorselectrepositorio).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectrepositorio++;
    } else if (allHTMLTags[i].className=="selectsubred") {
      selectsubred[contadorselectsubred] = allHTMLTags[i].value;
      /*if (selectsubred[contadorselectsubred].length > 14){
        document.getElementById("estadossubred"+contadorselectsubred).classList.add("falta");
        error = 1;
        break;
      }*/
      contadorselectsubred++;
    }
  }
  document.cookie ="region="+selectregiones+"";
  document.cookie ="inputldap="+inputldap+"";
  document.cookie ="inputdns="+inputdns+"";
  document.cookie ="inputdhcp="+inputdhcp+"";
  document.cookie ="inputcorreo="+inputcorreo+"";
  document.cookie ="inputproxy="+inputproxy+"";
  document.cookie ="inputrepositorio="+inputrepositorio+"";
  document.cookie ="inputsubred="+inputsubred+"";
  document.cookie ="selectldap="+selectldap+"";
  document.cookie ="selectdns="+selectdns+"";
  document.cookie ="selectdhcp="+selectdhcp+"";
  document.cookie ="selectcorreo="+selectcorreo+"";
  document.cookie ="selectproxy="+selectproxy+"";
  document.cookie ="selectrepositorio="+selectrepositorio+"";
  document.cookie ="selectsubred="+selectsubred+"";
  document.cookie ="observacionservicios="+observacionservicios+"";
  document.cookie ="observaciontecnicos="+observaciontecnicos+"";
  document.cookie ="observacionsubred="+observacionsubred+"";
  document.cookie ="tecnicospropetario="+tecnicospropetario+"";
  document.cookie ="tecnicoslibre="+tecnicoslibre+"";
  loadpage('guardarficha.php');
  /*if (error > 0){
    alert("Debe llenar todos los campos");
  } else{
    loadpage('guardarficha.php');
  }*/
}
