<?
function cargar($formname,$else='') {
	global ${$formname};
	${$formname} = isset($_REQUEST[$formname]) ? $_REQUEST[$formname] : '';
	if (is_array(${$formname})) {
		foreach (${$formname} as $k => $v) ${$formname}[$k] = mysql_real_escape_string($v);
	} else { 
		${$formname} = ${$formname} != '' ? mysql_real_escape_string(${$formname}) : $else;
	}
	return ${$formname};
}

function cargarUtfDecode($formname,$else='') {
	global ${$formname};
	${$formname} = isset($_REQUEST[$formname]) ? $_REQUEST[$formname] : '';
	if (is_array(${$formname})) {
		foreach (${$formname} as $k => $v) ${$formname}[$k] = utf8_decode(mysql_real_escape_string($v));
	} else { 
		${$formname} = ${$formname} != '' ? utf8_decode(mysql_real_escape_string(${$formname})) : $else;
	}
	return ${$formname};
}
	
function querystringSinParametro($parametro) {
	//return preg_replace('/[\&\?]+'.$parametro.'=[^\&]*/','',!empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '');
	return substr( preg_replace('/[\&\?]+'.$parametro.'=[^\&]*/','',!empty($_SERVER['QUERY_STRING']) ? "&".$_SERVER['QUERY_STRING'] : '') , 1);
}

function eliminarDirecotrio($carpeta) { 
	if (is_dir($carpeta)) {
		$directorio = dir($carpeta);
		while ($archivo = $directorio->read()) {
			if ($archivo !=  "." && $archivo != "..") {
				if (is_dir($carpeta.'/'.$archivo)) 					//comprobamos si es un directorio o un archivo 
					eliminarDirecotrio($carpeta.'/'.$archivo);		//si es un directorio, volvemos a llamar a la funci�n para que elimine el contenido del mismo 
				else
					unlink($carpeta.'/'.$archivo);					//si no es un directorio, lo borramos 
			} 
		} 
		$directorio->close();
		rmdir($carpeta);
	}
}

function vaciarDirecotrio($carpeta) { 
	$directorio = dir($carpeta);
	while ($archivo = $directorio->read()) {
		if ($archivo !=  "." && $archivo != "..") {
			if (!is_dir($carpeta.'/'.$archivo)) {					//comprobamos si es un directorio o un archivo 
				unlink($carpeta.'/'.$archivo); 
			} 
		} 
	} 
	$directorio->close();
}

function verificarEmail($email) { 
	if (!preg_match("/^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$/i",$email)){ 
		return false; 
	} else { 
		return true; 
	} 
}

