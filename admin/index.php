<?php require_once('../Connections/conn_sonria.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario_mail'])) {
  $loginUsername=$_POST['usuario_mail'];
  $password=$_POST['usuario_pwd'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "promociones.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysqli_select_db($conn_sonria, $database_conn_sonria);

  $LoginRS__query=sprintf("SELECT usuario_mail, usuario_pwd FROM usuarios WHERE usuario_mail=%s AND usuario_pwd=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"));

  $LoginRS = mysqli_query($conn_sonria, $LoginRS__query) or die(mysql_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";

	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sonria - Admin</title>
<link href="css/twoColLiqLt.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
</style>
<![endif]-->

</head>

<body>

<div class="container">

  <div class="content">
    <h1>Administrador de Contenidos</h1>
    <div class="actualizar">
    <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right">Usuario: </td>
          <td><label for="usuario_mail"></label></td>
          <td><input type="text" name="usuario_mail" id="usuario_mail" /></td>
        </tr>
        <tr>
          <td align="right">Contrase&ntilde;a:</td>
          <td>&nbsp;</td>
          <td><input type="password" name="usuario_pwd" id="usuario_pwd" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td align="right"><input type="submit" value="Enviar" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
    </form>
    </div>

  </div>
  <!-- end .container --></div>
</body>
</html>
