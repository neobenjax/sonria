<?php
$title = "Sonr&iacute;a - Cl&iacute;nicas Dentales";
$keywords = "Dentistas Dentista DF Odontologo Odontologos Implantes Clinicas Dentales Sonria Clinica Dental Sonria Ortodoncista Ortodoncistas Blanqueamiento Protesis";
$description = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Excelentes Especialistas, Mejores Sonrisas";

if ($sec=="acerca"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Acerca de Sonr&iacute;a";
} else if ($sec=="mision"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Misi&oacute;n, Visi&oacute;n y Compromiso";
} else if ($sec=="unete"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Qui&eacute;res trabajar con nosotros?";
} else if ($sec=="diferentes"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Qu&eacute; nos hace diferentes?";
} else if ($sec=="sucursales"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Nuestras Sucursales";
} else if ($sec=="sucursal"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica ".$row_sucursales['sucursal'];
} else if ($sec=="sucursal_coapa"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Coapa";
} else if ($sec=="sucursal_valle"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica del Valle";
} else if ($sec=="sucursal_lindavista"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Lindavista";
} else if ($sec=="sucursal_neza"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Neza";
} else if ($sec=="sucursal_roma"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Roma";
} else if ($sec=="sucursal_tasquena"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cl&iacute;nica Taxque&ntilde;a";
} else if ($sec=="tratamientos"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Nuestros Tratamientos";
} else if ($sec=="contacto"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Contacto";
} else if ($sec=="membresia"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Membres&iacute;a";
} else if ($sec=="financiamiento"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Financiamiento";
} else if ($sec=="privacidad"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Aviso de Privacidad";
} else if ($sec=="convenios"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Convenios";
} else if ($sec=="novedades"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - ".$row_novedades['novedades_titulo'];
} else if ($sec=="tratamiento"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - ".$row_tratamientos['tratamiento'];
} else if ($sec=="pagosonline"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Abono a tratamientos en l&iacute;nea";
} else if ($sec=="pagosonlinepaypal"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Abono a tratamientos en l&iacute;nea - PayPal";
} else if ($sec=="membresiapaypal"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Membres&iacute;a - PayPal";
} else if ($sec=="dolor_de_muela"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Dolor de Muela";
} else if ($sec=="gingivitis_inflamacion_encias"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Gingivitis";
} else if ($sec=="halitosis_mal_aliento"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Halitosis - Mal Aliento";
} else if ($sec=="hipersensibilidad_sensibilidad_en_los_dientes"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Hipersensibilidad";
} else if ($sec=="periodontitis"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Periodontitis";
} else if ($sec=="sangrado_de_encias"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Sangrado de Enc&iacute;as";
} else if ($sec=="terceros_molares_muela_del_juicio"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Terceros Molares";
} else if ($sec=="bienvenido_a_sonria"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Bienvenido a Cl&iacute;nicas Dentales Sonr&iacute;a";
} else if ($sec=="franquicias_clinicas_dentales_sonria_mexico"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Franquicias Cl&iacute;nicas Dentales Sonr&iacute;a";
} else if ($sec=="cirugia"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Cirug&iacute;a";
} else if ($sec=="periodoncia"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Periodoncia";
} else if ($sec=="endodoncia"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Endodoncia";
} else if ($sec=="odontopediatria"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Odontopediatr&iacute;a";
} else if ($sec=="implantes"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Implantes";
} else if ($sec=="ortodoncia"){
  $title = "Sonr&iacute;a - Cl&iacute;nicas Dentales - Ortodoncia";
}
?>
<title><?php echo $title; ?></title>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />
