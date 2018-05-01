<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Porcentajes');
define("PAGINA_ACTUAL", "porcentajes");
define("TABLA", "porcentajes");
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