<?php 
	include ("../ctrl_admin/conexion/config.php");

	

	switch ($_POST["pag"]) {

/********************************** registro 1 DATOS ********************************************/
		case 'registro':

				// echo $_POST["id"];

    /************* subida normal  **************/
/*				$temporal=$_FILES['foto']['tmp_name'];
				$nombre=$_FILES['foto']['name'];
				$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
				date_default_timezone_set('America/Lima');
				$fec=date('Hyimsd');
				echo $newname = "pic".$fec.".".$ext;
				move_uploaded_file($temporal,"fotos/".$newname);*/



// $target_dir = "fotos/";
// $target_file = $target_dir . basename($_FILES["foto"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				$uploadOk = 1;
				// $temporal=$_FILES['foto']['tmp_name'];
				// $nombre=$_FILES['foto']['name'];
				// $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

				// date_default_timezone_set('America/Lima');
				// $fec=date('Hyimsd');
				// $newname = "pic".$fec.".".$ext;

				if($nombre=$_FILES['foto']['name'] == ''){
					$newname=$_POST["ant_foto"];
					$ext="";
					$msn='1d';
				}else{
					$temporal=$_FILES['foto']['tmp_name'];
					$nombre=$_FILES['foto']['name'];
					$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					date_default_timezone_set('America/Lima');
					$fec=date('Hyimsd');
					$newname = "pic".$fec.".".$ext;
				
			    $check = getimagesize($_FILES['foto']['tmp_name']);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }				

					// Allow certain file formats
					if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
					&& $ext != "gif" ) {
					    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					    $uploadOk = 0;
					}

					// Check file size
					if ($_FILES["foto"]["size"] > 500000) {
					    echo "Sorry, your file is too large.";
					    $uploadOk = 0;
					}


						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
						    $msn='err1';
						// if everything is ok, try to upload file
						} else {
								
											    				    
							    if (move_uploaded_file($temporal,"fotos/".$newname)) {
							        $msn='1d';
							    } else {
							        $msn='err1';
							    }

						}	



				}



				// echo $uploadOk;
				// exit();

			

				// exit();
				$password = trim($_POST["pass"]);
				$ant_pass = trim($_POST["ant_pass"]);


				if ($password ==	$ant_pass) {
					$pass=$ant_pass;
				}else{
					$pass=md5($password);
				}

				$sqlinsreg = "UPDATE egresados SET fec_nac='".$_POST["fechanac"]."',
															foto='".$newname."',
															lug_nac=".$_POST["codDistrito"].",
															lug_dom_actual=".$_POST["codDistrito"].",
															telefono='".$_POST["telefono"]."',
															password='".$pass."',
															redes_sociales='".$_POST["redes"]."',
															info_contacto='".$_POST["info"]."' WHERE idegresado=".$_POST["id"];
				
				$linkdocu->query($sqlinsreg);
  		 	mysqli_close($linkdocu);

  		 	$page="registro";
  		 	// $msn='1d';

			break;		