function marcaDeAgua($img_original, $img_marcadeagua, $img_nueva, $calidad = 100, $repeat = false) {  
    // obtener datos de la fotografia  
    $info_original = getimagesize($img_original);  
    $anchura_original = $info_original[0];  
    $altura_original = $info_original[1];  

    // obtener datos de la "marca de agua"  
    $info_marcadeagua = getimagesize($img_marcadeagua);  
    $anchura_marcadeagua = $info_marcadeagua[0];  
    $altura_marcadeagua = $info_marcadeagua[1];  

    // calcular la posici�n donde debe copiarse la "marca de agua" en la fotografia  
    $horizextra = $anchura_original - $anchura_marcadeagua;  
    $vertextra = $altura_original - $altura_marcadeagua;  
    $horizmargen =  round($horizextra / 2);  
    $vertmargen =  round($vertextra / 2);  

    // obtener extension  
    $ext = strtolower(strrchr($img_original,'.'));
	
    // crear imagen desde el original  
	if ($ext == ".gif") {
	    if (!$original = imagecreatefromgif($img_original)) {
	        echo "Error opening $img_original!"; exit;
	    }
	} else if($ext == ".jpg" || $ext == ".jpeg") {
	    if (!$original = imagecreatefromjpeg($img_original)) {
	        echo "Error opening $img_original!"; exit;
	    }
	} else if($ext == ".png") {
	    if (!$original = imagecreatefrompng($img_original)) {
	        echo "Error opening $img_original!"; exit;
	    }
	} else {
	    die;
	}
    ImageAlphaBlending($original, true);  

    // crear nueva imagen desde la marca de agua  
    $marcadeagua = ImageCreateFromPNG($img_marcadeagua);  

    // copiar la "marca de agua" en la fotografia  
    ImageCopy($original, $marcadeagua, $horizmargen, $vertmargen, 0, 0, $anchura_marcadeagua, $altura_marcadeagua);  
    if($repeat) { 
		$waterless = imagesx($original) - imagesx($marcadeagua); 
		$rest = ceil($waterless/imagesx($marcadeagua)/2); 

    	for($n=1; $n<=$rest; $n++) { 
			ImageCopy($original, $marcadeagua, ((imagesx($original)/2)-(imagesx($marcadeagua)/2))-(imagesx($marcadeagua)*$n), (imagesy($original)/2)-(imagesy($marcadeagua)/2), 0, 0, imagesx($marcadeagua), imagesy($marcadeagua)); 
			ImageCopy($original, $marcadeagua, ((imagesx($original)/2)-(imagesx($marcadeagua)/2))+(imagesx($marcadeagua)*$n), (imagesy($original)/2)-(imagesy($marcadeagua)/2), 0, 0, imagesx($marcadeagua), imagesy($marcadeagua)); 
		} 
	}

    // guardar la nueva imagen  
    ImageJPEG($original, $img_nueva, $calidad);  

    // cerrar las im�genes  
    ImageDestroy($original);  
    ImageDestroy($marcadeagua);
}

function nombreMes($num) {
	switch ($num) {
		case "1":
			return "Enero";
			break;
		case "2":
			return "Febrero";
			break;
		case "3":
			return "Marzo";
			break;			
		case "4":
			return "Abril";
			break;
		case "5":
			return "Mayo";
			break;
		case "6":
			return "Junio";
			break;
		case "7":
			return "Julio";
			break;
		case "8":
			return "Agosto";
			break;
		case "9":
			return "Septiembre";
			break;			
		case "10":
			return "Octubre";
			break;
		case "11":
			return "Noviembre";
			break;
		case "12":
			return "Diciembre";
			break;	
	}
}

function nombreDia($num) {
	switch ($num) {
		case "1":
			return "Lunes";
			break;
		case "2":
			return "Martes";
			break;
		case "3":
			return "Miercoles";
			break;			
		case "4":
			return "Jueves";
			break;
		case "5":
			return "Viernes";
			break;
		case "6":
			return "Sabado";
			break;
		case "7":
			return "Domingo";
			break;
	}
}

function generarCodigoVerificador($cant) { 
	$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ023456789";
	
	$codigo = "";
	for ($i = 1; $i <= $cant; $i++) {
		$codigo .= substr($chars, $num = rand(0,strlen($chars)-1), 1);
	}
	
	return $codigo;
}

function getOrden($tabla, $filtro='1=1') {
	global $db;
	return $db->fetchOne("SELECT IFNULL(MAX(orden)+1,1) AS orden FROM {$tabla} WHERE {$filtro}");
}

function getAdministradorNombre($id) {
	global $db;
	return ucwords($db->fetchOne("SELECT CONCAT(nombre, ' ', apellido) FROM administrador WHERE id = '{$id}'"));
}

function getLogQuery($tabla, $id, $limite=100) {
	return "SELECT log.fecha, CONCAT(administrador.nombre, ' ', administrador.apellido) AS nombre FROM log INNER JOIN administrador ON administrador.id = log.administrador_id WHERE log.tabla = '{$tabla}' AND log.tabla_id = '{$id}' ORDER BY log.id DESC LIMIT {$limite}";
}

