<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
	<thead>
		<tr>
			<th width="25%">Nombre</th>
			<th width="75%">Datos</th>
			<!--<th width="5%">Activo</th>
			<th width="5%">Destacado</th>
			<th class="ordenPryTH">#</th>
			<th width="8%" class="ordenPryBotonesTH">Orden</th>-->
		</tr>
	</thead>
	<tbody>
		<?
		cargar('pagina',1);
		$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
		$total = $db->fetchOne("SELECT COUNT(*) AS total FROM ".TABLA." WHERE eliminado = 0"); 
		$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

		$query = "SELECT * FROM ".TABLA." WHERE eliminado = 0 ORDER BY nombre LIMIT ".(($pagina-1)*$paginado).",".$paginado;
		foreach ($db->iterate($query) as $row) { 
			$link = PAGINA_ACTUAL."_editar.php?id=".$row->id;
			?>
			<tr>
				<td><a href="<?=$link?>"><?=$row->nombre;?> <i class="icon-edit"></i></a></td>
				<td><a href="<?=PAGINA_ACTUAL."_datos.php?id=".$row->id?>"><i class="icon-bar-chart"><span  style="font-style: italic;"> Ver datos</span></i></a></td>
				<!--<td>
					<span style="display:none"><?=$row->activo?'Activo':'';?></span>
					<a onclick="updateTable('activar','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two <?=$row->activo?'button-green':'button-red';?>"><i class="<?=$row->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a>
				</td>
				<td>
					<span style="display:none"><?=$row->destacado?'Destacado':'';?></span>
					<a onclick="updateTable('destacar','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two <?=$row->destacado?'button-green':'button-red';?>"><i class="<?=$row->destacado?'icon-ok-sign':'icon-remove-sign';?>"></i></a>
				</td>
				<td class="ordenPryTD">
					<?=$row->orden;?>
				</td>
				<td class="ordenPryBotonesTD">
					<a onclick="updateTable('ordenar_antes','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-up"></i></a>
					<a onclick="updateTable('ordenar_despues','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-down"></i></a>
				</td>-->
			</tr>
		<? } ?>
	</tbody>
</table>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>