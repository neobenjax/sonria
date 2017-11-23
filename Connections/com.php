<?php require_once ('mdt/MD.php');
$detect = new Mobile_Detect();
if ($detect->isMobile()==false) {
header('Location: http://www.sonria.com.mx/');
} 