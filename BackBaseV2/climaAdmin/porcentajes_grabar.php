<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Porcentajes');
define("PAGINA_ACTUAL", "porcentajes");
define("TABLA", "porcentajes");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

cargar('id',0);
//cargar('Fecha');
cargar('estacion_id',0);
/*

/****************************************************************************************************/
	cargar('Precipitacion_de_0_24_hs_mm_V1');
	cargar('Precipitacion_de_0_24_hs_mm_V2');
	$sql =" SET columna = 'Precipitacion_de_0_24_hs_mm', valor_a = '{$Precipitacion_de_0_24_hs_mm_V1}', valor_b = '{$Precipitacion_de_0_24_hs_mm_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Precipitacion_de_0_24_hs_mm' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Precipitacion_de_0_24_hs_mm' ");
	}
/****************************************************************************************************/
	cargar('Precipitacion_como_dia_pluviometrico_mm_V1');
	cargar('Precipitacion_como_dia_pluviometrico_mm_V2');
	$sql =" SET columna = 'Precipitacion_como_dia_pluviometrico_mm_', valor_a = '{$Precipitacion_como_dia_pluviometrico_mm_V1}', valor_b = '{$Precipitacion_como_dia_pluviometrico_mm_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Precipitacion_como_dia_pluviometrico_mm_' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Precipitacion_como_dia_pluviometrico_mm_' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1');
	cargar('Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2');
	$sql =" SET columna = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C',valor_a = '{$Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1}', valor_b = '{$Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1');
	cargar('Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2');
	$sql =" SET columna = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C',valor_a = '{$Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1}', valor_b = '{$Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C' ");
	}
/****************************************************************************************************/
	cargar('Humedad_relativa_media_porcentaje_V1');
	cargar('Humedad_relativa_media_porcentaje_V2');
	$sql =" SET columna = 'Humedad_relativa_media_porcentaje' , valor_a = '{$Humedad_relativa_media_porcentaje_V1}', valor_b = '{$Humedad_relativa_media_porcentaje_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Humedad_relativa_media_porcentaje' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Humedad_relativa_media_porcentaje' ");
	}
/****************************************************************************************************/
	cargar('Humedad_relativa_8_14_20_porcentaje_V1');
	cargar('Humedad_relativa_8_14_20_porcentaje_V2');
	$sql =" SET columna = 'Humedad_relativa_8_14_20_porcentaje',valor_a = '{$Humedad_relativa_8_14_20_porcentaje_V1}', valor_b = '{$Humedad_relativa_8_14_20_porcentaje_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Humedad_relativa_8_14_20_porcentaje' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Humedad_relativa_8_14_20_porcentaje' ");
	}
/****************************************************************************************************/
	cargar('Velocidad_media_del_viento_a_2m_km_h_V1');
	cargar('Velocidad_media_del_viento_a_2m_km_h_V2');
	$sql =" SET columna = 'Velocidad_media_del_viento_a_2m_km_h', valor_a = '{$Velocidad_media_del_viento_a_2m_km_h_V1}', valor_b = '{$Velocidad_media_del_viento_a_2m_km_h_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Velocidad_media_del_viento_a_2m_km_h' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Velocidad_media_del_viento_a_2m_km_h' ");
	}
/****************************************************************************************************/
	cargar('Direccion_prevalente_del_viento_a_2m_PC_V1');
	cargar('Direccion_prevalente_del_viento_a_2m_PC_V2');
	$sql =" SET columna = 'Direccion_prevalente_del_viento_a_2m_PC',  valor_a = '{$Direccion_prevalente_del_viento_a_2m_PC_V1}', valor_b = '{$Direccion_prevalente_del_viento_a_2m_PC_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Direccion_prevalente_del_viento_a_2m_PC' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Direccion_prevalente_del_viento_a_2m_PC' ");
	}
/****************************************************************************************************/
	cargar('Horas_de_Frio_h_V1');
	cargar('Horas_de_Frio_h_V2');
	$sql =" SET columna = 'Horas_de_Frio_h', valor_a = '{$Horas_de_Frio_h_V1}', valor_b = '{$Horas_de_Frio_h_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Horas_de_Frio_h' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Horas_de_Frio_h' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1');
	cargar('Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2');
	$sql =" SET columna = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C', valor_a = '{$Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V1}', valor_b = '{$Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C' ");
	}
