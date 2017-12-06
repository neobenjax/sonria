<?php
$filename = '_v2.zip';
$options = '-o';  //Overwrite existing files by default; this is mostly to suppress confirmations
$destDir = '';
echo shell_exec ("unzip $options {$filename}");
?>
