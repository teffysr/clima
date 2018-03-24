<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Estaciones');
define("PAGINA_ACTUAL","estaciones");
define("TABLA","estacion");

if (cargar('id') && cargar('borrar')) { borrarRegistro(TABLA, $id, DIR_UPLOADS_NOTICIAS.$id); exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>"); }

$row = $db->fetchOneRow(sprintf("SELECT * FROM ".TABLA." WHERE id = %d",cargar('id',0)));
?>
<!doctype html>
<html>
<head>
	<? include_once("_inc_head.php");?>
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
										<label for="urlfield" class="control-label">Nombre</label>
										<div class="controls">
											<input type="text" name="nombre" value="<?=htmlspecialchars($row->nombre);?>" class="input-xlarge" data-rule-required="true">
										</div>
									</div>
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