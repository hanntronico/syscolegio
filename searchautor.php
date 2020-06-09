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

//$varmen = $_GET["var"];
$este = $_GET["auto"];
//$solipres = $_GET["cid"];

$sqlcatev = "SELECT autor FROM libro WHERE autor='$este' ";
$rscatv=$linkdocu->query($sqlcatev);
if($rscatv->num_rows>0){
while($rwcatv=$rscatv->fetch_array()){
	  $cat2vv = $rwcatv["autor"];
}
}

//extrae palabras
function resumir($texto, $limite, $car=".", $final="…") 
{
if(strlen($texto) <= $limite) return $texto;
  if(false !== ($breakpoint = strpos($texto, $car, $limite))) 
  {
   $val=strlen($texto)-1;
   if( $breakpoint < $val)
   {
    $texto= substr($texto, 0, $breakpoint) . $final;
   }
  }
return $texto;
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
       <div class="section-title text-center">
            <h1>Autor: <strong><?=$cat2vv;?></strong></h1>
        </div>
	
	<div class="col-sm-3">
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
       
	<?php
	$sqllib="SELECT l.idl, l.idc, l.titulo, l.tema, l.autor, l.anio, l.edicion, l.lugar, l.editorial, l.cod_isbn, l.detalle, l.canti_ejemplar, l.canti_pagina, l.disponible, l.foto, l.archivo, l.estado, c.categoria, e.nom_edi FROM libro AS l INNER JOIN categoria AS c ON l.idc = c.idc INNER JOIN editorial AS e ON l.editorial = e.idid WHERE l.estado = 'A' AND l.autor='$este' ";
						  $rslib=$linkdocu->query($sqllib);
if($rslib->num_rows>0){
	echo"<div class='col-sm-9' style='background-color: #FFFFFF;'>
                <div class='case-studies-content'>";
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
	
$txtparrafo = resumir($libro10, 200, " ", "… <label class='text-primary'>leer más</label>"); // texto, 150 palab., separador, fin
	
	if($libro13=="Disponible"){
		$fet = "text-success";
	}else{
		$fet = "text-danger";

			}

	?>

                <div class="row">
                	<div class="col-lg-4">
                		<center><img class='img-responsive' src='ctrl_admin/libro/<?=$libro14;?>' width="150px;" alt=''>
                		</center>
                	</div>
                <div class="col-lg-8">
                <!--<h3 style="padding: 1% 0% 1%;"><b><?//=$libro2;?></b></h3>-->
                <br>
					<font size="5px"><b><?=$libro2;?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;**<small class="<?=$fet;?>"><b><?=$libro13;?></b></small>**
                	<p align="justify"><?=$txtparrafo;?></p>
                	<p> <i><b>Autor:</b></i> <?=$libro4;?> <i><b>Editorial:</b></i> <?=$libro17;?> <i><b>Codigo ISBN:</b></i> <?=$libro9;?><br>
                	<i>Tema(s):</i> <?=$libro3;?> Pagina(s):</i> <?=$libro12;?> Edición:</i> <?=$libro6;?> Lugar:</i> <?=$libro7;?></p>
                	<p><a href='libro.php?cap=<?=$libro1;?>&libro=<?=$nomcurl;?>' class='btn btn-info btn-xs'><b>Leer más</b></a> </p>
                	<br>
                </div>
                <hr style="background-color: #000000; border: 1px solid;">
                </div>
                
            
            <?php } 
	echo"</div>
            </div>";
           }else{
		   ?>
           <div class='col-lg-9' style="background-color: #FFFFFF;">
                <div class='case-studies-content'>
                <div class="row">
                	<div class="col-lg-12">
                	<p align="center"><br>No hay datos</p>
					</div>
					</div>
					</div>
					</div>
           <?php } ?>
            
       
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