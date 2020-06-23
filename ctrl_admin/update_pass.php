<?php
include ("conexion/config.php");
echo $idusu=$_POST["keyllave"];
echo $rsh=("UPDATE usuarios SET password='".sha1(md5($_POST["llaveuno"]))."' WHERE id=".$idusu);

$linkdocu->query($rsh);
mysqli_close($linkdocu);
   $mensaje="axe";
header("Location: dashboard.php?var=$mensaje");
?>