function borrarRegistro($tabla, $id, $carpeta='', $filtro='1=1') {
	global $db;
	global $BORRADO_FISICO;
	if ($BORRADO_FISICO) {
		eliminarDirecotrio($carpeta);
		$db->delete("DELETE FROM {$tabla} WHERE id = '{$id}' AND {$filtro}");
		$db->delete("DELETE FROM log WHERE tabla = '{$tabla}' AND tabla_id = '{$id}' AND {$filtro}");
	} else {
		$administrador = $_SESSION['administradorId']; $fecha = time();
		$db->insert("INSERT INTO log SET tabla = '{$tabla}', tabla_id = '{$id}', administrador_id = '{$administrador}', fecha = '{$fecha}'");
		$db->update("UPDATE {$tabla} SET eliminado = 1 WHERE id = '{$id}' AND {$filtro}");
	}
}

function activarRegistro($tabla, $id, $filtro='1=1') {
	global $db;
	$db->update("UPDATE {$tabla} SET activo = 1 - activo WHERE id = '{$id}' AND {$filtro}");
}

function destacarRegistro($tabla, $id, $filtro='1=1') {
	global $db;
	$db->update("UPDATE {$tabla} SET destacado = 1 - destacado WHERE id = '{$id}' AND {$filtro}");
}

function principalRegistro($tabla, $id, $campo_fk, $campo_fk_id, $filtro='1=1') {
	global $db;
	$db->update("UPDATE {$tabla} SET principal = 0 WHERE {$campo_fk} = '{$campo_fk_id}' AND {$filtro}");
	$db->update("UPDATE {$tabla} SET principal = 1 WHERE {$campo_fk} = '{$campo_fk_id}' AND id = '{$id}' AND {$filtro}");
}

function ordenarRegistro($tabla, $id, $direccion, $filtro='1=1') {
	global $db;

	if ($orden_anterior = $db->fetchOne("SELECT orden FROM {$tabla} WHERE id = '{$id}'")) {
		if ($direccion == 'antes') 
			$where_clause = "WHERE orden < '{$orden_anterior}' AND {$filtro} ORDER BY orden DESC";
		else if ($direccion == 'despues') 
			$where_clause = "WHERE orden > '{$orden_anterior}' AND {$filtro} ORDER BY orden ASC";

		if ($where_clause) {
			if ($row = $db->fetchOneRow("SELECT id, orden FROM {$tabla} ".$where_clause." LIMIT 1")) {
				$db->update("UPDATE {$tabla} SET orden = '{$row->orden}' WHERE id = '{$id}'");
				$db->update("UPDATE {$tabla} SET orden = '{$orden_anterior}' WHERE id = '{$row->id}'");
			}
		}
	}
}

function limpiarNombreArchivo($str) {
	$accent_array = array(
		'a' => array('à','á','â','ä'),
		'A' => array('À','�?','Â','Ä'),
		'e' => array('è','é','ê','ë'),
		'E' => array('È','É','Ê','Ë'),
		'i' => array('ì','í','î','ï'),
		'I' => array('Ì','�?','Î','�?'),
		'o' => array('ò','ó','ô','ö'),
		'O' => array('Ò','Ó','Ô','Ö'),
		'u' => array('ù','ú','û','ü'),
		'U' => array('Ù','Ú','Û','Ü'),
		'n' => array('ñ'),
		'N' => array('Ñ'),
		'c' => array('ç'),
		'C' => array('Ç'),
		'ae' => array('æ'),
		'oe' => array('œ'),
		'y' => array('ÿ'),
		'_' => array(' ', '-','\'','*','@','¿','¡')
	);
	foreach($accent_array as $acc_key => $acc_val_array) {
		$str = str_replace($acc_val_array, $acc_key, $str);
	}
	return strtolower($str);
}

function encriptarClave($str) {
	return "!".sha1(crypt(md5($str), SALT))."!";
}

function separarPorBarras() {
	$temp = array();
	$arg_list = func_get_args();
	foreach ($arg_list as $arg) {
		$temp[] = $arg;
	}
	return implode(array_filter($temp)," / ");
}

function borrarTextoEntre($beginning, $end, $string) {
	$beginningPos = strpos($string, $beginning);
	$endPos = strpos($string, $end);
	if (!$beginningPos || !$endPos) {
		return $string;
	}
	$textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
	return str_replace($textToDelete, '', $string);
}
?>