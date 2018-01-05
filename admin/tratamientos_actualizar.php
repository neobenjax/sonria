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
  $updateSQL = sprintf("UPDATE tratamientos SET tratamiento=%s, tratamiento_subtitulo=%s, tratamiento_contenido=%s, tratamiento_video=%s, tratamiento_faqs=%s, tratamiento_menu=%s WHERE tratamiento_id=%s",
                       GetSQLValueString($_POST['Tratamiento'], "text"),
                       GetSQLValueString($_POST['Subtitulo'], "text"),
                       GetSQLValueString($_POST['Informacion'], "text"),
                       GetSQLValueString($_POST['Video'], "text"),
                       GetSQLValueString($_POST['FAQs'], "text"),
                       GetSQLValueString(isset($_POST['tratamiento_menu']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['tratamiento_id'], "int"));

  mysqli_select_db($conn_sonria, $database_conn_sonria);

  $Result1 = mysqli_query($conn_sonria, $updateSQL) or die(mysql_error());

  $updateGoTo = "tratamientos.php?retro=2";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_tratamientos = "-1";
if (isset($_GET['id'])) {
  $colname_tratamientos = $_GET['id'];
}
mysqli_select_db($conn_sonria, $database_conn_sonria);

$query_tratamientos = sprintf("SELECT * FROM tratamientos WHERE tratamiento_id = %s", GetSQLValueString($colname_tratamientos, "int"));
$tratamientos = mysqli_query($conn_sonria, $query_tratamientos) or die(mysql_error());
$row_tratamientos = mysqli_fetch_array($tratamientos);
$totalRows_tratamientos = mysqli_num_rows($tratamientos);
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
      <h1>Tratamientos</h1>
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <p>Tratamiento<br />
          <label for="Sucursal"></label>
          <input name="Tratamiento" type="text" id="Tratamiento" value="<?php echo $row_tratamientos['tratamiento']; ?>" />
        </p>
        <p>Subt&iacute;tulo<br />
          <input name="Subtitulo" type="text" id="Subtitulo" value="<?php echo $row_tratamientos['tratamiento_subtitulo']; ?>" />
        </p>
        <p>Informaci&oacute;n<br />
          <label for="tratamientos_desc"></label>
          <textarea name="Informacion" class="widgEditor nothing" id="Informacion" cols="45"><?php echo $row_tratamientos['tratamiento_contenido']; ?></textarea>
        </p>
        <p>Preguntas Frecuentes<br />
          <textarea name="FAQs" class="widgEditor nothing" id="FAQs" cols="45"><?php echo $row_tratamientos['tratamiento_faqs']; ?></textarea>
        </p>
        <p>Video<br />
          <textarea name="Video" cols="80" rows="5" id="Video"><?php echo $row_tratamientos['tratamiento_video']; ?></textarea>
          <br />
La medida del frame deber&aacute; ser de 640 x 480 pixeles        </p>
        <p>
          <input name="tratamiento_menu" type="checkbox" id="tratamiento_menu" value="1" <?php if (!(strcmp($row_tratamientos['tratamiento_menu'],1))) {echo "checked=\"checked\"";} ?> />
          <label for="tratamiento_menu"></label>
Seleccionar para colocar el tratamiento en la barra de men&uacute; inferior</p>
        <p>
          <input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />
    <input type="submit" name="button" id="button" value="Actualizar" />
        </p>
        <p>
          <input type="hidden" name="MM_update" value="form1" />
          <input name="tratamiento_id" type="hidden" id="tratamiento_id" value="<?php echo $row_tratamientos['tratamiento_id']; ?>" />
        </p>
      </form>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysqli_free_result($tratamientos);
?>
