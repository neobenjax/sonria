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

$colname_promociones = "-1";
if (isset($_GET['id'])) {
  $colname_promociones = $_GET['id'];
}
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_promociones = sprintf("SELECT * FROM promociones WHERE promocion_id = %s", GetSQLValueString($colname_promociones, "int"));
$promociones = mysql_query($query_promociones, $conn_sonria) or die(mysql_error());
$row_promociones = mysql_fetch_assoc($promociones);
$totalRows_promociones = mysql_num_rows($promociones);
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
</head>

<body>

<div class="container">
  <?php include("menu.php")?>
    <div class="content">
      <p>&nbsp;</p>
      <h1>Promociones</h1>
      
    <div class="actualizar"> 
      <p><img src="../img/<?php echo $row_promociones['promocion_img']; ?>" width="280" />Est&aacute;s seguro que quieres eliminar esta Promoci&oacute;n?</p>

      <div class="barra_inf" style="background:#CCC;">
      <a href="javascript: history.go(-1)">No</a> | <a href="eliminar_confirm.php?t=1&amp;img=<?php echo $row_promociones['promocion_img']; ?>&amp;id=<?php echo $row_promociones['promocion_id']; ?>">S&iacute;</a></div>
    </div>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysql_free_result($promociones);
?>
