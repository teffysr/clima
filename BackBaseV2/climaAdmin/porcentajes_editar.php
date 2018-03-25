<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Porcentajes');
define("PAGINA_ACTUAL", "porcentajes");
define("TABLA", "porcentajes");

if (cargar('id') && cargar('borrar')) { 
	borrarRegistro(TABLA, $id); 
	if ($padre) 
		exit("<script>location.href='".PAGINA_ACTUAL."_listado.php?padre=".$padre."';</script>"); 
	else 
		exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>"); 
}

cargar('estacion_id');
cargar('promedio_anual');
cargar('Fecha');
cargar('Precipitacion_de_0_24_hs_mm');
cargar('Precipitacion_como_dia_pluviometrico_mm_');
cargar('Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Humedad_relativa_media_porcentaje');
cargar('Humedad_relativa_8_14_20_porcentaje');
cargar('Velocidad_media_del_viento_a_2m_km_h');
cargar('Direccion_prevalente_del_viento_a_2m_PC');
cargar('Unidades_de_Frio_h');
cargar('Horas_de_Frio_h');
cargar('Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Punto_de_rocío_medio_C');
cargar('Direccion_prevalente_del_viento_a_10m_altura_PC');
cargar('Velocidad_media_del_viento_a_10m_km_h');
cargar('Maxima_precipitacion_en_30min_mm');
cargar('Maxima_velocidad_del_viento_km_h');
cargar('Tensión_de_vapor_media_hPa');
cargar('Temperatura_media_del_suelo_a_10cm_de_profundidad_C');

$row = $db->fetchOneRow(sprintf("SELECT * FROM ".TABLA." WHERE id = %d",cargar('id',0)));
?>
<!doctype html>
<html>
<head>
	<? include_once("_inc_head.php");?>
	<style type="text/css">
		.style-label { text-align: right !important;}
		.style-controls { margin-left:40% !important; }
	</style>
</head>
<body data-layout="fixed">
	<? include_once("_inc_top.php");?>
	<div id="main">
		<? include_once("_inc_left.php");?>
		<div id="content">
			<div class="container-fluid" id="content-area">
				<form class='form-horizontal form-bordered form-validate' method="POST" id="<?=PAGINA_ACTUAL;?>" action="<?=PAGINA_ACTUAL;?>_grabar.php" enctype="multipart/form-data">
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-list-ul"></i>
									<span>Datos</span>
								</div>
								<div class="box-body box-body-nopadding">
									<div class="control-group">
										<label for="urlfield" class="control-label style-label">Estacion</label>
										<div class="controls style-controls" >
											<select name="estacion_id">
												<?foreach ($db->iterate("SELECT * FROM estacion") as $estaciones) {
												?><option value="<?=$estaciones->id?>"><?=$estaciones->nombre?></option>
												<?}?>
											</select>
										</div>
									</div>
									<? require_once('porcentajes_inputs.php'); ?>									
								</div>
							</div>
						</div>
					</div>
					<hr>
					<? /****************************************************************************************************/ ?>
					<div class="row-fluid">
						<? require_once('_inc_botones.php'); ?>
						<? require_once('_inc_log.php'); ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
</body>
</html>