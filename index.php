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

	  //$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn_sonria, $theValue) : '';


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
mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_novedades = sprintf("SELECT * FROM novedades WHERE novedades_id = %s ORDER BY novedades_id DESC", GetSQLValueString($colname_novedades, "int"));
$novedades = mysqli_query($conn_sonria, $query_novedades) or die(mysql_error());
$row_novedades = mysqli_fetch_array($novedades);
$totalRows_novedades = mysqli_num_rows($novedades);
}

if ($sec=="home"){
mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_promociones = "SELECT * FROM promociones ORDER BY promocion_id DESC";
$promociones = mysqli_query($conn_sonria, $query_promociones) or die(mysql_error());
$row_promociones = mysqli_fetch_array($promociones);
$totalRows_promociones = mysqli_num_rows($promociones);
}

if ($sec=="sucursales"){
mysqli_select_db($conn_sonria, $database_conn_sonria);
//SELECT sucursal_id, sucursal, img FROM sucursales INNER JOIN img_sucursales ON sucursal_id=img_sucursal GROUP BY sucursal_id
$query_sucrusales_seccion = "SELECT suc.sucursal_id, suc.sucursal, imgsuc.img FROM sucursales suc, img_sucursales imgsuc WHERE suc.sucursal_id=imgsuc.img_sucursal";
$sucrusales_seccion = mysqli_query($conn_sonria, $query_sucrusales_seccion) or die(mysql_error());
$row_sucrusales_seccion = mysqli_fetch_array($sucrusales_seccion);
$totalRows_sucrusales_seccion = mysqli_num_rows($sucrusales_seccion);
}

if ($sec=="sucursal"){
	$colname_sucursales = "-1";
	if (isset($_GET['id'])) {
	  $colname_sucursales = $_GET['id'];
	}
	mysqli_select_db($conn_sonria, $database_conn_sonria);
	$query_sucursales = sprintf("SELECT * FROM sucursales WHERE sucursal_id = %s", GetSQLValueString($colname_sucursales, "int"));
	$sucursales = mysqli_query($conn_sonria, $query_sucursales) or die(mysql_error());
	$row_sucursales = mysqli_fetch_array($sucursales);
	$totalRows_sucursales = mysqli_num_rows($sucursales);

	$colname_img_sucursales = "-1";
	if (isset($_GET['id'])) {
	  $colname_img_sucursales = $_GET['id'];
	}
	mysqli_select_db($conn_sonria, $database_conn_sonria);
	$query_img_sucursales = sprintf("SELECT * FROM img_sucursales WHERE img_sucursal = %s", GetSQLValueString($colname_img_sucursales, "int"));
	$img_sucursales = mysqli_query($conn_sonria, $query_img_sucursales) or die(mysql_error());
	$row_img_sucursales = mysqli_fetch_array($img_sucursales);
	$totalRows_img_sucursales = mysqli_num_rows($img_sucursales);
}

mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_sucrusales_menu = "SELECT sucursal_id, sucursal FROM sucursales ORDER BY sucursal ASC";
$sucrusales_menu = mysqli_query($conn_sonria, $query_sucrusales_menu) or die(mysql_error());
$row_sucrusales_menu = mysqli_fetch_array($sucrusales_menu);
$totalRows_sucrusales_menu = mysqli_num_rows($sucrusales_menu);

mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_tratamientos_menu = "SELECT tratamiento_id, tratamiento FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_menu = mysqli_query($conn_sonria, $query_tratamientos_menu) or die(mysql_error());
$row_tratamientos_menu = mysqli_fetch_array($tratamientos_menu);
$totalRows_tratamientos_menu = mysqli_num_rows($tratamientos_menu);

$maxRows_tratamientos_botones = 7;
$pageNum_tratamientos_botones = 0;
if (isset($_GET['pageNum_tratamientos_botones'])) {
  $pageNum_tratamientos_botones = $_GET['pageNum_tratamientos_botones'];
}
$startRow_tratamientos_botones = $pageNum_tratamientos_botones * $maxRows_tratamientos_botones;

mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_tratamientos_botones = "SELECT tratamiento_id, tratamiento, tratamiento_subtitulo, tratamiento_menu FROM tratamientos ORDER BY tratamiento_menu DESC, tratamiento_id ASC";
$query_limit_tratamientos_botones = sprintf("%s LIMIT %d, %d", $query_tratamientos_botones, $startRow_tratamientos_botones, $maxRows_tratamientos_botones);
$tratamientos_botones = mysqli_query($conn_sonria, $query_limit_tratamientos_botones) or die(mysql_error());
$row_tratamientos_botones = mysqli_fetch_array($tratamientos_botones);

if (isset($_GET['totalRows_tratamientos_botones'])) {
  $totalRows_tratamientos_botones = $_GET['totalRows_tratamientos_botones'];
} else {
  $all_tratamientos_botones = mysqli_query($conn_sonria, $query_tratamientos_botones);
  $totalRows_tratamientos_botones = mysqli_num_rows($all_tratamientos_botones);
}
$totalPages_tratamientos_botones = ceil($totalRows_tratamientos_botones/$maxRows_tratamientos_botones)-1;

if ($sec=="tratamiento"){
	$colname_tratamientos = "-1";
	if (isset($_GET['id'])) {
	  $colname_tratamientos = $_GET['id'];
	}
	mysqli_select_db($conn_sonria, $database_conn_sonria);
	$query_tratamientos = sprintf("SELECT * FROM tratamientos WHERE tratamiento_id = %s", GetSQLValueString($colname_tratamientos, "int"));
	$tratamientos = mysqli_query($conn_sonria, $query_tratamientos) or die(mysql_error());
	$row_tratamientos = mysqli_fetch_array($tratamientos);
	$totalRows_tratamientos = mysqli_num_rows($tratamientos);
}

if ($sec=="tratamientos"){
mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_tratamientos_slider = "SELECT tratamiento_id, tratamiento, tratamiento_banner FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_slider = mysqli_query($conn_sonria, $query_tratamientos_slider) or die(mysql_error());
$row_tratamientos_slider = mysqli_fetch_array($tratamientos_slider);
$totalRows_tratamientos_slider = mysqli_num_rows($tratamientos_slider);

}

mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_sucursales_footer = "SELECT sucursal_id, sucursal FROM sucursales ORDER BY sucursal ASC";
$sucursales_footer = mysqli_query($conn_sonria, $query_sucursales_footer) or die(mysql_error());
$row_sucursales_footer = mysqli_fetch_array($sucursales_footer);
$totalRows_sucursales_footer = mysqli_num_rows($sucursales_footer);

mysqli_select_db($conn_sonria, $database_conn_sonria);
$query_tratamientos_footer = "SELECT tratamiento_id, tratamiento FROM tratamientos ORDER BY tratamiento_id ASC";
$tratamientos_footer = mysqli_query($conn_sonria, $query_tratamientos_footer) or die(mysql_error());
$row_tratamientos_footer = mysqli_fetch_array($tratamientos_footer);
$totalRows_tratamientos_footer = mysqli_num_rows($tratamientos_footer);
?>
<?php
require_once('calendar/classes/tc_calendar.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<!--Favicon -->
<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include('includes/metas-site.php');?>

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

//SLIDER

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
<?php } ?>

//PLACEHOLDER

    function placeholder(){
        $("input[type=text]").each(function(){
            var phvalue = $(this).attr("placeholder");
            $(this).val(phvalue);
        });
    }

//PLACE HOLDER PARA FORMA DE CONTACTO
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

