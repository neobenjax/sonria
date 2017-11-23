<?php require_once('../Connections/conn_sonria.php'); ?>
<?php include("restringir.php")?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE sucursales SET sucursal=%s, sucursal_direccion=%s, sucursal_tel=%s, sucursal_mapa=%s WHERE sucursal_id=%s",
                       GetSQLValueString($_POST['Sucursal'], "text"),
                       GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['Ubicacion'], "text"),
                       GetSQLValueString($_POST['sucursal_id'], "int"));

  mysql_select_db($database_conn_sonria, $conn_sonria);
  $Result1 = mysql_query($updateSQL, $conn_sonria) or die(mysql_error());

  $updateGoTo = "sucursales.php?retro=2";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_sucursales = "-1";
if (isset($_GET['id'])) {
  $colname_sucursales = $_GET['id'];
}
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_sucursales = sprintf("SELECT * FROM sucursales WHERE sucursal_id = %s", GetSQLValueString($colname_sucursales, "int"));
$sucursales = mysql_query($query_sucursales, $conn_sonria) or die(mysql_error());
$row_sucursales = mysql_fetch_assoc($sucursales);
$totalRows_sucursales = mysql_num_rows($sucursales);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sonria - Admin</title>
<link href="css/twoColLiqLt.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
</style>
<![endif]-->
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<style type="text/css" media="all">


	@import "css/widgEditor.css";
</style>

<script type="text/javascript" src="scripts/widgEditor.js"></script>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>

<div class="container">
  <?php include("menu.php")?>
    <div class="content">
    <p>&nbsp;</p>
      <h1>Sucursales</h1>
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <p>Sucursal<br />
          <label for="Sucursal"></label>
          <input name="Sucursal" type="text" id="Sucursal" value="<?php echo $row_sucursales['sucursal']; ?>" />
        </p>
        <p>Direcci&oacute;n<br />
          <textarea name="Direccion" class="widgEditor nothing" id="Direccion"><?php echo $row_sucursales['sucursal_direccion']; ?></textarea>
        </p>
        <p>Tel&eacute;fono<br />
          <label for="Telefono"></label>
          <input name="Telefono" type="text" id="Telefono" value="<?php echo $row_sucursales['sucursal_tel']; ?>" />
        </p>
        <p>Ubicaci&oacute;n en google maps<br />
          <label for="sucursales_desc"></label>
          <textarea name="Ubicacion" cols="80" rows="5" id="Ubicacion"><?php echo $row_sucursales['sucursal_mapa']; ?></textarea>
        </p>
        <p>
          <input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />
    <input type="submit" name="button" id="button" value="Actualizar" />
        </p>
        <p>
          <input type="hidden" name="MM_update" value="form1" />
          <input name="sucursal_id" type="hidden" id="sucursal_id" value="<?php echo $row_sucursales['sucursal_id']; ?>" />
        </p>
      </form>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysql_free_result($sucursales);
?>
