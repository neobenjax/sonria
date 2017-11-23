<?php require_once ('mdt/MD.php');
$detect = new Mobile_Detect();
if ($detect->isMobile()==true && ($_SERVER['REQUEST_URI'] == "" || $_SERVER['REQUEST_URI'] == "/" || $_SERVER['REQUEST_URI'] == "#")) { 
header('Location: landing.php'); 
} 