<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>E-mail</th>
			<th width="5%">Activo</th>
		</tr>
	</thead>
	<tbody>
		<?
		cargar('pagina',1);
		$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
		$total = $db->fetchOne("SELECT COUNT(*) AS total FROM ".TABLA." WHERE eliminado = 0 AND es_editable = 1"); 
		$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

		$query = "SELECT id, nombre, apellido, email, activo FROM ".TABLA." WHERE eliminado = 0 AND es_editable = 1 ORDER BY apellido LIMIT ".(($pagina-1)*$paginado).",".$paginado;
		foreach ($db->iterate($query) as $row) { 
			$link = PAGINA_ACTUAL."_editar.php?id=".$row->id;
			?>
			<tr>
				<td><a href="<?=$link?>"><?=$row->nombre;?></a></td>
				<td><a href="<?=$link?>"><?=$row->apellido;?></a></td>
				<td><a href="<?=$link?>"><?=$row->email;?></a></td>
				<td>
					<span style="display:none"><?=$row->activo?'Activo':'';?></span>
					<a onclick="updateTable('activar','<?=$row->id;?>','<?=$pagina;?>')" class="button button-basic button-small button-icon button-list-two <?=$row->activo?'button-green':'button-red';?>"><i class="<?=$row->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>
<? require_once("_inc_paginador.php"); ?>

<script type="text/javascript">
	applyTableStyles();
</script>