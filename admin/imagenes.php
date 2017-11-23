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

$colname_imagenes = "-1";
if (isset($_GET['id'])) {
  $colname_imagenes = $_GET['id'];
}
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_imagenes = sprintf("SELECT * FROM img_sucursales WHERE img_sucursal = %s", GetSQLValueString($colname_imagenes, "int"));
$imagenes = mysql_query($query_imagenes, $conn_sonria) or die(mysql_error());
$row_imagenes = mysql_fetch_assoc($imagenes);
$totalRows_imagenes = mysql_num_rows($imagenes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Nueva Era - Admin</title>
<link href="css/twoColLiqLt.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este dise√±o con el mismo efecto corrector. */
ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los v√≠nculos */
</style>
<![endif]-->

</head>

<body>

<div class="container">
  <?php include("menu.php")?>
    <div class="content">
    <div class="add"><a href="imagenes_subir.php?id=<?php echo $_GET['id']; ?>"><img src="add.png" /></a></div>
    <h1>Imagenes de Sucursal</h1>
    <?php include("retros.php")?>
    <p>&nbsp;</p>
    <p>
      <?php if ($totalRows_imagenes == 0) { // Show if recordset empty ?>
        No hay im·genes en esta galerÌa<br />
        <a href="imagenes_subir.php?id=<?php echo $_GET['id']; ?>">Subir una imagen </a>
        <?php } // Show if recordset empty ?>
    </p>
    <?php if ($totalRows_imagenes > 0) { // Show if recordset not empty ?>
  <?php do { ?>
    <div class="imagenes"><a class="cuadro" href="imagenes_eliminar.php?id=<?php echo $row_imagenes['img_id']; ?>"><img src="../sucursales/<?php echo $row_imagenes['img']; ?>" /></a>
      
      <div class="barra_inf"><a href="imagenes_eliminar.php?id=<?php echo $row_imagenes['img_id']; ?>">Eliminar</a></div>
    </div>
    <?php } while ($row_imagenes = mysql_fetch_assoc($imagenes)); ?>
      <?php } // Show if recordset not empty ?>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysql_free_result($imagenes);
?>
