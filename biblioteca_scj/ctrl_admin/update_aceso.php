<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("update usuario set acceso='Si' where idu='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="axe";
header("Location: user-admin.php?var=$mensaje");
?>