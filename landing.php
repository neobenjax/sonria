<?php require_once('Connections/conn_sonria.php'); ?>
<?php
if (isset( $_GET['s'])){
	$sec=$_GET['s'];
}else{
	$sec="home";
}

if (isset( $_GET['r'])){
	$retro=$_GET['r'];
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
if ($sec=="novedades"){
$colname_novedades = "-1";
if (isset($_GET['id'])) {
  $colname_novedades = $_GET['id'];
}
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_novedades = sprintf("SELECT * FROM novedades WHERE novedades_id = %s ORDER BY novedades_id DESC", GetSQLValueString($colname_novedades, "int"));
$novedades = mysql_query($query_novedades, $conn_sonria) or die(mysql_error());
$row_novedades = mysql_fetch_assoc($novedades);
$totalRows_novedades = mysql_num_rows($novedades);
}

if ($sec=="home"){
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_promociones = "SELECT * FROM promociones ORDER BY promocion_id DESC";
$promociones = mysql_query($query_promociones, $conn_sonria) or die(mysql_error());
$row_promociones = mysql_fetch_assoc($promociones);
$totalRows_promociones = mysql_num_rows($promociones);
}

if ($sec=="sucursales"){
	mysql_select_db($database_conn_sonria, $conn_sonria);
$query_sucrusales_seccion = "SELECT sucursal_id, sucursal, img FROM sucursales INNER JOIN img_sucursales ON sucursal_id=img_sucursal GROUP BY sucursal_id";
$sucrusales_seccion = mysql_query($query_sucrusales_seccion, $conn_sonria) or die(mysql_error());
$row_sucrusales_seccion = mysql_fetch_assoc($sucrusales_seccion);
$totalRows_sucrusales_seccion = mysql_num_rows($sucrusales_seccion);
}

if ($sec=="sucursal"){
	$colname_sucursales = "-1";
	if (isset($_GET['id'])) {
	  $colname_sucursales = $_GET['id'];
	}
	mysql_select_db($database_conn_sonria, $conn_sonria);
	$query_sucursales = sprintf("SELECT * FROM sucursales WHERE sucursal_id = %s", GetSQLValueString($colname_sucursales, "int"));
	$sucursales = mysql_query($query_sucursales, $conn_sonria) or die(mysql_error());
	$row_sucursales = mysql_fetch_assoc($sucursales);
	$totalRows_sucursales = mysql_num_rows($sucursales);
	
	$colname_img_sucursales = "-1";
	if (isset($_GET['id'])) {
	  $colname_img_sucursales = $_GET['id'];
	}
	mysql_select_db($database_conn_sonria, $conn_sonria);
	$query_img_sucursales = sprintf("SELECT * FROM img_sucursales WHERE img_sucursal = %s", GetSQLValueString($colname_img_sucursales, "int"));
	$img_sucursales = mysql_query($query_img_sucursales, $conn_sonria) or die(mysql_error());
	$row_img_sucursales = mysql_fetch_assoc($img_sucursales);
	$totalRows_img_sucursales = mysql_num_rows($img_sucursales);
}

mysql_select_db($database_conn_sonria, $conn_sonria);
$query_sucrusales_menu = "SELECT sucursal_id, sucursal FROM sucursales ORDER BY sucursal ASC";
$sucrusales_menu = mysql_query($query_sucrusales_menu, $conn_sonria) or die(mysql_error());
$row_sucrusales_menu = mysql_fetch_assoc($sucrusales_menu);
$totalRows_sucrusales_menu = mysql_num_rows($sucrusales_menu);

mysql_select_db($database_conn_sonria, $conn_sonria);
$query_tratamientos_menu = "SELECT tratamiento_id, tratamiento FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_menu = mysql_query($query_tratamientos_menu, $conn_sonria) or die(mysql_error());
$row_tratamientos_menu = mysql_fetch_assoc($tratamientos_menu);
$totalRows_tratamientos_menu = mysql_num_rows($tratamientos_menu);

$maxRows_tratamientos_botones = 7;
$pageNum_tratamientos_botones = 0;
if (isset($_GET['pageNum_tratamientos_botones'])) {
  $pageNum_tratamientos_botones = $_GET['pageNum_tratamientos_botones'];
}
$startRow_tratamientos_botones = $pageNum_tratamientos_botones * $maxRows_tratamientos_botones;

mysql_select_db($database_conn_sonria, $conn_sonria);
$query_tratamientos_botones = "SELECT tratamiento_id, tratamiento, tratamiento_subtitulo, tratamiento_menu FROM tratamientos ORDER BY tratamiento_menu DESC, tratamiento_id ASC";
$query_limit_tratamientos_botones = sprintf("%s LIMIT %d, %d", $query_tratamientos_botones, $startRow_tratamientos_botones, $maxRows_tratamientos_botones);
$tratamientos_botones = mysql_query($query_limit_tratamientos_botones, $conn_sonria) or die(mysql_error());
$row_tratamientos_botones = mysql_fetch_assoc($tratamientos_botones);

if (isset($_GET['totalRows_tratamientos_botones'])) {
  $totalRows_tratamientos_botones = $_GET['totalRows_tratamientos_botones'];
} else {
  $all_tratamientos_botones = mysql_query($query_tratamientos_botones);
  $totalRows_tratamientos_botones = mysql_num_rows($all_tratamientos_botones);
}
$totalPages_tratamientos_botones = ceil($totalRows_tratamientos_botones/$maxRows_tratamientos_botones)-1;

if ($sec=="tratamiento"){
	$colname_tratamientos = "-1";
	if (isset($_GET['id'])) {
	  $colname_tratamientos = $_GET['id'];
	}
	mysql_select_db($database_conn_sonria, $conn_sonria);
	$query_tratamientos = sprintf("SELECT * FROM tratamientos WHERE tratamiento_id = %s", GetSQLValueString($colname_tratamientos, "int"));
	$tratamientos = mysql_query($query_tratamientos, $conn_sonria) or die(mysql_error());
	$row_tratamientos = mysql_fetch_assoc($tratamientos);
	$totalRows_tratamientos = mysql_num_rows($tratamientos);
}

if ($sec=="tratamientos"){
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_tratamientos_slider = "SELECT tratamiento_id, tratamiento, tratamiento_banner FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_slider = mysql_query($query_tratamientos_slider, $conn_sonria) or die(mysql_error());
$row_tratamientos_slider = mysql_fetch_assoc($tratamientos_slider);
$totalRows_tratamientos_slider = mysql_num_rows($tratamientos_slider);

}

mysql_select_db($database_conn_sonria, $conn_sonria);
$query_sucursales_footer = "SELECT sucursal_id, sucursal FROM sucursales ORDER BY sucursal ASC";
$sucursales_footer = mysql_query($query_sucursales_footer, $conn_sonria) or die(mysql_error());
$row_sucursales_footer = mysql_fetch_assoc($sucursales_footer);
$totalRows_sucursales_footer = mysql_num_rows($sucursales_footer);

mysql_select_db($database_conn_sonria, $conn_sonria);
$query_tratamientos_footer = "SELECT tratamiento_id, tratamiento FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_footer = mysql_query($query_tratamientos_footer, $conn_sonria) or die(mysql_error());
$row_tratamientos_footer = mysql_fetch_assoc($tratamientos_footer);
$totalRows_tratamientos_footer = mysql_num_rows($tratamientos_footer);
?>
<?php
require_once('calendar/classes/tc_calendar.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<!--Favicon -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php if ($sec=="home"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales</title>
<?php }?>

<?php if ($sec=="acerca"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Acerca de Sonr&iacute;a</title>
<?php }?>

<?php if ($sec=="mision"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Misi&oacute;n, Visi&oacute;n y Compromiso</title>
<?php }?>

<?php if ($sec=="unete"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Qui&eacute;res trabajar con nosotros?</title>
<?php }?>

<?php if ($sec=="diferentes"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Qu&eacute; nos hace diferentes?</title>
<?php }?>

<?php if ($sec=="sucursales"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Nuestras Sucursales</title>
<?php }?>

<?php if ($sec=="sucursal"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica <?php echo $row_sucursales['sucursal']; ?>
</title>
<?php }?>

<?php if ($sec=="sucursal_coapa"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Coapa</title>
<?php }?>

<?php if ($sec=="sucursal_valle"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica del Valle</title>
<?php }?>

<?php if ($sec=="sucursal_lindavista"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Lindavista</title>
<?php }?>

<?php if ($sec=="sucursal_neza"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Neza</title>
<?php }?>

<?php if ($sec=="sucursal_roma"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Roma</title>
<?php }?>

<?php if ($sec=="sucursal_tasquena"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Taxque&ntilde;a</title>
<?php }?>

<?php if ($sec=="tratamientos"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Nuestros Tratamientos</title>
<?php }?>

<?php if ($sec=="contacto"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Contacto</title>
<?php }?>

<?php if ($sec=="membresia"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Membres&iacute;a</title>
<?php }?>

<?php if ($sec=="financiamiento"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Financiamiento</title>
<?php }?>

<?php if ($sec=="privacidad"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Aviso de Privacidad</title>
<?php }?>

<?php if ($sec=="convenios"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Convenios</title>
<?php }?>

<?php if ($sec=="novedades"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - <?php echo $row_novedades['novedades_titulo']; ?></title>
<?php }?>

<?php if ($sec=="tratamiento"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - <?php echo $row_tratamientos['tratamiento']; ?></title>
<?php }?>

<?php if ($sec=="pagosonline"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Abono a tratamientos en l&iacute;nea</title>
<?php }?>


<?php if ($sec=="pagosonlinepaypal"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Abono a tratamientos en l&iacute;nea - PayPal</title>
<?php }?>

<?php if ($sec=="membresiapaypal"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Membres&iacute;a - PayPal</title>
<?php }?>

<?php if ($sec=="dolor_de_muela"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Dolor de Muela</title>
<?php }?>

<?php if ($sec=="gingivitis_inflamacion_encias"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Gingivitis</title>
<?php }?>

<?php if ($sec=="halitosis_mal_aliento"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Halitosis - Mal Aliento</title>
<?php }?>

<?php if ($sec=="hipersensibilidad_sensibilidad_en_los_dientes"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Hipersensibilidad</title>
<?php }?>

<?php if ($sec=="periodontitis"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Periodontitis</title>
<?php }?>

<?php if ($sec=="sangrado_de_encias"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Sangrado de Enc&iacute;as</title>
<?php }?>

<?php if ($sec=="terceros_molares_muela_del_juicio"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Terceros Molares</title>
<?php }?>

<?php if ($sec=="bienvenido_a_sonria"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Bienvenido a Cl&iacute;nicas Dentales Sonr&iacute;a</title>
<?php }?>

<?php if ($sec=="franquicias_clinicas_dentales_sonria_mexico"){ ?>
<title>Sonr&iacute;a - Cl&iacute;nicas Dentales - Franquicias Cl&iacute;nicas Dentales Sonr&iacute;a</title>
<?php }?>


<meta name="keywords" content="Dentistas Dentista DF Odontologo Odontologos Implantes Clinicas Dentales Sonria Clinica Dental Sonria Ortodoncista Ortodoncistas Blanqueamiento Protesis" />
<meta name="description" content="Sonr&iacute;a - Cl&iacute;nicas Dentales - Excelentes Especialistas, Mejores Sonrisas" />

<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
		.oc { display:none;}
	</style>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<?php if ($sec=="home" || $sec=="acerca" || $sec=="tratamientos" || $sec=="novedades"){ ?>
 <link rel="stylesheet" type="text/css" href="js/slider/themes/carbono/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="js/slider/themes/carbono/jquery.slider.ie6.css" />
  <![endif]-->

  
  <script type="text/javascript" src="js/slider/jquery.slider.min.js"></script>
<?php }?>
<script type="text/javascript">
  jQuery(document).ready(function($) {
	  
<!--SLIDER-->
	  
<?php if ($sec=="home" || $sec=="acerca" || $sec=="tratamientos"){ ?>	  
    $(".slider").slideshow({
      width      : 652,
      height     : 572,
      transition : 'SlipLeft',
	  //delay 	 : 7000
    });
<?php }?>

<?php if ($sec=="novedades" || $sec=="home"){ ?>
    $(".slider_novedades").slideshow({
      width      : 360,
      height     : 47,
      transition : 'SlipLeft',
	  delay 	 : 8000
    });
<?php }?>

<?php if ($sec=="home"){ ?>
    $(".slider_promociones").slideshow({
      width      : 616,
      height     : 572,
      transition : 'SlipLeft',
	  //delay 	 : 7000
    });
<?php }?>

<!--PLACEHOLDER-->
	
	    function placeholder(){  
        $("input[type=text]").each(function(){  
            var phvalue = $(this).attr("placeholder");  
            $(this).val(phvalue);  
        });  
    }
	
<!--PLACE HOLDER PARA FORMA DE CONTACTO-->
    placeholder();  
    $("input[type=text]").focusin(function(){  
        var phvalue = $(this).attr("placeholder");  
        if (phvalue == $(this).val()) {  
        $(this).val("");  
        }  
    });  
    $("input[type=text]").focusout(function(){  
        var phvalue = $(this).attr("placeholder");  
        if ($(this).val() == "") {  
            $(this).val(phvalue);  
        }  
    }); 
	
});
</script>

<!--GOOGLE ANALYTICS-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32418294-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    
	ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>









	<script>
<?php if ($sec=="tratamiento" || $sec=="sucursal"){ ?>
<!--VIDEOS INLINE-->

		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
$(document).ready(function() {
	$('#fancybox-overlay').css('position', 'fixed');
	$('#fancybox-overlay').css('width', '100%');
	$('#fancybox-overlay').css('height', '100%');
			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
			
			$("#various3").fancybox({
				'width'				: 660,
				'height'			: 500,
				'autoScale'			: true,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
			
			
			$("a#example5").fancybox();
			
			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					//return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		});
		function aparece(){
			$('#inline1').css('display', 'block');
		}
<?php }?>
function MM_validateForm() { //v4.0
  if (document.getElementById){
	  
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
	if ($('#Nombre').val()=="Nombre") errors += '- Ingrese su Nombre.\n';
	
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- Ingrese un Email valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- Ingrese unicamente numeros en su Telefono.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } 
	  
	  
	  } 
	  else if (test.charAt(0) == 'R') errors += '- '+nm+' es un campo requerido.\n';
	  
	  }
    }
	
	if ($('#Fecha').val()=="0000-00-00") errors += '- Seleccione un fecha para su cita.\n';
	if ($('#Hora').val()=="Hora de Cita") errors += '- Seleccione un horario para su cita.\n';
	
	if (errors) alert(errors);
    document.MM_returnValue = (errors == '');
} }

<?php if ($sec=="contacto"){ ?>
function MM_validateContacto() { //v4.0
  if (document.getElementById){
	  
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateContacto.arguments;
	if ($('#Nombre_contacto').val()=="Nombre") errors += '- Ingrese su Nombre.\n';
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- Ingrese un Email valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- Ingrese unicamente numeros en su Telefono.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } 
	  
	  
	  } 
	  else if (test.charAt(0) == 'R') errors += '- '+nm+' es un campo requerido.\n';
	  
	  }
    }
	
	
	if (errors) alert(errors);
    document.MM_returnValue = (errors == '');
} }
<?php }?>

    </script>
    
<!--CALENDARIO-->
<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>



</head>

<body>

<!-- Chat -->


<script type="text/javascript">
var __lc = {};
__lc.license = 4703351;
__lc.ga_omit_gtm = true;

