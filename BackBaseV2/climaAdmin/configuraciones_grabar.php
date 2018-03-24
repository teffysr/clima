<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Configuraciones');
define("PAGINA_ACTUAL", "configuraciones");
define("TABLA", "configuracion");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

/*****/

$listadosCantidad = cargar('listados/cantidad');
$db->update("UPDATE ".TABLA." SET valor = '{$listadosCantidad}' WHERE entidad = 'listados/cantidad'");

$logsCantidad = cargar('logs/cantidad');
$db->update("UPDATE ".TABLA." SET valor = '{$logsCantidad}' WHERE entidad = 'logs/cantidad'");

$smtpHost = cargar('smtp/host');
$db->update("UPDATE ".TABLA." SET valor = '{$smtpHost}' WHERE entidad = 'smtp/host'");

$smtpUser = cargar('smtp/user');
$db->update("UPDATE ".TABLA." SET valor = '{$smtpUser}' WHERE entidad = 'smtp/user'");

echo $smtpPass = cargar('smtp/pass');
if ($smtpPass != "******") $db->update("UPDATE ".TABLA." SET valor = '{$smtpPass}' WHERE entidad = 'smtp/pass'");

$smtpActivo = cargar('smtp/activo');
$db->update("UPDATE ".TABLA." SET valor = '{$smtpActivo}' WHERE entidad = 'smtp/activo'");

/****************************************************************************************************/

exit("<script>location.href='".PAGINA_ACTUAL."_editar.php';</script>");
?>