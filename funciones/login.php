<?php
  function cierra() {
    session_destroy();
    unset($_SESSION['access']);
    unset($_SESSION['usuario']);
  }

  session_start();

  //Verifica que el login se encuentra registrado en la BD//

  include("conecta.php");
  pg_set_client_encoding($hccConect, "UTF8");
  $hccQuery = "SELECT login, nivel FROM acceso WHERE login='".$_POST['username']."'";
  $hccGet = @pg_query($hccConect,$hccQuery);

  if(pg_num_rows($hccGet)==0) {
    pg_close($hccConect);
    cierra();
    header ("Location: http://fichatecnica.corpoelec.com.ve?noregistrado");
  }
  else
  {
    $conecto = 0;

    //Realiza la autentificacion contra el LDAP//

    include("ldap.php");

    //Activa la variable access en caso de que el login sea efectivo de lo contrario envia a la funcion cierra//

    if($conecto == 1) {
      $_SESSION['access'] = '1';
      $_SESSION['usuario'] = $_POST['username'];
      while($campo = @pg_fetch_object($hccGet)) {
        $_SESSION['nivel'] = utf8_encode($campo->nivel);
      }
      pg_close($hccConect);
      header("Location: ../paginas/principal.php");
    }
    else
    {
      pg_close($hccConect);
      cierra();
      header ("Location: http://fichatecnica.corpoelec.com.ve?invalido");
    }
  }
?>
