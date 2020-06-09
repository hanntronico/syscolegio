<?php
session_start();
include("../ctrl_admin/conexion/config.php");

session_unset();
session_destroy();
print "<script>window.location='../';</script>";
?>