<?php
session_start();
if (isset($_SESSION['usuario'])){
}else{
	if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]==null){
	/*print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";*/
}
}
include("ctrl_admin/conexion/config.php");
$activeini = "class='active'";
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

// cosultamos mensaje
$sqlmenso = "SELECT * FROM mensajes WHERE id_msj = '1' and habilitado='Habilitado'";
						  $rsmen=$linkdocu->query($sqlmenso);
if($rsmen->num_rows>0){
while($rwmenso=$rsmen->fetch_array()){
	  $menso1 = $rwmenso["mensaje"];
}
}else{
	$menso1 = "";
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
    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Style CSS -->
    <link href="css/popup.css" rel="stylesheet" type="text/css" />
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


<?php //include("slider.php"); ?>

<section class="testimonial" style="background-color: #fe1c1e; border: 2px solid #F4420A"  >
    <div class="container">
       <form method="post" action="search.php">
      <div class="row">
      	<div class="col-lg-8">
      		<input type="text" name="consultar" class="form-control" placeholder="Ingrese dato a consultar" required>
      	</div>
      	<div class="col-lg-4">
      		<button class="btn btn-danger btn-lg uppercase"  ><b>Consultar</b></button>
      	</div>
      </div>
      <p>Busqueda por: Autor, libro, palabra clave, categoria, codigo ISBN.</p>
       </form>
        <!--<div id="testimonialSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#testimonialSlider" data-slide-to="0" class="active"></li>
                <li data-target="#testimonialSlider" data-slide-to="1"></li>
                <li data-target="#testimonialSlider" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <blockquote>
                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>

                        <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-1.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Justus Kühn</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>
                         <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-2.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Lennox Arnold</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
                <div class="item">
                    <blockquote>

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum egetvel lacus
                            pretium rhoncus a quis nisly Ut vehicula gravida dui in pulvinar donec diam elit
                            consequat eget augue vitae aliquet sollicitudin.
                        </p>
                         <ul class="user-details">
                            <li class="avatar"><img src="img/img-testimonial-3.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Paulina Berger</li>
                            <li class="company">uiCookies</li>
                        </ul>

                    </blockquote>
                </div>
            </div>
        </div>-->
    </div>
</section>
<!-- /.testimonial -->

<section class="case-studies">
    <div class="container">
       <div class="col-lg-9">
        <div class="section-title text-center">
            <h1>Nuestra biblioteca virtual</h1>
            <p>Podras encontrar el libro que este a tu disponibilidad, solicitar o reservarlo el libro, tambien encontraras libros digitales en nesutar biblioteca virtual.</p>
        </div>
        <?php
						  $sqllib="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' ORDER BY l.idl DESC LIMIT 6";
						  $rslib=$linkdocu->query($sqllib);
if($rslib->num_rows>0){
while($rwlib=$rslib->fetch_array()){
	 // $lib = $lib + 1;
	  $libro1 = $rwlib["idl"];
	  $libro2 = $rwlib["titulo"];
	$libro3 = $rwlib["tema"];
	$libro4 = $rwlib["autor"];
	$libro5 = $rwlib["anio"];
	$libro6 = $rwlib["edicion"];
	$libro7 = $rwlib["lugar"];
	$libro8 = $rwlib["editorial"];
	$libro9 = $rwlib["cod_isbn"];
	$libro10 = $rwlib["detalle"];
	$libro11 = $rwlib["canti_ejemplar"];
	$libro12 = $rwlib["canti_pagina"];
	$libro13 = $rwlib["disponible"];
	$libro14 = $rwlib["foto"];
	$libro15 = $rwlib["archivo"];
	$libro16 = $rwlib["categoria"];
	$libro17 = $rwlib["nom_edi"];
	$nomcurl = urls_amigables($libro2);
	
	echo"<div class='col-sm-4'>
                <div class='case-studies-content'>
				<center>
                    <img class='img-responsive' src='ctrl_admin/libro/$libro14' style='height:387px;' alt=''>
					<div style='height:80px;padding: 2% 5% 2%'>
					<a href='libro.php?cap=$libro1&libro=$nomcurl'>$libro2</a><br>
					<b>Autor:</b> $libro4 <br>
					<a href='libro.php?cap=$libro1&libro=$nomcurl' class='btn btn-danger'><b>Leer</b></a>
					</div>
					</center>
                </div>
            </div>";
}
}
		   ?>
        <!--<div class="row">-->
           <!-- <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-1.png" alt="case sudies.png">
                    <h2>Solving the problem</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-2.png" alt="case sudies.png">
                    <h2>Analysis of the enterprise's activity</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-3.png" alt="case sudies.png">
                    <h2>Methods of the recruitment</h2>
                </div>
            </div>-->
        <!--</div>-->
		
        <!--<div class="row">-->
            <!--<div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-4.png" alt="case sudies.png">
                    <h2>SEO and Web development</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-5.png" alt="case sudies.png">
                    <h2>Thinking only of profits</h2>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="case-studies-content">
                    <img class="img-responsive" src="img/img-case-sudies-6.png" alt="case sudies.png">
                    <h2>The main objectives of the marketer</h2>
                </div>
            </div>-->
        <!--</div>-->
        <div class="row">
        <div class="col-lg-12">
        <center><a href="libros.php" class="btn btn-danger btn-lg">Ver todos</a></center>
        </div>
        </div>
    </div>
    
    <div class="col-lg-3">
    	 <div class="section-title text-center">
            <h1>Categoria</h1>
    </div>
    <hr>
    
           	<?php
		$sqlcate = "SELECT * FROM categoria WHERE estado = 'A' ORDER BY categoria DESC";
						  $rscat=$linkdocu->query($sqlcate);
if($rscat->num_rows>0){
	echo"<ul style='padding: 0% 12% 2%'>";
while($rwcat=$rscat->fetch_array()){
	  //$cate = $cate + 1;
	  $cat1 = $rwcat["idc"];
	  $cat2 = $rwcat["categoria"];
	$catecurl = urls_amigables($cat2);
	echo"<li><a href='searchcat.php?cat=$cat1&categoria=$catecurl'><i class='glyphicon glyphicon-menu-right'></i> $cat2</a></li>";
}
	echo"</ul>";
}
		?>
            
            <br><br>
            <h1>Autores</h1>
    <hr>
    <?php
		$sqlauto = "SELECT autor FROM libro WHERE estado = 'A' GROUP BY autor ORDER BY autor ASC";
		$rsauto=$linkdocu->query($sqlauto);
if($rsauto->num_rows>0){
	echo"<ul class='list-inline'>";
while($rwau=$rsauto->fetch_array()){
	  //$auto = $auto + 1;
	  $auto1 = $rwau["autor"];
	$autorurl = urls_amigables($auto1);
	echo"<li><a href='searchautor.php?auto=$auto1&autor=$autorurl'><i class='glyphicon glyphicon-file'></i> $auto1</a></li>";
}
	echo"</ul>";
}
		
		?>
    </div>
</section>
<!-- /.client-logo -->

<!-- <section class="client-logo ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-1.jpg" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-2.jpg" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-3.jpg" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-4.jpg" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-5.jpg" alt="Image"></a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
                <a href="#"><img src="img/logo-client-6.jpg" alt="Image"></a>
            </div>
        </div>
    </div>
</section> -->
<!-- /.client-logo -->

<a href="#popup" id="btn_modal" style="display: none;">Abrir Popup</a>

<div id="popup" class="overlay">
            <div id="popupBody">
                <h2>Comunicado !</h2>
                <a id="cerrar" href="#">&times;</a>
                <div class="popupContent">
                    <p><?=$menso1;?></p>
                </div>
            </div>
        </div>
        
<!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Inicia Sesión</h4>
        </div>
        <div class="modal-body">
         <form method="post" action="">
          <div class="row">
          	<div class="col-lg-12">
          		<p><label>Usuario</label></p>
          		<input type="text" class="form-control" name="user" placeholder="Ingrese su usuario" required >
          		<p><label>Contraseña</label></p>
          		<input type="password" class="form-control" name="clave" placeholder="Ingrese clave" required>
          		<hr>
          		<button type="submit" name="ingresa" class="btn btn-primary">Ingresar</button>
          	</div>
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>-->

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
<div/>

<?php if($menso1!=""){ ?>
	<script>
		$("#btn_modal").get(0).click();
	</script>
	<?php } ?>
	
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>        
</body>
</html>