<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Categorias');
define("PAGINA_ACTUAL", "categorias");
define("TABLA", "categoria");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

cargar('id',0);
cargar('padre');
cargar('nombre');
cargar('activo');

if ($linea)
	$categoria = $db->fetchOne("SELECT categoria_id FROM linea WHERE id = '{$linea}'");

/*****/

$sql = "
SET 
	padre_id = '{$padre}',
	nombre = '{$nombre}',
	activo = '{$activo}'
";

if (!$id || !$db->fetchOne("SELECT id FROM ".TABLA." WHERE id = '{$id}'")) {
	$orden = getOrden(TABLA);
	$id = $db->insert("INSERT INTO ".TABLA." ".$sql. ", orden = '{$orden}'");
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