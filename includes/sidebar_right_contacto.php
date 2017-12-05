<div class="sidebarRight _centered-content">
  <h1 class="titulos">CONTACTO</h1>
  <h2 class="titulos">Ac&eacute;rcate a nosotros!</h2>
  <div class="sidebar_info secciones" >
    <p style=" margin-bottom:10px; margin-top:-10px;">Ll&aacute;manos!, con gusto te atenderemos.
    <br />
          <span style="font-size:26px; color:#6DC3C5"><strong><a href="tel:%2B525555113400">55 11 34 00</a></strong></span>
        </p>
    <p>O env&iacute;anos un correo y con gusto responderemos todas tus dudas.<br />
    <span style="font-size:16px;" ><strong><a href="mailto:servicioalcliente@sonria.com.mx">servicioalcliente@sonria.com.mx</a></strong></span></p>
    <p><img src="img/una_sucursal_cerca_de_ti.jpg" width="258" height="49" /></p>
    <div class="sidebar_info" style="width:300px; overflow: auto; height:250px;">
      <div class="telefonos">
        <p><strong>Cl&iacute;nica Arag&oacute;n:</strong><br />
        <a href="tel:%2B525511638329"> 11 63 83 29</a> / <a href="tel:%2B525524592727"> 24 59 27 27</a> / <a href="tel:%2B525511638245"> 11 63 82 45</a>
        </p>
        <p><strong>Cl&iacute;nica Barranca del Muerto:</strong><br />
        <a href="tel:%2B525568213019"> 68 21 30 19</a> / <a href="tel:%2B525556510594"> 56 51 05 94</a> / <a href="tel:%2B525556510346"> 56 51 03 46</a>
        </p>
        <p><strong>Cl&iacute;nica Coapa:</strong>    <br />
        <a href="tel:%2B525555114559"> 55 11 45 59</a> / <a href="tel:%2B525555114560"> 55 11 45 60</a> / <a href="tel:%2B525555114558"> 55 11 45 58</a>
        </p>
        <p><strong>Cl&iacute;nica Del Valle:</strong><br />
        <a href="tel:%2B525552071325">52 07 13 25</a> / <a href="tel:%2B525552072123"> 52 07 21 23</a> / <a href="tel:%2B525552071468"> 52 07 14 68</a>
        </p>
        <p><strong>Cl&iacute;nica Lindavista:</strong><br />
        <a href="tel:%2B525516610758"> 16 61 07 58</a> / <a href="tel:%2B525516610759"> 16 61 07 59</a> / <a href="tel:%2B525516610760"> 16 61 07 60</a>
        </p>
        <p><strong>Cl&iacute;nica Lomas Verdes:</strong><br />
        <a href="tel:%2B525553430599"> 53 43 05 99</a> / <a href="tel:%2B525553430261"> 53 43 02 61</a> / <a href="tel:%2B525553430568"> 53 43 05 68</a>
        </p>
        <p><strong>Cl&iacute;nica Neza: </strong><br />
        <a href="tel:%2B525522328547"> 22 32 85 47</a> / <a href="tel:%2B525522328548"> 22 32 85 48</a> / <a href="tel:%2B525522328546"> 22 32 85 46</a>
        </p>

        <p><strong>Cl&iacute;nica Polanco:</strong> <br />
            <a href="tel:%2B525552039396"> 52 03 93 96</a> / <a href="tel:%2B525552540912"> 52 54 09 12</a> / <a href="tel:%2B525552035201"> 52 03 52 01</a>
        </p>

        <p><strong>Cl&iacute;nica Miguel A. Quevedo:</strong> <br />
            <a href="tel:%2B525555113400"> 55 11 34 00</a>
        </p>

        <p><strong>Cl&iacute;nica Roma:</strong> <br />
            <a href="tel:%2B525555113424"> 55 11 34 24</a> / <a href="tel:%2B525555113440"> 55 11 34 40</a> / <a href="tel:%2B525511639770"> 11 63 97 70</a>
        </p>


        <p><strong>Cl&iacute;nica Taxque&ntilde;a:</strong><br />
        <a href="tel:%2B525553364057"> 53 36 40 57</a> / <a href="tel:%2B525553360847"> 53 36 08 47</a> / <a href="tel:%2B525553360878"> 53 36 08 78</a>
        </p>
      </div>
    </div>
  </div>
  <div class="sidebar_info secciones" style="margin-left:30px; margin-top:30px; ">


 <?php if (isset($_GET["rc"])){ ?>

  <div class="retro" style="color:#666">
  <p>Gracias por contactarnos.</p>
  <p>Pronto recibir&aacute; la informaci&oacute;n solicitada.</p>
  </div>

  <?php }else{  ?>

  <p style="margin-top:75px">D&eacute;janos tus datos y a la brevedad nos pondremos en contacto.</p>

  <form id="form1" name="form1" method="post" action="contacto2.php">
  <p>
        <label for="Email_contacto"></label>
        <input type="text" name="Nombre_contacto" id="Nombre_contacto" placeholder="Nombre" />
      </p>
      <p>
        <input type="text" name="Email_contacto" id="Email_contacto" placeholder="Email" />
      </p>
      <p>
        <input type="text" name="Telefono_contacto" id="Telefono_contacto" placeholder="Tel&eacute;fono" />
      </p>
      <p>
        <input type="text" name="Ciudad_contacto" id="Ciudad_contacto" placeholder="Ciudad" />
      </p>
      <p>
        <select name="Asunto_contacto" id="Asunto_contacto">
          <option value="Comentario">Comentario</option>
          <option value="Sugerencia">Sugerencia</option>
        </select>
      </p>
      <p class="oc"><input name="url" type="text" id="url" /></p>
      <p>
        <textarea name="Comentario_contacto" id="Comentario_contacto" rows="5" placeholder="Escriba aqu&iacute;..."></textarea>
      </p>

      <p>
        <input name="button" type="submit" id="button" onclick="MM_validateContacto('Nombre_contacto','','R','Email_contacto','','RisEmail','Telefono_contacto','','NisNum');return document.MM_returnValue" value="Enviar" />
      </p>

  </form>
  <?php }?>

</div>

</div>
