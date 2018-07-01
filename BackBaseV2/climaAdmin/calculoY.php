<? require_once('includes/boot.php'); 
define("TABLA", "estacion_historico");?>


<?
cargar('factor1');
cargar('factor0');
cargar('estacion');

$query0 = "SELECT 
			std(".$factor0.") as desviacion
			from estacion_historico where estacion_id = '{$estacion}' ";

$desviacion0 = $db->fetchOne($query0);

$query1 = "SELECT 
			std(".$factor1.") as desviacion
			from estacion_historico where estacion_id = '{$estacion}' ";

$desviacion1 = $db->fetchOne($query1);


$query2 = "SELECT 
			avg(".$factor0.") as media
			from estacion_historico where estacion_id = '{$estacion}' ";

$media0 = $db->fetchOne($query2);

$query3 = "SELECT 
			avg(".$factor1.") as media
			from estacion_historico where estacion_id = '{$estacion}' ";

$media1 = $db->fetchOne($query3);

$array = ['desviacion0'=>$desviacion0 ,'media0'=>$media0,'desviacion1'=>$desviacion1 ,'media1'=>$media1];

	echo json_encode($array);

die();
?>