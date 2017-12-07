<div class="sidebarRight _centered-content _novedades">

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

  <?php //include("/pie_home.php"); ?>
