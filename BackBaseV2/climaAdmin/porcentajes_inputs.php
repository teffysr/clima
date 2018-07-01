<?cargar('id');//----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Abrigo_150cm</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Abrigo_150cm'")?>
		<input type="text" name="Temperatura_Abrigo_150cm_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Abrigo_150cm_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Abrigo_150cm_Maxima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Abrigo_150cm_Maxima'")?>
		<input type="text" name="Temperatura_Abrigo_150cm_Maxima_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Abrigo_150cm_Maxima_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Abrigo_150cm_Minima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Abrigo_150cm_Minima'")?>
		<input type="text" name="Temperatura_Abrigo_150cm_Minima_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Abrigo_150cm_Minima_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Intemperie_5cm_Minima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Intemperie_5cm_Minima'")?>
		<input type="text" name="Temperatura_Intemperie_5cm_Minima_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Intemperie_5cm_Minima_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Intemperie_50cm_Minima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Intemperie_50cm_Minima'")?>
		<input type="text" name="Temperatura_Intemperie_50cm_Minima_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Intemperie_50cm_Minima_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Suelo_5cm_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Suelo_5cm_Media'")?>
		<input type="text" name="Temperatura_Suelo_5cm_Media_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Suelo_5cm_Media_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Suelo_10cm_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Suelo_10cm_Media'")?>
		<input type="text" name="Temperatura_Suelo_10cm_Media_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Suelo_10cm_Media_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Inte_5cm</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Inte_5cm'")?>
		<input type="text" name="Temperatura_Inte_5cm_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Inte_5cm_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Temperatura_Intemperie_150cm_Minima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Temperatura_Intemperie_150cm_Minima'")?>
		<input type="text" name="Temperatura_Intemperie_150cm_Minima_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Temperatura_Intemperie_150cm_Minima_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Humedad_Suelo</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Humedad_Suelo'")?>
		<input type="text" name="Humedad_Suelo_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Humedad_Suelo_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Precipitacion_Pluviometrica</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Precipitacion_Pluviometrica'")?>
		<input type="text" name="Precipitacion_Pluviometrica_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Precipitacion_Pluviometrica_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Precipitacion_Cronologica</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Precipitacion_Cronologica'")?>
		<input type="text" name="Precipitacion_Cronologica_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Precipitacion_Cronologica_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Precipitacion_Maxima_30minutos</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Precipitacion_Maxima_30minutos'")?>
		<input type="text" name="Precipitacion_Maxima_30minutos_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Precipitacion_Maxima_30minutos_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Heliofania_Efectiva</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Heliofania_Efectiva'")?>
		<input type="text" name="Heliofania_Efectiva_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Heliofania_Efectiva_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Heliofania_Relativa</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Heliofania_Relativa'")?>
		<input type="text" name="Heliofania_Relativa_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Heliofania_Relativa_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Tesion_Vapor_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Tesion_Vapor_Media'")?>
		<input type="text" name="Tesion_Vapor_Media_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Tesion_Vapor_Media_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Humedad_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Humedad_Media'")?>
		<input type="text" name="Humedad_Media_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Humedad_Media_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Humedad_Media_8_14_20</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Humedad_Media_8_14_20'")?>
		<input type="text" name="Humedad_Media_8_14_20_V1" value="<?=$data->valor_a?>">
		<input type="text" name="Humedad_Media_8_14_20_V2" value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Rocio_Medio</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Rocio_Medio'")?>
		<input type="text" name="Rocio_Medio_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Rocio_Medio_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Duracion_Follaje_Mojado</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Duracion_Follaje_Mojado'")?>
		<input type="text" name="Duracion_Follaje_Mojado_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Duracion_Follaje_Mojado_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Velocidad_Viento_200cm_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Velocidad_Viento_200cm_Media'")?>
		<input type="text" name="Velocidad_Viento_200cm_Media_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Velocidad_Viento_200cm_Media_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Velocidad_Viento_Maxima</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Velocidad_Viento_Maxima'")?>
		<input type="text" name="Velocidad_Viento_Maxima_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Velocidad_Viento_Maxima_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Velocidad_Viento_1000cm_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Velocidad_Viento_1000cm_Media'")?>
		<input type="text" name="Velocidad_Viento_1000cm_Media_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Velocidad_Viento_1000cm_Media_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Presion_Media</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Presion_Media'")?>
		<input type="text" name="Presion_Media_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Presion_Media_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Radiacion_Global</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Radiacion_Global'")?>
		<input type="text" name="Radiacion_Global_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Radiacion_Global_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Horas_Frio</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Horas_Frio'")?>
		<input type="text" name="Horas_Frio_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Horas_Frio_V2"  value="<?=$data->valor_b?>">
	</div>
</div>
<?//-----------------?>
<div class="control-group">
	<label for="urlfield" class="control-label style-label">Unidades_Frio</label>
	<div class="controls style-controls">
		<?$data=$db->fetchOneRow("SELECT * FROM valor_default where estacion_id = '{$id}' and columna = 'Unidades_Frio'")?>
		<input type="text" name="Unidades_Frio_V1"  value="<?=$data->valor_a?>">
		<input type="text" name="Unidades_Frio_V2"  value="<?=$data->valor_b?>">
	</div>
</div>