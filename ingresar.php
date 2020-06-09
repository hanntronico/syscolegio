<?php
	include ("ctrl_admin/conexion/config.php");
	
	// $dominio = "http://seimaqsac.com/sysegresados/";
	$dominio = "";
	$ln = $dominio."ingresar.php?id=".$_GET["id"];


	$sqlinsreg = "SELECT * FROM egresados WHERE link_conf='".$ln."'" ;

	$rspv=$linkdocu->query($sqlinsreg);
  // mysqli_close($linkdocu);

	if ($rspv->num_rows>0) {
		$rwpv=$rspv->fetch_array();

		$idegre = $rwpv["idegresado"];
		$nomegre = $rwpv["nom_egresado"];
		$apepaterno = $rwpv["ape_paterno"];
		$apematerno = $rwpv["ape_materno"];
		$usuario = $rwpv["email"];
		$estadoegre = $rwpv["estado"];

		if ($rwpv["estado"]==4) {
			$sqlactualiza = "UPDATE egresados SET link_conf='NC', estado=1 WHERE idegresado=".$rwpv["idegresado"];
			$linkdocu->query($sqlactualiza);
			mysqli_close($linkdocu);	
		}


		session_start();
		$_SESSION["idegre"] = $idegre;
		$_SESSION["nombre"] = $nomegre;
		$_SESSION["apepaterno"] = $apepaterno;
		$_SESSION["apematerno"] = $apematerno;
		$_SESSION["usuario"] = $usuario;
		$_SESSION["estegre"] = $estadoegre;

		header("Location: usuaurius/");
		

	}


 
	
?>