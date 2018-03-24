<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Administradores');
define("PAGINA_ACTUAL", "administradores");
define("TABLA", "administrador");

if (empty($_POST)) exit("<script>location.href='".PAGINA_ACTUAL."_listado.php';</script>");

cargar('id',0);
cargar('nombre');
cargar('apellido');
cargar('email');
cargar('usuario');
cargar('clave');
cargar('activo');
cargar('permisos');

if ($db->fetchOne("SELECT id FROM ".TABLA." WHERE email LIKE '{$email}' AND id != '{$id}' AND eliminado = 0")) {
	exit("<script>alert('El email ingresado ya está en uso. Elija otro'); history.back();</script>");
}

if ($db->fetchOne("SELECT id FROM ".TABLA." WHERE usuario LIKE '{$usuario}' AND id != '{$id}' AND eliminado = 0")) {
	exit("<script>alert('El usuario ingresado ya está en uso. Elija otro'); history.back();</script>");
}

/*****/

$sql = "
SET 
	nombre = '{$nombre}', 
	apellido = '{$apellido}', 
	usuario = '{$usuario}', 
	email = '{$email}', 
	activo = '{$activo}',
	es_editable = 1
";

if ($clave) {
	$clave = encriptarClave($clave);
	$sql .= ", clave = '{$clave}'";
}

if (!$id || !$db->fetchOne("SELECT id FROM ".TABLA." WHERE id = '{$id}'")) {
	$id = $db->insert("INSERT INTO ".TABLA." ".$sql);
} else {
	$db->update("UPDATE ".TABLA." ".$sql." WHERE id = '{$id}' AND es_editable = 1");
}

$db->delete("DELETE FROM administrador_permiso WHERE administrador_id = '{$id}'");
foreach ($permisos as $permiso) {
	$db->insert("INSERT INTO administrador_permiso SET administrador_id = '{$id}', permiso_id = '{$permiso}'");
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