<!--END GOOGLE ANALYTICS-->



	<script>
	<?php if ($sec=="tratamiento" || $sec=="sucursal"){ ?>
//VIDEOS INLINE
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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




<div class="back">
 <div class="container">
	<?php include('includes/header_nav.php'); ?>
	<div style="clear:both"></div>

	<?php include('includes/banner_agenda.php'); ?>


	<div class="submenu">
  	<?php do { ?>
    	<a <?php if ($sec=="tratamiento" && $_GET["id"] ==$row_tratamientos_botones['tratamiento_id']){; ?> class="activo"<?php }?> href="?s=tratamiento&id=<?php echo $row_tratamientos_botones['tratamiento_id']; ?>">
      <div class="title"><?php echo $row_tratamientos_botones['tratamiento']; ?></div>
      <?php echo $row_tratamientos_botones['tratamiento_subtitulo']; ?></a>
    <?php } while ($row_tratamientos_botones = mysqli_fetch_array($tratamientos_botones)); ?>
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
	<!--INICIO COFEPRIS
		<a href="?s=diferentes">Qu&eacute; nos hace diferentes?</a> <br />
	FIN COFEPRIS -->
			<a href="?s=franquicias_clinicas_dentales_sonria_mexico">Franquicias Sonr&iacute;a</a>

		</div>

		<div class="footer_menu_float">
			<h1>NUESTRAS SUCURSALES</h1>
			<?php do { ?>
	  	<a href="?s=sucursal&id=<?php echo $row_sucursales_footer['sucursal_id']; ?>" title="Cl&iacute;nica <?php echo $row_sucursales_footer['sucursal']; ?>">Cl&iacute;nica <?php echo $row_sucursales_footer['sucursal']; ?></a><br />
	  	<?php } while ($row_sucursales_footer = mysqli_fetch_array($sucursales_footer)); ?>
		</div>

		<!--INICIO COFEPRIS

		<div class="footer_menu_float">
		  <h1>NUESTROS TRATAMIENTOS</h1>
  	<?php do { ?>
    <a href="?s=tratamiento&id=<?php echo $row_tratamientos_footer['tratamiento_id']; ?>" title="<?php echo $row_tratamientos_footer['tratamiento']; ?>"><?php echo $row_tratamientos_footer['tratamiento']; ?></a><br />
    <?php } while ($row_tratamientos_footer = mysqli_fetch_array($tratamientos_footer)); ?>

		FIN COFEPRIS -->
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


		<!--INICIO COFEPRIS

		<div class="footer_menu_float"><h1>CONOCE M&Aacute;S DE...</h1>
			<a href="?s=dolor_de_muela">Dolor de Muela</a><br />
			<a href="?s=gingivitis_inflamacion_encias">Gingivitis</a><br />
			<a href="?s=halitosis_mal_aliento">Mal Aliento</a><br />
			<a href="?s=hipersensibilidad_sensibilidad_en_los_dientes">Hipersensibilidad</a><br />
			<a href="?s=periodontitis">Periodontitis</a><br />
			<a href="?s=sangrado_de_encias">Sangrado de Enc&iacute;as</a><br />
			<a href="?s=terceros_molares_muela_del_juicio">Terceros Molares</a>
		</div>

		FIN COFEPRIS -->

    <div class="footer">
    	<p>Todos los Derechos Reservados &reg; Sonr&iacute;a 2017</p>
    <!-- end .footer -->
		</div>

 <!-- end .container -->
 </div>

</div><!--back-->

<script type="text/javascript">
	$(document).ready(function(){
		$movilHeader = $('.movil-header');
		$openMenu = $('.open-menu');

		$openMenu.click(function(){
			$movilHeader.toggleClass('open');
		});
	});
</script>

</body>
</html>
<?php
if ($sec=="home" || $sec=="novedades"){
mysqli_free_result($novedades);
}

if ($sec=="home"){
mysqli_free_result($promociones);

if(isset($sucursales)) mysqli_free_result($sucursales);

if(isset($img_sucursales)) mysqli_free_result($img_sucursales);

if(isset($sucrusales_menu)) mysqli_free_result($sucrusales_menu);

if(isset($tratamientos_menu)) mysqli_free_result($tratamientos_menu);

if(isset($tratamientos_botones)) mysqli_free_result($tratamientos_botones);

if(isset($tratamientos)) mysqli_free_result($tratamientos);

if(isset($tratamientos_slider)) mysqli_free_result($tratamientos_slider);

if(isset($sucursales_footer)) mysqli_free_result($sucursales_footer);

if(isset($tratamientos_footer)) mysqli_free_result($tratamientos_footer);

if(isset($sucrusales_seccion)) mysqli_free_result($sucrusales_seccion);
}
?>
