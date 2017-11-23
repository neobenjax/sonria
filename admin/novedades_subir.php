<?php require_once('../Connections/conn_sonria.php'); ?>
<?php include("restringir.php")?>
<?php
//error_reporting(0);

$change="";
$abc="";


 define ("MAX_SIZE","400");
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

 $errors=0;

 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	$image =$_FILES["Imagen"]["name"];
	$uploadedfile = $_FILES['Imagen']['tmp_name'];


 	if ($image)
 	{

 		$filename = stripslashes($_FILES['Imagen']['name']);

  		$extension = getExtension($filename);
 		$extension = strtolower($extension);


 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
 		{

 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['Imagen']['tmp_name']);


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['Imagen']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['Imagen']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=616;
//$newheight=($height/$width)*$newwidth;
$newheight=224;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filename = "../img/". $_FILES['Imagen']['name'];

imagejpeg($tmp,$filename,100);


imagedestroy($src);
imagedestroy($tmp);
}}

}

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors)
 {

   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO novedades (novedades_titulo, novedades_subtitulo, novedades_img, novedades_desc) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['Titulo'], "text"),
					   GetSQLValueString($_POST['Subtitulo'], "text"),
					   GetSQLValueString($_FILES['Imagen']['name'], "text"),
                       GetSQLValueString($_POST['Descripcion'], "text"));

  mysqli_select_db($conn_sonria, $database_conn_sonria);
  $Result1 = mysqli_query($conn_sonria, $insertSQL) or die(mysql_error());

  $insertGoTo = "novedades.php?retro=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}



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


<style type="text/css" media="all">


	@import "css/widgEditor.css";
</style>

<script type="text/javascript" src="scripts/widgEditor.js"></script>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es un campo obligatorio.\n'; }
    } if (errors) alert(errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>

<div class="container">
  <?php include("menu.php")?>
  <div class="content">
  <p>&nbsp;</p>
    <h1>Novedades</h1>
    <div align="center" id="err"> <?php echo $change; ?></div>
   <div id="con">



        <table width="502" cellpadding="0" cellspacing="0" id="main">
          <tbody>
            <tr>
              <td width="500" height="238" valign="top" id="main_right">

			  <div class="actualizar">
			  &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $filename; ?>" />  &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $filename1; ?>"  />
			    <form method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" name="form1">
				<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		  <td>Imagen<br />
		    <input name="Imagen" type="file" class="box" id="Imagen" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10pt" size="25"/>
		    <br />
		    La medida &oacute;ptima de la imagen debe ser de 616 x 224 pixeles 72dpi</td>
		  </tr>
        <tr>
        <td>&nbsp;</td>
		</tr>
        <tr>
        <td>T&iacute;tulo:</td>
		</tr>
        <tr>
        <td><label for="Titulo"></label>
          <input type="text" name="Titulo" id="Titulo" /></td>
		</tr>
           <tr>
        <td>&nbsp;</td>
		</tr>
        <tr>
        <td>Subt&iacute;tulo:</td>
		</tr>
        <tr>
        <td><label for="Subtitulo"></label>
          <input name="Subtitulo" type="text" id="Subtitulo" size="70" /></td>
		</tr>
        <tr>
        <td>&nbsp;</td>
		</tr>
        		<tr>
        <td>Descripci&oacute;n:</td>
		</tr>
        		<tr>
        <td><textarea name="Descripcion" class="widgEditor nothing" id="Descripcion" cols="45" rows="5"></textarea></td>
		</tr>
        		<tr>
        <td>&nbsp;</td>
		</tr>
		<tr><Td><input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />		  <input name="Submit" type="submit" id="mybut" onclick="MM_validateForm('Imagen','','R','Titulo','','R','Subtitulo','','R');return document.MM_returnValue" value="Enviar"/></Td></tr>
        <tr>
          <td width="200">&nbsp;</td>
          </tr>
      </table>
				<input type="hidden" name="MM_insert" value="form1" />
                </form>




			  </div>




			  </td>

            </tr>
          </tbody>
     </table>




</div>

  </div>
  <!-- end .container --></div>
</body>
</html>
