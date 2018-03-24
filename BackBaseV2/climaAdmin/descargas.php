<? require_once('includes/boot.php'); ?>
<?
cargar('seccion');
cargar('id',0);

switch ($seccion) {
    case 'noticias':
        $tabla = "noticia_archivo";
        $tabla_fk = "noticia_id";
        $carpeta = DIR_UPLOADS_NOTICIAS;
        break;
}

if ($tabla)
    $row = $db->fetchOneRow(sprintf("SELECT archivo, extension, descripcion, ".$tabla_fk." AS id FROM ".$tabla." WHERE id = %d",$id));

if (is_file($path = $carpeta.$row->id."/archivos/".$row->archivo.$row->extension)) {
    $type = '';
    /*if (function_exists('mime_content_type')) {
        $type = mime_content_type($path);
    } else if (function_exists('finfo_file')) {
        $info = finfo_open(FILEINFO_MIME);
        $type = finfo_file($info, $path);
        finfo_close($info); 
    }
    if (@$type == '') {
        $type = "application/force-download";
    }*/
    $filename = $row->descripcion ? strtolower(str_replace(" ", "_", $row->descripcion)).$row->extension : "sin_descripcion".$row->extension;
    header("Content-Type:$type");
    header("Content-Disposition:attachment; filename=".$filename);
    header("Content-Transfer-Encoding:binary");
    //$size = filesize($path);
    //header("Content-Length:$size");
    readfile($path);
} else { 
    echo "El archivo no existe";
}
?>