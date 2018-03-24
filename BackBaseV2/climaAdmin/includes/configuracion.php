<?
header('Content-Type: text/html; charset=UTF-8');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

date_default_timezone_set('America/Argentina/Buenos_Aires');

# CONSTANTES
define('CARPETA_BACKOFFICE','climaAdmin');
define('SYSTEM_MAILS_FROM', 'climas@climas.com');
define('SYSTEM_MAILS_FROM_NAME','Clima');
define('SITE_NAME','Clima');
define('SALT', 'pr');

# VARIABLES DE ENTORNO
$BORRADO_FISICO = true;
$EN_DESARROLLO = true;

# CONEXION DB
$db = MySqlDatabase::getInstance();
try {
	$conn = $db->connect('localhost', 'root', '', 'clima2');
} catch (Exception $e) {
    die ($e->getMessage());
}
?>