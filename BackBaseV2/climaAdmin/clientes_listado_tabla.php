</script>
<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
	<thead>
		<tr>
			<th>Nombre</th>
			<th width="5%">Activo</th>
			<th class="ordenPryTH">#</th>
			<th width="8%" class="ordenPryBotonesTH">Orden</th>
		</tr>
	</thead>
	<tbody>
		<?
		$queryTotal = "SELECT COUNT(*) AS total FROM ".TABLA." WHERE eliminado = 0";
		$query = "SELECT Id, Nombre, activo FROM ".TABLA." WHERE eliminado = 0";

		cargar('pagina',1);
		$total = $db->fetchOne($queryTotal); 


		foreach ($db->iterate($query) as $row) { 
			$link = PAGINA_ACTUAL."_editar.php?id=".$row->Id;
			?>
			<tr>
				<td><a href="<?=$link?>"><?=$row->Nombre;?></a></td>
				<td>
					<span style="display:none"><?=$row->activo?'Activo':'';?></span>
					<a onclick="updateTable('activar','<?=$row->Id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two <?=$row->activo?'button-green':'button-red';?>"><i class="<?=$row->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a>
				</td>
				<td class="ordenPryTD">
					<?=$row->orden;?>
				</td>
				<td class="ordenPryBotonesTD">
					<a onclick="updateTable('ordenar_antes','<?=$row->Id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-up"></i></a>
					<a onclick="updateTable('ordenar_despues','<?=$row->Id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-down"></i></a>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>