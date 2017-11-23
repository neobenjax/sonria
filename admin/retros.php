    <div class="retro">
	<?php
	if(isset($_GET['retro']) && $_GET['retro']==1){
	 echo "Se ha agregado el registro.";
    }
	if(isset($_GET['retro']) && $_GET['retro']==2){
	 echo "Se ha actualizado el registro.";
    }
	if(isset($_GET['retro']) && $_GET['retro']==3){
	 echo "Se ha eliminado el registro.";
    }
	?>
    </div>
