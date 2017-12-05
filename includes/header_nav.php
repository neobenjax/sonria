<div class="header">

  <a class="logo" href="?">
    <img src="img/logo_tablet.png" />
  </a>

  <ul class="menu">
    <li>
      <div class="division" style="background:none;"></div>
      <a <?php if ($sec=="contacto"){; ?> class="activo"<?php }?> href="?s=contacto">
        <span>CONTACTO</span>
        <br />
        Ll&aacute;manos!
      </a>
    </li>
    <!--<li><div class="division"></div><a <?php if ($sec=="tratamientos"){; ?> class="activo"<?php }?> href="?s=tratamientos"><span>NUESTROS TRATAMIENTOS</span><br />La mejor inversi&oacute;n es la prevenci&oacute;n</a>
      <ul style="display:none;">
        <?php do { ?>
        <li>
          <a href="?s=tratamiento&id=<?php echo $row_tratamientos_menu['tratamiento_id']; ?>" title="<?php echo $row_tratamientos_menu['tratamiento']; ?>">
            <?php echo $row_tratamientos_menu['tratamiento']; ?>
          </a>
        </li>
        <?php } while ($row_tratamientos_menu = mysqli_fetch_array($tratamientos_menu)); ?>
      </ul>
    </li>-->
    <li>
      <div class="division"></div>
      <a <?php if ($sec=="sucursales"){; ?> class="activo"<?php }?> href="?s=sucursales">
        <span>NUESTRAS SUCURSALES</span>
        <br />Sucursales cerca de ti
      </a>
      <ul>
        <?php do { ?>
          <li>
            <a href="?s=sucursal&id=<?php echo $row_sucrusales_menu['sucursal_id']; ?>" title="Cl&iacute;nica <?php echo $row_sucrusales_menu['sucursal']; ?>">
              Cl&iacute;nica <?php echo $row_sucrusales_menu['sucursal']; ?>
            </a>
          </li>
        <?php } while ($row_sucrusales_menu = mysqli_fetch_array($sucrusales_menu)); ?>
  <!--<li> <a href="?s=sucursal_coapa" title="Cl&iacute;nica Coapa">Cl&iacute;nica Coapa</a></li>
        <li> <a href="?s=sucursal_valle" title="Cl&iacute;nica Del Valle">Cl&iacute;nica Del Valle</a></li>
        <li> <a href="?s=sucursal_lindavista" title="Cl&iacute;nica Lindavista">Cl&iacute;nica Lindavista</a></li>
        <li> <a href="?s=sucursal_neza" title="Cl&iacute;nica Neza">Cl&iacute;nica Neza</a></li>
        <li> <a href="?s=sucursal_roma" title="Cl&iacute;nica Roma">Cl&iacute;nica Roma</a></li>
        <li> <a href="?s=sucursal_tasquena" title="Cl&iacute;nica Taxque&ntilde;a">Cl&iacute;nica Taxque&ntilde;a</a></li>-->
      </ul>
    </li>

    <li>
      <div class="division"></div>
      <a <?php if ($sec=="acerca"){; ?> class="activo"<?php }?> href="?s=acerca" >
        <span>ACERCA DE SONR&Iacute;A</span>
        <br />
        Soluci&oacute;n a tus necesidades de salud<br />oral con los mejores especialistas
      </a>
      <ul style="width:auto;">
        <li> <a href="?s=mision" title="Misi&oacute;n Visi&oacute;n Compromiso">Misi&oacute;n Visi&oacute;n Compromiso</a></li>
        <li> <a href="?s=unete" title="Quieres trabajar con nosotros?">Quieres trabajar con nosotros?</a></li>
        <!-- COFEPRIS
        <li> <a href="?s=diferentes" title="Cl&iacute;nica Coapa">Qu&eacute; nos hace diferentes?</a></li>
        COFEPRIS -->
      </ul>
    </li>

  </ul>

<!-- end .header -->
</div>

<div class="movil-header">
  <div class="head">
    <div class="menu-m">
      <a href="#" class="open-menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </a>
    </div>
    <div class="logo-m">
      <a href="?">
        <img src="img/logo_mobile.jpg" alt="Sonria">
      </a>
    </div>
    <div class="buscador">
      <button class="buscador">
        <i class="fa fa-search" aria-hidden="true"></i>
      </button>
    </div>
  </div>
  <div class="inner-nav">
    <ul class="inner">
      <li><a href="?s=acerca">Acerca de sonría</a></li>
      <li><a href="?s=sucursales">Nuestras Sucursales</a></li>
      <!-- <li><a href="#">Novedades</a></li> -->
      <li><a href="?s=contacto">Contacto</a></li>
      <li><a href="tel:55113400">55 11 34 00</a></li>
      <li class="redes-mobile">
        <a href="https://www.facebook.com/sonriamexico?fref=ts" target="_blank">
          <i class="fa fa-facebook-official" aria-hidden="true"></i>
        </a>
        <a href="#">
          <i class="fa fa-twitter-square" aria-hidden="true"></i>
        </a>
      </li>
    </ul>
  </div>
</div>
