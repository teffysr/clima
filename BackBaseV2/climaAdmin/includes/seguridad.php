<?
if (empty($_SESSION['administradorId']) && !strpos($_SERVER["PHP_SELF"], "login.php")) {
	header('Location: login.php');
	exit;
}

$PERMISOS = array(
	/* MODULOS */
	1 => 'Administradores',
	2 => 'Configuraciones',
	7 => 'Estaciones',
	8 => 'Porcentajes',
	9 => 'Relacion',
);

function tiene_permiso($area) {
	global $db;
	global $PERMISOS;
	if ($db->fetchOneRow("SELECT * FROM administrador_permiso WHERE administrador_id = '".$_SESSION['administradorId']."' AND permiso_id = '".array_search($area,$PERMISOS)."'")) {
		return true; 
	} else {
		return false;
	}
}

function permiso_requerido($area) {
	if (!tiene_permiso($area)) {
		header('Location: acceso_denegado.php');
		exit;
	}
}
?>