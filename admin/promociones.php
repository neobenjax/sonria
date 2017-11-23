<?php
require_once('../Connections/conn_sonria.php');

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

mysqli_select_db($conn_sonria, $database_conn_sonria);
/*$query_promociones = "SELECT * FROM promociones";
$promociones = mysqli_query($query_promociones, $conn_sonria) or die(mysql_error());
$row_promociones = mysqli_fetch_array($promociones);
$totalRows_promociones = mysqli_num_rows($promociones);mysqli_select_db($conn_sonria, $database_conn_sonria);*/
$query_promociones = "SELECT * FROM promociones ORDER BY promocion_id DESC";
$promociones = mysqli_query($conn_sonria, $query_promociones) or die(mysql_error());
$row_promociones = mysqli_fetch_array($promociones);
$totalRows_promociones = mysqli_num_rows($promociones);

include("restringir.php");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sonria - Admin</title>
<link href="css/twoColLiqLt.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* este margen negativo de 1 px puede situarse en cualquiera de las columnas de este diseño con el mismo efecto corrector. */
ul.nav a { zoom: 1; }  /* la propiedad de zoom da a IE el desencadenante hasLayout que necesita para corregir el espacio en blanco extra existente entre los vínculos */
</style>
<![endif]-->

<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript">

$(document).ready(function () {

    $(".tabla_usuarios").hide();
	$(".tabla_usuarios").fadeIn();

	$(".fila").hover(function(){
    $(event.currentTarget).css("background-color","#ddd");
    },function(){
    $(event.currentTarget).css("background-color","#fff");
  });
      });
</script>

</head>

<body>

<div class="container">
  <?php include("menu.php")?>
    <div class="content">
    <div class="add"><a href="promociones_subir.php"><img src="add.png" alt="Añadir" /></a></div>
    <p>&nbsp;</p>
    <h1>Promociones</h1>
    <?php include("retros.php")?>
    <table cellpadding="6" cellspacing="1" class="tabla_usuarios">
    <tr class="barra_inf">
        <td><strong>T&iacute;tulo</strong></td>
        <td>&nbsp;</td>


      </tr>
      <?php do { ?>
        <tr class="fila">
          <td><img src="../img/<?php echo $row_promociones['promocion_img']; ?>" width="200" alt="" /></td>
          <td><a href="promociones_actualizar.php?id=<?php echo $row_promociones['promocion_id']; ?>">Actualizar</a> | <a href="promociones_eliminar.php?id=<?php echo $row_promociones['promocion_id']; ?>">Eliminar</a></td>
        </tr>
        <?php } while ($row_promociones = mysqli_fetch_array($promociones)); ?>
    </table>

    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysqli_free_result($promociones);
?>
