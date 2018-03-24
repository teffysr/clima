<?
cargar('archivo_descripcion_nuevo');

if (isset($_FILES['archivo'])) {
	for ($i=0; $i < count($_FILES['archivo']['name']); $i++) {
		if ($galeria_archivos == false && $i > 0) break;
		if ($_FILES['archivo']['size'][$i] > 0) {
			$extension = strtolower(strrchr($_FILES['archivo']['name'][$i],'.'));
			if ($mantener_nombre_archivos == true) {
				$archivo_original = substr($_FILES['archivo']['name'][$i], 0, strlen($_FILES['archivo']['name'][$i]) - strlen($extension));
				$archivo = limpiarNombreArchivo($archivo_original);
			} else {
				$archivo = $db->fetchOne("SELECT IFNULL(MAX(CAST(archivo as DECIMAL(10,0)))+1,1) FROM ".TABLA_IMAGENES." WHERE ".TABLA_IMAGENES_FK." = '{$id}'");
			}
			if ($extension != '.txt' && $extension != '.pdf' && $extension != '.doc' && $extension != '.docx') {
				exit("<script>alert('Formato de archivo no valido'); history.back();</script>");
			}
			if (file_exists(CARPETA_ARCHIVOS.$archivo.$extension)) {
				exit("<script>alert('Ya existe un archivo con el nombre \'$archivo_original$extension\''); history.back();</script>");
			}
			if (is_uploaded_file($_FILES['archivo']['tmp_name'][$i])) {
				if (!is_dir(CARPETA_ARCHIVOS)) mkdir(CARPETA_ARCHIVOS, 0777);
				move_uploaded_file($_FILES['archivo']['tmp_name'][$i], CARPETA_ARCHIVOS.$archivo.$extension); chmod(CARPETA_ARCHIVOS.$archivo.$extension, 0644);
				
				$orden = getOrden(TABLA_ARCHIVOS, TABLA_ARCHIVOS_FK." = '{$id}'");
				$db->insert("INSERT INTO ".TABLA_ARCHIVOS." SET archivo = '{$archivo}', extension = '{$extension}', descripcion = '{$archivo_descripcion_nuevo}', ".TABLA_ARCHIVOS_FK." = '{$id}', activo = 1, orden = '{$orden}'");
			}
		}
	}
}

if (cargar('idArchivo') && cargar('eliminarArchivo')) {
	if ($row = $db->fetchOneRow("SELECT archivo, extension FROM ".TABLA_ARCHIVOS." WHERE id = '{$idArchivo}'")){
		if ($BORRADO_FISICO) {
			if (file_exists(CARPETA_ARCHIVOS.$row->archivo.$row->extension)) {
				unlink(CARPETA_ARCHIVOS.$row->archivo.$row->extension);
			}
		}		
	}
	borrarRegistro(TABLA_ARCHIVOS, $idArchivo);	
	exit("<script>history.back();</script>");
}

if (cargar('idArchivo') && cargar('activarArchivo')) {
	activarRegistro(TABLA_ARCHIVOS, $idArchivo);
	exit("<script>history.back();</script>");
}

if (cargar('idArchivo') && cargar('ordenarArchivo') && cargar('direccionArchivo')) {
	ordenarRegistro(TABLA_ARCHIVOS, $idArchivo, $direccionArchivo);
	exit("<script>history.back();</script>");
}

if (cargar('archivo_descripcion')) {
	foreach ($archivo_descripcion as $key => $descripcion) {
		$db->update("UPDATE ".TABLA_ARCHIVOS." SET descripcion = '{$descripcion}' WHERE id = '{$key}'");	
	}
}
?>