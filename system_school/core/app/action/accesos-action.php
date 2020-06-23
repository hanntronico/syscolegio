<?php 

// view=accesos&opt=acc&id=<?=$est->id_estudiante;

// id_estudiante
// dni
// apellido_paterno
// apellido_materno
// nombre
// genero
// fecha_nac
// apoderado
// num_cel
// direccion
// estado
// fecha_reg
// user_id

if (isset($_GET["opt"])&& $_GET["opt"]=="acc") {

		// echo "entra al if con el id estudiante : ".$_GET["id"];
		$student = EstudiantesData::getById($_GET["id"]);
		// echo "<br>";
		$idusaurio = $student->user_id;
		// echo "id de estudiante : ".$student->id_estudiante;
		// echo "<br>";
		// echo "dni : ".$student->dni;
		// echo "<br>";
		// echo "apellido_paterno : ".$student->apellido_paterno;
		// echo "<br>";
		// echo "apellido_materno : ".$student->apellido_materno;
		// echo "<br>";
		// echo "nombre : ".$student->nombre;
		// echo "<br>";
		// echo "id de usuario : ".$idusaurio;
		// echo "<br>";
		$user = UserData::getById2($idusaurio);
		//var_dump($user);
		// echo "<br>";
		// echo $user->id;

		if ($user==NULL) {
			$user = new UserData();
			$user->id_prof = 0;
			$user->name = $student->nombre;
			$user->lastname = $student->apellido_paterno." ".$student->apellido_materno;
			$user->username = $student->dni;
			$user->password = sha1(md5($student->dni));
			$user->status = 1;
			$user->kind = 3;
			$user->add();
			
			$lastuserid = UserData::ultidinsert();
			$idusu = $lastuserid->lui;

		 	if (isset($lastuserid->lui)) {
				$estudiantes= new EstudiantesData();
				$estudiantes->id=$student->id_estudiante;
				$estudiantes->updateById("user_id", $idusu);
			}
			// echo "<br>";
			// echo "se creó usuario";
		}else{
			// echo "ya existe";
		}

		Core::alert("Usuario agreado correctamente!");
		Core::redir("./?view=accesos&opt=all");

}


?>