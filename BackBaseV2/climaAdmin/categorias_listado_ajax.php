<? require_once('includes/boot.php'); ?>
<?
permiso_requerido('Categorias');
define("PAGINA_ACTUAL", "categorias");
define("TABLA", "categoria");

if (cargar('activo') && cargar('id')) { activarRegistro(TABLA, $id);}
if (cargar('orden') && cargar('direccion') && cargar('id')) { if (!cargar('padre')) $padre = 0; ordenarRegistro(TABLA, $id, $direccion, "padre_id=".$padre); }
?>
<? include_once(PAGINA_ACTUAL."_listado_tabla.php");?>