<div class="sidebarRight" >
  <div class="slider">
    <?php do { ?>
      <div>
        <div>
          <img src="img/<?php echo $row_tratamientos_slider['tratamiento_banner']; ?>" alt="" class="img-banner">
          <a class="texto-over" href="?s=tratamiento&id=<?php echo $row_tratamientos_slider['tratamiento_id']; ?>" style="text-align:center;">
            <h1 style="margin-top:90px; font-size:34px;"><?php echo $row_tratamientos_slider['tratamiento']; ?></h1>
            <h2 style="margin-top:143px;">clic aqu&iacute; para m&aacute;s informaci&oacute;n</h2>
          </a>
        </div>
      </div>
      <?php } while ($row_tratamientos_slider = mysqli_fetch_array($tratamientos_slider)); ?>
  </div>
</div>
