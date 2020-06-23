<?php
if(isset($_SESSION["user_id"])){
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$user = new UserData();
	$user->id_prof = $_POST["id_prof"];
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->username = $_POST["username"];
	$user->email = $_POST["email"];
	$user->password = sha1(md5($_POST["password"]));
	$user->kind = $_POST["kind"];
	$user->add();
	Core::alert("Usuario agreado correctamente!");
	Core::redir("./?view=prof_tutor&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){

	$user = UserData::getById2($_POST["user_id"]);
	// var_dump($user);
	// echo "<br>";
	$user->name = $_POST["name"];
	// echo "<br>";
	$user->lastname = $_POST["lastname"];
	// echo "<br>";
	$user->username = $_POST["username"];
	// echo "<br>";
	$user->email = $_POST["email"];
	// echo "<br>";
	
	// var_dump($user);
	// exit();

if ($_FILES['foto']['name']!="") {


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

		// Check file size
		if ($_FILES["foto"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}

		// Allow certain file formats
		if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
		&& $ext != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
				

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $men="error";;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($temporal,"../ctrl_admin/images/faces/".$newname)) {
		        $men="okya";;
		    } else {
		       $men="error";;
		    }
		}		

		$user->image = $newname;
}else{

	$user->image=$_POST["pic"];

}



		// var_dump($user);
		// exit();
	$user->update2();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
		Core::alert("Se ha actualizado el password!");
	}
	Core::alert("Usuario actualizado!");
	Core::redir("./?view=home");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$user = UserData::getById($_GET["id"]);
	if($user->id!=$_SESSION["user_id"]){
		$user->del();
	}
	Core::alert("Usuario eliminado!");
	Core::redir("./?view=users&opt=all");
}
}


?>