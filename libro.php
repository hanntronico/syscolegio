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


$cid = "";
$varmen = "";
$varmen = $_GET["var"];
if($varmen!=""){
  $varmen = $_GET["var"];  
}else{
  $varmen = "";  
}
$este = $_GET["cap"];
$solipres = $_GET["cid"];
if($solipres!=""){
    $solipres = $_GET["cid"];
}else{
    $solipres = "";
}


						  $sqllib="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' AND l.idl='$este' ";
						  $rslib=$linkdocu->query($sqllib);
if($rslib->num_rows>0){
while($rwlib=$rslib->fetch_array()){
	  //$lib = $lib + 1;
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
	
	if($libro13=="Disponible"){
		$fet = "text-success";
	}else{
		$fet = "text-danger";
	}
}
}

if (isset($_SESSION['usuario'])){
if($solipres!=""){//insetamos solicitud
	date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");
	$Sqlsoli="insert into solicitudes(idl,idu,fecha,situ,estado) values ('$libro1','$variusu','$fechahoy','Pendiente','A')";
   $linkdocu->query($Sqlsoli);
	$alert ="soli";
}
}else{
    	$alert = "";
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

<!--<section class="testimonial">
    <div class="container">
       <form method="post" action="search.php">
      <div class="row">
      	<div class="col-lg-8">
      		<input type="text" name="consultar" class="form-control" placeholder="Ingrese dato a consultar">
      	</div>
      	<div class="col-lg-4">
      		<button class="btn btn-primary btn-lg uppercase"><b>Consultar</b></button>
      	</div>
      </div>
      <p>Busqueda por: Autor, libro, palabra clave, categoria, codigo ISBN.</p>
       </form>
    </div>
</section>-->
<!-- /.testimonial -->

<section class="case-studies">
    <div class="container">

       <div class="col-lg-12">
       
       <?php if($alert=="soli"){ ?>
       <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Mensaje!</strong> Se registro la solicitud de prestamo del libro: <b><?=$libro2;?></b>, acerquese con su documento de identidad a la biblioteca a solictar el libro.<br>
  <small><b>Nota:</b> Puede que otros usuarios tambien esten solicitando el mismo libro. </small>
</div>
      <?php } ?>
      <?php if($varmen=="okya"){ ?>
      <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Mensaje!</strong> Se registro la reservacion del libro: <b><?=$libro2;?></b>, acerquese con su documento de identidad a la biblioteca a solictar el libro en la fecha reservada.<br>
  <small><b>Nota:</b> Puede que otros usuarios tambien esten reservando el mismo libro para esa misma fecha. </small>
</div>
      <?php } ?>
       
        <div class="section-title text-center">
            <h1><strong><?=$libro2;?></strong></h1>
        </div>
        
	
	<div class='col-sm-10' style="background-color: #FFFFFF;">
                <div class='case-studies-content'>
                <div class="row">
                	<div class="col-lg-4">
                		<center><img class='img-responsive' src='ctrl_admin/libro/<?=$libro14;?>' alt=''></center>
                		<hr>
                		<p><i><b>Autor:</b></i> <?=$libro4;?> </p>
                		<p><i><b>Editorial:</b></i> <?=$libro17;?> </p>
                		<p><i><b>Codigo ISBN:</b></i> <?=$libro9;?> </p>
                	</div>
                <div class="col-lg-8">
                	<p style="padding: 5% 0% 1%;" align="justify"><?=$libro10;?></p>
                	<p><i>Tema(s):</i> <?=$libro3;?> </p>
                	<p><i>Pagina(s):</i> <?=$libro12;?> </p>
                	<p><i>Edición:</i> <?=$libro6;?> </p>
                	<p><i>Lugar:</i> <?=$libro7;?> </p>
                	<br>
                	<center>
                	<?php if (isset($_SESSION['usuario'])){ ?>
                	<?php if($libro15!=""){ ?>
                		<a href="libro-digital.php?cap=<?=$libro1;?>&libro=<?=$nomcurl;?>" target="_blank" class="btn btn-warning"><b> <i class="glyphicon glyphicon-book"></i> Ver libro digital</b></a>
                		<?php }else{ } ?>
                		<?php }else{ 
						if($libro15!=""){ ?>
                    <a href="#popup" class="btn btn-warning"><b> <i class="glyphicon glyphicon-book"></i> Ver libro digital</b></a>
	                    <?php } 
                             } ?>
	                    <br><br>
                	</center>
               
                </div>
                </div>
                </div>
            </div>
       <div class="col-sm-2">
       <h4 align="center" class="<?=$fet;?>"><b><i class="glyphicon glyphicon-star-empty"></i> <?=$libro13;?> </b></h4>
       <center>
      <?php if (isset($_SESSION['usuario'])){ ?>
      <?php if($libro13=="Disponible"){ ?>
      <a href="libro.php?cid=pres&cap=<?=$libro1;?>&libro=<?=$nomcurl;?>" class="btn btn-primary"><i class="glyphicon glyphicon-flag"></i> Solicitar Prestano</a>
      <?php }else{ ?>
      <!--<button class="btn btn-primary"><i class="glyphicon glyphicon-flag"></i> Solicitar Prestano </button>-->
      <small><b>No esta disponible en la biblioteca</b></small>
      <?php } ?>
      <br><br>
      <a href="#popup_reserva" class="btn btn-info"><i class="glyphicon glyphicon-bookmark"></i> Reservar Libro</a>
      <br><br>
      	<?php }else{ ?>
      	<a href="#popup" class="btn btn-primary"><i class="glyphicon glyphicon-flag"></i> Solicitar Prestano</a><br><br>
       	<a href="#popup" class="btn btn-info"><i class="glyphicon glyphicon-bookmark"></i> Reservar Libro</a>
      	<?php } ?>
       	</center>
       	
       	<?php if (isset($_SESSION['usuario'])){ ?>
       	<div id="popup_reserva" class="overlay">
            <div id="popupBody">
                <h2>Reservar Libro</h2>
                <a id="cerrar" href="#">&times;</a>
                <div class="popupContent">
                    <p>Ingrese los datos para registrar la reserva del libro</p>
                    <form method="post" action="reserva/">
                    <input type="hidden" name="codlib" value="<?=$libro1;?>">
                    <input type="hidden" name="codusu" value="<?=$variusu;?>">
                    <input type="hidden" name="nameurl" value="<?=$nomcurl;?>">
                    	<div class="row">
                    		<div class="col-lg-6">
                    			<label>Libro:</label>
                    			<input type="text" name="" class="form-control" value="<?=$libro2;?>" readonly >
                    		</div>
                    		<div class="col-lg-6">
                    			<label>Usuario:</label>
                    			<input type="text" name="" class="form-control" value="<?=$variusunom;?>" readonly >
                    		</div>
                    	</div>
                    	<div class="row">
                    		<div class="col-lg-4">
                    			<label>Fecha de reserva:</label>
                    			<input type="date" name="fecharese" class="form-control" required >
                    		</div>
                    		<div class="col-lg-4">
                    			<label>&nbsp;</label>
                    			<button type="submit" class="btn btn-success">Registrar Reserva</button>
                    		</div>
                    	</div>
                    </form>
                </div>
            </div>
        </div>
       	<?php }else{ ?>
       	
       	<div id="popup" class="overlay">
            <div id="popupBody">
                <!--<h2>Inicia Sesion</h2>-->
                <a id="cerrar" href="#">&times;</a>
                <div class="popupContent">
                   <br>
                    <h3>Para realizar esta acción tienes que iniciar sesion <a href="ingresar/">aqui</a></h3>
                </div>
            </div>
        </div>
        <?php } ?>
        
       	<hr>
       	<br>
            <h1>Categorias</h1>
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
	echo"<li><a href='searchcat.php?cat=$cat2&categoria=$catecurl'><i class='glyphicon glyphicon-menu-right'></i> $cat2</a></li>";
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
    </div>

</section>

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
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="https://www.azasof.com/">Web Diseño: Azasof</a>        
	</div>
</body>
</html>