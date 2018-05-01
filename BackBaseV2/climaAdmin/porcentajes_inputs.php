<?cargar('id');//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Precipitacion_de_0_24_hs_mm</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Precipitacion_de_0_24_hs_mm'")?>
		<input type="text" name="Precipitacion_de_0_24_hs_mm_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Precipitacion_de_0_24_hs_mm_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Precipitacion_como_dia_pluviometrico_mm_</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Precipitacion_como_dia_pluviometrico_mm_'")?>
		<input type="text" name="Precipitacion_como_dia_pluviometrico_mm_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Precipitacion_como_dia_pluviometrico_mm_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C'")?>
		<input type="text" name="Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C'")?>
		<input type="text" name="Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Humedad_relativa_media_porcentaje</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Humedad_relativa_media_porcentaje'")?>
		<input type="text" name="Humedad_relativa_media_porcentaje_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Humedad_relativa_media_porcentaje_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Humedad_relativa_8_14_20_porcentaje</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Humedad_relativa_8_14_20_porcentaje'")?>
		<input type="text" name="Humedad_relativa_8_14_20_porcentaje_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Humedad_relativa_8_14_20_porcentaje_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Velocidad_media_del_viento_a_2m_km_h</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Velocidad_media_del_viento_a_2m_km_h'")?>
		<input type="text" name="Velocidad_media_del_viento_a_2m_km_h_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Velocidad_media_del_viento_a_2m_km_h_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Direccion_prevalente_del_viento_a_2m_PC</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Velocidad_media_del_viento_a_2m_km_h'")?>
		<input type="text" name="Direccion_prevalente_del_viento_a_2m_PC_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Direccion_prevalente_del_viento_a_2m_PC_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Unidades_de_Frio_h</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Unidades_de_Frio_h'")?>
		<input type="text" name="Unidades_de_Frio_h_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Unidades_de_Frio_h_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Horas_de_Frio_h</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Horas_de_Frio_h'")?>
		<input type="text" name="Horas_de_Frio_h_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Horas_de_Frio_h_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C'")?>
		<input type="text" name="Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Punto_de_rocío_medio_C</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Punto_de_rocío_medio_C'")?>
		<input type="text" name="Punto_de_rocío_medio_C_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Punto_de_rocío_medio_C_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Direccion_prevalente_del_viento_a_10m_altura_PC</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Direccion_prevalente_del_viento_a_10m_altura_PC'")?>
		<input type="text" name="Direccion_prevalente_del_viento_a_10m_altura_PC_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Direccion_prevalente_del_viento_a_10m_altura_PC_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Velocidad_media_del_viento_a_10m_km_h</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Direccion_prevalente_del_viento_a_10m_altura_PC'")?>
		<input type="text" name="Velocidad_media_del_viento_a_10m_km_h_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Velocidad_media_del_viento_a_10m_km_h_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Maxima_precipitacion_en_30min_mm</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Maxima_precipitacion_en_30min_mm'")?>
		<input type="text" name="Maxima_precipitacion_en_30min_mm_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Maxima_precipitacion_en_30min_mm_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Maxima_velocidad_del_viento_km_h</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Maxima_velocidad_del_viento_km_h'")?>
		<input type="text" name="Maxima_velocidad_del_viento_km_h_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Maxima_velocidad_del_viento_km_h_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Tensión_de_vapor_media_hPa</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Tensión_de_vapor_media_hPa'")?>
		<input type="text" name="Tensión_de_vapor_media_hPa_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Tensión_de_vapor_media_hPa_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_media_del_suelo_a_10cm_de_profundidad_C</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C'")?>
		<input type="text" name="Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Promedio_anual</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'promedio_anual'")?>
		<input type="text" name="promedio_anual_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="promedio_anual_V2"  value="<?=$data->valor_b?>">
	</div>
</div>