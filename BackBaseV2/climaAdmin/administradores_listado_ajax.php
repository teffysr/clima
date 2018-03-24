<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Administradores');
define("PAGINA_ACTUAL", "administradores");
define("TABLA", "administrador");

if (cargar('activo') && cargar('id')) { activarRegistro(TABLA, $id);}
?>
<? include_once(PAGINA_ACTUAL."_listado_tabla.php");?>