<?php
	include ("../ctrl_admin/conexion/config.php");

	$sqlinsreg = "DELETE FROM detalle_especialidades 
								WHERE idegresado=".$_GET["ide"]." AND idespecialidad=".$_GET["idesp"];
	$linkdocu->query($sqlinsreg);
  mysqli_close($linkdocu);

  $msn="el1";

  header("location: registro3.php?msn=".$msn);

?>