<?php
include ("conexion/config.php");
$datcod = $_POST["cod"];
$adm1 = trim($_POST["nombredoce"]);
$adm2 = trim($_POST["nomape"]);
$adm3 = trim($_POST["dni"]);
$adm4 = trim($_POST["correo"]);
$adm5 = trim($_POST["celu"]);
$adm6 = trim($_POST["nomuse"]);
$adm7 = trim($_POST["nomclave"]);
$adm8 = trim($_POST["nive"]);

if($adm1!="" and $adm2!="" and $adm4!="" and $adm6!="" and $adm7!=""){	
	$update=("update usuario set nombre='$adm1', apellido='$adm2', dni='$adm3', correo='$adm4', celular='$adm5', usuario='$adm6', clave='$adm7', nivel='$adm8' where idu='$datcod'");
      $linkdocu->query($update);
	
    mysqli_close($linkdocu);
	$men="yes";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}

echo "<script>location.href='user-admin.php?var=$men'</script> ";
?>