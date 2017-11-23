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


$newwidth=200;
$newheight=($height/$width)*$newwidth;
$tmp=imagecreatetruecolor($newwidth,$newheight);

imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
$filename = "../sucursales/thumb_". $_FILES['Imagen']['name'];
imagejpeg($tmp,$filename,100);

$newwidth2=980;
$newheight2=($height/$width)*$newwidth2;
$tmp2=imagecreatetruecolor($newwidth2,$newheight2);

imagecopyresampled($tmp2,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);
$filename2 = "../sucursales/". $_FILES['Imagen']['name'];
imagejpeg($tmp2,$filename2,100);


imagedestroy($src);
imagedestroy($tmp);
imagedestroy($src);
imagedestroy($tmp2);
}}

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
  $insertSQL = sprintf("INSERT INTO img_sucursales (img, img_sucursal) VALUES (%s, %s)",
                       GetSQLValueString($_FILES['Imagen']['name'], "text"),
					   GetSQLValueString($_POST['img_sucursal'], "int"));

  mysql_select_db($database_conn_sonria, $conn_sonria);
  $Result1 = mysql_query($insertSQL, $conn_sonria) or die(mysql_error());

  $insertGoTo = "imagenes.php?retro=1&id=".$_POST['img_sucursal'];
  /*if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }*/
  
  

//If no errors registred, print the success message
 if(isset($_POST['Submit']) && !$errors) 
 {
 
   // mysql_query("update {$prefix}users set img='$big',img_small='$small' where user_id='$user'");
 	$change=' <div class="msgdiv">Image Uploaded Successfully!</div>';
 }
  
  
  header(sprintf("Location: %s", $insertGoTo));
}
 

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Nueva Era - Admin</title>
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
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
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
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm; }
    } if (errors) alert('Debe seleccionar una imagen');
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>

<div class="container">
  <?php include("menu.php")?>
  <div class="content">
    <h1>Im&aacute;genes</h1>
    <div align="center" id="err"> <?php echo $change; ?></div>
   <div id="con">
   
      
      
        <table width="502" cellpadding="0" cellspacing="0" id="main">
          <tbody>
            <tr>
              <td width="500" height="238" valign="top" id="main_right">
			 
			  <div class="actualizar">
			  &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $filename; ?>" />  &nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $filename1; ?>"  />
			    <form method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data" name="form1">
				<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">

		<tr>
          <td>Imagen</td>
          <td width="350" align="left">
            <div align="left"></div></td>
			  
        </tr>
		<tr>
        <td><input size="25" name="Imagen" type="file" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10pt" class="box" id='Imagen' /></td>
		<td>&nbsp;</td>
		</tr>
        <tr>
          <td><input name="img_sucursal" type="hidden" id="img_sucursal" value="<?php echo $_GET['id']; ?>" />
            <label for="textfield">Se sugieren im&aacute;genes de  980 x 735 pixeles a 72dpi</label></td>
          <td>&nbsp;</td>
        </tr>
		<tr><Td align="right"><input name="button2" type="button" id="button2" onclick="javascript: history.go(-1)" value="Cancelar" />		  <input name="Submit" type="submit" id="mybut" onclick="MM_validateForm('Imagen','','R');return document.MM_returnValue" value="Enviar"/></Td><Td valign="top">&nbsp;</Td></tr>
        <tr>
          <td width="200">&nbsp;</td>
          <td width="350">&nbsp;</td>
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