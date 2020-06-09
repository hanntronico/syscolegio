<?php
session_start();
if (isset($_SESSION['usuario'])){
    $variusu = $_SESSION["idu"];
$variusunom = $_SESSION["nombre"].' '.$_SESSION["apellido"];
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	/*print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";*/
}
}
include("ctrl_admin/conexion/config.php");

$activeini = "";
$activecontac = "";

//url amigable
function urls_amigables($url) {
// Tranformamos todo a minusculas
$url = strtolower($url);
//Rememplazamos caracteres especiales latinos
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', 'Ñ', 'Á', 'É', 'Í', 'Ó', 'Ú');
$repl = array('a', 'e', 'i', 'o', 'u', 'n', 'N', 'a', 'e', 'i', 'o', 'u');
$url = str_replace ($find, $repl, $url);
// Añaadimos los guiones
$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);
// Eliminamos y Reemplazamos demás caracteres especiales
$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array('', '-', '');
$url = preg_replace ($find, $repl, $url);
return $url;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include("title.php"); ?>
    <!-- web-fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div id="main-wrapper">
<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
<?php 
	include("menu_superior.php");
	include("menu.php");
	?>

<section class="single-page-title single-page-title-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Alquiler de libros</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
                <div class="container">
                  <div class="section-title text-center">
                    <h2>IESPP "Victor Andres Belaunde" - dispone de esta plataforma a sus estudiantes y docentes nuestra biblioteca virtual</h2>
                  </div>
                  
                  <div class="row">
            <div class="col-md-6">
                <p><img class="img-responsive" src="img/reserva.png"> </p>
            </div>
            <div class="col-md-6">
                <p>
                   <b>RESERVA DE MATERIAL BIBLIOGRÁFICO</b><br>
                   Solicita la reserva de libros para la revisión en tu hogar, siempre que cumplas los siguientes requisitos:</p>
                   <b>*</b> Estar matriculado en nuestra plataforma de biblioteca virtual. <br>
                   <b>*</b> Identifica o busca el libro de tu interes en la web. <br>
                   <b>*</b> Solicita la reserva del libro de tu interes dando click en la opcion "Reservar libro" y elige la fecha a reservar el libro. <br>
                   <b>*</b> Acercate a la biblioteca en la fecha de reserva programada al módulo de atención con tu carnet de alumno o DNI para registrar el prestamo. <br>
                   <b>*</b> Toma nota para la fecha de devolución del libro. <br>
                   <b>*</b> Llévate el libro y devuélvelo a tiempo.
            </div>
        </div>
                                                
                </div>
              </section> <!-- contact-section -->

<?php include("footer.php"); ?>

</div>
<!-- .content-wrapper -->
</div>
<?php include("menu_movil.php"); ?>

</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/scripts.js"></script>      
</body>
</html>