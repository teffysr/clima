<div class="highlight-toolbar footerhack">
	<div class="pull-right">
		<div class="btn-toolbar">
			<div class="btn-group">
				<span><strong>Pagina: <?=$pagina;?> de <?=$paginas;?></strong></span>
			</div>
			<div class="btn-group">
				<? if ($pagina > 1) { ?>
					<a onclick="updateTable('pagina_antes','','<?=$pagina-1?>')" class="button button-basic button-icon" style="cursor:pointer;"><i class="icon-angle-left"></i></a>
				<? } ?>
				<? if ($total > ($pagina * $paginado)) { ?>
					<a onclick="updateTable('pagina_despues','','<?=$pagina+1?>')" class="button button-basic button-icon" style="cursor:pointer;"><i class="icon-angle-right"></i></a>
				<? } ?>
			</div>
			<div class="btn-group">
				<a href="" class="button button-basic button-icon" rel="tooltip" title="Refrescar"><i class="icon-refresh"></i></a>
			</div>
		</div>
	</div>
</div>