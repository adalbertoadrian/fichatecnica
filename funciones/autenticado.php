<?php
  session_start();
  function verifica()
  {
    //COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
    if($_SESSION['access']=='0')
    {
       //si no existe, envio a la página de autentificacion
        session_destroy();
        header("Location: http://fichatecnica.corpoelec.com.ve");
        unset($_SESSION['access']);
        unset($_SESSION['usuario']);
        //ademas salgo de este script
        exit();
    }
  }

  //si esta activada la variable access envia a la funcion envia de lo contrario envia a index.php//

  if(isset($_SESSION['access']))
  {
    verifica();
  }
  else
  {
    header("Location: http://fichatecnica.corpoelec.com.ve");
    exit();
  }

  //Si se activa la variable salir cierra la sesion//

  if (isset($_GET['salir'])) {
    session_destroy();
    unset($_SESSION['access']);
    unset($_SESSION['usuario']);
    header ("Location: http://fichatecnica.corpoelec.com.ve");
    exit();
  }
?>