(function() {
	var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
	lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();

</script>


<!-- End Chat -->

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TP672K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TP672K');</script>
<!-- End Google Tag Manager -->


<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"ZXdAk1a4eFf2mh", domain:"sonria.com.mx",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=ZXdAk1a4eFf2mh" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  



<div class="back">
<div class="container">
  <div class="header"><a class="logo" href="?"><img src="img/logo.png" /></a> 
  
  <ul class="menu">
  
  <li><div class="division" style="background:none;"></div><a <?php if ($sec=="contacto"){; ?> class="activo"<?php }?> href="?s=contacto"><span>CONTACTO</span><br />Ll&aacute;manos!</a></li>
  
  <li><div class="division"></div><a <?php if ($sec=="tratamientos"){; ?> class="activo"<?php }?> href="?s=tratamientos"><span>NUESTROS TRATAMIENTOS</span><br />La mejor inversi&oacute;n es la prevenci&oacute;n</a>
  
    <ul>
        
          <?php do { ?>
            <li> <a href="?s=tratamiento&id=<?php echo $row_tratamientos_menu['tratamiento_id']; ?>" title="<?php echo $row_tratamientos_menu['tratamiento']; ?>"><?php echo $row_tratamientos_menu['tratamiento']; ?></a></li>
            <?php } while ($row_tratamientos_menu = mysql_fetch_assoc($tratamientos_menu)); ?>
         
      </ul>
  
  </li>
  
  <li><div class="division"></div><a <?php if ($sec=="sucursales"){; ?> class="activo"<?php }?> href="?s=sucursales"><span>NUESTRAS SUCURSALES</span><br />Sucursales cerca de ti</a>
  <ul>
        
        
        <?php do { ?>
          <li> <a href="?s=sucursal&id=<?php echo $row_sucrusales_menu['sucursal_id']; ?>" title="Cl&iacute;nica <?php echo $row_sucrusales_menu['sucursal']; ?>">Cl&iacute;nica <?php echo $row_sucrusales_menu['sucursal']; ?></a></li>
          <?php } while ($row_sucrusales_menu = mysql_fetch_assoc($sucrusales_menu)); ?>
<!--<li> <a href="?s=sucursal_coapa" title="Cl&iacute;nica Coapa">Cl&iacute;nica Coapa</a></li>
        <li> <a href="?s=sucursal_valle" title="Cl&iacute;nica Del Valle">Cl&iacute;nica Del Valle</a></li>
        <li> <a href="?s=sucursal_lindavista" title="Cl&iacute;nica Lindavista">Cl&iacute;nica Lindavista</a></li>
        <li> <a href="?s=sucursal_neza" title="Cl&iacute;nica Neza">Cl&iacute;nica Neza</a></li>
        <li> <a href="?s=sucursal_roma" title="Cl&iacute;nica Roma">Cl&iacute;nica Roma</a></li>
        <li> <a href="?s=sucursal_tasquena" title="Cl&iacute;nica Taxque&ntilde;a">Cl&iacute;nica Taxque&ntilde;a</a></li>-->
        
        
      </ul>
  
  </li>
   
  <li><div class="division"></div><a <?php if ($sec=="acerca"){; ?> class="activo"<?php }?> href="?s=acerca" ><span>ACERCA DE SONR&Iacute;A</span><br />Soluci&oacute;n a tus necesidades de salud<br />oral con los mejores especialistas</a>
    <ul style="width:auto;">
        <li> <a href="?s=mision" title="Misi&oacute;n Visi&oacute;n Compromiso">Misi&oacute;n Visi&oacute;n Compromiso</a></li>
        <li> <a href="?s=unete" title="Quieres trabajar con nosotros?">Quieres trabajar con nosotros?</a></li>
        <li> <a href="?s=diferentes" title="Cl&iacute;nica Coapa">Qu&eacute; nos hace diferentes?</a></li>
      
      </ul>
  
  </li>
  
  
  
  
  </ul>
    
  <!-- end .header --></div>
  <div style="clear:both"></div>
  <div class="sidebarLeft">
  
  <?php if (isset($_GET["s"])&& $_GET["s"]=="unete"){ ?>
<p style="margin-top:200px;"><strong>Quieres formar parte del<br />
      <span style="font-size:20px;">GRAN PROYECTO SONR&Iacute;A?</span>
    </strong></p>
    <h1 class="titulos" style="border-radius:5px; margin-top:0; margin-left:60px;"><a style="font-size:17px; color:#FFF; text-decoration:none; text-shadow:none; text-transform:capitalize;" href="mailto:rhumanos@sonria.com.mx">Env&iacute;anos tu curriculum</a></h1>
    <?php }else{  ?>
      
    <h1><img src="img/agenda.png" title="Agenda tu Cita" width="190" height="40" /></h1>
    <div class="agenda">
    <?php if (isset($_GET["r"])){ ?>
    <div class="retro">
    	<p>Gracias por agendar su cita. </p>
	<p>Pronto recibir&aacute; una llamada de confirmaci&oacute;n.</p>
    	<p>Adquiera nuestra <strong>  <a style="font-size:18px; color:#FFF" href="?s=membresia">membres&iacute;a</a></strong> con una promoci&oacute;n especial para usted. </p>
    </div>
    <?php }else{  ?>
    
    
      <form id="form1" name="form1" method="post" action="citas2.php">
        <label for="Nombre"></label>
        <input type="text" name="Nombre" id="Nombre" placeholder="Nombre"/>
        <label for="Email"></label>
        <input type="text" name="Email" id="Email" placeholder="Email"/>
        <label for="url"></label>
        <input type="text" name="Telefono" id="Telefono" placeholder="Telefono"/>
        <div class="oc"><input name="url" type="text" id="url" /></div>
        
<?php
					  $myCalendar = new tc_calendar("Fecha", true, false);
					  //$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  //$myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(2015, 2016);
					  //$myCalendar->dateAllow('2015-01-01', '2016-01-01');
					  $myCalendar->setDateFormat('j F Y');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  $myCalendar->setAlignment('left', 'bottom');
					  //$myCalendar->setSpecificDate(array("2013-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
					  //$myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
					  //$myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
					  $myCalendar->disabledDay("sun");
					  $myCalendar->writeScript();
?>

      
        <select name="Hora" id="Hora">
          <option>Hora de Cita</option>
	  <option>09:00 - 10:00</option>
	  <option>10:00 - 11:00</option>          
	  <option>11:00 - 12:00</option>
          <option>12:00 - 13:00</option>
          <option>13:00 - 14:00</option>
          <option>14:00 - 15:00</option>
          <option>15:00 - 16:00</option>
          <option>16:00 - 17:00</option>
          <option>17:00 - 18:00</option>
          <option>18:00 - 19:00</option>
          <option>19:00 - 20:00</option>
        </select>
<label for="Comentario"></label>
        <textarea name="Comentario" id="Comentario" cols="45" rows="3"  placeholder="Alg&uacute;n comenario?"></textarea>
        
        <input name="s" type="hidden" value="<?php echo $sec?>" />
<!--<input name="button" type="submit" id="button" onclick="MM_validateForm('Nombre','','R','Email','','RisEmail','Telefono','','R','Fecha','','R','Hora','','R');return document.MM_returnValue" value="Hacer Cita" />-->

<input name="button" type="submit" id="button" onclick="MM_validateForm('Nombre','','R','Email','','RisEmail','Telefono','','NisNum');return document.MM_returnValue" value="Hacer Cita" />

<input name="sec" type="hidden" value="<?php echo $sec; ?>" />
      </form>
    
    
    
    
    
    <?php }?>
    
    
    </div>
    
    <?php }?>
  </div>
    
    <?php if ($sec=="home"){ ?>
  <div class="sidebarRight" style="width:616px; height:572px;">


<div class="slider_promociones">

  
  <?php do { ?>
    <div>
      <div style="background: url(img/<?php echo $row_promociones['promocion_img']; ?>) no-repeat right top; height:572px;">
        <?php if ($row_promociones['promocion_titulo']==!NULL) { ?>
  <h1 class="titulos"><?php echo $row_promociones['promocion_titulo']; ?></h1>
  <?php } ?>
  
  <?php if ($row_promociones['promocion_desc']==!NULL) { ?>
          <h2 class="titulos"> <?php echo $row_promociones['promocion_desc']; ?></h2>
          <?php } ?>
          
      </div>
    </div>
    <?php } while ($row_promociones = mysql_fetch_assoc($promociones)); ?>
  
  
  
 
</div>  
</div>



  <?php include("pie_home.php"); ?> 



    <?php } ?>
    
    <?php if ($sec=="acerca"){ ?>
  <div class="sidebarRight" >
  
  <h1 class="titulos">ACERCA DE SONR&Iacute;A</h1>
  <h2 class="titulos">Somos tu mejor opci&oacute;n!</h2>
<div class="slider">

  <div>
    <div style="background: url(img/banner_acerca1.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>

  <div>
    <div style="background: url(img/banner_acerca2.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca3.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca4.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca5.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca6.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca7A.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  
  <div>
    <div style="background: url(img/banner_acerca8A.jpg) no-repeat left top; width:652px; height:572px;">
      <div style="padding:112px 0 30px 0; text-align:center;">
        <!--<h1 class="cs3">"ESPECIALIDADES</h1>
        <h3 class="cs3">en cada cl&iacute;nica"</h3>-->
      </div>
    </div>
  </div>
  

</div>
  </div>
    <?php } ?>
    
     <?php if ($sec=="tratamientos"){ ?>
  <div class="sidebarRight" >
  

<div class="slider">

  <?php do { ?>
    <div>
      <a href="?s=tratamiento&id=<?php echo $row_tratamientos_slider['tratamiento_id']; ?>">
        <div style="background: url(img/<?php echo $row_tratamientos_slider['tratamiento_banner']; ?>) no-repeat left top; width:652px; height:572px;">
          <div style="padding:112px 0 30px 0; text-align:center;">
            <h1 style="margin-top:90px; font-size:34px;"><?php echo $row_tratamientos_slider['tratamiento']; ?></h1>
            <h2 style="margin-top:143px;">clic aqu&iacute; para m&aacute;s informaci&oacute;n</h2>
            </div>
          </div>
        </a>
    </div>
    <?php } while ($row_tratamientos_slider = mysql_fetch_assoc($tratamientos_slider)); ?>

</div>
  </div>
    <?php } ?>
    
    <?php if ($sec=="tratamiento"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/<?php echo $row_tratamientos['tratamiento_header']; ?>" />
  </div>
  <h1><?php echo $row_tratamientos['tratamiento']; ?></h1>
  <h2><?php echo $row_tratamientos['tratamiento_subtitulo']; ?></h2>
  
  <div class="sidebar_info">
    
      <?php echo $row_tratamientos['tratamiento_contenido']; ?>

    


	
      
    </div>
  
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTESs</h4>
      <?php echo $row_tratamientos['tratamiento_faqs']; ?>
      </p>
      <h4><a id="various1" href="#inline1" onclick="aparece()">Ver video</a></h4>
      
    <div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto; ">
			<?php echo $row_tratamientos['tratamiento_video']; ?>
	  </div>
  </div>
    </div>
  
  </div>
    <?php } ?>
    
        <?php if ($sec=="ortodoncia"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_ortodoncia.jpg" />
  </div>
  <h1>ORTODONCIA</h1>
  <h2>Devolvemos la funci&oacute;n y est&eacute;tica a tus dientes</h2>

  
  <div class="sidebar_info">
    
      <p><strong>Ã‚Â¿Que es la Ortodoncia?     </strong><br />
        Es la especialidad que se encarga de colocar los dientes en posiciones ideales para buscar funcionalidad y est&eacute;tica.</p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br /> 
        Es la forma de ubicar los dientes para buscar armon&iacute;a, sin necesidad de hacer procedimientos invasivos (desgaste del tejido dental).</p>
      <p> Al tener una adecuada mordida los dientes no se desgastan ni hacen fuerzas inadecuadas que los debiliten. Adem&aacute;s permite tener una buena funci&oacute;n masticatoria ayudando a tu digesti&oacute;n.      </p>
      <h4>TIPS!</h4>
      <p>Si eres paciente de Ortodoncia no olvides:</p>
      <ul>
        <li>Real&iacute;zate una limpieza profesional profunda (Profilaxis) 		cada 3 meses.</li>
        <li> Evita el consumo de alimentos duros, chicles, morder 		directamente con los dientes, ya que puede ocasionar 		el desprendimiento de un bracket, retrasando el 			tiempo de tu tratamiento.</li>
        <li>De la asistencia a tus controles depende la sonrisa que 		quieres tener. </li>
      </ul>
    
    </div>
  
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Para que son los retenedores?</strong><br />
        Es la aparatolog&iacute;a fundamental para conservar tu tratamiento de ortodoncia, del uso de ellos depende que tus dientes no vuelvan a la posici&oacute;n original y se desalinie la mordida. Inicialmente debes usarlos d&iacute;a y noche y luego solamente en la noche de acuerdo a las instrucciones de tu especialista.</p>
      <p><strong>Ã‚Â¿Tener Ortodoncia duele?</strong><br />
        Todos los pacientes reaccionan de forma diferente. Al comienzo puede ser molesto y algo doloroso para algunos, pero al cabo de unos d&iacute;as te acostumbras a los aparatos.</p>
      <p><strong>Ã‚Â¿Cuanto tiempo dura una ortodoncia?</strong><br />
        Esta depender&aacute; de la cantidad de movimientos que se deban hacer en tu boca, puede variar desde 18 hasta 24 meses o m&aacute;s dependiendo cada caso en particular.<br />
      </p>

    <h4><a id="various1" href="#inline1">Ver video</a></h4>


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">

<iframe width="640" height="480" src="//www.youtube.com/embed/MIKL17aZAlE?rel=0" frameborder="0" allowfullscreen></iframe>

	  </div>
  </div>
    </div>
  
  </div>
    <?php } ?>
    
    <?php if ($sec=="implantes"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_implantes.jpg" />
  </div>
  <h1>IMPLANTES Y PR&Oacute;TESIS</h1>
  <h2>Siempre es posible volver a sonreir</h2>

  
  <div class="sidebar_info">
    
      <p>La Rehabilitaci&oacute;n es la especialidad que reemplaza dientes perdidos o en muy mal estado, devolvi&eacute;ndote la funci&oacute;n y la est&eacute;tica.</p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br />
        La Rehabilitaci&oacute;n oral es importante ya que nos da diferentes opciones de tratamiento para reemplazar uno, varios o todos los dientes perdidos, adapt&aacute;ndose a todos los presupuestos. Es una especialidad que nos devuelve la sonrisa.</p>
      <p>A trav&eacute;s de esta especialidad devolveremos la funci&oacute;n masticatoria y as&iacute; evitar problemas digestivos y articulares, entre otros. </p>
      <h4>TIPS!</h4>
      <p>Si eres paciente de Rehabilitaci&oacute;n no olvides:</p>
      <ul>
        <li> Para facilitar la higiene de tu rehabilitaci&oacute;n utiliza 		enhebradores. (Pregunta a tu odont&oacute;logo por su uso).</li>
        <li> Es importante que asistas a tus controles, ya que la 		duraci&oacute;n de tu tratamiento depende de ello.
        </li>
        <li>Preg&uacute;ntale a tu odont&oacute;logo c&oacute;mo puedes limpiar tu 		pr&oacute;tesis removible. (No todas son hechas del mismo 		material).</li>
      </ul>
    
    </div>
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Que tipo de tratamiento existe para reemplazar uno o mas dientes?</strong><br />
        Depende del n&uacute;mero de dientes y de su posici&oacute;n. Se pueden realizar pr&oacute;tesis fijas, removibles (quitar y poner), o implantes. Este &uacute;ltimo consiste en colocar un tornillo en el lugar que ocupa la ra&iacute;z del diente y posteriormente realizar  una corona sobre &eacute;ste.</p>
      <p><strong>Ã‚Â¿Cuanto es el tiempo promedio de duracion de un tratamiento de rehabilitacion finalizado?<br />
      </strong>      El tiempo de duraci&oacute;n depende de factores como mordida del paciente, cuidados en la limpieza oral, asistencia a sus controles. Sin embargo el tiempo promedio es de: </p>
      <ul>
        <li>Pr&oacute;tesis fija (coronas): 5 a&ntilde;os.</li>
        <li>Pr&oacute;tesis removible: 3 a&ntilde;os</li>
        <li>Implantes (tornillo): &iexcl;Toda la vida, dependiendo del cuidado!</li>
        <li>Coronas sobre implantes: 5 a&ntilde;os</li>
      </ul>
      <h4 style="font-size:19px; text-align:left;">&nbsp;
    </h4>
      <h4><a id="various1" href="#inline1">Ver video</a></h4>


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">
			<iframe width="640" height="480" src="//www.youtube.com/embed/yEqKL8kbEJM?rel=0" frameborder="0" allowfullscreen></iframe>
	  </div>
  </div>
    
    </div>
  
  </div>
    <?php } ?>
    
        <?php if ($sec=="odontopediatria"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_odontopediatria.jpg" />
  </div>
  <h1>ODONTOPEDIATR&Iacute;A</h1>
  <h2>Porque tus hijos lo necesitan</h2>

  
  <div class="sidebar_info">
    
      <p><strong>Ã‚Â¿Que es Odontopediatria?</strong><br />      
        Es la especialidad que se encarga de la atenci&oacute;n de los ni&ntilde;os entre 1 y 12 a&ntilde;os.</p>
      <p>El Odontopediatra tiene la capacidad de manejar los problemas iniciales de crecimiento de maxilares con aparatos removibles.</p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br />      
        Es importante porque nos ayuda desde edades tempranas a generar experiencias agradables en los ni&ntilde;os para evitar que en un futuro las consultas odontol&oacute;gicas sean  traum&aacute;ticas.</p>
      <p>Contribuye a que tus hijos crezcan con dientes sanos y  los prepara para que desde su infancia conozcan la importancia de cuidar  su salud oral.</p>
    <h4><a id="various1" href="#inline1">Ver video</a></h4>


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">
			<iframe width="640" height="480" src="//www.youtube.com/embed/qnJsfs83Y9U?rel=0" frameborder="0" allowfullscreen></iframe>
	  </div>
  </div>
    
    </div>
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Desde que edad debo llevar a mis hijos al odontologo?</strong><br />
        Desde la aparici&oacute;n del primer diente para ense&ntilde;arles los h&aacute;bitos que garanticen su salud oral</p>
      <p><strong>Ã‚Â¿Es verdad que el chupon o el habito de chuparse el dedo no permite el correcto crecimiento de los dientes de mis hijos?</strong><br />
        S&iacute;, estos h&aacute;bitos causan deformaciones en el paladar y en la enc&iacute;a, haciendo que los dientes tambi&eacute;n presenten malposiciones.</p>
      <p><strong>Ã‚Â¿Que tipo de pasta dental deben usar, por que y hasta que edad?</strong><br />
        Idealmente pasta sin fl&uacute;or desde la aparici&oacute;n de su primer diente hasta que sea consciente de no com&eacute;rsela. <br />
        Posteriormente y hasta los 12 a&ntilde;os pastas con sabores agradables para incentivar el h&aacute;bito de cepillado. </p>
      <p><strong>Ã‚Â¿Que signos debo tener en cuenta para llevar a mi hijo al odontologo?</strong><br />
        No se debe esperar ning&uacute;n s&iacute;ntoma. Debes traerlo cada 6 meses para control con nuestros especialistas, ya que son ellos quienes pueden diagnosticar el estado de salud oral de tus hijos.</p>
        
       
  </div>
  </div>
    <?php } ?>
    
     <?php if ($sec=="endodoncia"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_endodoncia.jpg" />
  </div>
  <h1>ENDODONCIA</h1>
  <h2>Agotando todas las opciones para salvar tus dientes</h2>

  
  <div class="sidebar_info">
    
      <p><strong>Ã‚Â¿Que es la Endodoncia?</strong><br />      
        Es la especialidad que se encarga de retirar el nervio del diente cuando &eacute;ste ha sido afectado por una caries, por un golpe o simplemente por requerimiento de un procedimiento de rehabilitaci&oacute;n que est&eacute; causando sintomatolog&iacute;a.<br />
      </p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br />      
         La endodoncia es importante porque nos permite dar una mayor vida &uacute;til al diente en boca, a pesar de que su nervio haya sido extra&iacute;do.
      </p>
      <h4><a id="various1" href="#inline1">Ver video</a></h4>


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">
			<iframe width="640" height="480" src="//www.youtube.com/embed/4rSDx-c6cRA?rel=0" frameborder="0" allowfullscreen></iframe>
	  </div>
  </div>
    
    </div>
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Mi diente va a quedar igual?</strong><br />
        No, un diente tratado con endodoncia puede cambiar de color y la susceptibilidad a la fractura aumenta considerablemente. Con el tiempo podemos realizar una rehabilitaci&oacute;n poste y corona o en algunos casos extraer el diente.</p>
      <p><strong>Ã‚Â¿Que otras complicaciones se pueden presentar?</strong><br />
        Un diente tratado con endodoncia puede presentar infecciones posteriores que causen lesiones en las ra&iacute;ces de los dientes, para tratarlos se puede repetir la endodoncia o puede ser necesario una cirug&iacute;a. Estos tratamientos no siempre son exitosos.</p>
      <p><strong>Ã‚Â¿Que ventajas tiene este tipo de tratamiento?</strong><br />
        La m&aacute;s importante es que vamos a conservar tu diente en boca. No tendr&aacute; la misma vitalidad, pero seguir&aacute; cumpliendo su funci&oacute;n masticatoria.</p>
    
    </div>
  </div>
    <?php } ?>
    
     <?php if ($sec=="periodoncia"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_periodoncia.jpg" />
  </div>
  <h1>PERIODONCIA</h1>
  <h2>Porque sin un buen soporte Tus dientes se pueden perder</h2>

  
  <div class="sidebar_info">
    
      <p><strong>Ã‚Â¿Que es la periodoncia?</strong><br />
        La periodoncia es la especialidad que se encarga de mantener sanos los tejidos de soporte del diente (hueso y enc&iacute;a), para evitar la p&eacute;rdida de los dientes.</p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br />      
        Porque si no se cuida el hueso y la enc&iacute;a, que son los que mantienen los dientes en su lugar, estos empezar&aacute;n a moverse hasta llegar a caerse.<br />
      </p>
      <h4><a id="various1" href="#inline1">Ver video</a></h4>


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">
			<iframe width="640" height="480" src="//www.youtube.com/embed/g76rFnnTa7M?rel=0" frameborder="0" allowfullscreen></iframe>
	  </div>
  </div>
    
    </div>
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Por que me sangran las encias?</strong><br />
        Las enc&iacute;as sangran porque se inflaman como consecuencia del ac&uacute;mulo de placa bacteriana en tus dientes.</p>
      <p><strong>Ã‚Â¿Por que se mueven mis dientes?</strong><br />
        Los dientes se mueven porque el hueso que hay a su alrededor se pierde a causa de una higiene deficiente o de una mordida inadecuada. <br />
        <br />
        <strong>Ã‚Â¿Que son esas manchas oscuras que no puedo remover con el cepillo?</strong><br />
        Son C&aacute;lculos o restos de alimentos que no se retiran con el cepillo y se van calcificando (endureciendo). Por eso es importante realizarse una limpieza profesional cada 6 meses o seg&uacute;n indicaci&oacute;n del especialista. El soporte de tus dientes es el hueso. Debemos cuidarlo para garantizar una buena salud oral. </p>
    
    </div>
  </div>
    <?php } ?>
    
         <?php if ($sec=="cirugia"){ ?>
  <div class="sidebarRight" >
  <div class="header_img"> <img src="img/header_tratamientos_cirugia.jpg" />
  </div>
  <h1>CIRUG&Iacute;A</h1>
  <h2>Dientes destruidos en tu boca, JAM&Aacute;S!</h2>

  
  <div class="sidebar_info">
    
      <p>Cirug&iacute;a es la especialidad que se encarga de extraer dientes que no se pueden salvar o dientes que por requerimiento de otra especialidad como la ortodoncia se deben extraer para lograr una mejor funci&oacute;n. Adem&aacute;s de diagnosticar y tratar lesiones en tejidos blandos de la cavidad oral. <br />
      </p>
      <p><strong>Ã‚Â¿Por que es importante?</strong><br />
        Es importante porque al extraer dientes en mal estado contribuir&aacute; a tener una salud oral mejor, evitando tener focos de infecci&oacute;n que puedan causar otro tipo de complicaciones infecciosas mayores que con el tiempo deterioren otros dientes. </p>
      <h4>TIPS!</h4>
      <p>Si eres paciente de Cirug&iacute;a no olvides:</p>
      <ul>
        <li> Lee y pregunta si tienes alguna duda sobre el consentimiento informado antes de entrar a cirug&iacute;a.<br />
        </li>
        <li>P&iacute;dele al especialista las recomendaciones que debes 		tomar despu&eacute;s del procedimiento.<br />
        </li>
        <li>Asiste al control posterior a la cirug&iacute;a.</li>
      </ul>
      <p><br />
      </p>
      <p><br />
      </p>
    
    </div>
  <div class="sidebar_info" style="margin-left:30px;">
    
      <h4>PREGUNTAS FRECUENTES</h4>
      <p><strong>Ã‚Â¿Si soy una persona que tiene diabetes o sufre de de la presin alta, Ã‚Â¿puedo someterme a este tipo de procedimientos?</strong><br />
        S&iacute;, siempre y cuando est&eacute;s controlado y seamos autorizados por tu m&eacute;dico tratante.</p>
      <p><strong>Ã‚Â¿Si tengo mis terceros molares o muelas del juicio y no me molestan, Ã‚Â¿me las debo sacar?</strong><br />
        Si estas no est&aacute;n cumpliendo ninguna funci&oacute;n es mejor extraerlas. Preg&uacute;ntale a tu odont&oacute;logo.</p>
      <p><strong>Ã‚Â¿Si se me cayo un diente, Ã‚Â¿ya no debo someterme a una cirugia?</strong><br />
        No siempre. A veces puede quedar la ra&iacute;z en tu boca, lo que genera infecciones que llegan a debilitar el hueso.<br />
        Se recomienda la toma de una radiograf&iacute;a, para asegurarnos que no queden restos de diente.</p>
    <h4><a id="various1" href="#inline1">Ver video</a></h4>
    


	<div style="display: none;">
		<div id="inline1" style="padding:3px; overflow:auto;">
			<iframe width="640" height="480" src="//www.youtube.com/embed/R4duXEa5ZVE?rel=0" frameborder="0" allowfullscreen></iframe>
	  </div>
  </div>
    </div>
  </div>




<?php } ?>
<?php if ($sec=="membresia"){ ?>
	<div class="sidebarRight" style="background:url(img/back_membresia.jpg)" >
   		<h1 class="titulos">MEMBRES&Iacute;A</h1>
		<h2 class="titulos">Obtenla ya!</h2>
		<p>  <font color="white"> . </p>
		<p> </font>  </p>
		<p>  <font color="white"> . </p>
		<p> </font>  </p>
		<p>  <font color="white"> . </p>
		<p> </font>  </p>
		<div class="sidebar_info" style="width:320px; overflow: auto; height:470px;">
			<p>Con la Membres&iacute;a Sonr&iacute;a contar&aacute;s con: </p>
      			<ul>
				<li>10% de descuento en nuestros tratamientos.</li>
				<li>2 limpiezas sencillas al a&ntilde;o.</li>
				<li>Consultas con especialistas ilimitadas sin costo.</li>
				<li>Aplicaci&oacute;n de fl&uacute;or gratis a ni&ntilde;os menores de 10 a&ntilde;os.</li>
				<li>Radiograf&iacute;a para diagn&oacute;stico y tratamiento sin costo.</li>
				<li>Fisioterapia oral personalizada.</li>
				<li>Al contratar una ortodoncia, los estudios para iniciar el tratamiento son sin Costo.</li>
				<li>Retenedores Gratis al finalizar tu tratamiento de ortodoncia.</li>
				<li>Traslado de Historias Cl&iacute;nicas entre cl&iacute;nicas de nuestra Red Sin Costo.</li>
				<li>Opci&oacute;n de pagar tu tratamiento en cuotas fijas mensuales con financiamiento.</li>
				<li>Pagos a Meses Sin Intereses.</li>
			</ul>
			<p></p>
			<h4 style="font-size:19px; text-align:left;">Para obtener nuestra membres&iacute;a, acude a cualquiera de nuestras sucursales</h4>
			<p>  <font color="white"> . </font></p>
			<h4 style="font-size:19px; text-align:left;">O si lo prefieres, puedes adquirirla en l&iacute;nea y obtendr&aacute;s el 50% de descuento</h4>
			<p>  <font color="white"> . </font></p>
			<p>Solo haz clic en  PAGO EN L&Iacute;NEA y disfruta de este beneficio con total seguridad:</p>
			<p></p>
			<p><p><a href="?s=membresiapaypal"><img src="img/azulpeque.png" /></a> </p></p> 			
				<!--COMENTARIO /* <p><p><a href="https://www.pagofacil.net/tpv/clinicasdentalessonria"><img src="img/azulpeque.png" /></a> </p></p> */ -->
			<p> </p>
			<p> </p>
			<p>Aceptamos todas las tarjetas de Cr&eacute;dito y D&eacute;bito </p>
			<p> </p>
			<p> </p>
			<p> </p>
			<p><p><img src="img/logo_american_express.png" /> <img src="img/logo_visa.png" /> <img src="img/logo_master_card.png" /></p></p>
			<p> </p>
			<p> </p>
				<!--COMENTARIO /*<p><p>Eres usuario <a href="?s=membresiapaypal"><img src="img/logopaypal.png" /></a>  ?</p></p> */ -->
		</div>
	</div>



<?php } ?>
<?php if ($sec=="membresiapaypal"){ ?>
	 <div class="sidebarRight" >
		<div class="header_img">  
			<h1></h1>
		</div>
		<a href="#" onclick="javascript:window.open('https://www.paypal.com/mx/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="img/bannerpaypal.png" border="0" alt="Pagos por PayPal"></a></td></tr></table><!-- PayPal Logo  <img src="img/bannerpaypal.png" /> -->
		<p>  <font color="white"> . </p>
		<p> </font>  </p>  
		<p> <font size=2 >Por favor selecciona la membres&iacute;a que deseas adquirir y empieza a disfrutar de sus beneficios: </font></p>		
			<!--COMENTARIO /* <p> <font size=2 >Si tienes una cuenta PayPal, puedes realizar tu abono aqui: </font></p> */ -->
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="WY8ZV9FZRRK64">
			<table>
				<tr><td><input type="hidden" name="on0" value=".">.</td></tr><tr><td><select name="os0">
				<option value="Membresia Sonria Personal con 50% de descuento">Membresia Sonria Personal con 50% de descuento</option>
				<option value="Membresia Sonria Familiar(Hasta 4 Personas) con 50% de descuento">Membresia Sonria Familiar(Hasta 4 Personas) con 50% de descuento</option>
				</select> </td></tr>
       	 		</table>
			<input type="hidden" name="currency_code" value="MXN">
			<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma mÃƒÂ¡s segura y rÃƒÂ¡pida de pagar en lÃƒÂ­nea.">
			<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
		</form>
		<p>  <font color="white"> . </p>
		<p> </font>  </p> 
		<table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/mx/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="https://www.paypal.com/es_XC/Marketing/i/banner/securepayment_by_pp_1line.png" border="0" alt="Aceptamos PayPal"></a></td></tr></table>	
	</div>




<?php } ?>
<?php if ($sec=="financiamiento"){ ?>
	<div class="sidebarRight" style="background:url(img/back_financiamiento.jpg)" >
 		<h1 class="titulos">FINANCIAMIENTO</h1>
		<h2 class="titulos">Con meses sin intereses</h2>
		<div class="sidebar_info secciones">
			<p>Porque pensamos en ti, en Cl&iacute;nicas dentales Sonr&iacute;a encontrar&aacute;s el financiamiento que m&aacute;s se adapte a tus necesidades:</p>
			<ul>
				<li>Aceptamos tarjetas de Cr&eacute;dito.</li>
				<li>Pago de contado.</li>
				<li>Contamos con extraordinarios planes de pago a meses sin intereses.</li>
			</ul><br />
			<p><p><img src="img/logo_american_express.png" /> <img src="img/logo_visa.png" /> <img src="img/logo_master_card.png" /></p></p>
			<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/mx/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="https://www.paypal.com/es_XC/Marketing/i/banner/securepayment_by_pp_2line.png" border="0" alt="Pagos por PayPal"></a></td></tr></table><!-- PayPal Logo -->
		</div>
	</div>



<?php } ?>
<?php if ($sec=="pagosonline"){ ?>
	<div class="sidebarRight" style="background:url(img/back_financiamiento.jpg)" >
 		<h1 class="titulos">PAGOS EN L&Iacute;NEA</h1>
		<h2 class="titulos">Abonos en l&iacute;nea a tu tratamiento</h2>
		<div class="sidebar_info secciones">
			<p>Porque pensamos en ti, ahora en Cl&iacute;nicas Dentales Sonr&iacute;a podras realizar abonos a tu tratamiento en l&iacute;nea.</p>
			<p>Solo haz clic en  PAGO EN L&Iacute;NEA y disfruta de este beneficio con total seguridad:</p>
			<p></p>
			<p><p><a href="?s=pagosonlinepaypal"><img src="img/azulpeque.png" /></a> </p></p> 			
				<!--COMENTARIO /* <p><p><a href="https://www.pagofacil.net/tpv/clinicasdentalessonria"><img src="img/azulpeque.png" /></a> </p></p> */ -->
			<p> </p>
			<p> </p>
			<p>Aceptamos todas las tarjetas de Cr&eacute;dito y D&eacute;bito </p>
			<p> </p>
			<p> </p>
			<p> </p>
			<p><p><img src="img/logo_american_express.png" /> <img src="img/logo_visa.png" /> <img src="img/logo_master_card.png" /></p></p>
			<p></p>
			<p></p>
				<!--COMENTARIO /*<p><p>Eres usuario <a href="?s=pagosonlinepaypal"><img src="img/logopaypal.png" /></a>  ?</p></p> */ -->
		</div>
	</div>


<?php } ?>
<?php if ($sec=="pagosonlinepaypal"){ ?>
	<div class="sidebarRight" >
		<div class="header_img">  
			<h1></h1>
		</div>
		<a href="#" onclick="javascript:window.open('https://www.paypal.com/mx/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="img/bannerpaypal.png" border="0" alt="Pagos por PayPal"></a></td></tr></table><!-- PayPal Logo  <img src="img/bannerpaypal.png" /> -->
		<p>  <font color="white"> . </p>
		<p> </font>  </p>  
		<p> <font size=2 >Por favor selecciona el bot&oacute;n Comprar Ahora para realizar tu abono con total seguridad: </font></p>
			<!--COMENTARIO /*<p> <font size=2 >Si tienes una cuenta PayPal, puedes realizar tu abono aqui: </font></p> */ -->
		<p>  <font color="white"> . </font></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="RKSLQ2A2NPFVU">
			<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma mÃƒÂ¡s segura y rÃƒÂ¡pida de pagar en lÃƒÂ­nea.">
			<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
		</form>
		<p>  <font color="white"> . </p>
		<p> </font>  </p> 
		<!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="#" onclick="javascript:window.open('https://www.paypal.com/mx/cgi-bin/webscr?cmd=xpt/Marketing/general/WIPaypal-outside','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=700, height=600');"><img  src="https://www.paypal.com/es_XC/Marketing/i/banner/securepayment_by_pp_1line.png" border="0" alt="Aceptamos PayPal"></a></td></tr></table><!-- PayPal Logo -->	


  </div>


<?php } ?>
<?php if ($sec=="dolor_de_muela"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_dolor_de_muela.png" />
		</div>
		<h1>DOLOR DE MUELA</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es el dolor de muela?     </strong><br /></p>
			<p>Es uno de los dolores m&aacute;s comunes, intensos e incontrolables. Es de tipo irradiado ya que las terminaciones nerviosas son compartidas por las ra&iacute;ces de los dientes adyacentes y cada una de sus enervaciones.</p> 
			<p><strong>¿Qu&eacute; lo causa?     </strong><br /></p>
			<p>El dolor de muela se produce a causa de una estimulaci&oacute;n por agentes t&eacute;rmicos, mec&aacute;nicos o qu&iacute;micos, que afectan directamente al nervio. El cerebro percibe esto como un est&iacute;mulo doloroso, intenso y que aumenta. En general a este padecimiento se le conoce como una pulpitis, ya que es una inflamaci&oacute;n del tejido pulpar o nervioso que se encuentra en los dientes.</p>
			<p>Algunas de las causas m&aacute;s comunes por las que se puede presentar un dolor dental son:</p>
			<ul>
				<li>Fractura o fisura dental.</li>
				<li>Exposici&oacute;n de las ra&iacute;ces dentales.</li>
				<li><a href="?s=gingivitis_inflamacion_encias">Gingivitis (inflamaci&oacute;n y sangrado de enc&iacute;as)</a>.</li>
				<li>Absceso dental (complicaci&oacute;n de la caries dental).</li>
			</ul>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p></p>
			<p></p>
			<p></p>
			<ul>
				<li>Lesiones en la mucosa oral.</li>
				<li>Patolog&iacute;a mandibular.</li>
				<li>Infecciones recurrentes en o&iacute;do.</li>
				<li>Sinusitis.</li>
			</ul>
			<p></p>			
			<p><strong>¿C&oacute;mo solucionar el dolor dental?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas indicados para realizar una <a href="?s=consulta">valoraci&oacute;n completa</a> y determinar la causa del dolor  y realizar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado.</p>
			<p></p>
			<h4>Tips para prevenir el dolor dental!</h4>
			<p></p>
			<ul>
				<li>Asiste cada 6 meses a Cl&iacute;nicas Dentales Sonr&iacute;a para realizarte una valoraci&oacute;n odontol&oacute;gica y determinar tu salud oral.</li>
				<li>Mant&eacute;n una higiene oral adecuada, cepill&aacute;ndote 3 veces al d&iacute;a, usando hilo dental para eliminar cualquier resto de comida.</li>
				<li>No dejes ning&uacute;n tratamiento oral sin concluir.</li>
			</ul>

		</div>	

	</div>    


<?php } ?>
<?php if ($sec=="gingivitis_inflamacion_encias"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_gingivitis.png" />
		</div>
		<h1>GINGIVITIS</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es la Gingivitis?     </strong><br /></p>
			<p>Es una de las afectaciones bucales m&aacute;s frecuentes, que se caracteriza por la inflamaci&oacute;n y sangrado de las enc&iacute;as.</p> 
			<p><strong>¿Qu&eacute; la causa?     </strong><br /></p>
			<p>Esta enfermedad es producida generalmente por la acumulaci&oacute;n de placa bacteriana, formada principalmente por restos de alimentos que se van acumulando entre los dientes, lo que resulta en una agresi&oacute;n directa a la enc&iacute;a. Si la placa bacteriana no se retira con una buena higiene oral, se llega a calcificar con minerales provenientes de la saliva, formando el sarro que se va acumulando y con el tiempo produce toxinas que irritan y deterioran el tejido de la enc&iacute;a.</p>
			<p>Otros tipos menos comunes y que no son producidos por la acumulaci&oacute;n de placa bacteriana, se asocian con enfermedades cut&aacute;neas, alergias o infecciones virales.  Entre los casos m&aacute;s graves de esta enfermedad se encuentra la Gingivitis Ulceronecrotizante Aguda, que provoca tejidos necrosados, fuertes hemorragias espont&aacute;neas y aliento f&eacute;tido.</p>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p><strong>¿C&oacute;mo solucionar el problema de la Gingivitis?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas indicados que identificar&aacute;n el tipo de gingivitis y as&iacute; poder determinar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado. Una vez finalice el tratamiento profesional, la inflamaci&oacute;n gingival disminuye hasta recobrar el aspecto rosado y firme de las enc&iacute;as sanas. Para mantenerlo, es imprescindible una higiene bucal precisa aun cuando no haya signos de la enfermedad, pues de lo contrario es probable que reaparezca.</p>
			<p></p>
			<h4>Tips para prevenir la Gingivitis!</h4>
			<p></p>
			<ul>
				<li>Es indispensable tener una fisioterapia oral adecuada con una t&eacute;cnica de cepillado eficiente y el uso correcto del hilo dental.</li>
				<li>Evitar respirar por la boca para que no se sequen las enc&iacute;as. Alimentarse seg&uacute;n una dieta rica en frutas, verduras, cereales y baja en grasas, az&uacute;cares y almid&oacute;n.</li>
				<li>Controles peri&oacute;dicos con el odont&oacute;logo permiten identificar a tiempo los signos de la gingivitis y realizar r&aacute;pidamente el tratamiento m&aacute;s efectivo.</li>
			</ul>

		</div>	

	</div>    


<?php } ?>
<?php if ($sec=="halitosis_mal_aliento"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_mal_aliento.png" />
		</div>
		<h1>HALITOSIS</h1>
		<h2>Mal Aliento</h2>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es la Halitosis?     </strong><br /></p>
			<p>La halitosis, es definida como olor desagradable procedente del aliento de una persona. Es un problema social asociado frecuentemente a una mala higiene bucal o enfermedades de la cavidad oral.</p> 
			<p><strong>¿Qu&eacute; la causa?     </strong><br /></p>
			<p>El mal olor procedente de la cavidad oral se debe a la acci&oacute;n de bacterias localizadas principalmente en el dorso de la lengua y en el surco gingival. La gran extensi&oacute;n lingual y su estructura papilada hace que se retengan en ella gran cantidad de restos de comida y desechos, cuya descomposici&oacute;n por las bacterias origina el mal olor principalmente por la producci&oacute;n de compuestos de Sulfuro.</p>
			<p>Otros factores que provocan Halitosis o mal aliento pueden ser:</p>
			<ul>
				<li>Pr&oacute;tesis dentarias.</li>
				<li>Saliva.</li>
				<li>Higiene oral deficiente.</li>
				<li>Enfermedad cr&oacute;nica periodontal y gingivitis.</li>
				<li>Absceso dentario o presencia de f&iacute;stulas.</li>
			<ul>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p><strong>¿C&oacute;mo solucionar el problema de Halitosis?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas que identificar&aacute;n las fuentes que pueden ocasionar mal aliento, realizando el <a href="?s=consulta">diagn&oacute;stico</a> y proponiendo el <a href="?s=tratamientos">tratamiento</a> apropiado en los casos de origen bucal.</p>
			<p>Si nuestro odont&oacute;logo  determina que tienes la boca saludable y no hay muestras de mejor&iacute;a con la rutina de higiene oral, te remitir&aacute; con tu m&eacute;dico de cabecera o con un especialista para determinar otras causas posibles del mal aliento.</p>			
			<p></p>
			<h4>Tips para prevenir el Mal Aliento!</h4>
			<p></p>
			<ul>
				<li>Una higiene bucal adecuada reducir&aacute; la probabilidad de mal aliento.</li>
				<li>Evita fumar y tomar bebidas alcoh&oacute;licas.</li>
				<li>Remover las lesiones cariosas.</li>
				<li>La eliminaci&oacute;n de enfermedades periodontales.</li>
				<li>Visita cada 6 meses Cl&iacute;nicas Dentales Sonr&iacute;a para mantener la salud oral de tu boca y en caso necesario atender cualquier problema incipiente.</li>
			</ul>
		</div>	

	</div>    


<?php } ?>
<?php if ($sec=="hipersensibilidad_sensibilidad_en_los_dientes"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_sensibilidad.png" />
		</div>
		<h1>HIPERSENSIBILIDAD</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es la hipersensibilidad?     </strong><br /></p>
			<p>La hipersensibilidad dental es la sensaci&oacute;n dolorosa que puede tenerse al ingerir alimentos, bebidas fr&iacute;as, bedidas calientes, o al aspirar aire fr&iacute;o. Se caracteriza por un dolor intenso de corta duraci&oacute;n y de manera espor&aacute;dica.</p> 
			<p><strong>¿Qu&eacute; la causa?     </strong><br /></p>
			<p>Existen diferentes motivos por los que se puede presentar una sensibilidad en los dientes sobre todo cuando las enc&iacute;as se retraen separ&aacute;ndose del &oacute;rgano dentario o cuando hay una p&eacute;rdida de enc&iacute;a que puede ser el  resultado de cepillar los dientes en&eacute;rgicamente.  Otro factor importante es el desgate que pueden tener los dientes si el paciente tiene h&aacute;bitos de rechinar los dientes durante la noche.</p>
			<p><strong>¿C&oacute;mo solucionar el problema de Hipersensibilidad?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas indicados para realizar una <a href="?s=consulta">valoraci&oacute;n completa</a> y determinar la causa de la hipersensibilidad dental y realizar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado.</p>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<h4>Tips para prevenir la Hipersensibilidad!</h4>
			<p></p>
			<ul>
				<li>No cepillar los dientes con demasiada energ&iacute;a o con un cepillo de cerdas duras ya que puede causar p&eacute;rdida o desgaste de enc&iacute;a. Es importante realizar con frecuencia y con ayuda del odont&oacute;logo un programa de fisioterapia oral en donde se pueda especificar una t&eacute;cnica de cepillado correcta.</li>
				<li>Evitar las comidas y bebidas que contienen &aacute;cidos o az&uacute;cares. Estos pueden producir perdida de minerales en los &oacute;rganos dentarios, lo que a su vez puede ocasionar hipersensibilidad.</li>
				<li>Apretar o rechinar los dientes causa un desgaste de las superficies dentales. Ser&aacute; necesario realizar una valoraci&oacute;n para identificar este tipo de h&aacute;bitos y realizar un tratamiento pertinente.</li>
				<li>Acudir cada 6 meses a Cl&iacute;nicas Dentales Sonr&iacute;a en donde un grupo de especialistas podr&aacute;n evaluar la salud de tus enc&iacute;as y piezas dentales y en caso necesario determinar el tratamiento que necesitas.</li>
			</ul>
		</div>	

	</div>  


<?php } ?>
<?php if ($sec=="periodontitis"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_periodontitis.png" />
		</div>
		<h1>PERIODONTITIS</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es la Periodontitis?     </strong><br /></p>
			<p>Es una enfermedad que afecta a las enc&iacute;as y a la estructura de soporte de los dientes. Las bacterias presente en la placa causa la enfermedad periodontal. Los s&iacute;ntomas de la enfermedad periodontal son similares a los de una <a href="?s=gingivitis_inflamacion_encias">gingivitis</a>, ya que la inflamaci&oacute;n de las enc&iacute;as se presenta como etapa inicial de una periodontitis.</p> 
			<p><strong>¿Qu&eacute; la causa?     </strong><br /></p>
			<p>Las toxinas que se producen por la presencia de bacterias en la placa irritan las enc&iacute;as. Al permanecer por mucho tiempo en el mismo lugar, las toxinas provocan que las enc&iacute;as se desprendan de los dientes y se forman bolsas periodontales, las cuales se llenan de m&aacute;s toxinas y bacterias. Conforme la enfermedad avanza, las bolsas se extienden y la placa penetra m&aacute;s y m&aacute;s hasta que el hueso que sostiene al diente se destruye. Eventualmente, el diente se caer&aacute; o necesitar&aacute; ser extra&iacute;do.</p>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p><strong>¿C&oacute;mo solucionar el problema de Periodontitis?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con especialistas periodontales para realizar una <a href="?s=consulta">valoraci&oacute;n completa</a> y determinar la causa del dolor y realizar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado.</p>
			<p></p>
			<h4>Tips para prevenir la Periodontitis!</h4>
			<p></p>
			<ul>
				<li>Un cepillado apropiado tres veces al d&iacute;a, as&iacute; como el uso del hilo dental diariamente ayudar&aacute;n a prevenir la enfermedad periodontal.</li> 
				<li>Una limpieza profesional cada tres o seis meses, realizada en Cl&iacute;nicas Dentales Sonr&iacute;a por un odont&oacute;logo especialista en higiene dental, remover&aacute; la placa y el sarro en &aacute;reas dif&iacute;ciles de alcanzar ayudando a mantener la salud bucal.</li>
			</ul>
		</div>	

	</div>  



<?php } ?>
<?php if ($sec=="sangrado_de_encias"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_sangrado_de_encias.png" />
		</div>
		<h1>SANGRADO DE ENCIAS</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; es el Sangrado de Encias?     </strong><br /></p>
			<p>El sangrado de las enc&iacute;as es el principio de una alteraci&oacute;n bucal que podr&iacute;a desencadenar en una <a href="?s=gingivitis_inflamacion_encias">gingivitis</a> o <a href="?s=periodontitis">enfermedad periodontal</a>.</p> 
			<p>El fen&oacute;meno de hemorragia gingival o sangrado de enc&iacute;as va acompaÃƒÂ±ado normalmente de una inflamaci&oacute;n localizada o generalizada con un cambio de coloraci&oacute;n y un aumento de volumen.</p>
			<p><strong>¿Qu&eacute; la causa?     </strong><br /></p>
			<p>La causa m&aacute;s frecuente del sangrado de enc&iacute;as es la remoci&oacute;n inadecuada de la placa dental que se acumula entre la enc&iacute;a y el diente, lo cual genera una condici&oacute;n denominada <a href="?s=gingivitis_inflamacion_encias">gingivitis</a> o inflamaci&oacute;n de las enc&iacute;as.</p>
			<p>Otros factores que pueden causar sangrado de enc&iacute;as son alteraciones sist&eacute;micas como una deficiencia de vitaminas C o K, cambios hormonales, leucemia o la ingesta de medicamentos altamente irritantes.</p>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p><strong>¿C&oacute;mo solucionar el problema?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas para realizar una <a href="?s=consulta">valoraci&oacute;n completa</a> y determinar la causa de la inflamaci&oacute;n de las enc&iacute;as  y realizar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado.</p>
			<p></p>
			<h4>Tips para prevenir el Sangrado de Encias!</h4>
			<p></p>
			<ul>
				<li>Cepillarse los dientes con un cepillo adecuado que no lesione el tejido gingival ocasionando irritaci&oacute;n.</li>
				<li>Asistir cada 6 meses a Cl&iacute;nicas Dentales Sonr&iacute;a para que los odont&oacute;logos especialistas realicen una valoraci&oacute;n de tu salud oral y prevenir la inflamaci&oacute;n y sangrado de enc&iacute;as.</li>
			</ul>
		</div>	

	</div>  


<?php } ?>
<?php if ($sec=="terceros_molares_muela_del_juicio"){ ?>
	<div class="sidebarRight" >
		<div class="header_img"> <img src="img/banner_terceros_molares.png" />
		</div>
		<h1>TERCEROS MOLARES</h1>
		<div class="sidebar_info">
    			<p><strong>¿Qu&eacute; son los Terceros Molares?     </strong><br /></p>
			<p>Los Terceros Molares, son los &uacute;ltimos dientes en erupcionar, y lo hacen entre los 17 y los 25 a&ntilde;os de vida.</p> 
			<p><strong>¿Pueden provocar dolor?     </strong><br /></p>
			<p>La simple presencia de este &oacute;rgano dentario en boca no significa que tenga que haber patolog&aacute;a, pueden ser asintom&aacute;ticos y participar al igual que los dem&aacute;s dientes, en las funciones normales del sistema.</p>
			<p><strong>¿Pueden provocar complicaciones?     </strong><br /></p>
			<p>Los terceros molares son las piezas dentarias que con mayor frecuencia se hallan retenidas, impactadas o incluidas dentro del hueso.Existe la posibilidad de que por razones gen&eacute;ticas el tercer molar no se forme, y por lo tanto nunca erupcionar&aacute;. Si estos quedan atrapados en el hueso maxilar o en la mand&iacute;bula en forma parcial o total pueden provocar diversas complicaciones (infecciones, api&ntilde;amiento dentario, quistes, dolor, entre otros) y deber&aacute;n ser atendidos por un m&eacute;dico especialista.</p>
		</div>
		<div class="sidebar_info" style="margin-left:30px;">
			<p><strong>¿C&oacute;mo solucionar el problema de Terceros Molares?     </strong><br /></p>
			<p>En Cl&iacute;nicas Dentales Sonr&iacute;a contamos con los especialistas indicados para determinar el <a href="?s=tratamientos">tratamiento</a> m&aacute;s adecuado para solucionar las molestias provocadas por estas piezas dentales.</p>
			<p></p>
			<h4>Tips para prevenir molestias por terceros molares!</h4>
			<p></p>
			<ul>
				<li>Visitar regularmente a nuestros odont&oacute;logos para realizar una valoraci&oacute;n odontol&oacute;gica completa y poder detectar a tiempo la posici&oacute;n de las piezas dentales y en un momento dado tomar las medidas adecuadas para evitar el dolor o futuras complicaciones</li>
				<li>Asistir al odont&oacute;logo al primer indicio de molestia o dolor para realizar el tratamiento m&aacute;s adecuado</li>

			</ul>
		</div>	

	</div>  


<?php } ?>

<?php if ($sec=="bienvenido_a_sonria"){ ?>
	<div class="sidebarRight" style="background:url(img/Agradecimiento.jpg)" >
	</div>

<?php } ?>


<?php if ($sec=="franquicias_clinicas_dentales_sonria_mexico"){ ?>
<div class="sidebarRight" style="background:url(img/back_franquicias.jpg)" >
   		<h1 class="titulos">FRANQUICIAS</h1>
		<!--<h2 class="titulos">Obtenla ya!</h2>
		<p>  <font color="white"> . </p>-->
		<p> </font>  </p>
		<p>  <font color="white"> . </p>
		<p> </font>  </p>
		<p>  <font color="white"> . </p>
		<p> </font>  </p>
		<div class="sidebar_info" style="width:320px; overflow: auto; height:485px; margin-top:10px">

        		<!--<h4><a href="?s=solicitud">Haz tu solicitud aqu&iacute;</a></h4><br /> >-->

		<p>En 1992 en Colombia nace Cl&iacute;nicas Dentales SONR&Iacute;A gracias al sueño de lograr que el acceso a los servicios de salud oral fuera posible para toda la familia en cualquier nivel social.</p>
      		<p>Con m&aacute;s de 20 a&ntilde;os de experiencia en el mercado Colombiano, el grupo de empresarios incursiona en M&eacute;xico en  el año 2005, replicando este modelo de atenci&oacute;n integral, ofreciendo al mercado mexicano un concepto diferente en la atenci&oacute;n de la salud oral, con altos valores de profesionalismo.</p>
	      	<p>Sonr&iacute;a, es una cl&iacute;nica especializada en solucionar las necesidades en salud oral con un equipo de m&eacute;dicos especialistas en todas las ramas odontol&oacute;gicas.</p>
      		<p>En sus unidades se ofrecen los servicios odontol&oacute;gicos m&aacute;s completos  para toda la familia que incluyen:</p>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top">
    <td><ul>
        <li>Endodoncia</li>
        <li>Implantes</li>
        <li>Rehabilitaci&oacute;n</li>
        <li>Periodoncia</li>
        <li>Ortodoncia</li>
        
  
      </ul></td>
    <td><ul>
        
        <li>Odontopediatr&iacute;a</li>
        <li>Cirug&iacute;a</li>
        <li>Est&eacute;tica dental</li>
        <li>Blanqueamientos</li>
  
      </ul></td>
  </tr>
</table>
      <br />
			<p>Actualmente cuenta con un promedio de 9 unidades que operan con buena rentabilidad, incrementando en forma constante su posicionamiento con el consumidor.</p>
			<p>  <font color="white"> . </font></p>
          <h4 style="font-size:19px; text-align:left;">BENEFICIOS</h4>
			
			
      <ul>
        <li>Ubicaci&oacute;n de las Cl&iacute;nicas </li>
        <li>Materiales de alta calidad</li>
        <li>Todas las especialidades en un solo lugar</li>
        <li>Garant&iacute;as en el servicio  </li>
        <li>Estrictas normas de Bioseguridad</li>
        <li>Respaldo de proveedores</li>
        <li>Imagen corporativa</li>
        <li>Alta rentabilidad</li>
        <li>Servicio diferenciado</li>
        <li>Programa de capacitaci&oacute;n</li>
        <li>Posicionamiento de marca</li>
        <li>Asistencia y asesor&iacute;a permanente</li>
        <li>Manuales operativos</li>
        
  
      </ul>
		<p>  <font color="white"> . </font></p>
          <h4 style="font-size:19px; text-align:left;">PROCESO DE OTORGAMIENTO</h4>
          <ol style="margin-left:25px;"">
            <li>Proceso de Solicitud </li>
            <li>Presentaci&oacute;n de la franquicia</li>
            <li>Firma del acuerdo de confidencialidad</li>
            <li>Entrega de la COF </li>
            <li> Firma de una carta intenci&oacute;n</li>
            <li> revisi&oacute;n de la Informaci&oacute;n financiera</li>
            <li>Entrevista y evaluaci&oacute;n del candidato</li>
            <li>Solicitud y aprobaci&oacute;n de la locaci&oacute;n</li>
            <li>Firma de contrato</li>
            <li>Formaci&oacute;n (entrega de manuales y capacitaci&oacute;n)</li>
            <li>Apertura de Franquicia</li>
           
          </ol>
			
			
		</div>
	</div>



<?php } ?>





    
     <?php if ($sec=="sugerencias"){ ?>
  <div class="sidebarRight" style="background:url(img/back_sugerencias.jpg)" >
 
  <h1 class="titulos">SUGERENCIAS</h1>
  <h2 class="titulos">Queremos saber tu opini&oacute;n</h2>

  
  <div class="sidebar_info secciones">
    
      <p>Si tienes alg&uacute;n comentario o sugerencia 
        favor de hac&eacute;rnoslo saber.
        
        Cl&iacute;nicas dentales Sonr&iacute;a agradece tu tiempo.
      </p>
    
    <form id="form1" name="form1" method="post" action="">
        <p>
          <label for="Email"></label>
          <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" />
        </p>
        <p>
          <input type="text" name="Email" id="Email" placeholder="Email" />
        </p>
        <p>
          <input type="text" name="Tel&eacute;fono" id="Tel&eacute;fono" placeholder="Tel&eacute;fono" />
        </p>
        <p>
          <textarea name="Sugerencia" id="Sugerencia" rows="5" placeholder="Sugerencia"></textarea>
        </p>
      
        <p>
          <input type="submit" name="button" id="button" value="Enviar" />
        </p>
      </form>
    <p>.</p>


  </div></div>
    
<?php } ?>
<?php if ($sec=="contacto"){ ?>
	<div class="sidebarRight" >
		<h1 class="titulos">CONTACTO</h1>
		<h2 class="titulos">Ac&eacute;rcate a nosotros!</h2>
		<div class="sidebar_info secciones" >		
			<p style=" margin-bottom:10px; margin-top:-10px;">Ll&aacute;manos!, con gusto te atenderemos.
			<br />
      			<span style="font-size:26px; color:#6DC3C5"><strong><a href="tel:%2B525555113400">55 11 34 00</a></strong></span>
    			</p>
			<p>O env&iacute;anos un correo y con gusto responderemos todas tus dudas.<br />
			<span style="font-size:16px;" ><strong><a href="mailto:servicioalcliente@sonria.com.mx">servicioalcliente@sonria.com.mx</a></strong></span></p>
			<p><img src="img/una_sucursal_cerca_de_ti.jpg" width="258" height="49" /></p>
			<div class="sidebar_info" style="width:300px; overflow: auto; height:250px;">
				<div class="telefonos">
					<p><strong>Cl&iacute;nica Arag&oacute;n:</strong><br />
					<a href="tel:%2B525511638329"> 11 63 83 29</a> / <a href="tel:%2B525524592727"> 24 59 27 27</a> / <a href="tel:%2B525511638245"> 11 63 82 45</a>
					</p>
					<p><strong>Cl&iacute;nica Barranca del Muerto:</strong><br />
					<a href="tel:%2B525568213019"> 68 21 30 19</a> / <a href="tel:%2B525556510594"> 56 51 05 94</a> / <a href="tel:%2B525556510346"> 56 51 03 46</a> 
					</p>
					<p><strong>Cl&iacute;nica Coapa:</strong>    <br />
					<a href="tel:%2B525555114559"> 55 11 45 59</a> / <a href="tel:%2B525555114560"> 55 11 45 60</a> / <a href="tel:%2B525555114558"> 55 11 45 58</a> 
					</p>
					<p><strong>Cl&iacute;nica Del Valle:</strong><br />
					<a href="tel:%2B525552071325">52 07 13 25</a> / <a href="tel:%2B525552072123"> 52 07 21 23</a> / <a href="tel:%2B525552071468"> 52 07 14 68</a>
					</p>
					<p><strong>Cl&iacute;nica Lindavista:</strong><br />
					<a href="tel:%2B525516610758"> 16 61 07 58</a> / <a href="tel:%2B525516610759"> 16 61 07 59</a> / <a href="tel:%2B525516610760"> 16 61 07 60</a>
					</p>
					<p><strong>Cl&iacute;nica Lomas Verdes:</strong><br />
					<a href="tel:%2B525553430599"> 53 43 05 99</a> / <a href="tel:%2B525553430261"> 53 43 02 61</a> / <a href="tel:%2B525553430568"> 53 43 05 68</a>
					</p>
					<p><strong>Cl&iacute;nica Neza: </strong><br />
					<a href="tel:%2B525522328547"> 22 32 85 47</a> / <a href="tel:%2B525522328548"> 22 32 85 48</a> / <a href="tel:%2B525522328546"> 22 32 85 46</a>
					</p>

					<p><strong>Cl&iacute;nica Polanco:</strong> <br />
     					<a href="tel:%2B525552039396"> 52 03 93 96</a> / <a href="tel:%2B525552540912"> 52 54 09 12</a> / <a href="tel:%2B525552035201"> 52 03 52 01</a> 
					</p>

					<p><strong>Cl&iacute;nica Miguel A. Quevedo:</strong> <br />
     					<a href="tel:%2B525555113400"> 55 11 34 00</a> 
					</p>

					<p><strong>Cl&iacute;nica Roma:</strong> <br />
     					<a href="tel:%2B525555113424"> 55 11 34 24</a> / <a href="tel:%2B525555113440"> 55 11 34 40</a> / <a href="tel:%2B525511639770"> 11 63 97 70</a>      
					</p>
					

					<p><strong>Cl&iacute;nica Taxque&ntilde;a:</strong><br />
					<a href="tel:%2B525553364057"> 53 36 40 57</a> / <a href="tel:%2B525553360847"> 53 36 08 47</a> / <a href="tel:%2B525553360878"> 53 36 08 78</a>
					</p>
				</div>
			</div>
		</div>
		<div class="sidebar_info secciones" style="margin-left:30px; margin-top:30px; ">
   
   
   <?php if (isset($_GET["rc"])){ ?>
   
    <div class="retro" style="color:#666">
    <p>Gracias por contactarnos.</p>
    <p>Pronto recibir&aacute; la informaci&oacute;n solicitada.</p>
    </div>
    
    <?php }else{  ?>
    
    <p style="margin-top:75px">D&eacute;janos tus datos y a la brevedad nos pondremos en contacto.</p>
    
    <form id="form1" name="form1" method="post" action="contacto2.php">
    <p>
          <label for="Email_contacto"></label>
          <input type="text" name="Nombre_contacto" id="Nombre_contacto" placeholder="Nombre" />
        </p>
        <p>
          <input type="text" name="Email_contacto" id="Email_contacto" placeholder="Email" />
        </p>
        <p>
          <input type="text" name="Telefono_contacto" id="Telefono_contacto" placeholder="Tel&eacute;fono" />
        </p>
        <p>
          <input type="text" name="Ciudad_contacto" id="Ciudad_contacto" placeholder="Ciudad" />
        </p>
        <p>
          <select name="Asunto_contacto" id="Asunto_contacto">
            <option value="Comentario">Comentario</option>
            <option value="Sugerencia">Sugerencia</option>
          </select>
        </p>
        <p class="oc"><input name="url" type="text" id="url" /></p>
        <p>
          <textarea name="Comentario_contacto" id="Comentario_contacto" rows="5" placeholder="Escriba aqu&iacute;..."></textarea>
        </p>
      
        <p>
          <input name="button" type="submit" id="button" onclick="MM_validateContacto('Nombre_contacto','','R','Email_contacto','','RisEmail','Telefono_contacto','','NisNum');return document.MM_returnValue" value="Enviar" />
        </p>

    </form>
    <?php }?>
    
  </div>
  
  </div>
    

<?php } ?>
    
     <?php if ($sec=="diferentes"){ ?>
  <div class="sidebarRight" style="background:url(img/back_diferentes.jpg)" >
 
  <h1 class="titulos">SOMOS DIFERENTES!</h1>
  <h2 class="titulos">Qu&eacute; nos hace diferentes?</h2>

  
  <div class="sidebar_info secciones">
    <ul>
      <li>La atenci&oacute;n personalizada, el uso de la mejor tecnolog&iacute;a y materiales odontol&oacute;gicos, as&iacute; como la implementaci&oacute;n de los est&aacute;ndares que ofrecemos a todos nuestros pacientes.</li>
      <li>Implementaci&oacute;n de tratamientos novedosos para beneficio de nuestros pacientes.</li>
      <li>Contamos con un servicio integral en todas las especialidades odontol&oacute;gicas: Odontolog&iacute;a, Endodoncia, Implantes, Rehabilitaci&oacute;n, Periodoncia, Odontopediatr&iacute;a, Est&eacute;tica Dental y Blanqueamientos.</li>
      <li>Todos nuestros tratamientos est&aacute;n garantizados.</li>
      <li>Mantenemos una asesor&iacute;a cont&iacute;nua durante todo el tratamiento y hasta despu&eacute;s del mismo, de ser necesario.</li>
  <li>Pago de contado.</li>
  <li>Contamos con extraordinarios planes de pago a meses sin intereses.</li>
</ul>
<br />

      <h4 ">Utilizamos las m&aacute;s estrictas normas de bioseguridad en todo nuestro equipo m&eacute;dico, instrumental y con nuestros pacientes
      </h4>
  </div></div>
    <?php } ?>
    
    <?php if ($sec=="mision"){ ?>
  <div class="sidebarRight" style="background:url(img/back_mision_vision_compromiso.jpg)" >
 
  <h1 class="titulos">ACERCA DE SONR&Iacute;A</h1>
  <h2 class="titulos">Somos tu mejor opci&oacute;n</h2>

  
  <div class="sidebar_info secciones">
        <h3>MISI&Oacute;N</h3>
    <p>Contribuir a que M&eacute;xico SONR&Iacute;A.</p>
    <h3>VISI&Oacute;N</h3>
    <p>Ser la cadena l&iacute;der en salud y est&eacute;tica oral en M&eacute;xico.</p>
    <h3>COMPROMISO</h3>
    <p>Garantizar la soluci&oacute;n a tus necesidades de salud oral con los mejores especialistas, en el mejor lugar y en el momento que lo necesites.</p>
    <p>Buscamos superar las expectativas de nuestros pacientes y garantizar la prestaci&oacute;n de servicios de manera segura, efectiva, oportuna, eficiente, equitativa con un equipo humano dispuesto e id&oacute;neo que busca siempre la excelencia.</p>
    <p>Tenemos un compromiso con la calidad y el mejoramiento continuo de nuestros procesos odontol&oacute;gicos.</p>
  </div></div>
    <?php } ?>
    
    <?php if ($sec=="privacidad"){ ?>
  <div class="sidebarRight">
 
  <h1 class="titulos">AVISO DE PRIVACIDAD</h1>
  <h2 class="titulos">En Sonria cuidamos tu informaci&oacute;n </h2>
  <div class="sidebar_info secciones" style="width:650px; overflow: auto; height:445px;">
    <p><strong>Cl&iacute;nicas Dentales Sonr&iacute;a S.A. de  C.V.</strong> con  domicilio en Tonal&aacute; n&uacute;m. 6 P.B. Colonia Roma Norte, Delegaci&oacute;n Cuauht&eacute;moc, C.P.  06700, Distrito Federal, es el responsable del uso y protecci&oacute;n de sus datos  personales, y al respecto le informa lo siguiente:<br />
      Su informaci&oacute;n  est&aacute; segura con nosotros. Cl&iacute;nicas Dentales Sonr&iacute;a<strong> </strong>se compromete a asegurar la confidencialidad/privacidad de la  informaci&oacute;n personal obtenida a trav&eacute;s de sus servicios en l&iacute;nea. Le sugerimos  leer la normativa descrita a continuaci&oacute;n, para entender el tratamiento de su  informaci&oacute;n personal cuando utiliza nuestros servicios en los sitios de Cl&iacute;nicas  Dentales Sonr&iacute;a. Estas normas de confidencialidad pueden tener cambios en el  futuro, por lo que se recomienda revisarlas peri&oacute;dicamente.<br />
  <strong>1.- Tipo de informaci&oacute;n personal  que se obtiene</strong>. En Cl&iacute;nicas Dentales Sonr&iacute;a recabamos informaci&oacute;n desde distintas  &aacute;reas de nuestro sitio web. La informaci&oacute;n personal que el usuario ingresa  voluntariamente a nuestro sitio, la creaci&oacute;n del perfil personal, la  inscripci&oacute;n al servicio de notificaci&oacute;n de ofertas especiales a trav&eacute;s de  correo electr&oacute;nico, el registro a nuestros programas de lealtad, el env&iacute;o de  informaci&oacute;n electr&oacute;nica, as&iacute; como la informaci&oacute;n que ingresa durante su  participaci&oacute;n en los concursos&nbsp; y  encuestas que realizamos a cabo ocasionalmente, se encuentra sujeta a las  normas de confidencialidad y privacidad, que establece &nbsp;la Ley Federal de Protecci&oacute;n de Datos en  Posesi&oacute;n de los Particulares.<br />
      Para cada  uno de estos programas, la informaci&oacute;n solicitada se almacena en bases de datos  separadas. <br />
  <u>Contacto  en l&iacute;nea:</u> La  informaci&oacute;n solicitada en esta secci&oacute;n permite a Cl&iacute;nicas Dentales Sonr&iacute;a  contactar a los pacientes cuando sea necesario. Entre la informaci&oacute;n solicitada  al usuario se encuentra: nombre, apellido, direcci&oacute;n, direcci&oacute;n de correo  electr&oacute;nico y n&uacute;mero telef&oacute;nico. Los usuarios pueden ser contactados por  tel&eacute;fono o correo electr&oacute;nico si se requiriera informaci&oacute;n adicional para  completar alguna transacci&oacute;n. <br />
  <u>Programa  de notificaci&oacute;n de ofertas a trav&eacute;s de correo electr&oacute;nico.</u> La informaci&oacute;n que los  visitantes nos proporcionan incluye: nombre, apellido, direcci&oacute;n de correo  electr&oacute;nico, direcci&oacute;n, pa&iacute;s, n&uacute;mero de tel&eacute;fono, preferencias y h&aacute;bitos, entre  otros. El usuario puede modificar esta informaci&oacute;n en cualquier momento y ser&aacute;  empleada para adecuar las promociones y avisos enviados a las preferencias  indicadas por &eacute;l mismo.<br />
  <u>Env&iacute;o de postales electr&oacute;nicas.</u> La informaci&oacute;n que los  visitantes nos proporcionan incluye: nombre del remitente, direcci&oacute;n de correo  electr&oacute;nico del remitente, nombre del destinatario, direcci&oacute;n de correo  electr&oacute;nico del destinatario, rango de edad, pa&iacute;s, sexo y c&oacute;digo postal. Esta  informaci&oacute;n ser&aacute; empleada para adecuar las promociones y avisos enviados al paciente. <br />
  <u>Concursos  y encuestas en l&iacute;nea. </u>El tipo de informaci&oacute;n solicitada por estos medios podr&aacute;  incluir de forma enunciativa m&aacute;s no limitativa, datos personales, h&aacute;bitos y  preferencias, opiniones acerca de los servicios de nuestros sitios y  comentarios acerca de servicios propuestos. La informaci&oacute;n recabada ser&aacute; para  uso exclusivo de Cl&iacute;nicas Dentales Sonr&iacute;a &nbsp;y tendr&aacute; como finalidad la retroalimentaci&oacute;n  de los usuarios acerca de los servicios que prestamos con el objetivo de  mejorarlos. <br />
      Despu&eacute;s  de que la informaci&oacute;n llega a Cl&iacute;nicas Dentales Sonr&iacute;a, es almacenada en un  servidor seguro que reside atr&aacute;s de un firewall  dise&ntilde;ado para obstaculizar el acceso desde afuera de la compa&ntilde;&iacute;a.  Desafortunadamente, ninguna transmisi&oacute;n por Internet puede garantizar su  seguridad al 100%. Por lo tanto, aunque Cl&iacute;nicas Dentales Sonr&iacute;a se esfuerce en  proteger su informaci&oacute;n personal, no puede asegurar ni garantizar la seguridad  en la transmisi&oacute;n de ninguna informaci&oacute;n relacionada con ninguno de nuestros  servicios en l&iacute;nea, por lo tanto, usted reconoce y acepta dichos riesgos al  proporcionar informaci&oacute;n en nuestros servicios en l&iacute;nea. Una vez recibidos los  datos, haremos todo lo posible para salvaguardar su seguridad en nuestros  sistemas. En este tema, el equipo de colaboradores de Cl&iacute;nicas Dentales Sonr&iacute;a  ha enfocado sus esfuerzos para ofrecer la tecnolog&iacute;a necesaria y actualizada a  fin de ofrecerle la mayor seguridad posible.<br />
  <strong>2.- &iquest;C&oacute;mo se utiliza su  informaci&oacute;n personal?</strong> Cl&iacute;nicas Dentales Sonr&iacute;a &nbsp;utiliza la informaci&oacute;n suministrada durante el  proceso de registro de perfil, inscripci&oacute;n a alg&uacute;n programa y promociones para  realizar estudios internos sobre los datos demogr&aacute;ficos, intereses y comportamiento  de nuestros usuarios; &nbsp;este estudio se  compila y analiza en conjunto. El objetivo m&aacute;s importante de Cl&iacute;nicas Dentales  Sonr&iacute;a al recoger datos personales es entender y proporcionar al usuario una  experiencia m&aacute;s satisfactoria al visitar nuestros sitios y adquirir nuestros  servicios, ya que al conocer m&aacute;s a nuestros visitantes podemos proporcionarles  productos acordes a sus necesidades, as&iacute; como contenido y publicidad m&aacute;s  adecuados. <br />
      Al  recabar los datos del usuario en l&iacute;nea, podemos elaborar estad&iacute;sticas internas  que nos indiquen cu&aacute;les son los servicios y productos m&aacute;s apreciados por  diferentes segmentos de usuarios, igualmente nos sirve para dar la formalidad  debida al proceso transaccional. <br />
      En  nuestro programa de notificaci&oacute;n de ofertas a trav&eacute;s de correo electr&oacute;nico,  s&oacute;lo Cl&iacute;nicas Dentales Sonr&iacute;a tiene acceso a la informaci&oacute;n recabada. Este tipo  de publicidad se realiza mediante avisos y mensajes promocionales de correo  electr&oacute;nico, los cuales s&oacute;lo ser&aacute;n enviados a usted, si al momento de  registrarse usted indic&oacute; que desear&iacute;a recibirlos,  esta indicaci&oacute;n podr&aacute; usted modificarla en cualquier momento. <br />
      Adem&aacute;s de  solicitar informaci&oacute;n durante los procesos de registro antes mencionados, le  podremos solicitar informaci&oacute;n personal en otras ocasiones que de manera  enunciativa, m&aacute;s no limitativa podr&iacute;an ser, al participar en un concurso o en  cualquier promoci&oacute;n de nuestro sitio y al notificarnos sobre un problema con  nuestro sitio o servicios.<br />
      Cl&iacute;nicas Dentales Sonr&iacute;a tambi&eacute;n realiza  encuestas entre sus usuarios en l&iacute;nea, cuyas respuestas son utilizadas en estudios  internos.<br />
  <strong>3.- &iquest;Qu&eacute; son los cookies y c&oacute;mo  se utilizan? </strong>Los cookies son peque&ntilde;as piezas de informaci&oacute;n que son enviadas por el  sitio Web a su navegador. Los cookies se almacenan en el disco duro de su  equipo y se utilizan para determinar sus preferencias cuando se conecta a los  servicios de nuestros sitios, as&iacute; como para rastrear determinados  comportamientos o actividades llevadas a cabo por usted dentro de nuestros  sitios. En algunas secciones de nuestro sitio requerimos que el paciente tenga  habilitados los cookies ya que algunas de las funcionalidades requieren de  &eacute;stas para trabajar. Los cookies nos permiten: a) reconocerlo al momento de  entrar a nuestros sitios y ofrecerle una experiencia personalizada, b) conocer  la configuraci&oacute;n personal del sitio especificada por usted, por ejemplo, los  cookies nos permiten detectar el ancho de banda que usted ha seleccionado al  momento de ingresar al home page de nuestros sitios, de tal forma que sabemos  qu&eacute; tipo de informaci&oacute;n es aconsejable descargar, c) calcular el tama&ntilde;o de  nuestra audiencia y medir algunos par&aacute;metros de tr&aacute;fico, pues cada navegador  que obtiene acceso a nuestros sitios adquiere un cookie que se usa para  determinar la frecuencia de uso y las secciones de los sitios visitados,  reflejando as&iacute; sus h&aacute;bitos y preferencias, informaci&oacute;n que nos es &uacute;til para  mejorar el contenido, los titulares y las promociones para los usuarios. Los  cookies tambi&eacute;n nos ayudan a rastrear algunas actividades, por ejemplo, en  algunas de las encuestas que lanzamos en l&iacute;nea, podemos utilizar cookies para  detectar si el usuario ya ha llenado la encuesta y evitar desplegarla  nuevamente en caso de que lo haya hecho. <br />
  <strong>4.- Confidencialidad de la  informaci&oacute;n.</strong> Cuando se encuentre en el sitio de Cl&iacute;nicas Dentales Sonr&iacute;a y le pidan  datos personales, usted compartir&aacute; la informaci&oacute;n s&oacute;lo con Cl&iacute;nicas Dentales  Sonr&iacute;a, salvo que se especifique lo contrario. Cl&iacute;nicas Dentales Sonr&iacute;a no  compartir&aacute; la informaci&oacute;n confidencial con terceras partes, excepto que tenga  expresa autorizaci&oacute;n de quienes se suscribieron, o cuando haya sido requerido  por orden judicial para cumplir con las disposiciones procesales, en cuyo caso,  le ser&aacute; notificado al usuario de la inminente entrega de la informaci&oacute;n a la  autoridad correspondiente. Cl&iacute;nicas Dentales Sonr&iacute;a la proporcionar&aacute; tratando  de conservar la debida confidencialidad, sin embargo, Cl&iacute;nicas Dentales Sonr&iacute;a  se deslinda de toda responsabilidad por el uso diverso que le diera a dicha  informaci&oacute;n la Autoridad que la haya solicitado.<br />
      Cl&iacute;nicas  Dentales Sonr&iacute;a no vende ni alquila la informaci&oacute;n de los usuarios. Si los  datos personales del usuario debieran ser compartidos con socios comerciales o  patrocinantes, el usuario ser&aacute; notificado antes que &eacute;stos sean recogidos o  transferidos. Si el usuario no desea que sus datos sean compartidos, puede  decidir no utilizar un servicio determinado o no participar en algunas  promociones o concursos. Cl&iacute;nicas Dentales Sonr&iacute;a puede difundir las  estad&iacute;sticas en conjunto de los usuarios (como el porcentaje de nuestros  usuarios que son hombres o mayores a determinada edad, etc.) para describir  nuestros servicios y para otros prop&oacute;sitos l&iacute;citos en los casos que marque la  ley. Cl&iacute;nicas Dentales Sonr&iacute;a puede difundir la informaci&oacute;n de la cuenta en  casos especiales cuando se llegue a la conclusi&oacute;n de que proporcionar esta  informaci&oacute;n puede servir para identificar, localizar o realizar acciones  legales contra personas que pudiesen infringir las condiciones del servicio del  sitios de Cl&iacute;nicas Dentales Sonr&iacute;a o causar da&ntilde;os o interferencia sobre los  derechos de Cl&iacute;nicas Dentales Sonr&iacute;a o sus propiedades, de otros usuarios del  sitios de Cl&iacute;nicas Dentales Sonr&iacute;a o de cualquier otra persona que pudiese  resultar perjudicada por dichas actividades. Cl&iacute;nicas Dentales Sonr&iacute;a puede  difundir u obtener acceso a la informaci&oacute;n de cuenta cuando, actuando de buena  fe se considere que es necesario por razones legales, administrativas o de otra  &iacute;ndole y lo consideremos necesario para mantener, proporcionar y desarrollar  nuestros productos y servicios. Cl&iacute;nicas Dentales Sonr&iacute;a no asume ninguna  obligaci&oacute;n de mantener confidencial cualquier otra informaci&oacute;n que el usuario  proporcione, incluyendo de manera enunciativa mas no limitativa, aquella  informaci&oacute;n que el usuario proporcione a trav&eacute;s de boletines y pl&aacute;ticas en  l&iacute;nea (chats), as&iacute; como la informaci&oacute;n que obtenga a trav&eacute;s de los cookies que  se describen en el inciso 3; lo anterior en t&eacute;rminos de lo establecido en el  art&iacute;culo 109 de la Ley Federal de los Derechos de Autor y de la fracci&oacute;n I, del  art&iacute;culo 76 bis de la Ley Federal de Protecci&oacute;n al Consumidor.<br />
  <strong>5.- Modificaci&oacute;n / actualizaci&oacute;n  de la informaci&oacute;n</strong>. Los datos personales proporcionados por el usuario formar&aacute;n parte de  un archivo que contendr&aacute; su perfil. El usuario puede modificar su perfil en  cualquier momento utilizando su n&uacute;mero de tarjeta y su n&uacute;mero de identificaci&oacute;n  personal asignados o que &eacute;l mismo eligi&oacute;. Cl&iacute;nicas Dentales Sonr&iacute;a aconseja al  usuario que actualice sus datos cada vez que &eacute;stos sufran alguna modificaci&oacute;n,  ya que esto permitir&aacute; brindarle un servicio m&aacute;s personalizado. Si usted  participa en el servicio de promociones v&iacute;a correo electr&oacute;nico podr&aacute; en  cualquier momento desactivar el servicio.<br />
  <strong>6.- Protecci&oacute;n de la  informaci&oacute;n personal.</strong> La informaci&oacute;n proporcionada por el  usuario, est&aacute; asegurada por un n&uacute;mero de identificaci&oacute;n personal al cual s&oacute;lo  el usuario podr&aacute; acceder y de la cual s&oacute;lo &eacute;l tiene conocimiento. Le recomendamos  que no revele su contrase&ntilde;a a nadie. Cl&iacute;nicas Dentales Sonr&iacute;a no solicitar&aacute; su  contrase&ntilde;a en ninguna llamada telef&oacute;nica o mensaje de correo no solicitados. En  todo momento, el usuario es el responsable &uacute;nico y final de mantener en secreto  su n&uacute;mero de usuario / socio, contrase&ntilde;a personal, clave de acceso y n&uacute;mero  confidencial con los cuales tenga acceso a los servicios y contenidos de  nuestro sitio. Para disminuir los riesgos Cl&iacute;nicas Dentales Sonr&iacute;a recomienda  al usuario salir de su cuenta y cerrar la ventana de su navegador cuando  finalice su actividad, m&aacute;s a&uacute;n si comparte su computadora con alguien o utiliza  una computadora en un lugar p&uacute;blico como una biblioteca o un caf&eacute; Internet. Cl&iacute;nicas  Dentales Sonr&iacute;a no ser&aacute; responsable por el m&aacute;s uso de la informaci&oacute;n  proporcionada por el usuario en el caso de que &eacute;ste revele su contrase&ntilde;a,  n&uacute;mero de usuario/socio, clave de acceso y n&uacute;mero confidencial de acceso a persona  diversa. <br />
      Una  vez recibidos los datos, haremos todo lo posible para salvaguardar su seguridad  en nuestros sistemas. En este tema, el equipo de colaboradores de Cl&iacute;nicas  Dentales Sonr&iacute;a ha enfocado sus esfuerzos para ofrecer la tecnolog&iacute;a m&aacute;s  moderna y actualizada a fin de ofrecerle la mayor seguridad posible.<br />
  <strong>7.- Confidencialidad de los menores.</strong> La salvaguarda de la informaci&oacute;n  personal infantil es extremadamente importante. Cl&iacute;nicas Dentales Sonr&iacute;a recauda  el m&iacute;nimo indispensable de esa informaci&oacute;n necesaria para brindar sus  servicios. Cl&iacute;nicas Dentales Sonr&iacute;a no solicita informaci&oacute;n de identificaci&oacute;n  personal a los menores. Los menores siempre deben solicitar permiso a sus  padres antes de enviar informaci&oacute;n personal a otro usuario que se encuentre en  l&iacute;nea.<br />
  <strong>8.- Aceptaci&oacute;n de los t&eacute;rminos</strong>. Esta declaraci&oacute;n de Confidencialidad  / Privacidad est&aacute; sujeta a los t&eacute;rminos y condiciones de Cl&iacute;nicas Dentales  Sonr&iacute;a, lo cual constituye un acuerdo legal entre el usuario y Cl&iacute;nicas  Dentales Sonr&iacute;a. Si el usuario utiliza los servicios de  Cl&iacute;nicas Dentales Sonr&iacute;a en cualquiera de sus sitios, significa que ha le&iacute;do,  entendido y acordado los t&eacute;rminos antes expuestos. Si no est&aacute; de acuerdo con ellos, el usuario no deber&aacute;  proporcionar ninguna informaci&oacute;n personal, ni utilizar los servicios de los  sitios de Cl&iacute;nicas Dentales Sonr&iacute;a.<br />
  <strong>9.- Principios m&iacute;nimos de nuestra  pol&iacute;tica de privacidad / confidencialidad</strong>. A continuaci&oacute;n, Cl&iacute;nicas  Dentales Sonr&iacute;a le expondr&aacute; brevemente los principios que rigen sus pol&iacute;ticas  de privacidad y confidencialidad para la informaci&oacute;n proporcionada por los  usuarios de sus servicios electr&oacute;nicos en l&iacute;nea:<br />
      a) Cl&iacute;nicas  Dentales Sonr&iacute;a &uacute;nicamente recabar&aacute; la informaci&oacute;n del paciente que es  necesaria para brindarle los servicios personalizados que se encuentran  disponibles en sus sitios en Internet, la cual se utilizar&aacute; &uacute;nicamente para los  fines que es solicitada.<br />
      b) Cl&iacute;nicas Dentales Sonr&iacute;a se esfuerza por asegurar la calidad de la  informaci&oacute;n que se recaba sobre nuestros usuarios de servicios en l&iacute;nea,  particularmente cuando se haya obtenido al trav&eacute;s de alg&uacute;n proveedor de  informaci&oacute;n o de servicios.<br />
      c) Cl&iacute;nicas Dentales Sonr&iacute;a enfoca sus esfuerzos para ofrecer la tecnolog&iacute;a necesaria  y actualizada a fin de ofrecer a sus pacientes/usuarios la mayor seguridad  posible en el manejo y transferencia de la informaci&oacute;n que es requerida en los  diversos procesos de requerimiento de datos.<br />
      d) Cl&iacute;nicas Dentales Sonr&iacute;a evita la divulgaci&oacute;n de informaci&oacute;n acerca del paciente/usuario,  haci&eacute;ndolo &uacute;nicamente respecto de aquellos datos que expresamente sean  autorizados para ello.<br />
      e) En todo momento, Cl&iacute;nicas Dentales Sonr&iacute;a est&aacute; atento a las inquietudes que  manifiesten nuestros pacientes/usuarios respecto al manejo de la informaci&oacute;n  que proporcionen para los diversos procesos en l&iacute;nea.<br />
      f) Cl&iacute;nicas Dentales Sonr&iacute;a cuida de que estos principios de  privacidad/confidencialidad se extiendan al conjunto de relaciones comerciales  al interior del grupo.<br />
      g) Cl&iacute;nicas Dentales Sonr&iacute;a comparte la responsabilidad del cuidado de la  informaci&oacute;n con sus empleados, haci&eacute;ndolos copart&iacute;cipes de los lineamientos  expuestos en los documentos de &quot;Pol&iacute;ticas de  privacidad/confidencialidad&quot;.</p>

  </div></div>
  
  
    <?php } ?>
    
        <?php if ($sec=="novedades"){ ?>
  <div class="sidebarRight" style="width:616px; height:572px;">

  <?php if ($row_novedades['novedades_titulo'] == "<img src='img/logo_invisalign.png' width='200' />"){ ?><h1 class="novedades" style="background:#fff; padding:0; padding-top:10px"><?php echo $row_novedades['novedades_titulo']; ?></h1>
  <?php }else{?>
  <h1 class="novedades"><?php echo $row_novedades['novedades_titulo']; ?></h1>
  <?php }?>
  
    <?php if ($row_novedades['novedades_titulo'] == "<img src='img/logo_invisalign.png' width='200' />"){ ?>
    <h2 class="novedades" style="margin-top:290px;"><?php echo $row_novedades['novedades_subtitulo']; ?></h2>
	<?php }else{?>
    <h2 class="novedades"><?php echo $row_novedades['novedades_subtitulo']; ?></h2>
    <?php }?>
    
    <div class="novedad_img">
  <img src="img/<?php echo $row_novedades['novedades_img']; ?>" height="224" />
  </div>
  
  <?php if ($row_novedades['novedades_titulo'] == "<img src='img/logo_invisalign.png' width='200' />"){ ?>
  <div class="sidebar_info novedades_info" style="margin-top:108px;"><?php echo $row_novedades['novedades_desc']; ?></div>
  <?php }else{  ?>
  <div class="sidebar_info novedades_info"><?php echo $row_novedades['novedades_desc']; ?></div>
  <?php }?>
  
  </div>

    <?php include("pie_home.php"); ?>  

<?php } ?>
    
            <?php if ($sec=="novedades2"){ ?>
  <div class="sidebarRight" style="width:616px; height:572px;">
 
  <h1 class="novedades">Tratamiento reconstructivo periodental</h1>
  <h2 class="novedades">Regeneraci&oacute;n de hueso y/o enc&iacute;as</h2><img src="img/novedades2.jpg" />
  <div class="sidebar_info novedades_info">
    <p>El principal objetivo  de este tratamiento es salvar los dientes <br />
    La periodontitis es  una enfermedad inflamatoria&nbsp; de los  tejidos de soporte dentario (enc&iacute;as y hueso maxilar).</p>
    <p> Algunas consecuencias  de esta enfermedad&nbsp; como: retracci&oacute;n de  la enc&iacute;a, p&eacute;rdida de hueso maxilar, aflojamiento de un diente y en el peor de  los casos la p&eacute;rdida de los mismos, podr&iacute;an requerir del tratamiento de  regeneraci&oacute;n periodental.</p>
    <p>      El paciente deber&aacute;  ser&nbsp; valorado por un especialista para  determinar si este tratamiento estar&iacute;a indicado en su caso.</p>
  </div></div>

    <?php include("pie_home.php"); ?>  

    <?php } ?>
    
            <?php if ($sec=="novedades3"){ ?>
  <div class="sidebarRight" style="width:616px; height:572px;">
 
  <h1 class="novedades">Invisalign&reg;</h1>
  <h2 class="novedades">Tecnolog&iacute;a de punta en ortodoncia</h2><img src="img/novedades3.jpg" />
  <div class="sidebar_info novedades_info">
    <p ><strong>La m&aacute;s moderna soluci&oacute;n para tu sonrisa.</strong></p>
    <p >      La comodidad y el  f&aacute;cil uso del sistema Invisalign&reg; lo han convertido en la elecci&oacute;n para el  tratamiento de ortodoncia de muchos j&oacute;venes y adultos.</p>
    <p >      La mayor&iacute;a de la  gente ni siquiera notar&aacute; que est&aacute; en tratamiento.</p>
    <p > No interfiere con  estilo de vida.</p>
    <p > Sin alambres ni  aparatos met&aacute;licos que irriten su boca y, lo mejor de todo, casi nadie notar&aacute;  que est&aacute; en tratamiento. Invisalign&reg;, la alternativa evidente a los aparatos  fijos, elegida por las personas que desean una bonita sonrisa </p>
<p>&nbsp;</p>
      

</div></div>

    <?php include("pie_home.php"); ?>  

    <?php } ?>
    
     <?php if ($sec=="convenios"){ ?>
<div class="sidebarRight">
 
  <h1 class="titulos">SONRISAS ALIADAS</h1>
  <h2 class="titulos">Beneficios para clientes corporativos</h2>
  <div class="sidebar_info secciones" style="width:650px; overflow: auto; height:445px;">
    <p>
<!--    <div class="logos"><img src="convenios/7eleven_03.jpg" width="41" height="40" /></div> -->
<!--    <div class="logos"><img src="convenios/adecco_03.jpg" width="77" height="42" /></div> -->
<!--    <div class="logos"><img src="convenios/bimbo_03.jpg" width="70" height="62" /></div>  -->
<!--    <div class="logos"><img src="convenios/cablemas_03.jpg" width="113" height="28" /></div> -->
<!--    <div class="logos"><img src="convenios/carvajal_03.jpg" width="122" height="33" /></div> -->
<!--    <div class="logos"><img src="convenios/convidien_03.jpg" width="53" height="48" /></div> -->
<!--    <div class="logos"><img src="convenios/chevrolet_03.jpg" width="76" height="40" /></div> -->
    <div class="logos"><img src="convenios/dentegra_03.jpg" width="80" height="41" /></div>
<!--    <div class="logos"><img src="convenios/fondodecultura_03.jpg" width="99" height="48" /></div>  -->
    <div class="logos"><img src="convenios/fresenius_03.jpg" width="113" height="49" /></div>
    <div class="logos"><img src="convenios/gandhi_03.jpg" width="108" height="37" /></div>
    <div class="logos"><img src="convenios/hildebrando_03.jpg" width="94" height="23" /></div>
    <div class="logos"><img src="convenios/liverpool_03.jpg" width="110" height="25" /></div>
    <div class="logos"><img src="convenios/mas_03.jpg" width="59" height="97" /></div>
    <div class="logos"><img src="convenios/medica_03.jpg" width="62" height="40" /></div>
    <div class="logos"><img src="convenios/medicalhome_03.jpg" width="138" height="27" /></div>
<!--    <div class="logos"><img src="convenios/olab_03.jpg" width="91" height="47" /></div>    -->
<!--    <div class="logos"><img src="convenios/policiafederal_03.jpg" width="40" height="41" /></div>  -->
<!--    <div class="logos"><img src="convenios/questdiagnostics_03.jpg" width="118" height="42" /></div>   -->
    <div class="logos"><img src="convenios/redangel_03.jpg" width="84" height="55" /></div>
    <div class="logos"><img src="convenios/sams_03.jpg" width="45" height="45" /></div>
    <div class="logos"><img src="convenios/scouts_03.jpg" width="108" height="44" /></div>
    <div class="logos"><img src="convenios/tdm_03.jpg" width="81" height="30" /></div>
    <div class="logos"><img src="convenios/tdu_03.jpg" width="57" height="37" /></div>
<!--    <div class="logos"><img src="convenios/televisa_03.jpg" width="63" height="49" /></div>   -->
<!--    <div class="logos"><img src="convenios/triangulo_03.jpg" width="51" height="48" /></div>   -->
    <div class="logos"><img src="convenios/unitec_03.jpg" width="103" height="36" /></div>
    <div class="logos"><img src="convenios/uvm_03.jpg" width="149" height="28" /></div>
<!--    <div class="logos"><img src="convenios/walmart_03.jpg" width="113" height="17" /></div></p> -->

</div></div>
  
  
    <?php } ?>
    
    
    <?php if ($sec=="consulta"){ ?>
  <div class="sidebarRight" style="background:url(img/back_consulta.jpg)" >
 
  <h1 class="titulos">CONSULTA</h1>
  <h2 class="titulos">de Valoraci&oacute;n!</h2>

  
  <div class="sidebar_info secciones">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
    <p>Durante la consulta de valoraci&oacute;n se utiliza una c&aacute;mara intraoral, estas im&aacute;genes de extraordinaria nitidez y claridad ayudan al m&eacute;dico odont&oacute;logo en el diagn&oacute;stico y permiten que el paciente visualice el desarrollo del trabajo que se est&aacute; realizando.</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>


          <h4 style="font-size:24px; text-align:left;">No esperes m&aacute;s para iniciar tu tratamiento odontol&oacute;gico
      </h4>
  </div></div>
    <?php } ?>
    
    
    
    
    
    <?php if ($sec=="unete"){ ?>
  <div class="sidebarRight" style="background:url(img/back_unete.jpg)" >
 
  <h1 class="titulos">&Uacute;NETE!</h1>
  <h2 class="titulos">a nuestro equipo de trabajo!</h2>

  
  <div class="sidebar_info secciones" style="margin-top:">
    
    <p>La misi&oacute;n de Cl&iacute;nicas Dentales es contribuir a que M&eacute;xico Sonr&iacute;a, somos un grupo de personas emprendedoras, en donde el respeto, la honestidad, la actitud de servicio, la responsabilidad, el compromiso y la lealtad contribuyen a la excelencia de Cl&iacute;nicas Dentales Sonr&iacute;a.</p>
  </div>
  <div class="sidebar_info secciones" style="margin-left:30px; margin-top:60px;">
    <h4>CL&Iacute;NICAS DENTALES</h4>
    <p>Contamos con 11 Cl&iacute;nicas para ubicarte cerca de tu domicilio, contamos con horarios de tiempo completo y medio tiempo.</p>
    <h4>OFICINAS</h4>
    <p>Nuestras oficinas se encuentran en la calle de Tonal&aacute; no. 6, col. Roma, Delegaci&oacute;n Cuauht&eacute;moc, M&eacute;xico D.F., C.P. 06700.</p>
  </div>
  
  </div>
    <?php } ?>
    
        <?php if ($sec=="sucursales"){ ?>
  <div class="sidebarRight" >
  
  <h1 class="titulos">UNA SUCURSAL CERCA DE TI</h1>
<div class="sidebar_info secciones" style="margin-top:80px; width:650px; " >
  
  <?php do { ?>

  
    <div class="sucursal">
      <a href="?s=sucursal&id=<?php echo $row_sucrusales_seccion['sucursal_id']; ?>">
      <div class="img"><img src="sucursales/thumb_<?php echo $row_sucrusales_seccion['img']; ?>"  alt="" /></div>
        CL&Iacute;NICA <?php echo $row_sucrusales_seccion['sucursal']; ?></a> </div>
    <?php } while ($row_sucrusales_seccion = mysql_fetch_assoc($sucrusales_seccion)); ?>
<!--<div class="sucursal">
  <a href="?s=sucursal_coapa"><img src="sucursales/coapa.jpg"  alt="" /><br /> 
    CL&Iacute;NICA COAPA</a> </div>  
    <div class="sucursal">
    <a href="?s=sucursal_valle"><img src="sucursales/valle.jpg"  alt="" /><br />
      CL&Iacute;NICA DEL VALLE</a></div>    
    
    <div class="sucursal">
  <a href="?s=sucursal_lindavista"><img src="sucursales/lindavista.jpg"  alt="" /><br />
    CL&Iacute;NICA LINDAVISTA</a>
    </div>
<div class="sucursal">
  <a href="?s=sucursal_neza"><img src="sucursales/neza.jpg"  alt="" /><br /> 
    CL&Iacute;NICA NEZA</a> </div>    
    
        <div class="sucursal">
    <a href="?s=sucursal_roma"><img src="sucursales/roma.jpg"  alt="" /><br />
      CL&Iacute;NICA ROMA</a></div>
    
    <div class="sucursal">
    <a href="?s=sucursal_tasquena"><img src="sucursales/taxquena.jpg"  alt="" /><br />
      CL&Iacute;NICA TAXQUE&Ntilde;A</a></div>-->
  

  

  
</div>
  
</div>
    <?php } ?>
    
    <?php if ($sec=="sucursal"){ ?>
  <div class="sidebarRight clinicas">
 
  <h1 ><?php echo $row_sucursales['sucursal']; ?></h1>
  <h2 >Cl&iacute;nica</h2>

  
  <div class="sidebar_info secciones" style="margin-top:">
    
    <div><?php echo $row_sucursales['sucursal_direccion']; ?></div>
<p style="margin-top:0;"><strong>Tel. <?php echo $row_sucursales['sucursal_tel']; ?> </strong></p>

    <div><?php echo $row_sucursales['sucursal_mapa']; ?></div>
  </div>
  <div class="sidebar_info secciones" style="margin-left:30px; margin-top:50px;">
    
        <h3>GALER&Iacute;A </h3>
    <div style="clear:both; height:10px;"></div>
    
    <?php do { ?>
      <a rel="example_group" href="sucursales/<?php echo $row_img_sucursales['img']; ?>">
      <div class="thumbs"><img alt="example4" src="sucursales/thumb_<?php echo $row_img_sucursales['img']; ?>" /></div>
      </a>
      <?php } while ($row_img_sucursales = mysql_fetch_assoc($img_sucursales)); ?>
    
    
  
  </div>
  
  </div>
    <?php } ?>
    
      
    
  <?php if ($sec=="acerca2"){ ?>
  <div class="sidebarRight" >
  <img src="img/imagn_03.png" />
  <h1>ACERCA DE SONR&Iacute;A</h1>
  <h2>Somos tu mejor opci&oacute;n!</h2>
  
  <div class="sidebar_info">
  <ul>
    <li>Especialidades en cada cl&iacute;nica: <br />
      Ortodoncia, Periodoncia, Endodoncia, Pr&oacute;tesis, Odontopediatr&iacute;a, Cirug&iacute;a y Odontolog&iacute;a general.</li>
    <li>Excelentes especialistas acreditados por las mejores universidades del pa&iacute;s siempre a la vanguardia en los avances cient&iacute;ficos.</li>
    <li>Atenci&oacute;n inmediata y alta disponibilidad de nuestros especialistas.</li>
    <li>Alta tecnolog&iacute;a de punta y con los mejores materiales a nivel mundial.</li>
    <li>Ofrecemos garant&iacute;a por escrito.</li>
    <li>Ofrecemos precios muy competitivos.</li>
    <li>Facilidades de pago; tarjetas de cr&eacute;dito, debito, meses <br />
      sin intereses, efectivo.</li>
    <li>Cada una de nuestras cl&iacute;nicas est&aacute; dise&ntilde;ada para cumplir con las m&aacute;s exigentes normas de bioseguridad de acuerdo con los est&aacute;ndares internacionales.</li>
    <li>7 cl&iacute;nicas en el DF y &aacute;rea metropolitana: Roma, Lindavista, Taxque&ntilde;a, Neza, Arag&oacute;n , Coapa, Del Valle</li>
    <li>Porque t&uacute; eres lo m&aacute;s importante para nosotros y sabemos que tu tiempo es valioso, te ofrecemos los siguientes horarios:</li>
  </ul>
  </div>
  
  <div class="sidebar_info" style="margin-top:-10px; margin-left:10px;">
    <h3>MISI&Oacute;N</h3>
    <p>Contribuir a que M&eacute;xico SONR&Iacute;A.</p>
    <h3>VISI&Oacute;N</h3>
    <p>Ser la cadena l&iacute;der en salud y est&eacute;tica oral en M&eacute;xico.</p>
    <h3>COMPROMISO</h3>
    <p>Garantizar la soluci&oacute;n a tus necesidades de salud oral con los mejores especialistas, en el mejor lugar y en el momento que lo necesites.</p>
    <p>Buscamos superar las expectativas de nuestros pacientes y garantizar la prestaci&oacute;n de servicios de manera segura, efectiva, oportuna, eficiente, equitativa con un equipo humano dispuesto e id&oacute;neo que busca siempre la excelencia.</p>
    <p>Tenemos un compromiso con la calidad y el mejoramiento continuo de nuestros procesos odontol&oacute;gicos.</p>
<div class="horarios">Lunes a viernes de 11:00 a 20:00<br />
S&aacute;bados de 9:00 a 18:00</div>
  </div>
  
  </div>
    <?php } ?>
    
    
    
  
    <div style="clear:both;"></div>
    <div class="submenu">
      <?php do { ?>
        <a <?php if ($sec=="tratamiento" && $_GET["id"] ==$row_tratamientos_botones['tratamiento_id']){; ?> class="activo"<?php }?> href="?s=tratamiento&id=<?php echo $row_tratamientos_botones['tratamiento_id']; ?>">
          <div class="title"><?php echo $row_tratamientos_botones['tratamiento']; ?></div>
          <?php echo $row_tratamientos_botones['tratamiento_subtitulo']; ?></a>
        <?php } while ($row_tratamientos_botones = mysql_fetch_assoc($tratamientos_botones)); ?>
   
    </div>
  <div class="sucursales"><a href="?s=membresia"><img src="img/tarjetamembresia_03.png" width="180" height="132" /></a>
    <div class="texto"><span><strong><a href="?s=sucursales">NUESTRAS SUCURSALES</a></strong></span><a href="?s=sucursales"> siempre cerca de ti</a></div>
  </div>
  <div class="membresia">
 
  <div class="texto"><a href="?s=membresia"><span>Obt&eacute;n tu</span><br /> Membres&iacute;a</a></div>
  <div class="telefono"><a style="font-size:30px; text-decoration:none; color:#FFF" href="tel:%2B525555113400">55 11 34 00</a><a href="https://www.facebook.com/sonriamexico?fref=ts" target="_blank"><img src="img/logoface_03.png" width="32" height="32" alt="facebook" /></a><br />
    <a style="font-size:18px; text-decoration:none; color:#FFF" href="mailto:servicioalcliente@sonria.com.mx">servicioalcliente@sonria.com.mx</a></div>
  
  </div>
  <div class="footer_menu">
  <div class="footer_menu_float"><h1>ACERCA DE SONR&Iacute;A</h1>
    	<a href="?s=mision">Misi&oacute;n, Visi&oacute;n, Compromiso</a><br />
	<a href="?s=unete">Quieres trabajar con nosotros?</a><br />
	<a href="?s=diferentes">Qu&eacute; nos hace diferentes?</a> <br />
	<a href="?s=franquicias_clinicas_dentales_sonria_mexico">Franquicias Sonr&iacute;a</a>

