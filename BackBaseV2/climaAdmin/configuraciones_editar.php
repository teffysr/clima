<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Configuraciones');
define("PAGINA_ACTUAL", "configuraciones");
define("TABLA", "configuracion");
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
									<span>Varios</span>
								</div>
								<div class="box-body box-body-nopadding">
									<div class="control-group">
										<label for="urlfield" class="control-label">Listados / Cantidad</label>
										<div class="controls">
											<input type="text" name="listados/cantidad" value="<?=htmlspecialchars($db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'"));?>" class="input-xlarge" data-rule-required="true">
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Logs / Cantidad</label>
										<div class="controls">
											<input type="text" name="logs/cantidad" value="<?=htmlspecialchars($db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'logs/cantidad'"));?>" class="input-xlarge" data-rule-required="true">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-list-ul"></i>
									<span>SMTP</span>
								</div>
								<div class="box-body box-body-nopadding">
									<div class="control-group">
										<label for="urlfield" class="control-label">Host</label>
										<div class="controls">
											<input type="text" name="smtp/host" value="<?=htmlspecialchars($db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'smtp/host'"));?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">User</label>
										<div class="controls">
											<input type="text" name="smtp/user" value="<?=htmlspecialchars($db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'smtp/user'"));?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Pass</label>
										<div class="controls">
											<input type="password" name="smtp/pass" value="<?=$db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'smtp/pass'")?'******':'';?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Activo</label>
										<div class="controls">
											<label class='checkbox-uniformed'>
												<input type="checkbox" name="smtp/activo" <?=$db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'smtp/activo'")?'checked':'';?> class='uniform-me' value="1"> Activo
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="button button-basic-blue"><i class="icon-save"></i> Guardar</button>
				</form>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
</body>
</html>