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
												<?foreach ($db->iterate("SELECT * FROM estacion ORDER BY nombre") as $estaciones) {
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
										<select name="factor_1" class="factor0">
											<option>Seleccione...</option>
											<option value = 'Temperatura_Abrigo_150cm' >Temperatura_Abrigo_150cm</option>
											<option value = 'Temperatura_Abrigo_150cm_Maxima' >Temperatura_Abrigo_150cm_Maxima</option>
											<option value = 'Temperatura_Abrigo_150cm_Minima' >Temperatura_Abrigo_150cm_Minima</option>
											<option value = 'Temperatura_Intemperie_5cm_Minima' >Temperatura_Intemperie_5cm_Minima</option>
											<option value = 'Temperatura_Intemperie_50cm_Minima' >Temperatura_Intemperie_50cm_Minima</option>
											<option value = 'Temperatura_Suelo_5cm_Media' >Temperatura_Suelo_5cm_Media</option>
											<option value = 'Temperatura_Suelo_10cm_Media' >Temperatura_Suelo_10cm_Media</option>
											<option value = 'Temperatura_Inte_5cm' >Temperatura_Inte_5cm</option>
											<option value = 'Temperatura_Intemperie_150cm_Minima' >Temperatura_Intemperie_150cm_Minima</option>
											<option value = 'Humedad_Suelo' >Humedad_Suelo</option>
											<option value = 'Precipitacion_Pluviometrica' >Precipitacion_Pluviometrica</option>
											<option value = 'Precipitacion_Cronologica' >Precipitacion_Cronologica</option>
											<option value = 'Precipitacion_Maxima_30minutos' >Precipitacion_Maxima_30minutos</option>
											<option value = 'Heliofania_Efectiva' >Heliofania_Efectiva</option>
											<option value = 'Heliofania_Relativa' >Heliofania_Relativa</option>
											<option value = 'Tesion_Vapor_Media' >Tesion_Vapor_Media</option>
											<option value = 'Humedad_Media' >Humedad_Media</option>
											<option value = 'Humedad_Media_8_14_20' >Humedad_Media_8_14_20</option>
											<option value = 'Rocio_Medio' >Rocio_Medio</option>
											<option value = 'Duracion_Follaje_Mojado' >Duracion_Follaje_Mojado</option>
											<option value = 'Velocidad_Viento_200cm_Media' >Velocidad_Viento_200cm_Media</option>
											<option value = 'Velocidad_Viento_1000cm_Media' >Velocidad_Viento_1000cm_Media</option>
											<option value = 'Velocidad_Viento_Maxima' >Velocidad_Viento_Maxima</option>
											<option value = 'Presion_Media' >Presion_Media</option>
											<option value = 'Radiacion_Global' >Radiacion_Global</option>
											<option value = 'Horas_Frio' >Horas_Frio</option>
											<option value = 'Unidades_Frio' >Unidades_Frio</option>
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
										<select name="estacion_id" class="factor1">
											<option>Seleccione...</option>
											
											<option value = 'Temperatura_Abrigo_150cm' >Temperatura_Abrigo_150cm</option>
											<option value = 'Temperatura_Abrigo_150cm_Maxima' >Temperatura_Abrigo_150cm_Maxima</option>
											<option value = 'Temperatura_Abrigo_150cm_Minima' >Temperatura_Abrigo_150cm_Minima</option>
											<option value = 'Temperatura_Intemperie_5cm_Minima' >Temperatura_Intemperie_5cm_Minima</option>
											<option value = 'Temperatura_Intemperie_50cm_Minima' >Temperatura_Intemperie_50cm_Minima</option>
											<option value = 'Temperatura_Suelo_5cm_Media' >Temperatura_Suelo_5cm_Media</option>
											<option value = 'Temperatura_Suelo_10cm_Media' >Temperatura_Suelo_10cm_Media</option>
											<option value = 'Temperatura_Inte_5cm' >Temperatura_Inte_5cm</option>
											<option value = 'Temperatura_Intemperie_150cm_Minima' >Temperatura_Intemperie_150cm_Minima</option>
											<option value = 'Humedad_Suelo' >Humedad_Suelo</option>
											<option value = 'Precipitacion_Pluviometrica' >Precipitacion_Pluviometrica</option>
											<option value = 'Precipitacion_Cronologica' >Precipitacion_Cronologica</option>
											<option value = 'Precipitacion_Maxima_30minutos' >Precipitacion_Maxima_30minutos</option>
											<option value = 'Heliofania_Efectiva' >Heliofania_Efectiva</option>
											<option value = 'Heliofania_Relativa' >Heliofania_Relativa</option>
											<option value = 'Tesion_Vapor_Media' >Tesion_Vapor_Media</option>
											<option value = 'Humedad_Media' >Humedad_Media</option>
											<option value = 'Humedad_Media_8_14_20' >Humedad_Media_8_14_20</option>
											<option value = 'Rocio_Medio' >Rocio_Medio</option>
											<option value = 'Duracion_Follaje_Mojado' >Duracion_Follaje_Mojado</option>
											<option value = 'Velocidad_Viento_200cm_Media' >Velocidad_Viento_200cm_Media</option>
											<option value = 'Velocidad_Viento_1000cm_Media' >Velocidad_Viento_1000cm_Media</option>
											<option value = 'Velocidad_Viento_Maxima' >Velocidad_Viento_Maxima</option>
											<option value = 'Presion_Media' >Presion_Media</option>
											<option value = 'Radiacion_Global' >Radiacion_Global</option>
											<option value = 'Horas_Frio' >Horas_Frio</option>
											<option value = 'Unidades_Frio' >Unidades_Frio</option>
										</select>
									</div>
									<div class="span12 text-center resultados">
										
									</div>					
								</div>
							</div>
						</div>
						<!--/******************************/-->
						<div class="span12 box tabla-probabilidad">
							<div class="box-head">
								<span>Tabla de Probabilidad</span>
							</div>
							<div class="box-body probabilidad">
								<input type="button" name="tabla_prob" value="Generar Tabla" class="btn btn-primary tabla_prob">
								<br>
								<br>
								<table class="table table-bordered tabla_prob_result hide">
									<thead>
										<tr>
											<th>P(+x|U1,U2)</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<input type="button" name="otra" value="Buscar otra Estación" class="btn btn-primary otra hide">
								
							</div>
						</div>
					</div>
					<hr>
					<div class="row-fluid">
						<?# require_once('_inc_botones.php'); ?>
						<?# require_once('_inc_log.php'); ?>
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

		$('.factor0').on('change', function(){
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
				    	html = "U&sup1;+: "+Json.U1+"\
				    	<input type='hidden' name='U1[]' value='"+Json.U1.toFixed(2)+"' class ='U1' id='U&sup1;+' /> \
				    	<br> U&sup1;-: "+Json.U2+"\
				    	<input type='hidden' name='U1[]' value='"+Json.U2.toFixed(2)+"' class ='U1' id='U&sup1;-' /> \
				    	<br> --";
				    }else{
				    	html = "U&sup1;+: "+Json.U1+"\
				    	<input type='hidden' name='U1[]' value='"+Json.U1.toFixed(2)+"' class ='U1' id='U&sup1;+' /> \
				    	<br> U&sup1;°: "+Json.U2+"\
				    	<input type='hidden' name='U1[]' value='"+Json.U2.toFixed(2)+"' class ='U1' id='U&sup1;°' /> \
				    	<br> U&sup1;-: "+Json.U3+"\
				    	<input type='hidden' name='U1[]' value='"+Json.U3.toFixed(2)+"' class ='U1' id='U&sup1;-' />";
				    }
				    $(box).find('.resultados').html(html);

				  });
		});

		$('.factor1').on('change', function(){
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
				    	html = "U&sup2;+: "+Json.U1+"\
				    	<input type='hidden' name='U2[]' value='"+Json.U1.toFixed(2)+"' class ='U2' id='U&sup2;+' /> \
				    	<br> U&sup2;-: "+Json.U2+"\
				    	<input type='hidden' name='U2[]' value='"+Json.U2.toFixed(2)+"' class ='U2' id='U&sup2;-' /> \
				    	<br> --";
				    }else{
				    	html = "U&sup2;+: "+Json.U1+"\
				    	<input type='hidden' name='U2[]' value='"+Json.U1.toFixed(2)+"' class ='U2' id='U&sup2;+' /> \
				    	<br> U&sup2;°: "+Json.U2+"\
				    	<input type='hidden' name='U2[]' value='"+Json.U2.toFixed(2)+"' class ='U2' id='U&sup2;°' /> \
				    	<br> U&sup2;-: "+Json.U3+"\
				    	<input type='hidden' name='U2[]' value='"+Json.U3.toFixed(2)+"' class ='U2' id='U&sup2;-' />";
				    }
				    $(box).find('.resultados').html(html);

				  });
		});

		$('.tabla_prob').on('click', function(){
			$('.tabla_prob_result').removeClass('hide');
			var u1 = $('.U1');
			var u2 = $('.U2');
			for (var i = 0; i < u1.length; i++) {
				var id = $(u1[i]).attr('id');
				$('.tabla_prob_result').find('thead tr').append('<th>');
				$('.tabla_prob_result').find('thead tr th:last').html(id);
			}

			for (var i = 0; i < u2.length; i++) {
				var id2 = $(u2[i]).attr('id');
				$('.tabla_prob_result').find('tbody').append('<tr>');
				$('.tabla_prob_result').find('tbody tr:last').append('<td>');
				$('.tabla_prob_result').find('tbody tr:last td').html(id2);

				for (var j = 0; j < u1.length; j++) {
					var valor = (parseFloat($(u1[j]).val())+parseFloat($(u2[i]).val()))/2;
					console.log(valor + $(u1[j]).attr('id'));
					$('.tabla_prob_result').find('tbody tr:last').append('<td>');
					$('.tabla_prob_result').find('tbody tr:last td:last').html(valor.toFixed(2));
				}
			}

			$('.estacion_id').prop('disabled','disabled');
			$('.factor1').prop('disabled','disabled');
			$('.factor0').prop('disabled','disabled');
			$('.tabla_prob').next('br').remove();
			$('.tabla_prob').hide();
			$('.tabla_prob').next('br').remove();
			$('.otra').removeClass('hide');
			
		});

		$('.otra').on('click', function(){
			location.reload();
		})
	</script>
</body>
</html>