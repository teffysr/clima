<?
	/*
	Fecha 
	Precipitacion_de_0_24_hs_mm
	Precipitacion_como_dia_pluviometrico_mm_
	Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C
	Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C
	Humedad_relativa_media_porcentaje
	Humedad_relativa_8_14_20_porcentaje
	Velocidad_media_del_viento_a_2m_km_h
	Direccion_prevalente_del_viento_a_2m_PC 
	Unidades_de_Frio_h
	Horas_de_Frio_h
	Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C
	Punto_de_rocío_medio_C
	Direccion_prevalente_del_viento_a_10m_altura_PC 
	Velocidad_media_del_viento_a_10m_km_h
	Maxima_precipitacion_en_30min_mm
	Maxima_velocidad_del_viento_km_h
	Tensión_de_vapor_media_hPa
	Temperatura_media_del_suelo_a_10cm_de_profundidad_C
	*/
?>
<div  style="overflow: auto;">
	<table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools dataTable-nofooter dataTable-nofooterhack">
		<thead>
			<tr>
				<th>Fecha </th>
				<th>Precipitacion  de 0 24 hs mm</th>
				<th>Precipitacion  como dia  pluviometrico mm </th>
				<th>Temperatura  Maxima del aire  en abrigo a 1 5 m  de altura C</th>
				<th>Temperatura  minima del aire  en abrigo a 1 5 m  de altura C</th>
				<th>Humedad relativa  media porcentaje</th>
				<th>Humedad relativa  8 14 20 porcentaje</th>
				<th>Velocidad media  del viento a 2m km h</th>
				<th>Direccion prevalente  del viento  a 2m PC </th>
				<th>Unidades de Frio h</th>
				<th>Horas de Frio h</th>
				<th>Temperatura Media  del aire en abrigo  a 1 5 m de altura C</th>
				<th>Punto de rocío medio C</th>
				<th>Direccion prevalente  del viento a 10m  altura PC </th>
				<th>Velocidad media del  viento a 10m km h</th>
				<th>Maxima precipitacion  en 30min mm</th>
				<th>Maxima velocidad del  viento km h</th>
				<th>Tensión de vapor  media hPa</th>
				<th>Temperatura media del  suelo a 10cm de  profundidad C</th>
			</tr>
		</thead>
		<tbody>
			<?
			cargar('pagina',1);
			$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
			$total = $db->fetchOne("SELECT COUNT(*) AS total FROM ".TABLA2." "); 
			$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

			$query = "SELECT * FROM ".TABLA2." WHERE estacion_id = '{$id}' ORDER BY id LIMIT ".(($pagina-1)*$paginado).",".$paginado;

			foreach ($db->iterate($query) as $rowDatos) { 
				?>
				<tr>
					<td><?=$rowDatos->Fecha?></td>
					<td><?=$rowDatos->Precipitacion_de_0_24_hs_mm?></td>
					<td><?=$rowDatos->Precipitacion_como_dia_pluviometrico_mm_?></td>
					<td><?=$rowDatos->Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C?></td>
					<td><?=$rowDatos->Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C?></td>
					<td><?=$rowDatos->Humedad_relativa_media_porcentaje?></td>
					<td><?=$rowDatos->Humedad_relativa_8_14_20_porcentaje?></td>
					<td><?=$rowDatos->Velocidad_media_del_viento_a_2m_km_h?></td>
					<td><?=$rowDatos->Direccion_prevalente_del_viento_a_2m_PC?></td>
					<td><?=$rowDatos->Unidades_de_Frio_h?></td>
					<td><?=$rowDatos->Horas_de_Frio_h?></td>
					<td><?=$rowDatos->Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C?></td>
					<td><?=$rowDatos->Punto_de_rocío_medio_C?></td>
					<td><?=$rowDatos->Direccion_prevalente_del_viento_a_10m_altura_PC?></td>
					<td><?=$rowDatos->Velocidad_media_del_viento_a_10m_km_h?></td>
					<td><?=$rowDatos->Maxima_precipitacion_en_30min_mm?></td>
					<td><?=$rowDatos->Maxima_velocidad_del_viento_km_h?></td>
					<td><?=$rowDatos->Tensión_de_vapor_media_hPa?></td>
					<td><?=$rowDatos->Temperatura_media_del_suelo_a_10cm_de_profundidad_C?></td>
					
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>