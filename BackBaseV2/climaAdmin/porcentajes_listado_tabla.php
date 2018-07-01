<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
	<thead>
		<tr>
			<th width="25%">Estacion</th>
			<th width="25%">Referencia</th>
			<th width="50%">#</th>
		</tr>
	</thead>
	<tbody>
		<?
		$queryTotal = "SELECT COUNT(*) AS total FROM estacion WHERE eliminado = 0";
		$query = "SELECT * FROM estacion  WHERE eliminado = 0";

		cargar('pagina',1);
		$total = $db->fetchOne($queryTotal); 
		$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
		$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

		$query .= " ORDER BY nombre";
		$query .= " LIMIT ".(($pagina-1)*$paginado).",".$paginado;

		foreach ($db->iterate($query) as $row) { 
			$link = PAGINA_ACTUAL."_editar.php?id=".$row->id;
			?>
			<tr>
				<td><a href="<?=$link?>">
					<?=$row->nombre; ?>
				</a></td>
				<td><a href="<?=$link?>"><i class="icon-bar-chart"><span  style="font-style: italic;"> Ver valores</span></i></a></td>
				<td>#</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>