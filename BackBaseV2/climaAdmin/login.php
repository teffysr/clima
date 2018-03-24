<? require_once('includes/boot.php'); ?>
<?
if (isset($_GET["logout"])) {
	session_destroy();
	header('Location: login.php');
}

if (isset($_POST['usuario']) && isset($_POST['clave'])){
	cargar('usuario');
	cargar('clave');
	$clave = encriptarClave($clave);

	$query = "SELECT id, nombre, apellido, email FROM administrador WHERE usuario = '{$usuario}' AND clave = '{$clave}' AND activo = 1 AND eliminado = 0";
	
	if ($row = $db->fetchOneRow($query)) {
		$_SESSION['administradorId'] = $row->id;
		$_SESSION['administradorEmail'] = $row->email;
		$_SESSION['administradorNombre'] = $row->nombre.' '.$row->apellido;
		session_regenerate_id();
		header('Location: index.php');
	} else {
		$error = 1;
	} 
}
?>
<!doctype html>
<html>
<head>
	<? include_once("_inc_head.php");?>
</head>
<body class='login-body'>
	<div class="login-wrap">
		<h2><?=str_replace('_',' ',SITE_NAME);?></h2>
		<div class="login">
			<form action="#" method="POST">
				<div class="sep"></div>
				<div class="email"><input type="text" name="usuario" placeholder="Usuario" class='input-block-level'></div>
				<div class="pw">
					<input type="password" name="clave" placeholder="Clave" class='input-block-level'>
				</div>
				<? if (isset($error)) { ?>
					<div class="alert alert-error" style="margin-bottom:10px;">
						<strong>Error!</strong> Usuario y/o clave incorrectos
					</div>
				<? } ?>
				<button type="submit" value="Ingresar" class='button button-basic-darkblue btn-block' style="margin-top:0px;">Ingresar</button>
			</form>
		</div>
	</div>
</body>
</html>