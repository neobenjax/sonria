<?php 
if ($sec=="home" || $sec=="novedades"){
mysql_select_db($database_conn_sonria, $conn_sonria);
$query_novedades = "SELECT * FROM novedades ORDER BY novedades_id DESC";
$novedades = mysql_query($query_novedades, $conn_sonria) or die(mysql_error());
$row_novedades = mysql_fetch_assoc($novedades);
$totalRows_novedades = mysql_num_rows($novedades);
}
?>
  <div class="pie_home">    
  <div style="padding: 3px 5px; font-size:14px; font-weight:bold; background:#0086A0; color:#FFF; border-radius:5px 5px 0px 0px; text-align:center;">NOVEDADES</div>


<div class="pie_home1">
    
<div class="slider_novedades">
<?php do { ?>
<div>

<?php if ($row_novedades['novedades_titulo'] == "<img src='img/logo_invisalign.png' width='200' />"){ ?>
       <span ><a href="?s=novedades&id=<?php echo $row_novedades['novedades_id']; ?>"><img src='img/logo_invisalign.png' width='105' /></span><br />
       <?php }else{  ?>
        <span ><a href="?s=novedades&id=<?php echo $row_novedades['novedades_id']; ?>"><?php echo $row_novedades['novedades_titulo']; ?></span><br />
       <?php }?>
       
        <?php echo $row_novedades['novedades_subtitulo']; ?></a>
</div>
<?php } while ($row_novedades = mysql_fetch_assoc($novedades)); ?>

</div>

     </div>
</div>