</div>

<div class="footer_menu_float"><h1>NUESTRAS SUCURSALES</h1>
	<?php do { ?>
	  <a href="?s=sucursal&id=<?php echo $row_sucursales_footer['sucursal_id']; ?>" title="Cl&iacute;nica <?php echo $row_sucursales_footer['sucursal']; ?>">Cl&iacute;nica <?php echo $row_sucursales_footer['sucursal']; ?></a><br />
	  <?php } while ($row_sucursales_footer = mysql_fetch_assoc($sucursales_footer)); ?>
</div>

<div class="footer_menu_float">
  <h1>NUESTROS TRATAMIENTOS</h1>
  <?php do { ?>
    <a href="?s=tratamiento&id=<?php echo $row_tratamientos_footer['tratamiento_id']; ?>" title="<?php echo $row_tratamientos_footer['tratamiento']; ?>"><?php echo $row_tratamientos_footer['tratamiento']; ?></a><br />
    <?php } while ($row_tratamientos_footer = mysql_fetch_assoc($tratamientos_footer)); ?>

</div>

<div class="footer_menu_float"><h1>ATENCI&Oacute;N A PACIENTES</h1>
	<a href="?s=membresia">Membres&iacute;a Sonr&iacute;a</a><br />
	<a href="?s=financiamiento">Financiamiento</a><br />
	<a href="?s=pagosonline">Pagos en l&iacute;nea </a><br />  
	<!--<a href="?s=promociones">Promociones</a><br />-->
	<a href="?s=consulta">Consulta de Valoraci&oacute;n</a><br />
	<!--<a href="?s=sugerencias">Sugerencias </a><br />-->
	<a href="?s=privacidad">Aviso de Privacidad </a><br />
	<a href="?s=convenios">Convenios</a><br />
	<a href="?s=franquicias_clinicas_dentales_sonria_mexico">Franquicias Sonr&iacute;a</a> <br /> <br /> <br />
