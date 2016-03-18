var idldap; var iddns; var iddhcp; var idcorreo; var idproxy; var idrepositorio; var idsubred;
var regionesclick1; var ldapclick1; var dnsclick1; var dhcpclick1; var correoclick1; var proxyclick1; var repositorioclick1; var subredclick1;
var ldapadd1; var dnsadd1; var dhcpadd1; var correoadd1; var proxyadd1; var repositorioadd1; var subredadd1;
var regiones = new Array();
var estados = new Array();

function clearvariables() {
  idldap = 0; iddns = 0; iddhcp = 0; idcorreo = 0; idproxy = 0; idrepositorio = 0; idsubred = 0;
  regionesclick1 = 0; ldapclick1 = 0; dnsclick1 = 0; dhcpclick1 = 0; correoclick1 = 0; proxyclick1 = 0; repositorioclick1 = 0; subredclick1 = 0;
  ldapadd1 = 0; dnsadd1 = 0; dhcpadd1 = 0; correoadd1 = 0; proxyadd1 = 0; repositorioadd1 = 0; subredadd1 = 0;
  regiones = ['Central', 'Guayana', 'Los Andes', 'Los Llanos', 'Occidental', 'Oriental'];
  estados = ['No Aplica', 'Amazonas', 'Anzoátegui', 'Apure', 'Aragua', 'Barinas', 'Bolívar', 'Carabobo', 'Cojedes', 'Delta Amacuro', 'Distrito Capital', 'Falcón', 'Guárico', 'Lara', 'Mérida', 'Miranda', 'Monagas', 'Nueva Esparta', 'Portuguesa', 'Sucre', 'Táchira', 'Trujillo', 'Yaracuy', 'Vargas', 'Zulia'];
  return 0;
}

//Función para solo aceptar numeros
function solonumero(e){
  tecla = e.which || e.keyCode;
  patron = /\d/; // Solo acepta números
  te = String.fromCharCode(tecla);
  return (patron.test(te) || tecla == 9 || tecla == 8);
}

//Limpiar el contenedor
function ajaxclear() {
  document.getElementById("contenedor").innerHTML="";
}

//AJAX para buscar paginas
function loadpage(valor)
{
  var xmlhttp;
  clearvariables();
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("contenedor").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("POST","http://fichatecnica.corpoelec.com.ve/paginas/"+valor+"",true);
  xmlhttp.send();
}

//AJAX para cargar fichas
function loadregion(valor,region)
{
  var xmlhttp;
  clearvariables();
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("contenedorficha").innerHTML=xmlhttp.responseText;
    }
  }

  xmlhttp.open("POST","http://fichatecnica.corpoelec.com.ve/paginas/"+valor+"?reg="+region+"",true);
  xmlhttp.send();
  regionesclick1 = 1;
}

