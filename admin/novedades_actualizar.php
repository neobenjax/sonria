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
  $updateSQL = sprintf("UPDATE novedades SET novedades_titulo=%s, novedades_subtitulo=%s, novedades_desc=%s WHERE novedades_id=%s",
                       GetSQLValueString($_POST['novedades_titulo'], "text"),
                       GetSQLValueString($_POST['novedades_subtitulo'], "text"),
                       GetSQLValueString($_POST['promocion_desc'], "text"),
                       GetSQLValueString($_POST['novedades_id'], "int"));

  mysqli_select_db($conn_sonria, $database_conn_sonria);
  $Result1 = mysqli_query($conn_sonria,$updateSQL) or die(mysql_error());

  $updateGoTo = "novedades.php?retro=2";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_novedades = "-1";
if (isset($_GET['id'])) {
  $colname_novedades = $_GET['id'];
}
mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_novedades = sprintf("SELECT * FROM novedades WHERE novedades_id = %s", GetSQLValueString($colname_novedades, "int"));
$novedades = mysqli_query($conn_sonria,$query_novedades) or die(mysql_error());
$row_novedades = mysqli_fetch_array($novedades);
$totalRows_novedades = mysqli_num_rows($novedades);
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
      <h1>Novedades</h1>
      <form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
        <p>T�tulo<br />
          <label for="novedades_titulo"></label>
          <input name="novedades_titulo" type="text" id="novedades_titulo" value="<?php echo $row_novedades['novedades_titulo']; ?>" />
        </p>
        <p>Subt&iacute;tulo<br />
          <input name="novedades_subtitulo" type="text" id="novedades_subtitulo" value="<?php echo $row_novedades['novedades_subtitulo']; ?>" size="70" />
        </p>
        <p>Descripci&oacute;n<br />
          <label for="novedades_desc"></label>
          <textarea name="promocion_desc" class="widgEditor nothing" id="promocion_desc" cols="45" rows="5"><?php echo $row_novedades['novedades_desc']; ?></textarea>
        </p>
        <p>
          <input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />
    <input type="submit" name="button" id="button" value="Actualizar" />
        </p>
        <p>
          <input type="hidden" name="MM_update" value="form1" />
          <input name="novedades_id" type="hidden" id="novedades_id" value="<?php echo $row_novedades['novedades_id']; ?>" />
        </p>
      </form>
    </div>
  <!-- end .container --></div>
</body>
</html>
<?php
mysqli_free_result($novedades);
?>
