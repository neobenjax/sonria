<div class="sidebarRight" >
  <div class="header_img">
    <img src="img/<?php echo $row_tratamientos['tratamiento_header']; ?>" />
  </div>
  <h1><?php echo $row_tratamientos['tratamiento']; ?></h1>
  <h2><?php echo $row_tratamientos['tratamiento_subtitulo']; ?></h2>
  <div class="sidebar_info">
    <?php echo $row_tratamientos['tratamiento_contenido']; ?>
  </div>
  <div class="sidebar_info" style="margin-left:30px;">
    <h4>PREGUNTAS FRECUENTESs</h4>
    <?php echo $row_tratamientos['tratamiento_faqs']; ?>
    </p>
    <h4><a id="various1" href="#inline1" onclick="aparece()">Ver video</a></h4>

    <div style="display: none;">
      <div id="inline1" style="padding:3px; overflow:auto; ">
        <?php echo $row_tratamientos['tratamiento_video']; ?>
      </div>
    </div>
  </div>
</div>
