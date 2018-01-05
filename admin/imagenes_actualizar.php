<?php require_once('../Connections/conn_sonria.php'); ?>
<?php include("restringir.php")?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE imagenes SET img_desc=%s WHERE img_id=%s",
                       GetSQLValueString($_POST['img_desc'], "text"),
                       GetSQLValueString($_POST['img_id'], "int"));

  mysqli_select_db($conn_sonria, $database_conn_sonria);

  $Result1 = mysqli_query($conn_sonria, $updateSQL) or die(mysql_error());

  $updateGoTo = "imagenes.php?retro=2&id=".$_POST['img_contenido'];
  /*if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }*/
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_imagenes = "-1";
if (isset($_GET['id'])) {
  $colname_imagenes = $_GET['id'];
}
mysqli_select_db($conn_sonria, $database_conn_sonria);

$query_imagenes = sprintf("SELECT * FROM imagenes WHERE img_id = %s", GetSQLValueString($colname_imagenes, "int"));
$imagenes = mysqli_query($conn_sonria, $query_imagenes) or die(mysql_error());
$row_imagenes = mysqli_fetch_array($imagenes);
$totalRows_imagenes = mysqli_num_rows($imagenes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nueva Era - Admin</title>
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
      <h1>Im&aacute;genes</h1>
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
    <div class="actualizar"> <img src="../img/<?php echo $row_imagenes['img_thumb']; ?>"/>

        <table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>T&iacute;tulo:</td>
  </tr>
  <tr>
    <td><input name="img_desc" type="text" id="img_desc" value="<?php echo $row_imagenes['img_desc']; ?>" size="50" /></td>
  </tr>
  <tr>
    <td><input name="img_id" type="hidden" id="img_id" value="<?php echo $row_imagenes['img_id']; ?>" />
      <input name="img_contenido" type="hidden" id="img_contenido" value="<?php echo $row_imagenes['img_contenido']; ?>" /></td>
  </tr>
  <tr>
    <td align="right"><input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />      <input type="submit" name="button" id="button" value="Actualizar" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
        </table>

    </div>
    <input type="hidden" name="MM_update" value="form1" />
      </form>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysqli_free_result($imagenes);
?>
