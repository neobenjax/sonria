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
  <?php } while ($row_promociones = mysqli_fetch_array($promociones)); ?>
  </div>
</div>
<?php include("/pie_home.php"); ?>
