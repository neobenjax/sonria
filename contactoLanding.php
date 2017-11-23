<?php

if(isset($_POST['url']) && $_POST['url'] == ''){
	
	$headers="Content-type: text/html; charset=iso-8859-1\r\n";
	
	$contenido = $_POST["Asunto_contacto"]. " - ";
	$contenido .= "Nombre: ".$_POST["Nombre_contacto"]. " - ";
	$contenido .= "Email: ".$_POST["Email_contacto"]. " - ";
	$contenido .= "Telefono: ".$_POST["Telefono_contacto"]. " - ";
	$contenido .= "Ciudad: ".$_POST["Ciudad_contacto"]. " - ";
	$contenido .= "Comentario: ".$_POST["Comentario_contacto"]. " - ";

	$file = fopen("comentarios.txt", "a");
	fwrite($file, $contenido . PHP_EOL);
	fclose($file);	

}
header ("Location: landing.php?s=contacto&rc=ok");
?>