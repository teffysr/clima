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
	cargar('Temperatura_Abrigo_150cm_V1');
	cargar('Temperatura_Abrigo_150cm_V2');
	$sql =" SET columna = 'Temperatura_Abrigo_150cm', valor_a = '{$Temperatura_Abrigo_150cm_V1}', valor_b = '{$Temperatura_Abrigo_150cm_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm' ");
	}
/****************************************************************************************************/
	cargar('Unidades_Frio_V1');
	cargar('Unidades_Frio_V2');
	$sql =" SET columna = 'Unidades_Frio',valor_a = '{$Unidades_Frio_V1}', valor_b = '{$Unidades_Frio_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Unidades_Frio' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Unidades_Frio' ");
	}
/****************************************************************************************************/
	cargar('Horas_Frio_V1');
	cargar('Horas_Frio_V2');
	$sql =" SET columna = 'Horas_Frio',valor_a = '{$Horas_Frio_V1}', valor_b = '{$Horas_Frio_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Horas_Frio' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Horas_Frio' ");
	}
/****************************************************************************************************/
	cargar('Radiacion_Global_V1');
	cargar('Radiacion_Global_V2');
	$sql =" SET columna = 'Radiacion_Global' , valor_a = '{$Radiacion_Global_V1}', valor_b = '{$Radiacion_Global_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Radiacion_Global' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Radiacion_Global' ");
	}
/****************************************************************************************************/
	cargar('Velocidad_Viento_1000cm_Media_V1');
	cargar('Velocidad_Viento_1000cm_Media_V2');
	$sql =" SET columna = 'Velocidad_Viento_1000cm_Media',valor_a = '{$Velocidad_Viento_1000cm_Media_V1}', valor_b = '{$Velocidad_Viento_1000cm_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_1000cm_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_1000cm_Media' ");
	}
/****************************************************************************************************/
	cargar('Velocidad_Viento_200cm_Media_V1');
	cargar('Velocidad_Viento_200cm_Media_V2');
	$sql =" SET columna = 'Velocidad_Viento_200cm_Media', valor_a = '{$Velocidad_Viento_200cm_Media_V1}', valor_b = '{$Velocidad_Viento_200cm_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_200cm_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_200cm_Media' ");
	}
/****************************************************************************************************/
	cargar('Duracion_Follaje_Mojado_V1');
	cargar('Duracion_Follaje_Mojado_V2');
	$sql =" SET columna = 'Duracion_Follaje_Mojado',  valor_a = '{$Duracion_Follaje_Mojado_V1}', valor_b = '{$Duracion_Follaje_Mojado_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Duracion_Follaje_Mojado' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Duracion_Follaje_Mojado' ");
	}
/****************************************************************************************************/
	cargar('Rocio_Medio_V1');
	cargar('Rocio_Medio_V2');
	$sql =" SET columna = 'Rocio_Medio', valor_a = '{$Rocio_Medio_V1}', valor_b = '{$Rocio_Medio_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Rocio_Medio' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Rocio_Medio' ");
	}
/****************************************************************************************************/
	cargar('Humedad_Media_8_14_20_V1');
	cargar('Humedad_Media_8_14_20_V2');
	$sql =" SET columna = 'Humedad_Media_8_14_20', valor_a = '{$Humedad_Media_8_14_20_V1}', valor_b = '{$Humedad_Media_8_14_20_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Humedad_Media_8_14_20' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Humedad_Media_8_14_20' ");
	}
/****************************************************************************************************/
	cargar('Humedad_Media_V1');
	cargar('Humedad_Media_V2');
	$sql =" SET columna = 'Humedad_Media', valor_a = '{$Humedad_Media_V1}', valor_b = '{$Humedad_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Humedad_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Humedad_Media' ");
	}
/****************************************************************************************************/
	cargar('Tesion_Vapor_Media_V1');
	cargar('Tesion_Vapor_Media_V2');
	$sql =" SET columna = 'Tesion_Vapor_Media', valor_a = '{$Tesion_Vapor_Media_V1}', valor_b = '{$Tesion_Vapor_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Tesion_Vapor_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Tesion_Vapor_Media' ");
	}
/****************************************************************************************************/
	cargar('Heliofania_Relativa_V1');
	cargar('Heliofania_Relativa_V2');
	$sql =" SET columna = 'Heliofania_Relativa', valor_a = '{$Heliofania_Relativa_V1}', valor_b = '{$Heliofania_Relativa_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Heliofania_Relativa' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Heliofania_Relativa' ");
	}
/****************************************************************************************************/
	cargar('Heliofania_Efectiva_V2');
	cargar('Heliofania_Efectiva_V1');
	$sql =" SET columna = 'Heliofania_Efectiva', valor_a = '{$Heliofania_Efectiva_V1}', valor_b = '{$Heliofania_Efectiva_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Heliofania_Efectiva' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Heliofania_Efectiva' ");
	}
/****************************************************************************************************/
	cargar('Precipitacion_Maxima_30minutos_V1');
	cargar('Precipitacion_Maxima_30minutos_V2');
	$sql =" SET columna = 'Precipitacion_Maxima_30minutos', valor_a = '{$Precipitacion_Maxima_30minutos_V1}', valor_b = '{$Precipitacion_Maxima_30minutos_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Maxima_30minutos' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Maxima_30minutos' ");
	}
