<? require_once('includes/boot.php'); 
define("TABLA", "estacion_historico");?>


<?
cargar('z1');
cargar('z2');

if($z1 < 0 && $z2 <0){

$z1 = $z1*(-1);
$z2 = $z2*(-1);

}
/*elseif($z1 < 0 || $z2 <0){
	
	if($z1 < 0){

	}elseif($z2 < 0){

	}
}*/




$x1 = explode('.', $z1);

$zeta1 = $x1[0].'.'.$x1[1][0];
$zeta1_= $x1[1][1];

$x2 = explode('.', $z2);

$zeta2 = $x2[0].'.'.$x2[1][0];
$zeta2_= $x2[1][1];



$queryZeta1 = "SELECT acn.$zeta1_ from area_curva_normal as acn where z = $zeta1";

$Zeta1 = $db->fetchOne($queryZeta1);

$queryZeta2 = "SELECT acn.$zeta2_ from area_curva_normal as acn where z = $zeta2";

$Zeta2 = $db->fetchOne($queryZeta2);

$porcentaje= ($Zeta1+$Zeta2)*100;

$array = ['Zeta1'=>$Zeta1 ,'Zeta2'=>$Zeta2,'porcentaje' => $porcentaje];

echo json_encode($array);