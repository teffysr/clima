<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Estaciones');
define("PAGINA_ACTUAL","estaciones");
define("TABLA","estacion");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

cargar('id',0);
cargar('nombre');
/*****/

$sql = "
SET 
	nombre = '{$nombre}'
";

if (!$id || !$db->fetchOne("SELECT id FROM ".TABLA." WHERE id = '{$id}'")) {
	$orden = getOrden(TABLA);
	$id = $db->insert("INSERT INTO ".TABLA." ".$sql. " ");
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
	exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");
?>