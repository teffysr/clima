<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Sub-Categorias</th>
			<th width="5%">Activo</th>
			<th class="ordenPryTH">#</th>
			<th width="8%" class="ordenPryBotonesTH">Orden</th>
		</tr>
	</thead>
	<tbody>
		<?
		$queryTotal = "SELECT COUNT(*) AS total FROM ".TABLA." WHERE eliminado = 0";
		$query = "SELECT id, nombre, activo FROM ".TABLA." WHERE eliminado = 0";

		if (cargar('padre')) {
			$query .= " AND padre_id = '{$padre}'";
			$queryTotal .= " AND padre_id = '{$padre}'";
		} else {
			$query .= " AND padre_id = '0'";
			$queryTotal .= " AND padre_id = '0'";
		}

		cargar('pagina',1);
		$total = $db->fetchOne($queryTotal); 
		$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
		$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

		$query .= " ORDER BY orden";
		$query .= " LIMIT ".(($pagina-1)*$paginado).",".$paginado;

		foreach ($db->iterate($query) as $row) { 
			$link = PAGINA_ACTUAL."_editar.php?id=".$row->id;
			?>
			<tr>
				<td><a href="<?=$link?>"><?=$row->nombre;?></a></td>
				<td><a href="categorias_listado.php?padre=<?=$row->id;?>">Setear</a></td>
				<td>
					<span style="display:none"><?=$row->activo?'Activo':'';?></span>
					<a onclick="updateTable('activar','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two <?=$row->activo?'button-green':'button-red';?>"><i class="<?=$row->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a>
				</td>
				<td class="ordenPryTD">
					<?=$row->orden;?>
				</td>
				<td class="ordenPryBotonesTD">
					<a onclick="updateTable('ordenar_antes','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-up"></i></a>
					<a onclick="updateTable('ordenar_despues','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-down"></i></a>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>