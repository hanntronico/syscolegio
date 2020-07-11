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

$activecontac = "class='active'";
$activeini = "";
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

if(isset($_POST['envia'])){
	$recibe1 = $_POST["nombre"];
	$recibe2 = $_POST["correo"];
	$recibe3 = $_POST["asunto"];
	$recibe4 = $_POST["mensaje"];
	
$destinatario = "info@jesusinos.edu.pe"; 
$asunto = "Mensaje enviado desde la Plataforma Educativa - Asunto : ".$recibe3.""; 
$cuerpo = ' 
<html> 
<head> 
   <title>'.$recibe3.'</title> 
</head> 
<body> 
<p>Estimado administrador de la Institución Educativa Privada "Sagrado Corazón de Jesús" este mensaje es enviado desde el formulario de contacto de la web </p>
<p>
<b>Nombres: </b> '.$recibe1.' <br>
<b>Correo: </b> '.$recibe2.' <br>
<b>Asunto: </b> '.$recibe3.' <br>
<b>Mensaje: </b> '.$recibe4.' <br>
</p>

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
$headers .= "From: Admin de la Plataforma Educativa <info@jesusinos.edu.pe>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: info@jesusinos.edu.pe\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: info@jesusinos.edu.pe\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";
//$headers .= "Bcc: capacitacion@augeperu.org\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);


$destinatario2 = $recibe2; 
$asunto2 = "Respuesta automática de Sitio web www.jesusinos.edu.pe - Asunto :"; 
$cuerpo2 = ' 
<html> 
<head> 
   <title>'.'Comunicación desde la Web'.'</title> 
</head> 
<body> 
<p>
  Gracias por comunicarse con la Institución Educativa Privada "Sagrado Corazón de Jesús", en breve, una persona encargada se comunicará con Ud. Estamos para servirlo para mejorar su experiencia con nosotros. Atte.  
</p>
<p>La Dirección</p>

</body> 
</html> 
'; 

mail($destinatario2,$asunto2,$cuerpo2,$headers);


	$alerta ="yes";
}else{
    $alerta = "";
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
                <h2>Contactanos</h2>
            </div>
        </div>
    </div>
</section>

<section class="contact-section">
                <div class="container">
                 <?php if($alerta=="yes"){ ?>
	<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Alerta!</strong> el mensaje fue enviado, estaremos evaluando su mensaje por el administrador de la web.
</div>
                 <?php } ?>
                  <div class="section-title text-center">
                    <h2>La Institución Educativa Privada "Sagrado Corazón de Jesús" - dispone de esta plataforma ante cualquier duda o consulta que tengas, pronto te estaremos respondiendo a tus preguntas</h2>
                  </div>

                  <div class="contact-form mt-50">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nameTwo" class="sr-only">Nombre</label>
                            <input type="text" name="nombre" class="form-control" required="" id="nameTwo" placeholder="Tu nombre completo">
                          </div>
                          
                          <div class="form-group">
                            <label for="emailTwo" class="sr-only">Email</label>
                            <input type="email" name="correo" class="form-control" required="" id="emailTwo" placeholder="Email - Correo">
                          </div>

                          <div class="form-group">
                            <label for="emailTwo" class="sr-only">Asunto</label>
                            <input type="text" name="asunto" class="form-control" required="" id="" placeholder="Ingrese el asunto">
                          </div>
                        </div> <!-- col-md-4 -->

                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="messageTwo" class="sr-only">Mensaje</label>
                            <textarea class="form-control" name="mensaje" required rows="7" placeholder="Escribe el mensaje"></textarea>
                          </div>
                        </div> <!-- col-md-8 -->
                      </div><!-- /.row-->

                      <button type="submit" name="envia" class="btn btn-danger btn-lg pull-right">Enviar Mensaje</button>
                    </form>
                  </div> <!-- contact-form -->           
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