/****************************************************************************************************/
	cargar('Punto_de_rocío_medio_C_V1');
	cargar('Punto_de_rocío_medio_C_V2');
	$sql =" SET columna = 'Punto_de_rocío_medio_C', valor_a = '{$Punto_de_rocío_medio_C_V1}', valor_b = '{$Punto_de_rocío_medio_C_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Punto_de_rocío_medio_C' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Punto_de_rocío_medio_C' ");
	}
/****************************************************************************************************/
	cargar('Direccion_prevalente_del_viento_a_10m_altura_PC_V1');
	cargar('Direccion_prevalente_del_viento_a_10m_altura_PC_V2');
	$sql =" SET columna = 'Direccion_prevalente_del_viento_a_10m_altura_PC', valor_a = '{$Direccion_prevalente_del_viento_a_10m_altura_PC_V1}', valor_b = '{$Direccion_prevalente_del_viento_a_10m_altura_PC_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Direccion_prevalente_del_viento_a_10m_altura_PC' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Direccion_prevalente_del_viento_a_10m_altura_PC' ");
	}
/****************************************************************************************************/
	cargar('Velocidad_media_del_viento_a_10m_km_h_V1');
	cargar('Velocidad_media_del_viento_a_10m_km_h_V2');
	$sql =" SET columna = 'Velocidad_media_del_viento_a_10m_km_h', valor_a = '{$Velocidad_media_del_viento_a_10m_km_h_V1}', valor_b = '{$Velocidad_media_del_viento_a_10m_km_h_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Velocidad_media_del_viento_a_10m_km_h' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Velocidad_media_del_viento_a_10m_km_h' ");
	}
/****************************************************************************************************/
	cargar('Maxima_precipitacion_en_30min_mm_V2');
	cargar('Maxima_precipitacion_en_30min_mm_V1');
	$sql =" SET columna = 'Maxima_precipitacion_en_30min_mm', valor_a = '{$Maxima_precipitacion_en_30min_mm_V1}', valor_b = '{$Maxima_precipitacion_en_30min_mm_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Maxima_precipitacion_en_30min_mm' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Maxima_precipitacion_en_30min_mm' ");
	}
/****************************************************************************************************/
	cargar('Maxima_velocidad_del_viento_km_h_V1');
	cargar('Maxima_velocidad_del_viento_km_h_V2');
	$sql =" SET columna = 'Maxima_velocidad_del_viento_km_h', valor_a = '{$Maxima_velocidad_del_viento_km_h_V1}', valor_b = '{$Maxima_velocidad_del_viento_km_h_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Maxima_velocidad_del_viento_km_h' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Maxima_velocidad_del_viento_km_h' ");
	}
/****************************************************************************************************/
	cargar('Tensión_de_vapor_media_hPa_V1');
	cargar('Tensión_de_vapor_media_hPa_V2');
	$sql =" SET columna = 'Tensión_de_vapor_media_hPa', valor_a = '{$Tensión_de_vapor_media_hPa_V1}', valor_b = '{$Tensión_de_vapor_media_hPa_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Tensión_de_vapor_media_hPa' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Tensión_de_vapor_media_hPa' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V1');
	cargar('Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V2');
	$sql =" SET columna = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C', valor_a = '{$Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V1}', valor_b = '{$Temperatura_media_del_suelo_a_10cm_de_profundidad_C_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_media_del_suelo_a_10cm_de_profundidad_C' ");
	}
/****************************************************************************************************/
	cargar('Unidades_de_Frio_h_V1');
	cargar('Unidades_de_Frio_h_V2');
	$sql =" SET columna = 'Unidades_de_Frio_h', valor_a = '{$Unidades_de_Frio_h_V1}', valor_b = '{$Unidades_de_Frio_h_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Unidades_de_Frio_h' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Unidades_de_Frio_h' ");
	}
/****************************************************************************************************/
	cargar('promedio_anual_V1');
	cargar('promedio_anual_V2');
	$sql =" SET  columna = 'promedio_anual', valor_a = '{$promedio_anual_V1}', valor_b = '{$promedio_anual_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'promedio_anual' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'promedio_anual' ");
	}


/****************************************************************************************************/

$administrador = $_SESSION['administradorId']; $fecha = time();
$db->insert("INSERT INTO log SET tabla = '".TABLA."', tabla_id = '{$estacion_id}', administrador_id = '{$administrador}', fecha = '{$fecha}'");
cargar('volver',0);

if ($volver)
	exit("<script>location.href='".PAGINA_ACTUAL."_editar.php?id={$estacion_id}';</script>");
else 
	exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");
?>