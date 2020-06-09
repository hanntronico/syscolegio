<?php
	include ("../ctrl_admin/conexion/config.php");

	$sqlinsreg = "DELETE FROM detalle_carreras 
								WHERE idegresado=".$_GET["ide"]." AND idcarrera=".$_GET["idc"];
	$linkdocu->query($sqlinsreg);
  mysqli_close($linkdocu);

  $msn="el1";

  header("location: registro2.php?msn=".$msn);

?>