</div>

<div class="footer_menu_float"><h1>CONOCE M&Aacute;S DE...</h1>
	<a href="?s=dolor_de_muela">Dolor de Muela</a><br />
	<a href="?s=gingivitis_inflamacion_encias">Gingivitis</a><br />
	<a href="?s=halitosis_mal_aliento">Mal Aliento</a><br />
	<a href="?s=hipersensibilidad_sensibilidad_en_los_dientes">Hipersensibilidad</a><br />
	<a href="?s=periodontitis">Periodontitis</a><br />
	<a href="?s=sangrado_de_encias">Sangrado de Enc&iacute;as</a><br />
	<a href="?s=terceros_molares_muela_del_juicio">Terceros Molares</a>
</div>

  
    <div class="footer">
    <p>Todos los Derechos Reservados &reg; Sonr&iacute;a 2015</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
  
</div>




</body>
</html>
<?php
if ($sec=="home" || $sec=="novedades"){
mysql_free_result($novedades);
}

if ($sec=="home"){
mysql_free_result($promociones);


mysql_free_result($sucursales);

mysql_free_result($img_sucursales);

mysql_free_result($sucrusales_menu);

mysql_free_result($tratamientos_menu);

mysql_free_result($tratamientos_botones);

mysql_free_result($tratamientos);

mysql_free_result($tratamientos_slider);

mysql_free_result($sucursales_footer);

mysql_free_result($tratamientos_footer);

mysql_free_result($sucrusales_seccion);
}
?>