/*********************************  registro 2 CARRERAS  ****************************************/

		case 'registro2':

			// echo $_POST["codCarrera"]."<br>";
			// echo $_POST["fecini_carr"]."<br>";
			// echo $_POST["fecfin_carr"]."<br>";
			
			$sqlingcarr = "SELECT * FROM detalle_carreras 
										 WHERE idegresado=".$_POST["id"]." AND idcarrera=".$_POST["codCarrera"];			
			$rsde=$linkdocu->query($sqlingcarr);

			if($rsde->num_rows>0){
				$msn="ec";
			}else {
				$sqlingcarr = "INSERT INTO detalle_carreras(idegresado, idcarrera, fec_inicio, fec_fin) 
											 VALUES (".$_POST["id"].",".
											 					 $_POST["codCarrera"].",'".
											 					 $_POST["fecini_carr"]."','".
											 					 $_POST["fecfin_carr"]."')";			
				$linkdocu->query($sqlingcarr);
	  		mysqli_close($linkdocu);
  			
  			$page="registro2";
  			$msn='1c';
			}

			break;

/*********************************  registro 3 Especialidades  ****************************************/

		case 'registro3':

			// echo $_POST["codEspecialidad"]."<br>";
			// echo $_POST["fecini_espe"]."<br>";
			// echo $_POST["fecfin_esp"]."<br>";

			$sqlingcarr = "SELECT * FROM detalle_especialidades 
										 WHERE idegresado=".$_POST["id"]." AND idespecialidad=".$_POST["codEspecialidad"];			
			$rsde=$linkdocu->query($sqlingcarr);

			if($rsde->num_rows>0){
				$msn="ee";
			}else {
				$sqlingcarr = "INSERT INTO detalle_especialidades(idegresado, idespecialidad, fec_ini_esp, fec_fin_esp) 
											 VALUES (".$_POST["id"].",".
											 					 $_POST["codEspecialidad"].",'".
											 					 $_POST["fecini_espe"]."','".
											 					 $_POST["fecfin_esp"]."')";			
				$linkdocu->query($sqlingcarr);
	  		mysqli_close($linkdocu);

	  		$page="registro3";
	  	 	$msn='1e';
			}

			break;


/*********************************  registro 4 GRADOS Y TITULOS  **********************************/

		case 'registro4':

			// echo "Codinstituto: ".$_POST["codInstituto"]."<br>";
			// echo "codTipogrado: ".$_POST["codTipogrado"]."<br>";
			// echo "documento: ".$_POST["documento"]."<br>";
			// echo "mencion: ".$_POST["mencion"]."<br>";
			// echo "horas: ".$_POST["horas"]."<br>";
			// echo "yearini: ".$_POST["yearini"]."<br>";
			// echo "yearfin: ".$_POST["yearfin"]."<br>";
			// echo "periodo: ".$_POST["periodo"]."<br>";
			// echo "link: ".$_POST["link"]."<br>";

// idgrados_titulos	idinstitucion	idtipo	documento	mencion	horas	year_inicio	year_fin	periodo	link_consulta


			$sqlingradtit = "SELECT * FROM grados_titulos 
										 WHERE idinstitucion=".$_POST["codInstituto"].
										 " AND idtipo=".$_POST["codTipogrado"].
										 " AND mencion='".$_POST["mencion"]."'".
										 " AND year_inicio='".$_POST["yearini"]."'".
										 " AND year_fin='".$_POST["yearfin"]."'";

			$rsde=$linkdocu->query($sqlingradtit);



			if($rsde->num_rows>0){
				$msn="ee";
			}else {

					// $temporal=$_FILES['documento']['tmp_name'];
					// $nombre=$_FILES['documento']['name'];
					// $ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					// date_default_timezone_set('America/Lima');
					// $fec=date('Hyimsd');
					// $newname = "doc".$fec.".".$ext;

					// move_uploaded_file($temporal,"documentos/".$newname);



				$uploadOk = 1;

				if($nombre=$_FILES['documento']['name'] == ''){
					$newname='';
				}else{
					$temporal=$_FILES['documento']['tmp_name'];
					$nombre=$_FILES['documento']['name'];
					$ext = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));

					date_default_timezone_set('America/Lima');
					$fec=date('Hyimsd');
					$newname = "doc".$fec.".".$ext;
				}


				// Check file size
				if ($_FILES["documento"]["size"] > 500000) {
				    echo "Sorry, your file is too large.";
				    $uploadOk = 0;
				    $msn='err3';
				}


				// Allow certain file formats
				if($ext != "pdf" ) {
				    echo "Sorry, only PDF files are allowed.";
				    $uploadOk = 0;
				    $msn='err2';
				}


				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    if ($msn=='err2') {
				    	$msn='err2';
				    }elseif ($msn=='err1') {
				    	$msn='err1';
				    }elseif ($msn=='err3') {
				    	$msn=='err3';
				    }
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($temporal,"documentos/".$newname)) {
				        $msn='1g';
	
								$sqlgradtit = "INSERT INTO grados_titulos(idinstitucion, idtipo, documento, mencion, horas, year_inicio, year_fin, periodo, link_consulta) 
															 VALUES (".$_POST["codInstituto"].",".
															           $_POST["codTipogrado"].",'".
															           $newname."','".
															           $_POST["mencion"]."','".
															           $_POST["horas"]."',".
															           $_POST["yearini"].",".
															           $_POST["yearfin"].",'".
															           $_POST["periodo"]."','".
															           $_POST["link"]."')";			
								$linkdocu->query($sqlgradtit);

								$lcod = $linkdocu->insert_id;

								$sqlinsdtg = "INSERT INTO det_grados_tit(idegresado, idgrados_titulos) VALUES (".$_POST["id"].",".$lcod.")";
								$linkdocu->query($sqlinsdtg);


				    } else {
				        $msn='err1';
				    }
				


				}	






	  		
	  		mysqli_close($linkdocu);

	  		$page="registro4";
	  	 	// $msn='1g';
			}

			break;



}

header("location: ".$page.".php?msn=".$msn);

?>