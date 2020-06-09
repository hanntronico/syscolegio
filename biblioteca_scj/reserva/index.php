<?php
include ("../ctrl_admin/conexion/config.php");

$adm1 = trim($_POST["codlib"]);
$adm2 = trim($_POST["codusu"]);
$adm3 = trim($_POST["fecharese"]);
$adm4 = "Reserva registrado desde la pagina web.";
$adm5 = $_POST["nameurl"];

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d H:i:s");


if($adm1!=""){
$Sqlad="insert into reserva(idl,idu,id_p,fe_solicitu,fe_reserva,deta_reserva,condicion,estado,fecha_reg) values ('$adm1','$adm2','','$fechahoy','$adm3','$adm4','Reservado','A','$fechahoy')";
   $linkdocu->query($Sqlad) or die(mysqli_error($linkdocu));
	$men="okya";
	}else{
	$men="error";
	
}
	mysqli_close($linkdocu);
echo "<script>location.href='../libro.php?var=$men&cap=$adm1&libro=$adm5'</script> ";
?>