<?
cargar('imagen_descripcion_nueva');

if (isset($_FILES['imagen'])) {
	for ($i=0; $i < count($_FILES['imagen']['name']); $i++) {
		if ($galeria_imagenes == false && $i > 0) break;
		if ($_FILES['imagen']['size'][$i] > 0) {
			$extension = strtolower(strrchr($_FILES['imagen']['name'][$i],'.'));
			if ($mantener_nombre_imagenes == true) {
				$archivo_original = substr($_FILES['imagen']['name'][$i], 0, strlen($_FILES['imagen']['name'][$i]) - strlen($extension));
				$archivo = limpiarNombreArchivo($archivo_original);
			} else {
				$archivo = $db->fetchOne("SELECT IFNULL(MAX(CAST(imagen as DECIMAL(10,0)))+1,1) FROM ".TABLA_IMAGENES." WHERE ".TABLA_IMAGENES_FK." = '{$id}'");
			}
			if ($extension != '.jpg' && $extension != '.jpeg' && $extension != '.gif' && $extension != '.png') {
				exit("<script>alert('Formato de imagen no valido'); history.back();</script>");
			}
			if (file_exists(CARPETA_IMAGENES.$archivo.$extension)) {
				exit("<script>alert('Ya existe una imagen con el nombre \'$archivo_original$extension\''); history.back();</script>");
			}
			if (is_uploaded_file($_FILES['imagen']['tmp_name'][$i])) {
				if (!is_dir(CARPETA_IMAGENES)) mkdir(CARPETA_IMAGENES, 0777);
				move_uploaded_file($_FILES['imagen']['tmp_name'][$i], CARPETA_IMAGENES.$archivo.$extension); chmod(CARPETA_IMAGENES.$archivo.$extension, 0644);
				
				$orden = getOrden(TABLA_IMAGENES, TABLA_IMAGENES_FK." = '{$id}'");
				$db->insert("INSERT INTO ".TABLA_IMAGENES." SET imagen = '{$archivo}', extension = '{$extension}', descripcion = '{$imagen_descripcion_nueva}', ".TABLA_IMAGENES_FK." = '{$id}', activo = 1, orden = '{$orden}'");

				$thumb = new thumb(); 
				$thumb->loadImage(CARPETA_IMAGENES.$archivo.$extension);
				if ($thumb->width > 1500 || $thumb->height > 1500 ) {
					if ($thumb->width >= $thumb->height) {
						$thumb->resize(1500,'width');
					} else {
						$thumb->resize(1500,'height');
					}
				}
				$thumb->save(CARPETA_IMAGENES.$archivo.$extension, 100);

				foreach ($imagenes as $imagen) {
					$thumb = new thumb();
					$thumb->loadImage(CARPETA_IMAGENES.$archivo.$extension);
					if ($imagen["tipo"] == "resize") {
						if ($thumb->width <= $thumb->height) {
							$thumb->resize($imagen["p1"],'width');
						} else {
							$thumb->resize($imagen["p1"],'height');
						}
					} else if ($imagen["tipo"] == "crop") {
						$thumb->crop($imagen["p1"], $imagen["p2"], "center");
					}
					$thumb->save(CARPETA_IMAGENES.$archivo.$imagen["sufijo"].$extension, 100);
				}
			}
		}
	}
}

if (cargar('imagenes_eliminar')) {
	foreach ($imagenes_eliminar as $imagen_eliminar) {
		if ($row = $db->fetchOneRow("SELECT imagen, extension FROM ".TABLA_IMAGENES." WHERE id = '{$imagen_eliminar}'")){
			if ($BORRADO_FISICO) {
				if (file_exists(CARPETA_IMAGENES.$row->imagen.$row->extension)) {
					unlink(CARPETA_IMAGENES.$row->imagen.$row->extension);
				}
				foreach ($imagenes as $imagen) {
					if (file_exists(CARPETA_IMAGENES.$row->imagen.$imagen["sufijo"].$row->extension)) {
						unlink(CARPETA_IMAGENES.$row->imagen.$imagen["sufijo"].$row->extension);
					}
				}
			}	
		}
		borrarRegistro(TABLA_IMAGENES, $imagen_eliminar);	
	}
}

if (cargar('imagenes_activar')) {
	foreach ($imagenes_activar as $imagen_activar) {
		activarRegistro(TABLA_IMAGENES, $imagen_activar);
	}
}

if (cargar('imagen_principal')) {
	principalRegistro(TABLA_IMAGENES, $imagen_principal, TABLA_IMAGENES_FK, $id);
}

if (cargar('idImagen') && cargar('ordenarImagen') && cargar('direccionImagen')) {
	ordenarRegistro(TABLA_IMAGENES, $idImagen, $direccionImagen);
}

if (cargar('imagen_descripcion')) {
	foreach ($imagen_descripcion as $key => $descripcion) {
		$db->update("UPDATE ".TABLA_IMAGENES." SET descripcion = '{$descripcion}' WHERE id = '{$key}'");	
	}
}

exit("<script>location.href=document.referrer;</script>");
?>