<?php
if(!empty($_POST)){
	if(isset($_POST["userini"]) &&isset($_POST["claveini"])){
		if($_POST["userini"]!=""&&$_POST["claveini"]!=""){
			include("../ctrl_admin/conexion/config.php");
				
			$idegre=null;
			$mdcincopass = md5($_POST["claveini"]);
			
			// $sql1= "SELECT * FROM usuarios WHERE (usuario='".$_POST["userini"]."' and password='".$mdcincopass."' and estado=1 and acceso='SI') ";

// idegresado
// nom_egresado
// ape_paterno
// ape_materno
// fec_nac
// foto
// lug_nac
// lug_dom_actual
// telefono
// email
// password
// link_conf
// redes_sociales
// info_contacto
// estado

/*********************** ESTAD CONSULTA ES PARA LOS EGRESADOS CON ESTADO 1 ***************/
			echo $sql1= "SELECT * FROM egresados WHERE (email='".$_POST["userini"]."' AND password='".$mdcincopass."' AND estado=1)";
			exit();


			/*$rsde = mysql_query($sql1);
if (mysql_num_rows($rsde) > 0){
	while($rowde = mysql_fetch_array($rsde)){*/
			$rsde=$linkdocu->query($sql1);
			if($rsde->num_rows>0){
			while($rowde=$rsde->fetch_array()){
					$idegre = $rowde["idegresado"];
					$nombregre = $rowde["nom_egresado"];
					$apepater = $rowde["ape_paterno"];
					$apemater = $rowde["ape_materno"];
					$egre_email = $rowde["email"];
					$egrestado = $rowde["estado"];
					$egre_foto = $rowde["foto"];
				}
			}



			if($idegre==null){
				print "<script>alert(\"Acceso invalido  Usuario o Clave Incorrectos.\");window.location='../ingresar/';</script>";
			}else{
				session_start();
				
				$_SESSION["idegresado"] = $idegre;
				$_SESSION["nombre"] = $nombregre;
				$_SESSION["apellido"] = $apepater." ".$apemater;
				$_SESSION["correo"] = $egre_email;
				$_SESSION["usuario"] = $egre_email;
				//$_SESSION["activo"] = $estadou;
				$_SESSION["egre_estado"] = $egrestado;
				/*$_SESSION["foto"] = $user_foto;*/
				
				//obtenermos ip
				/*if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
                 // El usuario navega a través de un proxy
                  $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
                  $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
                 } else {
                 $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
                 }*/
				
				// $acceder = $_SESSION["egre_estado"];

				if ($_SESSION["egre_estado"]==1) {
					$acceder=1;
				}else{
					$acceder=0;					
				}     

			  //obtenemos fecha y hora actual
				 date_default_timezone_set("America/Lima");
				 $fechahoy = date("Y-m-d H:i:s");
				
				if($acceder==1){
					print "<script>window.location='/sysegresados/usuaurius/';</script>";
				}else{
					print "<script>window.location='../';</script>";
				}

			}
		}
	}
}

mysqli_close($linkdocu);

?>