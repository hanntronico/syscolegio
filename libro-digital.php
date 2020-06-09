<?php
session_start();
if (isset($_SESSION['usuario'])){
    $variusu = $_SESSION["idu"];
$variusunom = $_SESSION["nombre"].' '.$_SESSION["apellido"];
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='index.php';</script>";
}
}
include("ctrl_admin/conexion/config.php");

$activeini = "";
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

$varmen = $_GET["var"];
$este = $_GET["cap"];
$solipres = $_GET["cid"];


						  $sqllib="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' AND l.idl='$este' ";
						  $rslib=$linkdocu->query($sqllib);
if($rslib->num_rows>0){
while($rwlib=$rslib->fetch_array()){
	  //$lib = $lib + 1;
	  $libro1 = $rwlib["idl"];
	  $libro2 = $rwlib["titulo"];
	$libro3 = $rwlib["tema"];
	$libro4 = $rwlib["autor"];
	$libro5 = $rwlib["anio"];
	$libro6 = $rwlib["edicion"];
	$libro7 = $rwlib["lugar"];
	$libro8 = $rwlib["editorial"];
	$libro9 = $rwlib["cod_isbn"];
	$libro10 = $rwlib["detalle"];
	$libro11 = $rwlib["canti_ejemplar"];
	$libro12 = $rwlib["canti_pagina"];
	$libro13 = $rwlib["disponible"];
	$libro14 = $rwlib["foto"];
	$libro15 = $rwlib["archivo"];
	$libro16 = $rwlib["categoria"];
	$libro17 = $rwlib["nom_edi"];
	$nomcurl = urls_amigables($libro2);
	
	if($libro13=="Disponible"){
		$fet = "text-success";
	}else{
		$fet = "text-danger";
	}
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("title.php"); ?>
    <!--
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="css/mobile-menu.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet"> -->
</head>
<body>
<div id="main-wrapper">

<div>
    <object data="ctrl_admin/libro/<?=$libro15;?>" type="application/pdf" width="100%" height="1200">
        alt : <a href="test.pdf">test.pdf</a>
    </object>
</div>

</div>      
</body>
</html>