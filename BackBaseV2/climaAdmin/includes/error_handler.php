<?
function error_handler($errno, $errstr, $errfile, $errline, $errctx) {
	global $EN_DESARROLLO;	
	$host = $_SERVER['HTTP_HOST'];
	$mail_subject = 'Error en '.$host;
	$mail_from = SYSTEM_MAILS_FROM;
	$mail_to = array('sebastian@proyectiva.com');

	$errortype = array(1=>"Error", 2=>"Warning", 4=>"Parsing Error", 8=>"Notice", 16=>"Core Error", 32=>"Core Warning", 64=>"Compile Error", 128=>"Compile Warning", 256=>"User Error", 512=>"User Warning", 1024=>"User Notice", 2048=>"PHP5 Strict Warning"); 

	$error_handler_string =  "<font size=2 face=Arial><h3>Error en ".$host."<br></h3><b>Date: </b>".date('F j, Y, H:i:s a')."<br><b>Error Type: </b>". $errortype[$errno]." (".$errno.")<br><b>Description: <font color=ff0000>".$errstr."</font></b><br><b>Error File: </b>".$errfile."<br><b>Error Line: </b>".$errline."<br><br>";

	while (isset($_SESSION) && list($var, $val) = each($_SESSION)) $error_handler_string .= "_SESSION[".$var."] = ".$val."<BR>"; 
	while (isset($_GET) && list($var, $val) = each($_GET)) $error_handler_string .=  "_GET[".$var."] = ".$val."<BR>"; 
	while (isset($_POST) && list($var, $val) = each($_POST)) $error_handler_string .=  "_POST[".$var."] = ".$val."<BR>";
	while (isset($_COOKIE) && list($var, $val) = each($_COOKIE)) $error_handler_string .= "_COOKIE[".$var."] = ".$val."<BR>"; 

	if ($errno != E_NOTICE) {
		if ($EN_DESARROLLO){
			die($error_handler_string);
		} else {
			@ini_set("sendmail_from",$mail_from);
			foreach( $mail_to as $mail_to_str ){
				mail($mail_to_str, $mail_subject, $error_handler_string, "From: ".$mail_from."\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n");
			}
			if ($errno & (E_WARNING | E_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR)){
				echo "<script>window.location = 'error.php'</script>";
				exit();
			}
		}
	}
}
set_error_handler("error_handler");
error_reporting(E_ALL);
?>