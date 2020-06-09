<?php
session_start();
if (isset($_SESSION['usuario'])){
	print "<script>window.location='../';</script>";
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	/*print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";*/
}
}
//include("../ctrl_admin/conexion/config.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("../title.php"); ?>
    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="../css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="../fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link href="../css/style.css" rel="stylesheet">
    
    
</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<!--<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>-->

<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
<?php 
	//include("menu_superior.php");
	//include("../menu.php");
	?>


<section class="client-logo ptb-100" style="background-image: url(../img/bg11.jpg); repeat left top;">
    <div class="container">
     <a href="../" class="pull-right" style="color: #D9534F;"><i class="fa fa-reply"></i> Regresar</a><br>
      <center><img class="img-responsive" src="../img/Logo_SCJ.png" width="450px"></center><br>
      <hr>
       <!-- <form method="post" action="../ctrl_admin/login.php"> -->
       <form method="post" action="../usuaurius/login.php">
          <div class="row">
          <div class="col-lg-4"></div>
          	<div class="col-lg-4">
          		<label>Usuario</label>
          		<input type="text" class="form-control" name="userini" placeholder="Ingrese su usuario" required >
          		<label>Contraseña</label>
          		<input type="password" class="form-control" name="claveini" placeholder="Ingrese clave" required>
          		<br><br>
          		<button type="submit" name="ingresa" class="btn btn-danger btn-lg">Ingresar</button><br><br>
          		<center><a href="../">Ingresar como invitado</a></center>
          	</div>
          	<div class="col-lg-4"></div>
          </div>
          </form>
          <div class="row">
          	<div class="col-lg-12">
          		<hr>
          	</div>
          </div>
    </div>
</section>
<!-- /.client-logo -->

<?php //include("../footer.php"); ?>
<footer class="footer" style="background-color: #828587 ; ">
    <!-- Footer Widget Section -->
    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2020 | Institución Educativa Privada <strong style="color:#fe1c1e">"Sagrado Corazón de Jesús"</strong></span>

            <ul class="list-inline pull-right">
                <li class="active"> <a href="https://www.macberri.com/" target="_blank"> Web Diseño: MACBERRI SAC</a></li>
            </ul>
        </div><!-- .container -->

    </div><!-- .copyright-section -->
</footer>

</div>
<!-- .content-wrapper -->
</div>
<?php //include("../menu_movil.php"); ?>

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="../js/smoothscroll.js"></script>
<script src="../js/mobile-menu.js"></script>
<script src="../js/scripts.js"></script>
<div/>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>        
	</div>
</body>
</html>