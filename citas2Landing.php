<?php

if(isset($_POST['url']) && $_POST['url'] == ''){
	
	$headers="Content-type: text/html; charset=iso-8859-1\r\n";
	
	$contenido .= "Name: ".$_POST["Nombre"]. " - ";
	$contenido .= "Email: ".$_POST["Email"]. " - ";
	$contenido .= "Tel: ".$_POST["Telefono"]. " - ";
	$contenido .= "Cita: ".$_POST["Fecha"]. " - ";
	$contenido .= "Hora: ".$_POST["Hora"]. " - ";
	$contenido .= "Coment: ".$_POST["Comentario"]. " - ";

	$file = fopen("citas.txt", "a");
	fwrite($file, $contenido . PHP_EOL);
	fclose($file);
 
 
	
}
header ("Location: landing.php?s=".$_POST["sec"]."&r=ok");
?>