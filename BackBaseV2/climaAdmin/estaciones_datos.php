<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Estaciones');
define("PAGINA_ACTUAL","estaciones");
define("TABLA","estacion");
define("TABLA2","estacion_datos");

if (cargar('id') && cargar('borrar')) { borrarRegistro(TABLA, $id, DIR_UPLOADS_NOTICIAS.$id); exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>"); }

$row = $db->fetchOneRow(sprintf("SELECT * FROM ".TABLA." WHERE id = %d",cargar('id',0)));
?>
<!doctype html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
	<? include_once("_inc_head.php");?>
	<script type="text/javascript">
	function updateTable(action,id,page) {
		url = "<?=PAGINA_ACTUAL;?>_listado_ajax_datos.php?";

		<? if ($_SERVER['QUERY_STRING']) { ?>
			url += "&<?=$_SERVER['QUERY_STRING'];?>"
		<? } ?>

		url += "&pagina="+page;

		$.ajax({
			url: url,
			type: "GET",
			data: {id: <?=$id?>},
			success: function(datos) {
				$("#box-table").html(datos);
			}
		})
	}
</script>
</head>
<body data-layout="fixed">
	<? include_once("_inc_top.php");?>
	<div id="main">
		<? include_once("_inc_left.php");?>
		<div id="content">
			<div class="container-fluid" id="content-area">
				<form class='form-horizontal form-bordered form-validate' method="POST" id="<?=PAGINA_ACTUAL;?>" action="<?=PAGINA_ACTUAL;?>_grabar.php" enctype="multipart/form-data">
					<?/**********************************************/?>
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-table"></i>
									<span class="badge badge-info" style="font-weight: lighter; margin-right: 15px;"> <?=$row->nombre;?></span> <span> Datos recompilados de hace 5 años</span>
								</div>
								<div id="box-table" class="box-body box-body-nopadding">
									<? include_once(PAGINA_ACTUAL."_listado_tabla_datos.php");?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<? /****************************************************************************************************/ ?>
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-table"></i>
									<span>Valores:</span>
								</div>
								<div id="" class="box-body box-body-nopadding">
									<div style="overflow: auto;">
										<table class="table table-nomargin table-bordered">
											<thead>
												<tr>
													<th>Medicion: </th>
													<th>Precipitacion  de 0 24 hs mm</th>
													<th>Precipitacion  como dia  pluviometrico mm </th>
													<th>Temperatura  Maxima del aire  en abrigo a 1 5 m  de altura C</th>
													<th>Temperatura  minima del aire  en abrigo a 1 5 m  de altura C</th>
													<th>Humedad relativa  media porcentaje</th>
													<th>Humedad relativa  8 14 20 porcentaje</th>
													<th>Velocidad media  del viento a 2m km h</th>
													<th>Direccion prevalente  del viento  a 2m PC </th>
													<th>Unidades de Frio h</th>
													<th>Horas de Frio h</th>
													<th>Temperatura Media  del aire en abrigo  a 1 5 m de altura C</th>
													<th>Punto de rocío medio C</th>
													<th>Direccion prevalente  del viento a 10m  altura PC </th>
													<th>Velocidad media del  viento a 10m km h</th>
													<th>Maxima precipitacion  en 30min mm</th>
													<th>Maxima velocidad del  viento km h</th>
													<th>Tensión de vapor  media hPa</th>
													<th>Temperatura media del  suelo a 10cm de  profundidad C</th>
												</tr>
											</thead>
											<tbody>
												<?
												$query = "SELECT 
															avg(Precipitacion_de_0_24_hs_mm) as Precipitacion_de_0_24_hs_mm,
															avg(Precipitacion_como_dia_pluviometrico_mm_) as Precipitacion_como_dia_pluviometrico_mm_,
															avg(Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															avg(Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															avg(Humedad_relativa_media_porcentaje) as Humedad_relativa_media_porcentaje,
															avg(Humedad_relativa_8_14_20_porcentaje) as Humedad_relativa_8_14_20_porcentaje,
															avg(Velocidad_media_del_viento_a_2m_km_h) as Velocidad_media_del_viento_a_2m_km_h,
															avg(Direccion_prevalente_del_viento_a_2m_PC ) as Direccion_prevalente_del_viento_a_2m_PC ,
															avg(Unidades_de_Frio_h) as Unidades_de_Frio_h,
															avg(Horas_de_Frio_h) as Horas_de_Frio_h,
															avg(Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															avg(Punto_de_rocío_medio_C) as Punto_de_rocío_medio_C,
															avg(Direccion_prevalente_del_viento_a_10m_altura_PC ) as Direccion_prevalente_del_viento_a_10m_altura_PC ,
															avg(Velocidad_media_del_viento_a_10m_km_h) as Velocidad_media_del_viento_a_10m_km_h,
															avg(Maxima_precipitacion_en_30min_mm) as Maxima_precipitacion_en_30min_mm,
															avg(Maxima_velocidad_del_viento_km_h) as Maxima_velocidad_del_viento_km_h,
															avg(Tensión_de_vapor_media_hPa) as Tensión_de_vapor_media_hPa,
															avg(Temperatura_media_del_suelo_a_10cm_de_profundidad_C) as Temperatura_media_del_suelo_a_10cm_de_profundidad_C 
															from estacion_datos where estacion_id = '{$id}'";

												$rowDatos = $db->fetchOneRow($query);
													?>
													<tr>
														<td>Promedio</td>
														<td><?=number_format($rowDatos->Precipitacion_de_0_24_hs_mm,2,',','.');?></td>
														<td><?=number_format($rowDatos->Precipitacion_como_dia_pluviometrico_mm_,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Humedad_relativa_media_porcentaje,2,',','.');?></td>
														<td><?=number_format($rowDatos->Humedad_relativa_8_14_20_porcentaje,2,',','.');?></td>
														<td><?=number_format($rowDatos->Velocidad_media_del_viento_a_2m_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Direccion_prevalente_del_viento_a_2m_PC,2,',','.');?></td>
														<td><?=number_format($rowDatos->Unidades_de_Frio_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Horas_de_Frio_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Punto_de_rocío_medio_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Direccion_prevalente_del_viento_a_10m_altura_PC,2,',','.');?></td>
														<td><?=number_format($rowDatos->Velocidad_media_del_viento_a_10m_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Maxima_precipitacion_en_30min_mm,2,',','.');?></td>
														<td><?=number_format($rowDatos->Maxima_velocidad_del_viento_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Tensión_de_vapor_media_hPa,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_media_del_suelo_a_10cm_de_profundidad_C,2,',','.');?></td>
														
													</tr>
												<?
												$query = "SELECT 
															std(Precipitacion_de_0_24_hs_mm) as Precipitacion_de_0_24_hs_mm,
															std(Precipitacion_como_dia_pluviometrico_mm_) as Precipitacion_como_dia_pluviometrico_mm_,
															std(Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															std(Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															std(Humedad_relativa_media_porcentaje) as Humedad_relativa_media_porcentaje,
															std(Humedad_relativa_8_14_20_porcentaje) as Humedad_relativa_8_14_20_porcentaje,
															std(Velocidad_media_del_viento_a_2m_km_h) as Velocidad_media_del_viento_a_2m_km_h,
															std(Direccion_prevalente_del_viento_a_2m_PC ) as Direccion_prevalente_del_viento_a_2m_PC ,
															std(Unidades_de_Frio_h) as Unidades_de_Frio_h,
															std(Horas_de_Frio_h) as Horas_de_Frio_h,
															std(Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C) as Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C,
															std(Punto_de_rocío_medio_C) as Punto_de_rocío_medio_C,
															std(Direccion_prevalente_del_viento_a_10m_altura_PC ) as Direccion_prevalente_del_viento_a_10m_altura_PC ,
															std(Velocidad_media_del_viento_a_10m_km_h) as Velocidad_media_del_viento_a_10m_km_h,
															std(Maxima_precipitacion_en_30min_mm) as Maxima_precipitacion_en_30min_mm,
															std(Maxima_velocidad_del_viento_km_h) as Maxima_velocidad_del_viento_km_h,
															std(Tensión_de_vapor_media_hPa) as Tensión_de_vapor_media_hPa,
															std(Temperatura_media_del_suelo_a_10cm_de_profundidad_C) as Temperatura_media_del_suelo_a_10cm_de_profundidad_C 
															from estacion_datos where estacion_id = '{$id}'";

												$rowDatos = $db->fetchOneRow($query);
													?>
													<tr>
														<td>Desviación estándar</td>
														<td><?=number_format($rowDatos->Precipitacion_de_0_24_hs_mm,2,',','.');?></td>
														<td><?=number_format($rowDatos->Precipitacion_como_dia_pluviometrico_mm_,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Humedad_relativa_media_porcentaje,2,',','.');?></td>
														<td><?=number_format($rowDatos->Humedad_relativa_8_14_20_porcentaje,2,',','.');?></td>
														<td><?=number_format($rowDatos->Velocidad_media_del_viento_a_2m_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Direccion_prevalente_del_viento_a_2m_PC,2,',','.');?></td>
														<td><?=number_format($rowDatos->Unidades_de_Frio_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Horas_de_Frio_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Punto_de_rocío_medio_C,2,',','.');?></td>
														<td><?=number_format($rowDatos->Direccion_prevalente_del_viento_a_10m_altura_PC,2,',','.');?></td>
														<td><?=number_format($rowDatos->Velocidad_media_del_viento_a_10m_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Maxima_precipitacion_en_30min_mm,2,',','.');?></td>
														<td><?=number_format($rowDatos->Maxima_velocidad_del_viento_km_h,2,',','.');?></td>
														<td><?=number_format($rowDatos->Tensión_de_vapor_media_hPa,2,',','.');?></td>
														<td><?=number_format($rowDatos->Temperatura_media_del_suelo_a_10cm_de_profundidad_C,2,',','.');?></td>
														
													</tr>
												<?//////////////////////////////?>
												<tr>
													<td>Distribucion</td>
													<td></td>
													<td></td>
													<td><?#echo stats_cdf_normal(22.6, $rowDatos->Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C, $rowDatos->Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C, 1); ?></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>Normal</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
					</div>

					<div class="row-fluid">
						<div class="span12">
							<div class="span6">
								<canvas id="myChart" width="100" height="100"></canvas>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
	<script>
		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: [1,2,3,4,5,6,7],
		        datasets: [{
		            label: '# of Votes',
		            data: [1, 3, 6, 7, 6, 3,1],
		            backgroundColor: [
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	</script>
</body>
</html>