<?php
include ("conexion/config.php");

$adm1 = trim($_POST["nombredoce"]);
$adm2 = trim($_POST["nomape"]);
$adm3 = trim($_POST["dni"]);
$adm4 = trim($_POST["correo"]);
$adm5 = trim($_POST["celu"]);
$adm6 = trim($_POST["nomuse"]);
$adm7 = trim($_POST["nomclave"]);
$adm8 = trim($_POST["nive"]);

//validamos correo
$sqlvista="SELECT * FROM usuario WHERE estado = 'A' and correo='$adm4'";
$rspv=$linkdocu->query($sqlvista);
if($rspv->num_rows>0){
while($rwpv=$rspv->fetch_array()){
	  $este="Si";
}
}else{
	$este="No";
}

if($este=="No"){
if($adm1!="" and $adm2!="" and $adm4!="" and $adm6!="" and $adm7!=""){
$Sqlad="insert into usuario(nombre,apellido,dni,correo,celular,usuario,clave,nivel,acceso,estado,fecha_reg) values ('$adm1','$adm2','$adm3','$adm4','$adm5','$adm6','$adm7','$adm8','Si','A',now())";
   $linkdocu->query($Sqlad);
    mysqli_close($linkdocu);
	$men="okya";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
	}else{
	$men="error";
	  //echo "<script>location.href='user-admin.php?var=$men'</script> ";
}
	}else{
	$men="yaexit";
}
echo "<script>location.href='user-admin.php?var=$men'</script> ";
?>