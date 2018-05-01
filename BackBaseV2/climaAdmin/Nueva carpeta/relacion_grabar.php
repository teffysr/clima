<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Porcentajes');
define("PAGINA_ACTUAL", "porcentajes");
define("TABLA", "porcentajes");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

cargar('id',0);
//cargar('Fecha');
cargar('estacion_id');
cargar('promedio_anual');
cargar('Precipitacion_de_0_24_hs_mm');
cargar('Precipitacion_como_dia_pluviometrico_mm_');
cargar('Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Humedad_relativa_media_porcentaje');
cargar('Humedad_relativa_8_14_20_porcentaje');
cargar('Velocidad_media_del_viento_a_2m_km_h');
cargar('Direccion_prevalente_del_viento_a_2m_PC');
cargar('Unidades_de_Frio_h');
cargar('Horas_de_Frio_h');
cargar('Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C');
cargar('Punto_de_rocío_medio_C');
cargar('Direccion_prevalente_del_viento_a_10m_altura_PC');
cargar('Velocidad_media_del_viento_a_10m_km_h');
cargar('Maxima_precipitacion_en_30min_mm');
cargar('Maxima_velocidad_del_viento_km_h');
cargar('Tensión_de_vapor_media_hPa');
cargar('Temperatura_media_del_suelo_a_10cm_de_profundidad_C');

if ($linea)
	$categoria = $db->fetchOne("SELECT categoria_id FROM linea WHERE id = '{$linea}'");

/*****/

$fecha = date('Y-m-d H:i:s');

$sql = "
SET 
estacion_id = '{$estacion_id}',
promedio_anual = '{$promedio_anual}',
fecha = '{$fecha}',
precipitacion_de_0_24_hs_mm = '{$Precipitacion_de_0_24_hs_mm}',
precipitacion_como_dia_pluviometrico_mm_ = '{$Precipitacion_como_dia_pluviometrico_mm_}',
temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C = '{$Temperatura_Maxima_del_aire_en_abrigo_a_1_5_m_de_altura_C}',
temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C = '{$Temperatura_minima_del_aire_en_abrigo_a_1_5_m_de_altura_C}',
humedad_relativa_media_porcentaje = '{$Humedad_relativa_media_porcentaje}',
humedad_relativa_8_14_20_porcentaje = '{$Humedad_relativa_8_14_20_porcentaje}',
velocidad_media_del_viento_a_2m_km_h = '{$Velocidad_media_del_viento_a_2m_km_h}',
direccion_prevalente_del_viento_a_2m_PC = '{$Direccion_prevalente_del_viento_a_2m_PC}',
unidades_de_Frio_h = '{$Unidades_de_Frio_h}',
horas_de_Frio_h = '{$Horas_de_Frio_h}',
temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C = '{$Temperatura_Media_del_aire_en_abrigo_a_1_5_m_de_altura_C}',
punto_de_rocío_medio_C = '{$Punto_de_rocío_medio_C}',
direccion_prevalente_del_viento_a_10m_altura_PC = '{$Direccion_prevalente_del_viento_a_10m_altura_PC}',
velocidad_media_del_viento_a_10m_km_h = '{$Velocidad_media_del_viento_a_10m_km_h}',
maxima_precipitacion_en_30min_mm = '{$Maxima_precipitacion_en_30min_mm}',
maxima_velocidad_del_viento_km_h = '{$Maxima_velocidad_del_viento_km_h}',
tensión_de_vapor_media_hPa = '{$Tensión_de_vapor_media_hPa}',
temperatura_media_del_suelo_a_10cm_de_profundidad_C = '{$Temperatura_media_del_suelo_a_10cm_de_profundidad_C}',
eliminado = 0
";

if (!$id || !$db->fetchOne("SELECT id FROM ".TABLA." WHERE id = '{$id}'")) {
	$id = $db->insert("INSERT INTO ".TABLA." ".$sql);
} else {
	$db->update("UPDATE ".TABLA." ".$sql." WHERE id = '{$id}'");
}

$administrador = $_SESSION['administradorId']; $fecha = time();
$db->insert("INSERT INTO log SET tabla = '".TABLA."', tabla_id = '{$id}', administrador_id = '{$administrador}', fecha = '{$fecha}'");

/****************************************************************************************************/

cargar('volver',0);

if ($volver)
	exit("<script>location.href='".PAGINA_ACTUAL."_editar.php?id={$id}';</script>");
else 
	exit("<script>location.href='".PAGINA_ACTUAL."_listado.php?padre={$padre}';</script>");
?>