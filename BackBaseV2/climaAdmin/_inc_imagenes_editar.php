<?
$query = "SELECT id, imagen, extension, descripcion, activo, principal FROM ".TABLA_IMAGENES." WHERE ".TABLA_IMAGENES_FK." = '{$row->id}' AND eliminado = 0 ORDER BY orden";
if ($galeria_imagenes || (!$galeria_imagenes && !$db->fetchOneRow($query))) {
	?>
	<div class="fileupload fileupload-new" data-provides="fileupload">
		<input type="text" name="imagen_descripcion_nueva" class="input-large" placeholder="Descripción">
		<span class="button button-basic btn-file">
			<span class="fileupload-new">Nueva imagen</span>
			<span class="fileupload-exists">Cambiar</span>
			<input type="file" name="imagen[]" id="imagen" <?=$galeria_imagenes?'multiple':'';?> />
		</span>
		<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
		<button type="submit" onclick="$('#volver').val(1)" class="button button-basic btn-file">Subir</button>
	</div>
	<?
}
if ($db->fetchOneRow($query)) {
	?>
	<input type="hidden" name="idImagen" id="idImagen" value="" />
	<input type="hidden" name="eliminarImagen" id="eliminarImagen" />
	<input type="hidden" name="activarImagen" id="activarImagen" />
	<input type="hidden" name="principalImagen" id="principalImagen" />
	<input type="hidden" name="ordenarImagen" id="ordenarImagen" />
	<input type="hidden" name="direccionImagen" id="direccionImagen" />
	<script type="text/javascript">
		$(document).ready(function(){
			$("#imagen").val('');
			$("input[name$='Imagen']").val("");

			$(".imagenes a").click(function () {
				$("#idImagen").val( $(this).closest("tr").find("input[type='hidden']").val() );
		    });

		    $("a[name='btnEliminarImagen']").click(function () {
				$("#eliminarImagen").val(1);
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
		    $("a[name='btnActivarImagen']").click(function () {
				$("#activarImagen").val(1);
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
		    $("a[name='btnPrincipalImagen']").click(function () {
				$("#principalImagen").val(1);
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
			$("a[name='btnDireccionImagenAntes']").click(function () {
				$("#ordenarImagen").val(1);
				$("#direccionImagen").val("antes");
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
		    $("a[name='btnDireccionImagenDespues']").click(function () {
				$("#ordenarImagen").val(1);
				$("#direccionImagen").val("despues");
				$("#<?=PAGINA_ACTUAL;?>").submit();
		    });
	    });
	</script>
	<div class="row-fluid">
		<div class="span12">
			<div class="box">
				<div class="box-head">
					<i class="icon-picture"></i>
					<span>Imagenes</span>
				</div>
				<div class="box-body box-body-nopadding">
					<table class="table table-nomargin imagenes">
						<thead>
							<tr>
								<th>Descripción</th>
								<th width="10%">Ver</th>
								<th width="10%">Eliminar</th>
								<th width="10%">Activo</th>
								<? if ($galeria_imagenes) { ?>
									<th width="10%">Principal</th>
									<th width="10%">Orden</th>
								<? } ?>
							</tr>
						</thead>
						<tbody>
							<? foreach ($db->iterate($query) as $rowImagen) { ?>
								<tr>
									<input type="hidden" value="<?=$rowImagen->id;?>">
									<td>
										<input type="text" name="imagen_descripcion[<?=$rowImagen->id;?>]" class="input-block-level" value="<?=htmlspecialchars($rowImagen->descripcion);?>">
									</td>
									<td><a href="<?=CARPETA_IMAGENES.$rowImagen->imagen.$rowImagen->extension;?>" class="button button-basic button-small button-icon button-list-three modalNorm"><i class="icon-search"></i></a></td>
									<td><a name="btnEliminarImagen" class="button button-basic button-small button-icon button-list-one"><i class="icon-trash"></i></a></td>
									<td><a name="btnActivarImagen" class="button button-basic button-small button-icon button-list-two <?=$rowImagen->activo?'button-green':'button-red';?>"><i class="<?=$rowImagen->activo?'icon-ok-sign':'icon-remove-sign';?>"></i></a></td>
									<? if ($galeria_imagenes) { ?>
										<td><a name="btnPrincipalImagen" class="button button-basic button-small button-icon button-list-two <?=$rowImagen->principal?'button-green':'button-red';?>"><i class="<?=$rowImagen->principal?'icon-ok-sign':'icon-remove-sign';?>"></i></a></td>
										<td>
											<a name="btnDireccionImagenAntes" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-up"></i></a>
											<a name="btnDireccionImagenDespues" class="button button-basic button-small button-icon button-list-two"><i class="icon-chevron-down"></i></a>
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