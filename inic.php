<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	/*print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";*/
}
}
include("ctrl_admin/conexion/config.php");
$activeini = "class='active'";
$activecontac = "";
//url amigable
function urls_amigables($url) {
// Tranformamos todo a minusculas
$url = strtolower($url);
//Rememplazamos caracteres especiales latinos
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Ñ', 'Á', 'É', 'Í', 'Ó', 'Ú');
$repl = array('a', 'e', 'i', 'o', 'u', 'n', 'N', 'a', 'e', 'i', 'o', 'u');
$url = str_replace ($find, $repl, $url);
// Añaadimos los guiones
$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);
// Eliminamos y Reemplazamos demás caracteres especiales
$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array('', '-', '');
$url = preg_replace ($find, $repl, $url);
return $url;
}

// cosultamos mensaje
$sqlmenso = "SELECT * FROM mensajes WHERE id_msj = '1' and habilitado='Habilitado'";
						  $rsmen=$linkdocu->query($sqlmenso);
if($rsmen->num_rows>0){
while($rwmenso=$rsmen->fetch_array()){
	  $menso1 = $rwmenso["mensaje"];
}
}else{
	$menso1 = "";
}
?>