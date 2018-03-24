<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Administradores');
define("PAGINA_ACTUAL", "administradores");
define("TABLA", "administrador");

if (cargar('id') && cargar('borrar')) { borrarRegistro(TABLA, $id); exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>"); }

$row = $db->fetchOneRow(sprintf("SELECT * FROM ".TABLA." WHERE id = %d AND es_editable = 1",cargar('id',0)));
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
											<input type="text" name="nombre" value="<?=htmlspecialchars($row->nombre);?>" class="input-xlarge" data-rule-required="true" value="<?=$row->nombre;?>">
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Apellido</label>
										<div class="controls">
											<input type="text" name="apellido" value="<?=htmlspecialchars($row->apellido);?>" class="input-xlarge" data-rule-required="true">
										</div>
									</div>
									<div class="control-group">
										<label for="maxlengthfield" class="control-label">Email</label>
										<div class="controls">
											<div class="input-append">
												<input type="text" name="email" value="<?=htmlspecialchars($row->email);?>" class="input-xlarge" data-rule-email="true" data-rule-required="true">
												<span class="add-on">@</span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Usuario</label>
										<div class="controls">
											<input type="text" name="usuario" value="<?=htmlspecialchars($row->usuario);?>" class="input-xlarge" data-rule-required="true">
										</div>
									</div>
									<div class="control-group">
										<label for="pwfield" class="control-label">Clave</label>
										<div class="controls">
											<div class="input-append">
												<input type="password" name="clave" id="clave" class="input-xlarge" data-rule-required="<?=$row->id?'false':'true';?>" data-rule-minlength="6">
												<span class="add-on"><i class="icon-key"></i></span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="confirmfield" class="control-label">Confirmar clave</label>
										<div class="controls">
											<div class="input-append">
												<input type="password" name="confirmar_clave" class="input-xlarge" data-rule-required="<?=$row->id?'false':'true';?>" data-rule-minlength="6" data-rule-equalTo="#clave">
												<span class="add-on"><i class="icon-key"></i></span>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Varios</label>
										<div class="controls">
											<label class='checkbox-uniformed'>
												<input type="checkbox" name="activo" <?=$row->activo?'checked':'';?> class='uniform-me' value="1"> Activo
											</label>
										</div>
									</div>
									<div class="control-group">
										<label for="urlfield" class="control-label">Permisos</label>
										<div class="controls">
											<? foreach($PERMISOS as $key => $value) { 
												if (!is_numeric($key)) continue; ?>
												<label class='checkbox-uniformed'>
													<input type="checkbox" name="permisos[]" class='uniform-me' value="<?=$key?>" <?=$db->fetchOneRow("SELECT * FROM administrador_permiso WHERE administrador_id = '{$id}' AND permiso_id = '{$key}'")?'checked':'';?>> <?=str_replace("_", " ", $value);?>
												</label>
											<? } ?>
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