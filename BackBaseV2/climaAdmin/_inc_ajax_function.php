<script type="text/javascript">
	function updateTable(action,id,page) {
		url = "<?=PAGINA_ACTUAL;?>_listado_ajax.php?";

		if (action == 'activar')
			url += "activo=1&id="+id;
		if (action == 'destacar')
			url += "destacado=1&id="+id;
		if (action == 'ordenar_antes')
			url += "orden=1&direccion=antes&id="+id;
		if (action == 'ordenar_despues')
			url += "orden=1&direccion=despues&id="+id;

		<? if ($_SERVER['QUERY_STRING']) { ?>
			url += "&<?=$_SERVER['QUERY_STRING'];?>"
		<? } ?>

		url += "&pagina="+page;

		$.ajax({
			url: url,
			type: "GET",
			success: function(datos) {
				$("#box-table").html(datos);
			}
		})
	}
</script>