<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Categorias');
define("PAGINA_ACTUAL", "categorias");
define("TABLA", "categoria");

cargar('padre',0);
?>
<!doctype html>
<html>
<head>
	<? include_once("_inc_head.php");?>
	<? include_once("_inc_ajax_function.php");?>
</head>
<body data-layout="fixed">
	<? include_once("_inc_top.php");?>
	<div id="main">
		<? include_once("_inc_left.php");?>
		<div id="content">
			<div class="container-fluid" id="content-area">
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-head">
								<i class="icon-table"></i>
								<? 
								if ($padre) { 
									$rowCategoria = $db->fetchOneRow("SELECT id, nombre, padre_id FROM categoria WHERE id = '{$padre}'");
									$nombres[] = "<a href='".PAGINA_ACTUAL."_listado.php?padre=".$rowCategoria->id."'>".$rowCategoria->nombre."</a>";
									while ($rowCategoria = $db->fetchOneRow("SELECT id, nombre, padre_id FROM categoria WHERE id = '{$rowCategoria->padre_id}'")) {
										$nombres[] = "<a href='".PAGINA_ACTUAL."_listado.php?padre=".$rowCategoria->id."'>".$rowCategoria->nombre."</a>";
									}
								} 
								?>
								<span>
									<a href='<?=PAGINA_ACTUAL;?>_listado.php'>Listador</a>
									<? if ($nombres) echo " | ".implode(array_reverse($nombres)," | "); ?>
								</span>
								<? if ($padre) { ?>
									<a style="" href="<?=PAGINA_ACTUAL;?>_editar.php?padre=<?=$padre;?>" class="button button-basic-blue button-small button-list-new"><i class="icon-edit"></i> Nuevo registro</a>
								<? } else { ?>
									<a style="" href="<?=PAGINA_ACTUAL;?>_editar.php" class="button button-basic-blue button-small button-list-new"><i class="icon-edit"></i> Nuevo registro</a>
								<? } ?>
							</div>
							<div id="box-table" class="box-body box-body-nopadding">
								<? include_once(PAGINA_ACTUAL."_listado_tabla.php");?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<? require_once("_inc_bottom.php"); ?>
</body>
</html>