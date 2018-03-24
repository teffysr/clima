<?
require_once('mysql.database.php');
require_once('mysql.resultset.php');
require_once('configuracion.php');
require_once('funciones.php');
require_once('phpmailer/class.phpmailer.php');

if (strpos(strtolower($_SERVER["SCRIPT_FILENAME"]),strtolower(CARPETA_BACKOFFICE))) {
	define('DIR_UPLOADS','../uploads/'); 

	session_name(SITE_NAME);
	session_cache_expire(15);
	session_start();

	require_once("error_handler.php");
	require_once('seguridad.php');
	require_once('thumb.php');
	require_once('zebra.php');
} else {
	define('DIR_UPLOADS','uploads/');
}

require_once('directorios.php');
?>