<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Relacion');
define("PAGINA_ACTUAL", "relacion");
define("TABLA", "valor_default");

if (cargar('id') && cargar('borrar')) { 
	borrarRegistro(TABLA, $id); 
	if ($padre) 
		exit("<script>location.href='".PAGINA_ACTUAL."_listado.php?padre=".$padre."';</script>"); 
	else 
		exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>"); 
}


$row = $db->fetchOneRow(sprintf("SELECT * FROM ".TABLA." WHERE id = %d",cargar('id',0)));
?>
<!doctype html>
<html>
<head>
	<? include_once("_inc_head.php");?>
	<!-- small charts plugin -->
	<!-- CSS for Growl like notifications -->
	<link rel="stylesheet" href="css/jquery.gritter.css">
<!-- small charts plugin -->
	<script src="js/jquery.easy-pie-chart.min.js"></script>
	<!-- charts plugin -->
	<script src="js/jquery.flot.min.js"></script>
	<!-- pie charts plugin -->
	<script src="js/jquery.flot.pie.min.js"></script>
	<!-- bar charts plugin -->
	<script src="js/jquery.flot.bar.order.min.js"></script>
	<!-- charts resizable plugin -->
	<script src="js/jquery.flot.resize.min.js"></script>

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
											<select name="estacion_id" class="estacion_id">
												<option>Seleccione...</option>
												<?foreach ($db->iterate("SELECT * FROM estacion") as $estaciones) {
												?><option value="<?=$estaciones->id?>"><?=$estaciones->nombre?></option>
												<?}?>
											</select>
										</div>
									</div>
									<? #require_once('porcentajes_inputs.php'); ?>									
								</div>
							</div>
						</div>
					</div>
					<hr>
					<? /***************************************************************************************************/ 
					?>
					<div class="row-fluid valores hide">
						<div class="span12">
							<div class="span6 box" style="margin-right: 15px">
								<div class="box-head">
									<span>1° Factor</span>
								</div>
								<div class="box-body">
									<div class="span12 text-center">
										<select name="factor_1" class="factor">
											<option>Seleccione...</option>
											<option value = 'Precipitacion_de_0_24_hs_mm' >Precipitacion_de_0_24_hs_mm </option>
											<option value = 'Precipitacion_como_dia_pluviometrico_mm_' >Precipitacion_como_dia_pluviometrico_mm_ </option>
											<option value = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Humedad_relativa_media_porcentaje' >Humedad_relativa_media_porcentaje </option>
											<option value = 'Humedad_relativa_8_14_20_porcentaje' >Humedad_relativa_8_14_20_porcentaje </option>
											<option value = 'Velocidad_media_del_viento_a_2m_km_h' >Velocidad_media_del_viento_a_2m_km_h </option>
											<option value = 'Direccion_prevalente_del_viento_a_2m_PC' >Direccion_prevalente_del_viento_a_2m_PC </option>
											<option value = 'Unidades_de_Frio_h' >Unidades_de_Frio_h </option>
											<option value = 'Horas_de_Frio_h' >Horas_de_Frio_h </option>
											<option value = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Punto_de_rocío_medio_C' >Punto_de_rocío_medio_C </option>
											<option value = 'Direccion_prevalente_del_viento_a_10m_altura_PC' >Direccion_prevalente_del_viento_a_10m_altura_PC </option>
											<option value = 'Velocidad_media_del_viento_a_10m_km_h' >Velocidad_media_del_viento_a_10m_km_h </option>
											<option value = 'Maxima_precipitacion_en_30min_mm' >Maxima_precipitacion_en_30min_mm </option>
											<option value = 'Maxima_velocidad_del_viento_km_h' >Maxima_velocidad_del_viento_km_h </option>
											<option value = 'Tensión_de_vapor_media_hPa' >Tensión_de_vapor_media_hPa </option>
											<option value = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C' >Temperatura_media_del_suelo_a_10cm_de_profundidad_C </option>
										</select>
									</div>
									<div class="span12 text-center resultados">
										
									</div>								
								</div>
							</div>

							<div class="span6 box">
								<div class="box-head">
									<span>2° Factor</span>
								</div>
								<div class="box-body">
									<div class="span12 text-center" >
										<select name="estacion_id" class="factor">
											<option>Seleccione...</option>
											<option value = 'Precipitacion_de_0_24_hs_mm' >Precipitacion_de_0_24_hs_mm </option>
											<option value = 'Precipitacion_como_dia_pluviometrico_mm_' >Precipitacion_como_dia_pluviometrico_mm_ </option>
											<option value = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Humedad_relativa_media_porcentaje' >Humedad_relativa_media_porcentaje </option>
											<option value = 'Humedad_relativa_8_14_20_porcentaje' >Humedad_relativa_8_14_20_porcentaje </option>
											<option value = 'Velocidad_media_del_viento_a_2m_km_h' >Velocidad_media_del_viento_a_2m_km_h </option>
											<option value = 'Direccion_prevalente_del_viento_a_2m_PC' >Direccion_prevalente_del_viento_a_2m_PC </option>
											<option value = 'Unidades_de_Frio_h' >Unidades_de_Frio_h </option>
											<option value = 'Horas_de_Frio_h' >Horas_de_Frio_h </option>
											<option value = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C' >Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C </option>
											<option value = 'Punto_de_rocío_medio_C' >Punto_de_rocío_medio_C </option>
											<option value = 'Direccion_prevalente_del_viento_a_10m_altura_PC' >Direccion_prevalente_del_viento_a_10m_altura_PC </option>
											<option value = 'Velocidad_media_del_viento_a_10m_km_h' >Velocidad_media_del_viento_a_10m_km_h </option>
											<option value = 'Maxima_precipitacion_en_30min_mm' >Maxima_precipitacion_en_30min_mm </option>
											<option value = 'Maxima_velocidad_del_viento_km_h' >Maxima_velocidad_del_viento_km_h </option>
											<option value = 'Tensión_de_vapor_media_hPa' >Tensión_de_vapor_media_hPa </option>
											<option value = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C' >Temperatura_media_del_suelo_a_10cm_de_profundidad_C </option>
										</select>
									</div>
									<div class="span12 text-center resultados">
										
									</div>					
								</div>
							</div>
						</div>
						<div class="span12 box tabla-probabilidad">
							<div class="box-head">
								<span>Tabla de Probabilidad</span>
							</div>
							<div class="box-body probabilidad">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>P(+x|U1,U2)</th>
											<th>U1+</th>
											<th>U1°</th>
											<th>U1-</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>U2+</td>
											<td>xxx</td>
											<td>xxx</td>
											<td>xxx</td>
										</tr>
										<tr>
											<td>U2-</td>
											<td>xxx</td>
											<td>xxx</td>
											<td>xxx</td>
										</tr>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<? require_once('_inc_botones.php'); ?>
						<? require_once('_inc_log.php'); ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
	<script type="text/javascript">
		$(".estacion_id").on("change", function(){
			$('.valores').removeClass('hide');
		});

		$('.factor').on('change', function(){
			var box = $(this).parents('.box-body');
			var factor = $(this).val();
			var estacion_id = $('.estacion_id').val();
			$.ajax({
				  method: "POST",
				  url: "factor.php",
				  data: {estacion_id: estacion_id, factor: factor }
				})
				  .done(function( data ) {
				    var Json = jQuery.parseJSON(data);
				    if(Json.count == 2){
				    	html = "U+: "+Json.U1+"<br> U-: "+Json.U2+"<br> --";
				    }else{
				    	html = "U+: "+Json.U1+"<br> U°: "+Json.U2+"<br> U-: "+Json.U3;
				    }
				    $(box).find('.resultados').html(html);

				  });
		});
	</script>
</body>
</html>