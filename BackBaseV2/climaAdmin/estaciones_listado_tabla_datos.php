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
				<th>Fecha</th>
				<th>Temperatura_Abrigo_150cm</th>
				<th>Temperatura_Abrigo_150cm_Maxima</th>
				<th>Temperatura_Abrigo_150cm_Minima</th>
				<th>Temperatura_Intemperie_5cm_Minima</th>
				<th>Temperatura_Intemperie_50cm_Minima</th>
				<th>Temperatura_Suelo_5cm_Media</th>
				<th>Temperatura_Suelo_10cm_Media</th>
				<th>Temperatura_Inte_5cm</th>
				<th>Temperatura_Intemperie_150cm_Minima</th>
				<th>Humedad_Suelo</th>
				<th>Precipitacion_Pluviometrica</th>
				<th>Precipitacion_Cronologica</th>
				<th>Precipitacion_Maxima_30minutos</th>
				<th>Heliofania_Efectiva</th>
				<th>Heliofania_Relativa</th>
				<th>Tesion_Vapor_Media</th>
				<th>Humedad_Media</th>
				<th>Humedad_Media_8_14_20</th>
				<th>Rocio_Medio</th>
				<th>Duracion_Follaje_Mojado</th>
				<th>Velocidad_Viento_200cm_Media</th>
				<th>Direccion_Viento_200cm</th>
				<th>Velocidad_Viento_1000cm_Media</th>
				<th>Direccion_Viento_1000cm</th>
				<th>Velocidad_Viento_Maxima</th>
				<th>Presion_Media</th>
				<th>Radiacion_Global</th>
				<th>Horas_Frio</th>
				<th>Unidades_Frio</th>
			</tr>
		</thead>
		<tbody>
			<?
			cargar('pagina',1);
			$paginado = $db->fetchOne("SELECT valor FROM configuracion WHERE entidad = 'listados/cantidad'");
			$total = $db->fetchOne("SELECT COUNT(*) AS total FROM ".TABLA3." "); 
			$paginas = ceil($total/$paginado)>0 ? ceil($total/$paginado) : 1;

			$query = "SELECT * FROM ".TABLA3." WHERE estacion_id = '{$id}' ORDER BY Fecha desc LIMIT ".(($pagina-1)*$paginado).",".$paginado;

			foreach ($db->iterate($query) as $rowDatos) { 
				?>
				<tr>
					<td><?=date("d/m/Y", strtotime($rowDatos->Fecha));?></td>
					<td><?=$rowDatos->Temperatura_Abrigo_150cm;?></td>
					<td><?=$rowDatos->Temperatura_Abrigo_150cm_Maxima;?></td>
					<td><?=$rowDatos->Temperatura_Abrigo_150cm_Minima;?></td>
					<td><?=$rowDatos->Temperatura_Intemperie_5cm_Minima;?></td>
					<td><?=$rowDatos->Temperatura_Intemperie_50cm_Minima;?></td>
					<td><?=$rowDatos->Temperatura_Suelo_5cm_Media;?></td>
					<td><?=$rowDatos->Temperatura_Suelo_10cm_Media;?></td>
					<td><?=$rowDatos->Temperatura_Inte_5cm;?></td>
					<td><?=$rowDatos->Temperatura_Intemperie_150cm_Minima;?></td>
					<td><?=$rowDatos->Humedad_Suelo;?></td>
					<td><?=$rowDatos->Precipitacion_Pluviometrica;?></td>
					<td><?=$rowDatos->Precipitacion_Cronologica;?></td>
					<td><?=$rowDatos->Precipitacion_Maxima_30minutos;?></td>
					<td><?=$rowDatos->Heliofania_Efectiva;?></td>
					<td><?=$rowDatos->Heliofania_Relativa;?></td>
					<td><?=$rowDatos->Tesion_Vapor_Media;?></td>
					<td><?=$rowDatos->Humedad_Media;?></td>
					<td><?=$rowDatos->Humedad_Media_8_14_20;?></td>
					<td><?=$rowDatos->Rocio_Medio;?></td>
					<td><?=$rowDatos->Duracion_Follaje_Mojado;?></td>
					<td><?=$rowDatos->Velocidad_Viento_200cm_Media;?></td>
					<td><?=$rowDatos->Direccion_Viento_200cm;?></td>
					<td><?=$rowDatos->Velocidad_Viento_1000cm_Media;?></td>
					<td><?=$rowDatos->Direccion_Viento_1000cm;?></td>
					<td><?=$rowDatos->Velocidad_Viento_Maxima;?></td>
					<td><?=$rowDatos->Presion_Media;?></td>
					<td><?=$rowDatos->Radiacion_Global;?></td>
					<td><?=$rowDatos->Horas_Frio;?></td>
					<td><?=$rowDatos->Unidades_Frio;?></td
				</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? include_once("_inc_paginador.php");?>

<script type="text/javascript">
	applyTableStyles();
</script>