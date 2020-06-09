<?php
if(!empty($_POST)){
	if(isset($_POST["userini"]) &&isset($_POST["claveini"])){
		if($_POST["userini"]!=""&&$_POST["claveini"]!=""){
			include("conexion/config.php");
				
			$useusu=null;
			$mdcincopass = sha1(md5($_POST["claveini"]));
			
			// echo $sql1= "SELECT * FROM usuarios WHERE (usuario='".$_POST["userini"]."' and password='".$mdcincopass."' and estado=1 and acceso='SI') ";
			$sql1= "SELECT * FROM usuarios WHERE (username='".$_POST["userini"]."' and password='".$mdcincopass."' and status=1) ";
			// exit();

			/*$rsde = mysql_query($sql1);
if (mysql_num_rows($rsde) > 0){
	while($rowde = mysql_fetch_array($rsde)){*/
			$rsde=$linkdocu->query($sql1);
			if($rsde->num_rows>0){
			while($rowde=$rsde->fetch_array()){
					$useusu = $rowde["id"];
					$nombresu = $rowde["name"];
					$nombreape = $rowde["lastname"];
					$useemai = $rowde["email"];
					$userperfil = $rowde["username"];
					//$estadou = $rowde["activo"];
					$usernive = $rowde["kind"];
					/*$user_foto = $rowde["foto"];*/
				}
			}


			if($useusu==null){
				print "<script>alert(\"Acceso invalido  Usuario o Clave Incorrectos.\");window.location='index.php';</script>";
			}else{
				session_start();
				
				$_SESSION["idu"] = $useusu;
				$_SESSION["nombre"] = $nombresu;
				$_SESSION["apellido"] = $nombreape;
				$_SESSION["correo"] = $useemai;
				$_SESSION["usuario"] = $userperfil;
				//$_SESSION["activo"] = $estadou;
				$_SESSION["nivel"] = $usernive;
				/*$_SESSION["foto"] = $user_foto;*/
							
				//obtenermos ip
				/*if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
                 // El usuario navega a través de un proxy
                  $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
                  $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
                 } else {
                 $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
                 }*/
				
				echo $acceder = $_SESSION["nivel"];
				// exit();
				 //obtenemos fecha y hora actual
				 date_default_timezone_set("America/Lima");
				 $fechahoy = date("Y-m-d H:i:s");
				
				if($acceder==0 || $acceder==3){
					print "<script>window.location='dasboard.php';</script>";
				}else{
					print "<script>window.location='../ctrl_admin';</script>";
				}

			}
		}
	}
}

mysqli_close($linkdocu);

?>