<div class="sidebarRight clinicas _centered-content">

<h1 ><?php echo $row_sucursales['sucursal']; ?></h1>
<h2 >Cl&iacute;nica</h2>


<div class="sidebar_info secciones" style="margin-top:">

  <div><?php echo $row_sucursales['sucursal_direccion']; ?></div>
<p style="margin-top:0;"><strong>Tel. <?php echo $row_sucursales['sucursal_tel']; ?> </strong></p>

  <div><?php echo $row_sucursales['sucursal_mapa']; ?></div>
</div>
<div class="sidebar_info secciones" style="margin-left:30px; margin-top:50px;">

      <h3>GALER&Iacute;A </h3>
  <div style="clear:both; height:10px;"></div>

  <?php do { ?>
    <a rel="example_group" href="sucursales/<?php echo $row_img_sucursales['img']; ?>">
    <div class="thumbs"><img alt="example4" src="sucursales/thumb_<?php echo $row_img_sucursales['img']; ?>" /></div>
    </a>
    <?php } while ($row_img_sucursales = mysqli_fetch_array($img_sucursales)); ?>



</div>

</div>
