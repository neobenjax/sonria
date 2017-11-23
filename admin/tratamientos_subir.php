<?php require_once('../Connections/conn_sonria.php'); ?>
<?php include("restringir.php")?>
<?php
error_reporting(0);

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
 	$image =$_FILES["Imagen1"]["name"];
	$uploadedfile = $_FILES['Imagen1']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['Imagen1']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['Imagen1']['tmp_name']);


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['Imagen1']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['Imagen1']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else 
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=652;
//$newheight=($height/$width)*$newwidth;
$newheight=572;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filename = "../img/". $_FILES['Imagen1']['name'];

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tratamientos (tratamiento, tratamiento_subtitulo, tratamiento_banner, tratamiento_header, tratamiento_contenido, tratamiento_video, tratamiento_faqs, tratamiento_menu) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Tratamiento'], "text"),
                       GetSQLValueString($_POST['Subtitulo'], "text"),
					   GetSQLValueString($_FILES['Imagen1']['name'], "text"),
					   GetSQLValueString($_FILES['Imagen2']['name'], "text"),
                       GetSQLValueString($_POST['Informacion'], "text"),
                       GetSQLValueString($_POST['Video'], "text"),
					   GetSQLValueString($_POST['FAQs'], "text"),
					   GetSQLValueString(isset($_POST['tratamiento_menu']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_conn_sonria, $conn_sonria);
  $Result1 = mysql_query($insertSQL, $conn_sonria) or die(mysql_error());


 	$image =$_FILES["Imagen2"]["name"];
	$uploadedfile = $_FILES['Imagen2']['tmp_name'];
     
 
 	if ($image) 
 	{
 	
 		$filename = stripslashes($_FILES['Imagen2']['name']);
 	
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);
		
		
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
 		{
		
 			$change='<div class="msgdiv">Unknown Image extension </div> ';
 			$errors=1;
 		}
 		else
 		{

 $size=filesize($_FILES['Imagen2']['tmp_name']);


if($extension=="jpg" || $extension=="jpeg" )
{
$uploadedfile = $_FILES['Imagen2']['tmp_name'];
$src = imagecreatefromjpeg($uploadedfile);

}
else if($extension=="png")
{
$uploadedfile = $_FILES['Imagen2']['tmp_name'];
$src = imagecreatefrompng($uploadedfile);

}
else 
{
$src = imagecreatefromgif($uploadedfile);
}

echo $scr;

list($width,$height)=getimagesize($uploadedfile);


$newwidth=625;
//$newheight=($height/$width)*$newwidth;
$newheight=132;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filename = "../img/". $_FILES['Imagen2']['name'];

imagejpeg($tmp,$filename,100);


imagedestroy($src);
imagedestroy($tmp);
}}



//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }


  $insertGoTo = "tratamientos.php?retro=1";
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
    <h1>Tratamientos</h1>
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
		  <td>Imagen 1 - Slider<br />
            <input size="25" name="Imagen1" type="file" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10pt" class="box" id="Imagen1" />
            <br />
Se sugieren im&aacute;genes de  652 x 572 pixeles a 72dpi</td>
		  </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
		  <td width="200">Imagen 2 - Header<br />
		    <input size="25" name="Imagen2" type="file" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10pt" class="box" id="Imagen2" />
		    <br />
		    Se sugieren im&aacute;genes de 625 x 132 pixeles a 72dpi</td>
		  </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="novedades_subtitulo"></label>
            Tratamiento<br />
            <input type="text" name="Tratamiento" id="Tratamiento" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Subt&iacute;tulo<br />
            <input type="text" name="Subtitulo" id="Subtitulo" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Informaci&oacute;n<br />
            <textarea name="Informacion" class="widgEditor nothing" id="Informacion" cols="45"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Preguntas Frecuentes<br />
            <textarea name="FAQs" class="widgEditor nothing" id="FAQs" cols="45"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Video<br />
            <textarea name="Video" cols="80" rows="5" id="Video"></textarea>
            <br />
            La medida del frame deber&aacute; ser de 300 x 250 pixeles<br /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label for="tratamiento_menu"></label>
            <input type="checkbox" name="tratamiento_menu" id="tratamiento_menu" />
            <label for="tratamiento_menu"></label>
            Selecciones para colocar el tratamiento en la barra de men&uacute; inferior</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />
            <input name="Submit" type="submit" id="mybut" onclick="MM_validateForm('Imagen1','','R','Imagen2','','R','Tratamiento','','R','Subtitulo','','R');return document.MM_returnValue" value="Enviar"/></td>
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