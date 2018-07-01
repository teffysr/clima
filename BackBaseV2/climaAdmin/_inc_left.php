<script type="text/javascript">
	$(document).ready(function(){
		var filename = "<?=PAGINA_ACTUAL;?>";
		$("a[href^='"+filename+"_listado']").closest("li").addClass("active");
		$("a[href^='"+filename+"_editar']").closest("li").addClass("active");
		$("a[href^='"+filename+"_listado']").closest("li").closest("ul[class='subnav']").closest("li").addClass("active open");
		$("a[href^='"+filename+"_editar']").closest("li").closest("ul[class='subnav']").closest("li").addClass("active open");
	});
</script>
<div id="navigation">
	<ul class="mainNav" data-open-subnavs="multi">
		<? if (tiene_permiso('Estaciones')) { ?>
			<li>
				<a href="estaciones_listado.php"><i class="icon-file icon-white"></i><span>Estaciones</span></a>
			</li>
		<? } ?>
		<? if (tiene_permiso('Porcentajes')) { ?>
			<li>
				<a href="porcentajes_listado.php"><i class="icon-file icon-white"></i><span>Porcentajes</span></a>
			</li>
		<? } ?>
		<? if (tiene_permiso('Relacion')) { ?>
			<li>
				<a href="relacion_editar.php"><i class="icon-file icon-white"></i><span>Calculos</span></a>
			</li>
		<? } ?>
		<? if (tiene_permiso('Categorias') || tiene_permiso('Productos')) { ?>
			<li>
				<a href="#"><i class="icon-gift icon-white"></i><span>Productos</span></a>
				<ul class="subnav">
					<? if (tiene_permiso('Categorias')) { ?>
						<li>
							<a href="categorias_listado.php"><span>Categorias</span></a>
						</li>
					<? } ?>
					<? if (tiene_permiso('Productos')) { ?>
						<li>
							<a href="productos_listado.php"><span>Productos</span></a>
						</li>
					<? } ?>
				</ul>
			</li>
		<? } ?>
		<? if (tiene_permiso('Noticias')) { ?>
			<li>
				<a href="noticias_listado.php"><i class="icon-file icon-white"></i><span>Noticias</span></a>
			</li>
		<? } ?>
		<? if (tiene_permiso('Slideshows')) { ?>
			<li>
				<a href="slideshows_listado.php"><i class="icon-tasks icon-white"></i><span>Slideshows</span></a>
			</li>
        <? } ?>
		<? if (tiene_permiso('Configuraciones')) { ?>
			<li>
				<a href="configuraciones_editar.php"><i class="icon-cog icon-white"></i><span>Configuraciones</span></a>
			</li>
		<? } ?>
		<? if (tiene_permiso('Administradores')) { ?>
			<li>
				<a href="administradores_listado.php"><i class="icon-group icon-white"></i><span>Administradores</span></a>
			</li>
		<? } ?>
	</ul>
</div>