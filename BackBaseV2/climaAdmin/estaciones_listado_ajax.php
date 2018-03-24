<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Estaciones');
define("PAGINA_ACTUAL","estaciones");
define("TABLA","estacion");
/*
if (cargar('activo') && cargar('id')) { activarRegistro(TABLA, $id);}
if (cargar('destacado') && cargar('id')) { destacarRegistro(TABLA, $id);}
if (cargar('orden') && cargar('direccion') && cargar('id')) { ordenarRegistro(TABLA, $id, $direccion);}*/
?>
<? include_once(PAGINA_ACTUAL."_listado_tabla.php");?>