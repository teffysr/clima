<? require_once('includes/boot.php'); 
define("TABLA", "estacion_historico");?>


<?
cargar('estacion_id');

if(cargar('factor') ){	$factor = cargar('factor');	}

$base = $db->fetchOneRow("SELECT * FROM valor_default WHERE estacion_id = '{$estacion_id}' and columna = '{$factor}' ");

$total= $db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}'");

if($base->valor_a > $base->valor_b){
	$max=$db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}' AND ".$factor." >= ".$base->valor_a);

	$U1 = $max/$total;
	$min=$db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}' AND ".$factor." < ".$base->valor_b);
	$U2 = $min/$total;

	$array = ['count'=>2,'U1'=>$U1 ,'U2'=>$U2];

	echo json_encode($array);

}else{
	$max=$db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}' AND ".$factor." > ".$base->valor_b);
	$U1 = $max/$total;

	$med=$db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}' AND ".$factor." >= ".$base->valor_a. " AND ".$factor." <= ".$base->valor_b);
	$U2 = $med/$total;

	$min=$db->fetchOne("SELECT count(*) FROM ".TABLA." WHERE estacion_id = '{$estacion_id}' AND ".$factor." < ".$base->valor_a);
	$U3 = $min/$total;

	$array = ['count'=>3,'U1'=>$U1,'U2'=>$U2,'U3'=>$U3];
	
	echo json_encode($array);
}
die();
?>