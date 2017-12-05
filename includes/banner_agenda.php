
	<div class="cont-banner-form">

		<div class="sidebarLeft">

			<?php if (isset($_GET["s"]) && $_GET["s"]=="unete"){ ?>
				<p class="formar-parte">
					<strong>Quieres formar parte del<br />
						<span style="font-size:20px;">GRAN PROYECTO SONR&Iacute;A?</span>
					</strong>
				</p>
				<h1 class="titulos unete" style="border-radius:5px; margin-top:0; margin-left:60px;"><a style="font-size:17px; color:#FFF; text-decoration:none; text-shadow:none; text-transform:capitalize;" href="mailto:rhumanos@sonria.com.mx">Env&iacute;anos tu curriculum</a></h1>
				<?php }else{  ?>

					<h1>
						<img src="img/agenda.png" title="Agenda tu Cita" width="190" height="40" />
					</h1>
					<div class="agenda">
						<?php if (isset($_GET["r"])){ ?>
							<div class="retro">
								<p>Gracias por agendar su cita. </p>
								<p>Pronto recibir&aacute; una llamada de confirmaci&oacute;n.</p>
								<p>Adquiera nuestra <strong>  <a style="font-size:18px; color:#FFF" href="?s=membresia">membres&iacute;a</a></strong> con una promoci&oacute;n especial para usted. </p>
							</div>
							<?php } else { ?>


								<form id="form1" name="form1" method="post" action="citas2.php">
									<label for="Nombre"></label>
									<input type="text" name="Nombre" id="Nombre" placeholder="Nombre"/>
									<label for="Email"></label>
									<input type="text" name="Email" id="Email" placeholder="Email"/>
									<label for="url"></label>
									<input type="text" name="Telefono" id="Telefono" placeholder="Telefono"/>
									<div class="oc"><input name="url" type="text" id="url" /></div>
									<?php
									$myCalendar = new tc_calendar("Fecha", true, false);
									//$myCalendar->setIcon("calendar/images/iconCalendar.gif");
									//$myCalendar->setDate(date('d'), date('m'), date('Y'));
									$myCalendar->setPath("calendar/");
									$myCalendar->setYearInterval(2017, 2018);
									//$myCalendar->dateAllow('2017-01-01', '2018-01-01');
									$myCalendar->setDateFormat('j F Y');
									//$myCalendar->setHeight(350);
									//$myCalendar->autoSubmit(true, "form1");
									$myCalendar->setAlignment('left', 'bottom');
									//$myCalendar->setSpecificDate(array("2013-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
									//$myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
									//$myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
									$myCalendar->disabledDay("sun");
									$myCalendar->writeScript();
									?>


									<select name="Hora" id="Hora">
										<option>Hora de Cita</option>
										<option>09:00 - 10:00</option>
										<option>10:00 - 11:00</option>
										<option>11:00 - 12:00</option>
										<option>12:00 - 13:00</option>
										<option>13:00 - 14:00</option>
										<option>14:00 - 15:00</option>
										<option>15:00 - 16:00</option>
										<option>16:00 - 17:00</option>
										<option>17:00 - 18:00</option>
										<option>18:00 - 19:00</option>
										<option>19:00 - 20:00</option>
									</select>
									<label for="Comentario"></label>
									<textarea name="Comentario" id="Comentario" cols="45" rows="3"  placeholder="Alg&uacute;n comenario?"></textarea>
									<input name="s" type="hidden" value="<?php echo $sec?>" />
									<!--<input name="button" type="submit" id="button" onclick="MM_validateForm('Nombre','','R','Email','','RisEmail','Telefono','','R','Fecha','','R','Hora','','R');return document.MM_returnValue" value="Hacer Cita" />-->
									<input name="button" type="submit" id="button" onclick="MM_validateForm('Nombre','','R','Email','','RisEmail','Telefono','','NisNum');return document.MM_returnValue" value="Hacer Cita" />
									<input name="sec" type="hidden" value="<?php echo $sec; ?>" />
								</form>
						<?php }?>
					</div>
				<?php }?>
			</div>
			<?php
			if ($sec=="home"){
				include("sidebar_right_home.php");
			} else if ($sec=="acerca"){
				include("sidebar_right_acerca.php");
			} else if ($sec=="tratamientos"){
				include("sidebar_right_tratamientos.php");
			} else if ($sec=="tratamiento"){
				include("sidebar_right_tratamiento.php");
			} else if ($sec=="ortodoncia"){
				include("sidebar_right_ortodoncia.php");
			} else if ($sec=="implantes"){
				include("sidebar_right_implantes.php");
			} else if ($sec=="odontopediatria"){
				include("sidebar_right_odontopediatria.php");
			} else if ($sec=="endodoncia"){
				include("sidebar_right_endodoncia.php");
			} else if ($sec=="periodoncia"){
				include("sidebar_right_periodoncia.php");
			} else if ($sec=="cirugia"){
				include("sidebar_right_cirugia.php");
			} else if ($sec=="membresia"){
				include("sidebar_right_membresia.php");
			} else if ($sec=="membresiapaypal"){
				include("sidebar_right_membresiapaypal.php");
			} else if ($sec=="financiamiento"){
				include("sidebar_right_financiamiento.php");
			} else if ($sec=="pagosonline"){
				include("sidebar_right_pagosonline.php");
			} else if ($sec=="pagosonlinepaypal"){
				include("sidebar_right_pagosonlinepaypal.php");
			} else if ($sec=="dolor_de_muela"){
				include("sidebar_right_dolor_de_muela.php");
			} else if ($sec=="gingivitis_inflamacion_encias"){
				include("sidebar_right_gingivitis_inflamacion_encias.php");
			} else if ($sec=="halitosis_mal_aliento"){
				include("sidebar_right_halitosis_mal_aliento.php");
			} else if ($sec=="hipersensibilidad_sensibilidad_en_los_dientes"){
				include("sidebar_right_hipersensibilidad_sensibilidad_en_los_dientes.php");
			} else if ($sec=="periodontitis"){
				include("sidebar_right_periodontitis.php");
			} else if ($sec=="sangrado_de_encias"){
				include("sidebar_right_sangrado_de_encias.php");
			} else if ($sec=="terceros_molares_muela_del_juicio"){
				include("sidebar_right_terceros_molares_muela_del_juicio.php");
			} else if ($sec=="bienvenido_a_sonria"){
				include("sidebar_right_bienvenido_a_sonria.php");
			} else if ($sec=="franquicias_clinicas_dentales_sonria_mexico"){
				include("sidebar_right_franquicias_clinicas_dentales_sonria_mexico.php");
			} else if ($sec=="sugerencias"){
				include("sidebar_right_sugerencias.php");
			} else if ($sec=="contacto"){
				include("sidebar_right_contacto.php");
			} else if ($sec=="diferentes"){
				include("sidebar_right_diferentes.php");
			} else if ($sec=="mision"){
				include("sidebar_right_mision.php");
			} else if ($sec=="privacidad"){
				include("sidebar_right_privacidad.php");
			} else if ($sec=="novedades"){
				include("sidebar_right_novedades.php");
			} else if ($sec=="novedades2"){
				include("sidebar_right_novedades2.php");
			} else if ($sec=="novedades3"){
				include("sidebar_right_novedades3.php");
			} else if ($sec=="convenios"){
				include("sidebar_right_convenios.php");
			} else if ($sec=="consulta"){
				include("sidebar_right_consulta.php");
			} else if ($sec=="unete"){
				include("sidebar_right_unete.php");
			} else if ($sec=="sucursales"){
				include("sidebar_right_sucursales.php");
			} else if($sec=="sucursal"){
				include("sidebar_right_sucursal.php");
			} else if ($sec=="acerca2"){
				include("sidebar_right_acerca2.php");
			}
			?>
			<div style="clear:both;"></div>
		</div><!--cont-banner-form-->
