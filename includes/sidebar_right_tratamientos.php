<div class="sidebarRight" >
  <div class="slider">
    <?php do { ?>
      <div>
        <a href="?s=tratamiento&id=<?php echo $row_tratamientos_slider['tratamiento_id']; ?>">
          <div style="background: url(img/<?php echo $row_tratamientos_slider['tratamiento_banner']; ?>) no-repeat left top; width:652px; height:572px;">
            <div style="padding:112px 0 30px 0; text-align:center;">
              <h1 style="margin-top:90px; font-size:34px;"><?php echo $row_tratamientos_slider['tratamiento']; ?></h1>
              <h2 style="margin-top:143px;">clic aqu&iacute; para m&aacute;s informaci&oacute;n</h2>
              </div>
            </div>
          </a>
      </div>
      <?php } while ($row_tratamientos_slider = mysqli_fetch_array($tratamientos_slider)); ?>
  </div>
</div>
