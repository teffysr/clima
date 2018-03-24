<?
$query = "SELECT id, archivo, extension, descripcion, activo FROM ".TABLA_ARCHIVOS." WHERE ".TABLA_ARCHIVOS_FK." = '{$row->id}' AND eliminado = 0 ORDER BY orden";
if ($galeria_archivos || (!$galeria_archivos && !$db->fetchOneRow($query))) {
	?>
	<div class="fileupload fileupload-new" data-provides="fileupload">
		<input type="text" name="archivo_descripcion_nuevo" class="input-large" placeholder="Descripción">
		<span class="button button-basic btn-file">
			<span class="fileupload-new">Nuevo archivo</span>
			<span class="fileupload-exists">Cambiar</span>
			<input type="file" name="archivo[]" id="archivo" <?=$galeria_archivos?'multiple':'';?> />
		</span>
		<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
		<button type="submit" onclick="$('#volver').val(1)" class="button button-basic btn-file">Subir</button>
	</div>
	<?
}
if ($db->fetchOneRow($query)) {
	?>
	<input type="hidden" name="idArchivo" id="idArchivo" value="" />
	<input type="hidden" name="eliminarArchivo" id="eliminarArchivo" />
	<input type="hidden" name="activarArchivo" id="activarArchivo" />
	<input type="hidden" name="ordenarArchivo" id="ordenarArchivo" />
	<input type="hidden" name="direccionArchivo" id="direccionArchivo" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("#archivo").val('');
			$("input[name$='Archivo']").val("");

			$(".imagenes a").click(function () {
				$("#idArchivo").val( $(this).closest("tr").find("input[type='hidden']").val() );
		    });

		    $("a[name='btnEliminarArchivo']").click(function () {
				$("#eliminarArchivo").val(1);
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
		    $("a[name='btnActivarArchivo']").click(function () {
				$("#activarArchivo").val(1);
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
			$("a[name='btnDireccionArchivoAntes']").click(function () {
				$("#ordenarArchivo").val(1);
				$("#direccionArchivo").val("antes");
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
		    $("a[name='btnDireccionArchivoDespues']").click(function () {
				$("#ordenarArchivo").val(1);
				$("#direccionArchivo").val("despues");
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
	    });
	</script>
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-picture"></i>
					<span>Archivos</span>
				</div>
				<div class="box-body box-body-nopadding">
					<table class="table table-nomargin imagenes">
						<thead>
							<tr>
								<th>Descripción</th>
								<th width="10%">Descargar</th>
								<th width="10%">Eliminar</th>
								<th width="10%">Activo</th>
								<? if ($galeria_archivos) { ?>
									<th width="10%">Orden</th>
								<? } ?>
							</tr>
						</thead>
						<tbody>
							<? foreach ($db->iterate($query) as $rowArchivo) { ?>
								<tr>
									<input type="hidden" value="<?=$rowArchivo->id;?>">
									<td>
										<input type="text" name="archivo_descripcion[<?=$rowArchivo->id;?>]" class="input-block-level" value="<?=htmlspecialchars($rowArchivo->descripcion);?>">
									</td>
									<td><a href="descargas.php?seccion=<?=SECCION_ARCHIVOS;?>&id=<?=$rowArchivo->id;?>" class="button button-basic button-small button-icon button-list-three"><i class="icon-search"></i></a></td>
									<td><a name="btnEliminarArchivo" class="button button-basic button-small button-icon button-list-one"><i class="icon-trash"></i></a></td>
									<td><a name="btnActivarArchivo" class="button button-basic button-small button-icon button-list-two <?=$rowArchivo->activo?'button-green':'button-red';?>"><i class="<?=$rowArchivo->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a></td>
									<? if ($galeria_archivos) { ?>
										<td>
											<a name="btnDireccionArchivoAntes" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-up"></i></a>
											<a name="btnDireccionArchivoDespues" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-down"></i></a>
										</td>
									<? } ?>
								</tr>
							<? } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<? } ?>