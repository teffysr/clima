<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Categorias');
define("PAGINA_ACTUAL", "categorias");
define("TABLA", "categoria");

cargar('padre',0);

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
									<div class="control-group">
										<label for="urlfield" class="control-label">Varios</label>
										<div class="controls">
											<label class='checkbox-uniformed'>
												<input type="checkbox" name="activo" <?=$row->activo?'checked':'';?> class='uniform-me' value="1"> Activo
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<? /****************************************************************************************************/ ?>
					<div class="row-fluid">
						<div class="row-fluid">
						<div class="span6">
							<div class="box">
								<div class="box-head">
									<i class="icon-reorder"></i>
									<span>Opciones</span>
								</div>
								<div class="box-body">
									<div class="buttons-edit<?=$row->id?'':'-nodelete';?>">
										<input type="hidden" name="id" id="id" value="<?=$row->id;?>">
										<? if ($padre || $row->padre_id) { ?>
											<input type="hidden" name="padre" value="<?=$row->padre_id?$row->padre_id:$padre;?>">
										<? } ?>
										<input type="hidden" name="volver" id="volver" value="0">
										<button type="submit" onclick="$('#volver').val(1)" class="button button-basic-blue"><i class="icon-save"></i> Guardar</button>
										<button type="submit" class="button button-basic-blue"><i class="icon-save"></i> Guardar e ir al listado</button>
										<? if ($padre || $row->padre_id) { ?>
											<a href="<?=PAGINA_ACTUAL;?>_listado.php?padre=<?=$row->padre_id?$row->padre_id:$padre;?>" type="button" class="button button-basic"><i class="icon-remove"></i> Cancelar</a>
										<? } else { ?>
											<a href="<?=PAGINA_ACTUAL;?>_listado.php" type="button" class="button button-basic"><i class="icon-remove"></i> Cancelar</a>
										<? } ?>
										<? if ($row->id) { ?>
											<? if ($row->padre_id) { ?>
												<a href="?id=<?=$row->id;?>&borrar=1&padre=<?=$row->padre_id;?>"  type="button" class="button button-basic-red"><i class="icon-trash"></i> Eliminar</a>
											<? } else { ?>
												<a href="?id=<?=$row->id;?>&borrar=1"  type="button" class="button button-basic-red"><i class="icon-trash"></i> Eliminar</a>
											<? } ?>
										<? } ?>
									</div>
								</div>
							</div>
						</div>
						<? require_once('_inc_log.php'); ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
</body>
</html>