<?php


if(isset($_POST['url']) && $_POST['url'] == ''){
	
	

	
	$contenidoarchivo .= "Paciente: ".$_POST["Nombre"]. " - ";
	
	$contenidoarchivo .= "Email: ".$_POST["Email"]. " - ";
	
	$contenidoarchivo .= "Tel: ".$_POST["Telefono"]. " - ";
	
	$contenidoarchivo .= "Cita: ".$_POST["Fecha"]. " - ";
	
	$contenidoarchivo .= "Hora: ".$_POST["Hora"]. " - ";
	
	$contenidoarchivo .= "Coment: ".$_POST["Comentario"]. " - ";

	
	
	$file = fopen("citas.txt", "a");
	
	fwrite($file, $contenidoarchivo . PHP_EOL);
	
	fclose($file);


	

}


// PARA ENVIAR MAIL

	$headers="Content-type: text/html; charset=iso-8859-1\r\n";
	$headers2="Content-type: text/html; charset=iso-8859-1\r\n";

	$headers .= "From: Citas Web - Sonria <servicioalcliente@sonria.com.mx>";
	$headers2 .= "From: ".$_POST["Nombre"]." <" .$_POST["Email"].">";

	$mymail  = "servicioalcliente@sonria.com.mx";

	$subject = "Cita Formulario Web";
	$contenido .= "Paciente: ".$_POST["Nombre"]."<br>";
	$contenido .= "Email: ".$_POST["Email"]."<br>";
	$contenido .= "Tel&eacute;fono: ".$_POST["Telefono"]."<br>";
	$contenido .= "Fecha de Cita: ".$_POST["Fecha"]."<br>";
	$contenido .= "Hora de Cita: ".$_POST["Hora"]."<br>";
	$contenido .= "Comentario: ".$_POST["Comentario"]."<br>";

	mail($mymail, $subject, $contenido, utf8_decode($headers2));

	$respuesta = 
	'<div style="width:600px; height:600px; font-family:Arial, Helvetica, sans-serif;">
		<div style="text-align:center">De clic <a href="http://sonria.com.mx/contacto.html" target="_blank"><strong>aqu&iacute;</strong></a> en caso de no ver correctamente este mail</div>
		<div style="height:110px; background: url(http://sonria.com.mx/mailing/header.png); position:relative; z-index:1">
			<div style="color:#FFF; float:left; margin-left:250px; margin-top:5px; font-size:18px;">
			Gracias<br />
		<span style="font-size:28px">por contactarnos!</span></div>
		</div>
		<div style="height:487px;background:url(http://sonria.com.mx/mailing/back_image.jpg); color: #666; margin-top:-47px;">
			<div style="float:left; width:320px; margin-left:30px; margin-top:60px">
  				<h1 style="color:#0086a0">SU CITA</h1>
  				<h2 style="margin-top:-25px; color:#0086a0">HA SIDO CONFIRMADA </h2>
  				<p><strong>Usted recibir&aacute; una llamada de nuestro personal para darle seguimiento a su cita.</strong></p>
				<p>Le recordamos que en cualquiera de nuestras sucursales contamos con todos los especialiastas para el tratamiento que requiera. Todos los materiales y procedimientos que manejamos son de primera calidad y est&aacute;n garantizados. </p>
    			</div>
    
		</div>
		<div style="height:35px; background: url(http://sonria.com.mx/mailing/footer.jpg);  padding-top:15px; padding-left:15px;">
			<a href="https://www.facebook.com/sonriamexico?fref=ts" target="_blank" style="color:#FFF; font-size:12px; text-decoration:none; float:left; margin-left:20px;  font-size:26px; font-weight:bold"><img src="http://sonria.com.mx/mailing/logo_facebook.png" width="20" height="19" /></a>
			<a href="http://www.sonria.com.mx/" style="color:#FFF; font-size:12px; text-decoration:none; ">www.sonria.com.mx</a>
			<a href="http://www.sonria.com.mx/" target="_blank" style="color:#FFF; font-size:12px; text-decoration:none; float:right; margin-right:20px; margin-top:-5px; font-size:26px; font-weight:bold">55 11 34 00</a>
		</div>

	</div>';

	mail($_POST["Email"], utf8_decode("Confirmacion de Cita en Sonria - Clinicas Dentales"), utf8_decode($respuesta), utf8_decode($headers));

	

header ("Location: index.php?s=".$_POST["sec"]."&r=ok");

?>