/****************************************************************************************************/
	cargar('Precipitacion_Cronologica_V1');
	cargar('Precipitacion_Cronologica_V2');
	$sql =" SET columna = 'Precipitacion_Cronologica', valor_a = '{$Precipitacion_Cronologica_V1}', valor_b = '{$Precipitacion_Cronologica_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Cronologica' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Cronologica' ");
	}
/****************************************************************************************************/
	cargar('Precipitacion_Pluviometrica_V1');
	cargar('Precipitacion_Pluviometrica_V2');
	$sql =" SET columna = 'Precipitacion_Pluviometrica', valor_a = '{$Precipitacion_Pluviometrica_V1}', valor_b = '{$Precipitacion_Pluviometrica_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Pluviometrica' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Precipitacion_Pluviometrica' ");
	}
/****************************************************************************************************/
	cargar('Humedad_Suelo_V1');
	cargar('Humedad_Suelo_V2');
	$sql =" SET columna = 'Humedad_Suelo', valor_a = '{$Humedad_Suelo_V1}', valor_b = '{$Humedad_Suelo_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Humedad_Suelo' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Humedad_Suelo' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Intemperie_150cm_Minima_V1');
	cargar('Temperatura_Intemperie_150cm_Minima_V2');
	$sql =" SET  columna = 'Temperatura_Intemperie_150cm_Minima', valor_a = '{$Temperatura_Intemperie_150cm_Minima_V1}', valor_b = '{$Temperatura_Intemperie_150cm_Minima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_150cm_Minima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_150cm_Minima' ");
	}

/****************************************************************************************************/
	cargar('Temperatura_Inte_5cm_V1');
	cargar('Temperatura_Inte_5cm_V2');
	$sql =" SET  columna = 'Temperatura_Inte_5cm', valor_a = '{$Temperatura_Inte_5cm_V1}', valor_b = '{$Temperatura_Inte_5cm_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Inte_5cm' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Inte_5cm' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Suelo_10cm_Media_V1');
	cargar('Temperatura_Suelo_10cm_Media_V2');
	$sql =" SET  columna = 'Temperatura_Suelo_10cm_Media', valor_a = '{$Temperatura_Suelo_10cm_Media_V1}', valor_b = '{$Temperatura_Suelo_10cm_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Suelo_10cm_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Suelo_10cm_Media' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Suelo_5cm_Media_V1');
	cargar('Temperatura_Suelo_5cm_Media_V2');
	$sql =" SET  columna = 'Temperatura_Suelo_5cm_Media', valor_a = '{$Temperatura_Suelo_5cm_Media_V1}', valor_b = '{$Temperatura_Suelo_5cm_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Suelo_5cm_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Suelo_5cm_Media' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Intemperie_50cm_Minima_V1');
	cargar('Temperatura_Intemperie_50cm_Minima_V2');
	$sql =" SET  columna = 'Temperatura_Intemperie_50cm_Minima', valor_a = '{$Temperatura_Intemperie_50cm_Minima_V1}', valor_b = '{$Temperatura_Intemperie_50cm_Minima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_50cm_Minima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_50cm_Minima' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Intemperie_5cm_Minima_V1');
	cargar('Temperatura_Intemperie_5cm_Minima_V2');
	$sql =" SET  columna = 'Temperatura_Intemperie_5cm_Minima', valor_a = '{$Temperatura_Intemperie_5cm_Minima_V1}', valor_b = '{$Temperatura_Intemperie_5cm_Minima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_5cm_Minima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Intemperie_5cm_Minima' ");
	}
/****************************************************************************************************/
	cargar('Temperatura_Abrigo_150cm_Maxima_V1');
	cargar('Temperatura_Abrigo_150cm_Maxima_V2');
	$sql =" SET  columna = 'Temperatura_Abrigo_150cm_Maxima', valor_a = '{$Temperatura_Abrigo_150cm_Maxima_V1}', valor_b = '{$Temperatura_Abrigo_150cm_Maxima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm_Maxima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm_Maxima' ");
	}

/****************************************************************************************************/
	cargar('Temperatura_Abrigo_150cm_Minima_V1');
	cargar('Temperatura_Abrigo_150cm_Minima_V2');
	$sql =" SET  columna = 'Temperatura_Abrigo_150cm_Minima', valor_a = '{$Temperatura_Abrigo_150cm_Minima_V1}', valor_b = '{$Temperatura_Abrigo_150cm_Minima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm_Minima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Temperatura_Abrigo_150cm_Minima' ");
	}	

/****************************************************************************************************/
	cargar('Presion_Media_V1');
	cargar('Presion_Media_V2');
	$sql =" SET  columna = 'Presion_Media', valor_a = '{$Presion_Media_V1}', valor_b = '{$Presion_Media_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Presion_Media' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Presion_Media' ");
	}	

/****************************************************************************************************/
	cargar('Velocidad_Viento_Maxima_V1');
	cargar('Velocidad_Viento_Maxima_V2');
	$sql =" SET  columna = 'Velocidad_Viento_Maxima', valor_a = '{$Velocidad_Viento_Maxima_V1}', valor_b = '{$Velocidad_Viento_Maxima_V2}'";

	if (!$id || !$db->fetchOne("SELECT * FROM valor_default where estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_Maxima' ")) {
		$id = $db->insert("INSERT INTO valor_default ".$sql.", estacion_id = '{$estacion_id}' ");
	} else {
		$db->update("UPDATE valor_default ".$sql." WHERE estacion_id = '{$estacion_id}' and columna = 'Velocidad_Viento_Maxima' ");
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