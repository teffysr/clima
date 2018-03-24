<div class="span6">
	<div class="box">
		<div class="box-head">
			<i class="icon-reorder"></i>
			<span>Opciones</span>
		</div>
		<div class="box-body">
			<div class="buttons-edit<?=$row->id?'':'-nodelete';?>">
				<input type="hidden" name="id" id="id" value="<?=$row->id;?>">
				<input type="hidden" name="volver" id="volver" value="0">
				<button type="submit" onclick="$('#volver').val(1)" class="button button-basic-blue"><i class="icon-save"></i> Guardar</button>
				<button type="submit" class="button button-basic-blue"><i class="icon-save"></i> Guardar e ir al listado</button>
				<a href="<?=PAGINA_ACTUAL;?>_listado.php" type="button" class="button button-basic"><i class="icon-remove"></i> Cancelar</a>
				<? if ($row->id) { ?>
					<a href="?id=<?=$row->id;?>&borrar=1"  type="button" class="button button-basic-red"><i class="icon-trash"></i> Eliminar</a>
				<? } ?>
			</div>
		</div>
	</div>
</div>