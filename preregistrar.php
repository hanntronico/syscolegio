<?php 
	include ("ctrl_admin/conexion/config.php");
// $sqlinsreg = "INSERT INTO `egresados`(`nom_egresado`, `ape_paterno`, `ape_materno`, `fec_nac`, `foto`, `lug_nac`, `lug_dom_actual`, `telefono`, `email`, `redes_sociales`, `info_contacto`, `estado`) 
// 							VALUES ('".$_POST["nombres"]."','".
// 							           $_POST["apepaterno"]."','".
// 							           $_POST["apematerno"]."','".
// 							           $_POST["fechanac"]."',[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])";



	if($_POST) {

		if ($_POST["password"]==$_POST["confpassword"]) {

			session_start();
			if($_POST['captcha'] != $_SESSION['digit']) die("Lo sentimos, el código ingresado fue incorrecto!");
	    session_destroy();

	    $sqlcomp = "SELECT * FROM egresados WHERE dni='".$_POST["dni"]."'";
		  $rspv=$linkdocu->query($sqlcomp);

     	if($rspv->num_rows>0){
     		header("Location: preregistro.php?mens=err1");
     	}else{

	    // $dominio = "http://seimaqsac.com/sysegresados/"; 
	    $dominio = ""; 
	    $link = $dominio."ingresar.php?id=".md5($_SESSION['digit']);	

			$sqlinsreg = "INSERT INTO egresados(nom_egresado, ape_paterno, ape_materno, dni, email, password, link_conf, estado) 
										VALUES ('".$_POST["nombres"]."','".
															 $_POST["apepaterno"]."','".
															 $_POST["apematerno"]."','".
															 $_POST["dni"]."','".
															 $_POST["correo"]."','".
						  				         md5($_POST["password"])."','".
						  				         $link."',4)";
			$linkdocu->query($sqlinsreg);
  		mysqli_close($linkdocu);				



  		header("Location: preregistro.php?mens=1");
  		}

		}else {
			header("Location: preregistro.php?mens=2");
		}



  }

?>