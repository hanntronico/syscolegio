<?php
include ("conexion/config.php");
$idse=$_GET["dat"];
$rsh=("update usuario set estado='E' where idu='$idse'");
$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="delete";
header("Location: user-admin.php?var=$mensaje");
?>