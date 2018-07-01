<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Estaciones');
define("PAGINA_ACTUAL","estaciones");
define("TABLA","estacion");
define("TABLA2","estacion_datos");
define("TABLA3","estacion_historico");

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
													<th>Temperatura_Abrigo_150cm</th>
													<th>Temperatura_Abrigo_150cm_Maxima</th>
													<th>Temperatura_Abrigo_150cm_Minima</th>
													<th>Temperatura_Intemperie_5cm_Minima</th>
													<th>Temperatura_Intemperie_50cm_Minima</th>
													<th>Temperatura_Suelo_5cm_Media</th>
													<th>Temperatura_Suelo_10cm_Media</th>
													<th>Temperatura_Inte_5cm</th>
													<th>Temperatura_Intemperie_150cm_Minima</th>
													<th>Humedad_Suelo</th>
													<th>Precipitacion_Pluviometrica</th>
													<th>Precipitacion_Cronologica</th>
													<th>Precipitacion_Maxima_30minutos</th>
													<th>Heliofania_Efectiva</th>
													<th>Heliofania_Relativa</th>
													<th>Tesion_Vapor_Media</th>
													<th>Humedad_Media</th>
													<th>Humedad_Media_8_14_20</th>
													<th>Rocio_Medio</th>
													<th>Duracion_Follaje_Mojado</th>
													<th>Velocidad_Viento_200cm_Media</th>
													<th>Velocidad_Viento_1000cm_Media</th>
													<th>Velocidad_Viento_Maxima</th>
													<th>Presion_Media</th>
													<th>Radiacion_Global</th>
													<th>Horas_Frio</th>
													<th>Unidades_Frio</th>
												</tr>
											</thead>
											<tbody>
												<?
												$query = "SELECT 
															avg(Temperatura_Abrigo_150cm) as Temperatura_Abrigo_150cm,
															avg(Temperatura_Abrigo_150cm_Maxima) as Temperatura_Abrigo_150cm_Maxima,
															avg(Temperatura_Abrigo_150cm_Minima) as Temperatura_Abrigo_150cm_Minima,
															avg(Temperatura_Intemperie_5cm_Minima) as Temperatura_Intemperie_5cm_Minima,
															avg(Temperatura_Intemperie_50cm_Minima) as Temperatura_Intemperie_50cm_Minima,
															avg(Temperatura_Suelo_5cm_Media) as Temperatura_Suelo_5cm_Media,
															avg(Temperatura_Suelo_10cm_Media) as Temperatura_Suelo_10cm_Media,
															avg(Temperatura_Inte_5cm) as Temperatura_Inte_5cm,
															avg(Temperatura_Intemperie_150cm_Minima) as Temperatura_Intemperie_150cm_Minima,
															avg(Humedad_Suelo) as Humedad_Suelo,
															avg(Precipitacion_Pluviometrica) as Precipitacion_Pluviometrica,
															avg(Precipitacion_Cronologica) as Precipitacion_Cronologica,
															avg(Precipitacion_Maxima_30minutos) as Precipitacion_Maxima_30minutos,
															avg(Heliofania_Efectiva) as Heliofania_Efectiva,
															avg(Heliofania_Relativa) as Heliofania_Relativa,
															avg(Tesion_Vapor_Media) as Tesion_Vapor_Media,
															avg(Humedad_Media) as Humedad_Media,
															avg(Humedad_Media_8_14_20) as Humedad_Media_8_14_20,
															avg(Rocio_Medio) as Rocio_Medio,
															avg(Duracion_Follaje_Mojado) as Duracion_Follaje_Mojado,
															avg(Velocidad_Viento_200cm_Media) as Velocidad_Viento_200cm_Media,
															avg(Velocidad_Viento_1000cm_Media) as Velocidad_Viento_1000cm_Media,
															avg(Velocidad_Viento_Maxima) as Velocidad_Viento_Maxima,
															avg(Presion_Media) as Presion_Media,
															avg(Radiacion_Global) as Radiacion_Global,
															avg(Horas_Frio) as Horas_Frio,
															avg(Unidades_Frio) as Unidades_Frio
															from estacion_historico where estacion_id = '{$id}' ";

												$rowDatos = $db->fetchOneRow($query);
													?>
													<tr>
														<td>Promedio</td>
														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm_Maxima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_5cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_50cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Suelo_5cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Suelo_10cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Inte_5cm,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_150cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Suelo,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Pluviometrica,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Cronologica,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Maxima_30minutos,2,',','.');?>
														<td><?=number_format($rowDatos->Heliofania_Efectiva,2,',','.');?>
														<td><?=number_format($rowDatos->Heliofania_Relativa,2,',','.');?>
														<td><?=number_format($rowDatos->Tesion_Vapor_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Media_8_14_20,2,',','.');?>
														<td><?=number_format($rowDatos->Rocio_Medio,2,',','.');?>
														<td><?=number_format($rowDatos->Duracion_Follaje_Mojado,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_200cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_1000cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_Maxima,2,',','.');?>
														<td><?=number_format($rowDatos->Presion_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Radiacion_Global,2,',','.');?>
														<td><?=number_format($rowDatos->Horas_Frio,2,',','.');?>
														<td><?=number_format($rowDatos->Unidades_Frio,2,',','.');?>
														
													</tr>
												<?
												$query = "SELECT 
															std(Temperatura_Abrigo_150cm) as Temperatura_Abrigo_150cm,
															std(Temperatura_Abrigo_150cm_Maxima) as Temperatura_Abrigo_150cm_Maxima,
															std(Temperatura_Abrigo_150cm_Minima) as Temperatura_Abrigo_150cm_Minima,
															std(Temperatura_Intemperie_5cm_Minima) as Temperatura_Intemperie_5cm_Minima,
															std(Temperatura_Intemperie_50cm_Minima) as Temperatura_Intemperie_50cm_Minima,
															std(Temperatura_Suelo_5cm_Media) as Temperatura_Suelo_5cm_Media,
															std(Temperatura_Suelo_10cm_Media) as Temperatura_Suelo_10cm_Media,
															std(Temperatura_Inte_5cm) as Temperatura_Inte_5cm,
															std(Temperatura_Intemperie_150cm_Minima) as Temperatura_Intemperie_150cm_Minima,
															std(Humedad_Suelo) as Humedad_Suelo,
															std(Precipitacion_Pluviometrica) as Precipitacion_Pluviometrica,
															std(Precipitacion_Cronologica) as Precipitacion_Cronologica,
															std(Precipitacion_Maxima_30minutos) as Precipitacion_Maxima_30minutos,
															std(Heliofania_Efectiva) as Heliofania_Efectiva,
															std(Heliofania_Relativa) as Heliofania_Relativa,
															std(Tesion_Vapor_Media) as Tesion_Vapor_Media,
															std(Humedad_Media) as Humedad_Media,
															std(Humedad_Media_8_14_20) as Humedad_Media_8_14_20,
															std(Rocio_Medio) as Rocio_Medio,
															std(Duracion_Follaje_Mojado) as Duracion_Follaje_Mojado,
															std(Velocidad_Viento_200cm_Media) as Velocidad_Viento_200cm_Media,
															std(Velocidad_Viento_1000cm_Media) as Velocidad_Viento_1000cm_Media,
															std(Velocidad_Viento_Maxima) as Velocidad_Viento_Maxima,
															std(Presion_Media) as Presion_Media,
															std(Radiacion_Global) as Radiacion_Global,
															std(Horas_Frio) as Horas_Frio,
															std(Unidades_Frio) as Unidades_Frio
															from estacion_historico where estacion_id = '{$id}' ";

												$rowDatos = $db->fetchOneRow($query);
													?>
													<tr>
														<td>Desviación estándar</td>

														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm_Maxima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Abrigo_150cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_5cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_50cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Suelo_5cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Suelo_10cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Inte_5cm,2,',','.');?>
														<td><?=number_format($rowDatos->Temperatura_Intemperie_150cm_Minima,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Suelo,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Pluviometrica,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Cronologica,2,',','.');?>
														<td><?=number_format($rowDatos->Precipitacion_Maxima_30minutos,2,',','.');?>
														<td><?=number_format($rowDatos->Heliofania_Efectiva,2,',','.');?>
														<td><?=number_format($rowDatos->Heliofania_Relativa,2,',','.');?>
														<td><?=number_format($rowDatos->Tesion_Vapor_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Humedad_Media_8_14_20,2,',','.');?>
														<td><?=number_format($rowDatos->Rocio_Medio,2,',','.');?>
														<td><?=number_format($rowDatos->Duracion_Follaje_Mojado,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_200cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_1000cm_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Velocidad_Viento_Maxima,2,',','.');?>
														<td><?=number_format($rowDatos->Presion_Media,2,',','.');?>
														<td><?=number_format($rowDatos->Radiacion_Global,2,',','.');?>
														<td><?=number_format($rowDatos->Horas_Frio,2,',','.');?>
														<td><?=number_format($rowDatos->Unidades_Frio,2,',','.');?>
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
		/*var ctx = document.getElementById("myChart");
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
		});*/
	</script>
</body>
</html>