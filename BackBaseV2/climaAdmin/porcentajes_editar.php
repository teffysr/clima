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

cargar('id_estacion');
cargar('Fecha');
cargar('Temperatura_Abrigo_150cm');
cargar('Temperatura_Abrigo_150cm_Maxima');
cargar('Temperatura_Abrigo_150cm_Minima');
cargar('Temperatura_Intemperie_5cm_Minima');
cargar('Temperatura_Intemperie_50cm_Minima');
cargar('Temperatura_Suelo_5cm_Media');
cargar('Temperatura_Suelo_10cm_Media');
cargar('Temperatura_Inte_5cm');
cargar('Temperatura_Intemperie_150cm_Minima');
cargar('Humedad_Suelo');
cargar('Precipitacion_Pluviometrica');
cargar('Precipitacion_Cronologica');
cargar('Precipitacion_Maxima_30minutos');
cargar('Heliofania_Efectiva');
cargar('Heliofania_Relativa');
cargar('Tesion_Vapor_Media');
cargar('Humedad_Media');
cargar('Humedad_Media_8_14_20');
cargar('Rocio_Medio');
cargar('Duracion_Follaje_Mojado');
cargar('Velocidad_Viento_200cm_Media');
cargar('Direccion_Viento_200cm');
cargar('Velocidad_Viento_1000cm_Media');
cargar('Direccion_Viento_1000cm');
cargar('Velocidad_Viento_Maxima');
cargar('Presion_Media');
cargar('Radiacion_Global');
cargar('Horas_Frio');
cargar('Unidades_Frio');
cargar('id');
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
		.style-controls { margin-left:30% !important; }
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
											<input type="hidden" name="estacion_id" value="<?=$id?>">
											<label><?=$db->fetchOne("SELECT nombre FROM estacion WHERE id = '{$id}' ")?></label>
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