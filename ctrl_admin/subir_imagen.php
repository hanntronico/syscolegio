<?php 
include ("conexion/config.php");

$dni = trim($_POST["dni"]);
$userid = trim($_POST["userid"]); 

$este="No";

if($este=="No"){
if($userid!="" and $dni!=""){


				$temporal=$_FILES['foto']['tmp_name'];
				// echo "<br>";
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
				    if (move_uploaded_file($temporal,"images/faces/".$newname)) {
				        $men="okya";;
				    } else {
				       $men="error";;
				    }
				}		

	$Sqlad = "UPDATE usuarios SET image='".$newname."' WHERE id=".$userid;
	
  $linkdocu->query($Sqlad);
  mysqli_close($linkdocu);
	$men="okya";

	
	}else{
	$men="error";

	}
}else{
	$men="yaexit";
}
echo "<script>location.href='dashboard.php?var=$men'</script> ";


?>