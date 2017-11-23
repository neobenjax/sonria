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
if ($_GET['t']==1){
	$tabla="promociones";
	$registro="promocion_id";
	$url="promociones";
	unlink("../img/".$_GET['img']);
}

if ($_GET['t']==2){
	$tabla="novedades";
	$registro="novedades_id";
	$url="novedades";
	unlink("../img/".$_GET['img']);
}

if ($_GET['t']==3){
	$tabla="sucursales";
	$registro="sucursal_id";
	$url="sucursales";
}

if ($_GET['t']==4){
	$tabla="img_sucursales";
	$registro="img_id";
	$url="imagenes";
	unlink("../sucursales/".$_GET['img']);
}

if ($_GET['t']==5){
	$tabla="tratamientos";
	$registro="tratamiento_id";
	$url="tratamientos";
	unlink("../img/".$_GET['img_banner']);
	unlink("../img/".$_GET['img_header']);
}

if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM ".$tabla." WHERE ".$registro."=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_conn_sonria, $conn_sonria);
  $Result1 = mysql_query($deleteSQL, $conn_sonria) or die(mysql_error());


	



  $deleteGoTo = $url.".php?retro=3&id=".$_GET['seccion'];
  /*if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }*/
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>