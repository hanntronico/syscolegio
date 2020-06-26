<?php
if (isset($_GET["opt"])&& $_GET["opt"]=="login") {
	if ($_POST["username"]!= ""&&$_POST["password"]!="") {
		$db=new Database();
		$con=$db->getCon();
		$sql="SELECT * from usuarios where username=\"$_POST[username]\" and password=\"".sha1(md5($_POST["password"]))."\""." AND kind <>3";
		$query=$con->query($sql);
		$user=null;
		if ($query) {
			$user=$query->fetch_array();
			if ($user!=null) {
				$_SESSION["user_id"]=$user["id_prof"];
				$_SESSION["idusuario"]=$user["id"];

				date_default_timezone_set('America/Lima');
				$ui=$_SESSION["idusuario"];
				$hoy=date("Y-m-d H:i:s");
				$pc=$_SERVER['REMOTE_ADDR'];

				$accesos=new AccesosData();
				$accesos->acc_fecha=$hoy;
				$accesos->acc_origen=$pc;
				$accesos->usr_codigo=$ui;
				$accesos->add();

				Core::redir("./");
			}
		}
		if ($user==null) {
			Core::alert("Datos incorrectos!");
			Core::redir("./");
		}
	}else
	Core::alert("Datos Vacios");
	Core::redir("./");
}
if (isset($_GET["opt"])&&$_GET["opt"]=="logout") {
	session_destroy();
	Core::redir("./");
}
?>