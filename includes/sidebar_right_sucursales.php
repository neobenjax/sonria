<div class="sidebarRight _centered-content" >

<h1 class="titulos">UNA SUCURSAL CERCA DE TI</h1>
<div class="sidebar_info secciones" style="margin-top:80px; width:650px; " >

<?php do { ?>


  <div class="sucursal">
    <a href="?s=sucursal&id=<?php echo $row_sucrusales_seccion['sucursal_id']; ?>">
    <div class="img"><img src="sucursales/thumb_<?php echo $row_sucrusales_seccion['img']; ?>"  alt="" /></div>
      CL&Iacute;NICA <?php echo $row_sucrusales_seccion['sucursal']; ?></a> </div>
  <?php } while ($row_sucrusales_seccion = mysqli_fetch_array($sucrusales_seccion)); ?>
<!--<div class="sucursal">
<a href="?s=sucursal_coapa"><img src="sucursales/coapa.jpg"  alt="" /><br />
  CL&Iacute;NICA COAPA</a> </div>
  <div class="sucursal">
  <a href="?s=sucursal_valle"><img src="sucursales/valle.jpg"  alt="" /><br />
    CL&Iacute;NICA DEL VALLE</a></div>

  <div class="sucursal">
<a href="?s=sucursal_lindavista"><img src="sucursales/lindavista.jpg"  alt="" /><br />
  CL&Iacute;NICA LINDAVISTA</a>
  </div>
<div class="sucursal">
<a href="?s=sucursal_neza"><img src="sucursales/neza.jpg"  alt="" /><br />
  CL&Iacute;NICA NEZA</a> </div>

      <div class="sucursal">
  <a href="?s=sucursal_roma"><img src="sucursales/roma.jpg"  alt="" /><br />
    CL&Iacute;NICA ROMA</a></div>

  <div class="sucursal">
  <a href="?s=sucursal_tasquena"><img src="sucursales/taxquena.jpg"  alt="" /><br />
    CL&Iacute;NICA TAXQUE&Ntilde;A</a></div>-->





</div>

</div>
